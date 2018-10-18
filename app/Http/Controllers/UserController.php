<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Gate;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user->can('view',$user)){
            $queries=[];
            $users=User::sortable(['last_name' => 'asc'])->paginate(3)->appends($queries);
            return view('users.index', compact('users'));
        }else{
            return redirect('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $auth_user = auth()->user();
        if($auth_user->can('view', $user)){
            return view('users.show', compact('user'));
        }else{
            return redirect('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $auth_user = auth()->user();
        if($auth_user->can('update', $user)){
            return view('users.edit', compact('user'));
        }else{
            return redirect('home');
        }            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $auth_user = auth()->user();
        if($auth_user->can('update', $user)){

            $user=User::find($user->id);
            $user->name = request('name');
            $user->last_name = request('last_name');
            $user->phone = request('phone');
            $user->email = request('email');
            $user->description = request('description');

            if($auth_user->role!=='admin'){
                $user->role = $user->role;
                $user->active = $user->active;
            }else{
                $user->role= request('role');
                !$request->active ? $user->active = false : $user->active = true;
            }
           
            $user->save();
            return redirect('users');

        }else{
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
