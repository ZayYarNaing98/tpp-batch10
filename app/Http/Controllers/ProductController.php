<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|min:0',
            'image' => 'required|image',
            'category_id' => 'required',
            'status' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('productImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;

        $data['category_id'] = $request->category_id;

        Product::create($data);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|min:0',
            'image'       => 'nullable|image',
            'category_id' => 'required',
            'status'      => 'nullable',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('productImages'), $imageName);
            $data['image'] = $imageName;
        } else {
            unset($data['image']);
        }

        $data['status'] = $request->has('status') ? true : false;
        $data['category_id'] = $request->category_id;

        $product->update($data);
        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
