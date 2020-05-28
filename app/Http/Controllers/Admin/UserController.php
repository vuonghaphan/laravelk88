<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::table('users')->whereName('luc lon')->update([
        //     'name'=>'luc an lon',
        //     'email'=> 'lucanlon@gmail.com'
        // ]);
        // DB::table('users')->whereName('teoo')->update([
        //     'address'=>'vinh',
        //     'phone'=> '123456'
        // ]);
        // DB::table('users')->whereName('bom')->update([
        //     'address'=>'vinh',
        //     'phone'=> '123456'
        // ]);
        $users = User::with('roles')->orderBy('id','desc')->paginate(5);
        // $users = DB::table('users')->select(['name'])->get(); // lay ra cot name
        // $users = DB::table('users')->skip('1')->take('3')->get(); // bỏ qua 1 lấy ra 3
        // print_r($users);
        // DB::table('users')->insert([
        //     'name' => 'teo',
        //     'email' => 'teo@gmai.com',
        //     'password' => '1234'
        // ]);
        // $u = DB::table('users')->where('email','=','teo@gmai.com')->first();
        // print_r($u);

        debugbar()->info($users);
        return view('admin.users.index',[
            'users' => $users
        ]);
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
    public function store(StoreUserRequest $r)
    {
        $input = $r->only([
            'name',
            'email',
            'password',
            'phone',
            'address',
            'level'
        ]);
        // print_r($input);
        $users = User::create($input);
        return redirect("admin/users");
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
    public function edit($users)
    {
        $users = User::findOrFail($users);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $r, $users)
    {
        $input = $r->only([
            'name',
            'email',
            'password',
            'address',
            'phone',
        ]);
        $users = User::findOrFail($users);
        $users->fill($input);
        $users->save();
        return back();
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
