<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address'  => 'nullable|string',
            'phone'    => 'nullable|string',
            'gender'   => 'required|in:male,female,other',
            'status'   => 'nullable',
            'image'    => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;
        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string',
            'phone'   => 'nullable|string',
            'gender'  => 'required|in:male,female,other',
            'status'  => 'nullable',
            'image'   => 'nullable|image',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        } else {
            unset($data['image']);
        }

        $data['status'] = $request->has('status') ? true : false;

        $user->update($data);
        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}
