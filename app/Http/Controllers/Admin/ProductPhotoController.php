<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\FlashServiceProvider;

class ProductPhotoController extends Controller
{
    public function remove(Request $request)
    {
        $photoName = $request->get('photoName');

        if (Storage::disk('public')->exists($photoName)) {
            Storage::disk('public')->delete($photoName); // Deleta o arquivo no servidor
        }

        $photo = ProductPhoto::where('image', $photoName);
        $productId = $photo->first()->product_id;
        $photo->delete(); // Apaga no banco de dados
        
        flash('Foto removida com sucesso.')->success();
        return redirect()->route('admin.products.edit', ['product' => $productId]);
    }
}
