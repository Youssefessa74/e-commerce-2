<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminListDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminListDataTable $adminListDataTable)
    {
        return $adminListDataTable->render('admin.admin_management.index');
    }

    public function create(){
        return view('admin.admin_management.create');
    }


    public function store(Request $request){
        $request->validate([
            'name' => ['required','max:255'],
            'email' => ['email','required','max:255','unique:users,email'],
            'role'=>['required','in:admin,user'],
            'password'=>['required','confirmed']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password =Hash::make($request->password);
        $user->save();

        toastr("Data Saved Successfully" ,'success');
        return to_route('admin.admin-list.index');

    }

    public function edit($id){
        $admin = User::findOrFail($id);
        return view('admin.admin_management.edit',compact('admin'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => ['required','max:255'],
            'email' => ['email','required','max:255','unique:users,email,'.$id],
            'role'=>['required','in:admin,sub_admin'],
            'password'=>['nullable','confirmed']
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if(empty($request->password)){
            $user->password = $user->password;
        } else {
            $user->password =Hash::make($request->password);
        }
        $user->save();

        toastr("Data Saved Successfully" ,'success');
        return to_route('admin.admin-list.index');
    }

    function show (){}
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        toastr("Data Saved Successfully" ,'success');
        return to_route('admin.admin-list.index');
    }
}
