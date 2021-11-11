<?php

namespace App\Http\Controllers;

use App\Models\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Database\QueryException;
use Log;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        // die('end');
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:registered_users',
            'user_role' => 'required',
            'mobile' => 'required|min:10|max:12',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
        try {


            $student = new RegisteredUser();
            $student->name = $request->input('name');
            $student->gender = $request->input('gender');
            $student->email = $request->input('email');
            $student->mobile = $request->input('mobile');
            $student->user_role = $request->input('user_role');
            $student->password = Hash::make($request->password);
            $student->save();

            return back()->with('success', 'Data Submitted');
        }
        // catch (QueryException $e) {
        //     $message = "Error";
        //     //return response()->json($message, 500);
        // }
        //catch (Illuminate\Database\QueryException $e) {
        //     dd($e);

        catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }

        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisteredUser  $registeredUser
     * @return \Illuminate\Http\Response
     */
    public function show(RegisteredUser $registeredUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisteredUser  $registeredUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisteredUser $registeredUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisteredUser  $registeredUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisteredUser $registeredUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisteredUser  $registeredUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisteredUser $registeredUser)
    {
        //
    }
}
