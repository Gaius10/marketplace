<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Traits\Upload;

class ProductController extends Controller
{
    use Upload;

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->middleware('user.has.not.store');
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;

        $products = $userStore->products()->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::all(['id', 'name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['price']       = str_replace(',', '.', $data['price']);
        $data['body']        = str_replace(PHP_EOL, '<br>', $data['body']);
        $data['description'] = str_replace(PHP_EOL, '<br>', $data['description']);
        

        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        $product->categories()->sync($data['categories']);

        if ($request->hasFile('photos')) {
            $photos = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($photos);
        }

        flash('Produto criado com sucesso.');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = \App\Models\Category::all(['id', 'name']);
        $product = $this->product->findOrFail($id);

        $product->description = str_replace('<br>', PHP_EOL, $product->description);
        $product->body = str_replace('<br>', PHP_EOL, $product->body);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['price']       = str_replace(',', '.', $data['price']);
        $data['body']        = str_replace(PHP_EOL, '<br>', $data['body']);
        $data['description'] = str_replace(PHP_EOL, '<br>', $data['description']);

        $product = $this->product->find($id);
        $product->update($data);
        $product->categories()->sync($data['categories']);

        if ($request->hasFile('photos')) {
            $photos = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($photos);
        }

        flash('Produto atualizado com sucesso.');
        return redirect()->route('admin.products.edit', ['product' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        $product->categories()->sync($product->categories);
        dd($product->categories);
        $product->delete();

        flash('Produto removido com sucesso.');
        return redirect()->route('admin.products.index');
    }

    public function imageUpload($images, $columnName)
    {
        $uploadedImages = [];

        foreach ($images as $image) {
            $uploadedImages[] = [$columnName => $image->store('products', 'public')];
        }

        return $uploadedImages;
    }
}
