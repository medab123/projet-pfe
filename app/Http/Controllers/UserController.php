<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'is_admin' => 'boolean',
        ]);
        $data['is_admin'] = $request->has('is_admin') ? true : false;

        $user = User::create($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('avatars', 'public');
            $user->image = $imagePath;
            $user->save();
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed',
            'is_admin' => 'required',
        ]);
        $validatedData['is_admin'] = $request->has('is_admin') ? true : false;


        if (is_null($validatedData['password'])) {
            unset($validatedData['password']);
        }
        $user->update($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('avatars', 'public');
            $user->image = $imagePath;
            $user->save();
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
