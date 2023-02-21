<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        } elseif (Gate::denies('cpanel')) {
            abort(403, 'action not allowed!');
        } else {
            $users = User::paginate();

            return view('cpanel')->with('users', $users);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        } elseif (Gate::denies('cpanel')) {
            abort(403, 'action not allowed!');
        } else {
            $data = User::find($id);
            return view('certainUser', compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        } elseif (Gate::denies('cpanel')) {
            abort(403, 'action not allowed!');
        } else {
            $user = User::find($id);
            return view('editUser', compact('user'));
        }
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
        $update = [
            "name" => $request->patient,
        ];
        User::where('id', $id)->update($update);
        $msg = "User Updated .";
        return redirect("cpanel/" . $id)->with('successMsg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        } elseif (Gate::denies('cpanel')) {
            abort(403, 'action not allowed!');
        } else {
            User::destroy($id);
            return redirect('cpanel')->with('successMsg', 'User Deleted !');
        }
    }
}
