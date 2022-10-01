<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'My Profile | Dashboard';
        return view('admin/profile/index', ['pageTitle' => $pageTitle]);
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
        $pageTitle = 'My Profile | Dashboard';

        // ELOQUENT
        $user = User::find($id);

        return view('admin.profile.index', compact('pageTitle', 'user'));
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
        $messages = [
            'required' => ':Attribute is require',
            'email' => 'Fill :Attribute correctly',
        ];

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'position' => 'required',
            'password' => 'required',
        ], $messages);

        $user = User::find($id);

        // Get File Image
        $file = $request->file('photoprofile');

        if ($file != null) {
            $ImgUserOriginal = $file->getClientOriginalName();
            $ImgUserEncrypted = $file->hashName();

            // Delete Existing Image
            Storage::disk('public')->delete('image/user/'.$user->img_user_encrypted);

            // Store File Image
            $file->store('public/image/user');
        }

        $datapassword = $user->password;
        $passwordbaru = $request->password;

        // ELOQUENT
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;

        if ($passwordbaru != $datapassword) {
            $user->password = bcrypt($request->password);
        }

        if ($file != null) {
            $user->img_user_original = $ImgUserOriginal;
            $user->img_user_encrypted = $ImgUserEncrypted;
        }

        $user->save();

        Alert::success('Changed Successfully', 'Profile Data Changed Successfully');

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
