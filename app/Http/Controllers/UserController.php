<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Age;
use Carbon\Carbon;
use App\Sexe;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        return view('admin.users',compact('users'));
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
        return view('admin.editUsers')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.editUsers',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user)
    {
        $sexe=Sexe::where('wording', $request->input('sexe'))->first();
        $sexe_id=$sexe->id;
        $age=Age::where('wording','adult')->first();
       if(Carbon::parse($request->input('date'))->age <12)
       {
        $age=Age::where('wording', 'child')->first();
       }
        $userUpadte= User::where('id',$user)->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'date_of_birth'=>$request->input('date'),
            'age_id'=>$age->id,
            'sexe_id'=>$sexe_id,
            'password'=>bcrypt($request->input('password')),
    ]);

                if($userUpadte)
                {
                     return redirect()->route('Adminusers.index',['user'=>$user])
                     ->with('success','User Updated Successfully');
                }
                return back()->withInput()->with('errors','Error Updating User');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::where('id',$user)->delete();
        return back()->withInput()->with('Success','User Has Been Successfully Deleted');
    }
}
