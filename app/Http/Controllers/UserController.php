<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
        return abort(403, 'No tienes los permisos requeridos para acceder a los siguientes datos o paginas.');
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
        return abort(403, 'No tienes los permisos requeridos para acceder a los siguientes datos o paginas.');
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
        return abort(403, 'No tienes los permisos requeridos para acceder a los siguientes datos o paginas.');
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
        if (auth()->user()->id == $id) {
            return view('user.edit', compact('user', 'roles'));
        }
        return abort(403, 'No tienes los permisos requeridos para acceder a los siguientes datos o paginas.');
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

        $user->update($request->all());
        if (auth()->user()->rol == 'admin') {


            return redirect()->route('users.index')
                ->with('success', 'User updated successfully');
        }
        return redirect()->route('home.index')
            ->with('success', 'User updated successfully');
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
            ->with('success', 'User deleted successfully');
    }
}