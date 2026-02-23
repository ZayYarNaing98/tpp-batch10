<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->index();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required'
        ]);

        if ($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('categoryImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        $this->categoryRepository->store($data);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->show($id);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request)
    {

        $category = $this->categoryRepository->show($request->id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index');

    }

    public function delete($id)
    {

        $category = $this->categoryRepository->show($id);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
