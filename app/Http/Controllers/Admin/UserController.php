<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        return view('backend.user.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->level = $request->level;
        if (!empty($request->file('fImage'))) {
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $user->image    = 'uploads/user/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/user/',$user->image);
        }
        $user->save();
        return redirect()->route('user.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công !'
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('backend.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->input('password')) {
            $this->validate($request,
            [
                'repassword' => 'same:password'
            ],
            [
                'password.same' => 'Mật khẩu nhập lại không giống !'
            ]);
            $pass = $request->input('password');
            $user->password = Hash::make($pass);
        }
        $user->status = $request->status;
        $user->level = $request->level;
        if (!empty($request->file('fImage'))) {
            $image = $user->image;
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $user->image    = 'uploads/user/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/user/',$user->image);
            if(File::exists($image)){
                File::delete($image);   
            }
        }
        $user->save();
        return redirect()->route('user.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $image = $user->image;
            if(File::exists($image)){
                File::delete($image);
            }
            $user::destroy($id);
        }
        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }
}
