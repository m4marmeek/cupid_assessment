<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserDetailsRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user-details', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserDetailsRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserDetailsRequest $request, User $user)
    {
        //
    }
}
