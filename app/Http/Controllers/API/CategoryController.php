<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    public function index()
    {
        // dd('here');

        $categories = Category::get();

        $data = CategoryResource::collection($categories);

        // dd($categories);

        return $this->success($data, "Category Retrieved Successfully", 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required'
        ]);

        // dd($validator);

        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }

        if ($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('categoryImages'), $imageName);
        }

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return $this->success($category, "Category Created Successfully", 201);


    }
}
