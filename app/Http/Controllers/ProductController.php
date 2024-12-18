<?php

namespace App\Http\Controllers;

use App\Events\ProductEvent;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $messages = Product::orderBy('created_at', 'desc')->get();
        return view('product', compact('messages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required', 'image' => 'required']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        // $data['message'] = $request->message;
        $Message = Product::create($data);
        broadcast(new ProductEvent($Message));
        return back();
    }
}
