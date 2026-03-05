<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        // dd('here');

        $categories = $this->categoryRepository->index();

        $data = CategoryResource::collection($categories);

        return $this->success($data, "Category Retrieved Successfully", 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required'
        ]);

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

    public function show($id)
    {
        $category = Category::find($id);

        $data = new CategoryResource($category);

        return $this->success($data, "Category Show Scuccessfully", 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error('Validation Erro', $validator->errors(), 422);
        }

        $category = Category::find($id);

        $category->update($request->all());

        return $this->success($category, "Category Updated Successfully", 200);
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return $this->success($category, "Category Deleted Successfully", 200);
    }
}
