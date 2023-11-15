<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'role' => ['required'], // Cambia la validación a un solo rol
        ]);

        $validator->validate();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        // Asignar el rol seleccionado al usuario
        $role = Role::findOrFail($request->input('role'));
        $user->assignRole($role);

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $user = User::with('roles')->find($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'roles' => 'required|array|min:1', // Asegura al menos un rol seleccionado
            'roles.*' => 'exists:roles,id', // Verifica que los roles existan en la tabla roles
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Obtener el rol seleccionado y asignarlo al usuario
        $selectedRole = Role::findOrFail($request->input('roles')[0]); // Obtener el primer rol seleccionado
        $user->syncRoles([$selectedRole->id]); // Asignar solo un rol al usuario

        $user->save();

        return redirect()->route('admin.users.show', $id)->with('success', 'Usuario actualizado correctamente.');
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user && $user->id !== Auth::id()) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
        }

        return redirect()->route('admin.users.index')->with('error', 'No puedes eliminar tu propia cuenta o el usuario no existe.');
    }
}