<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepositoryInterface $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService    = $userService;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
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
            'role'     => 'nullable|exists:roles,name',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status']   = $request->has('status') ? true : false;
        $data['password'] = Hash::make($data['password']);

        $role = $data['role'] ?? null;
        unset($data['role']);

        $this->userRepository->store($data, $role);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user  = $this->userRepository->show($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
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
            'role'    => 'nullable|exists:roles,name',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        } else {
            unset($data['image']);
        }

        $data['status'] = $request->has('status') ? true : false;

        $role = $data['role'] ?? null;
        unset($data['role']);

        $this->userRepository->update($id, $data, $role);

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('users.index');
    }

    public function userStatus($id)
    {
        $this->userService->userStatus($id);
        return redirect()->route('users.index');
    }
}
