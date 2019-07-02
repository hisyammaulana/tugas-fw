<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::orderBy('id', 'DESC')->get();
        return view('user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'username' => 'required|unique:users|min:5|max:20',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:5|max:60',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);

        $foto = $request->file('foto')->store('user');

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'foto' => $foto,
            'level' => $request->level
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
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
        $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'username' => 'required|unique:users|min:5|max:20',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:5|max:60',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);

        $user = User::findOrFail($id);

        if ($request->password) {
            if ($request->foto) {
                $foto_path = $user->foto;
                if (Storage::exists($foto_path)) {
                    Storage::delete($foto_path);
                }
                $foto = $request->file('foto')->store('user');
                $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'foto' => $foto,
                    'level' => $request->level
                ]);
            } else {
                $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'level' => $request->level
                ]);
            }
        } elseif ($request->foto) {
            $foto_path = $user->foto;
            if (Storage::exists($foto_path)) {
                Storage::delete($foto_path);
            }
            $foto = $request->file('foto')->store('user');
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'foto' => $foto,
                'level' => $request->level
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'level' => $request->level
            ]);
        }

        return redirect()->back();
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
