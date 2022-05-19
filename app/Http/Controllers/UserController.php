<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\RegiterEmailNotification;
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
        $users = User::all();
        return view('pages.user',[
            'title' => 'user',
            'users' =>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cluster = Cluster::all();
        return view('pages.user-create',[
            'title' => 'user',
            'cluster' => $cluster
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $pass = Str::random(8);
        $data['password'] = bcrypt($pass);
        
        $user = User::create($data);
        $data['pass'] = $pass;

        $user->notify(new RegiterEmailNotification($data));
        return redirect()->route('user')->with('message','Data User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $person = User::with(['transaction','cluster'])->get();

        foreach ($person as $p ) {
            foreach($p->transaction as $t) {
                $p['total'] += $t->nominal ;
            }
        };

        // return $person;
        return view('pages.person',[
            'title' => 'person',
            'person' => $person
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
        //
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
        $user = User::findOrFail($id);
        $user['no_hp'] = $request->no_hp;
        $user['no_rumah'] = $request->no_rumah;
        $user['password'] = $request->password;
        return $user;
        $user->save();
        return redirect()->route('dashboard')->with('message','Data berhasil diubah');
    }

    public function update_pass(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user['password'] = bcrypt($request->password);
        // return $user;
        $user->save();
        return redirect()->route('dashboard')->with('message','Data berhasil diubah');
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

    public function history($id)
    {
         $person = User::with(['transaction','cluster'])->findOrFail($id);
    //    return $person;
       return view('pages.person-history',[
           'title' => 'person',
           'person' => $person
       ]);
    }

    public function setting()
    {
        $user = User::with(['transaction','cluster'])->findOrFail(Auth::user()->id);
        // return $user;
        return view('pages.user-setting',[
            'title' => 'user',
            'user' => $user
        ]);
    }
}
