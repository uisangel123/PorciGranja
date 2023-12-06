<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role');
    }
    public function index()
    {
        $users = User::paginate();
        if (auth()->user()->rol == 'admin') {

            return view('user.index', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        }
        return redirect()->route('home.index')->with('danger','No tienes los permisos requeridos para acceder a esa pagina!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $roles = Role::all();
        if (auth()->user()->rol == 'admin') {

            return view('user.create', compact('user', 'roles'));
        }
        return redirect()->route('home.index')->with('danger','No tienes los permisos requeridos para acceder a esa pagina!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (auth()->user()->rol == 'admin') {
            return view('user.show', compact('user'));
        }
        return redirect()->route('home.index')->with('danger','No tienes los permisos requeridos para acceder a esa pagina!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        if (auth()->user()->id == $id || auth()->user()->rol == 'admin') {
            return view('user.edit', compact('user', 'roles'));
        }
        return redirect()->route('home.index')->with('danger','No tienes los permisos requeridos para acceder a esa pagina!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        request()->validate(User::$rules);

        if (auth()->user()->rol !== 'admin') {
            $request->merge(['cedula' => $user->cedula]); //el merge ignora las nuevas respuesta de cierto campo y envia la original q no es copia: ejemplo dato original "123" se modifica y envia por "234", el merge ignora ese cambio y envia el original "123".
        }

        request()->validate(User::$rules);
        $user->update($request->all());

        return redirect()->route('home.index')
            ->with('success', 'Usuario actualizado exitosamente!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente!');
    }
    public function actualizarPassword(Request $request)
    {

        $user = User::find(Auth::id()); //buscar el usuario autenticado
        $passwordActual = $request->input('passwordActual');
        $passwordNueva = $request->input('passwordNueva');
        $passwordBd = Auth::user()->password;
        if ($passwordNueva && password_verify($passwordActual, $passwordBd)) {
            $user->password = Hash::make($passwordNueva);
            $user->save();
            return redirect()->route('home.index')
                ->with('success', 'Contraseña actualizada exitosamente');
        } else {
            print('error');
        }
    }
}
