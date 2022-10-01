<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'User | Dashboard';

        $user = User::all();

        return view('admin/user/index', [
            'pageTitle' => $pageTitle,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add User | Dashboard';
        return view('admin.user.add', ['pageTitle' => $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        // Get File Image
        $file = $request->file('photoprofile');

        if ($file != null) {
            $ImgUserOriginal = $file->getClientOriginalName();
            $ImgUserEncrypted = $file->hashName();

            // Store File Image
            $file->store('public/image/user');
        }

        // ELOQUENT
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->position = $request->position;
        $user->password = bcrypt($request->password);

        if ($file != null) {
            $user->img_user_original = $ImgUserOriginal;
            $user->img_user_encrypted = $ImgUserEncrypted;
        }

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'User Detail | Dashboard';

        // ELOQUENT
        $user = User::find($id);

        return view('admin.user.view', compact('pageTitle', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit User | Dashboard';

        // ELOQUENT
        $user = User::find($id);

        return view('admin.user.edit', compact('pageTitle', 'user'));
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

        Alert::success('Changed Successfully', 'User Data Changed Successfully');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ELOQUENT
        $user = User::find($id);
        $ImgUserEncrypted = $user->img_user_encrypted;

        // Delete Category
        $user->delete();

        // Delete File Image
        Storage::disk('public')->delete('image/product/'.$ImgUserEncrypted);

        Alert::success('Deleted Successfully', 'User Data Deleted Successfully');

        return redirect()->route('user.index');
    }
}
