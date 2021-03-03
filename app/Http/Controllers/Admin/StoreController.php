<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = \App\Models\Store::all();

        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = \App\Models\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = \App\Models\User::find($data['user']);
        return  $user->store()->create($data);  
    }
}
