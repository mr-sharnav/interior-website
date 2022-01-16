<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\ManageUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $users = User::get();
    $userArray = array();

    foreach ($users as $user){

     $userArray[$user->id]= $user;   
    }
    return view('admin.users.index', compact('users', 'userArray'));
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
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $addUser = new User();
        $addUser->name = $request->name;
        $addUser->email = $request->email;
        $addUser->phone = $request->phone;
        $addUser->password = Hash::make($request->password);
        $addUser->save();

        $newUser =[

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

            ];
            Mail::to($request->email)->send(new UserMail($newUser));

        return redirect()->back();
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function show(ManageUser $manageUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
    return view('admin.users.edit', compact('users'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateUser = User::find($id);
    
        $updateUser->name = $request->name;
        $updateUser->email = $request->email;
        $updateUser->phone = $request->phone;
        if (!$request->password == NULL) {
        $updateUser->password = Hash::make($request->password);
        }
        $updateUser->update();
        return Redirect(route('management.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageUser  $manageUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('management.index')->with('success','Deleted Succesfully');
 
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->Route('login');
    }
    
}
