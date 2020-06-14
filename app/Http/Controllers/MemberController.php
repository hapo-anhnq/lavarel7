<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Members\UpdateMember;
use App\Http\Requests\Members\CreateMember;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $number = 1;
        return view('members.index', compact('users', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMember $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(240, 240)->save(public_path('/images/avatar/' . $filename));
        } else {
            $filename = "default-avatar.jpg";
        }

        $member = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'avatar' => $filename,
            'gender' => $request->get('gender'),
            'department' => $request->get('department'),
            'birthday' => $request->get('birthday'),
            'phone_number' => $request->get('phone_number'),
            'role' => $request->get('role'),
        ]);

        $member->save();

        return back()->with('success', 'Member created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $user = User::find($id);
        return view('members.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = ['member', 'admin'];
        $genders = ['male', 'female', 'other'];
        $user = User::find($id);
        return view('members.edit', compact('user', 'roles', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMember $request, $id)
    {
        $user = user::find($id);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(240, 240)->save(public_path('/images/avatar/' . $filename));

            $data['avatar'] = $filename;
        } else {
            unset($data['avatar']);
        }

        if ($data['password'] == '') {
            unset($data['password']);
        }

        $birthday = $data['birthday'];

        $data['birthday'] = new Carbon($birthday);
        $user->update($data);

        return back()->with('success', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->name == 'admin') {
            $user = User::find($id);
            $user->delete();
            return redirect('/members')->with('success', 'Member deleted!');
        }
    }
}
