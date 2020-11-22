<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $role = Role::pluck('name', 'id')->toArray();


        return view('admin.users.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name'      => 'required',
            'password'  => 'required|confirmed|min:3',
            'email'     => 'required|email|string|max:255|unique:users',
            'user_type' => 'required'

        ]);

        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());
        $user->roles()->attach($request->user_type); //attachRole
 
        //$user->save();

        return redirect('admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model = User::findOrFail($id);
        $role = Role::pluck('name', 'id')->toArray();
        return view('admin.users.edit', compact('model', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'name'      => 'required',
            'password'  => 'sometimes|confirmed|min:3',
            'email'     => 'required|email|string|max:255|unique:users,email,'.$id,
            'user_type' => 'required'

        ]);

        $user = User::findOrFail($id);

        $request->merge([]);

        $user->roles()->sync((array) $request->input('user_type'));
 
        $user->update($request->all());

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $record = User::findOrFail($id);
        $record->delete();
        flash('Success Delete User')->success();
        return redirect('admin/user'); //return back();
    }
}
