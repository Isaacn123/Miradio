<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admins.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','name')->all();
        return view('admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
     
    //  $request->validate([
    //         'username' =>  'required',
    //         'name' => 'required',
    //         'roles' => 'required'
    //  ]);


    //    dd($request);

     $pasword = Hash::make($request->password);
     $user = User::create([
        'username' => $request->username,
        'name' => $request->full_name,
        'email' => $request->email,
        'password' =>  $pasword,
     ]);

        // $input = $request->all();
       
        // $input['password'] = Hash::make($input['password']);
      
        // $user = User::create($input);
        $user->assignRole($request->input('roles'));
        $user->givePermissionTo('role-create');

        // dd($request->roles);

    //  $role = Role::create(['name' => 'user']);
       
        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);
       
        // $user->assignRole([$role->id]);
   
        return redirect()->route('admin.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        //
        $user = User::find($admin->id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admins.create',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        //

        $user = User::find($admin->id);

        if($request->has('full_name')){
            $user->update([
                'name' => $request->full_name,
            ]);
        }
        
        if($request->has('roles')){

            DB::table('model_has_roles')->where('model_id',$id)->delete();
    
            $user->assignRole($request->roles);
        }
        
        if(!empty($request->password)){ 

            $password = Hash::make($request->password);


        }else{

            
            $input = Arr::except($input,array('password'));    
        }
       

      


      
    
        return redirect()->route('admin.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        //
        User::find($admin->id)->delete();
        return redirect()->route('admin.index')
                        ->with('success','User deleted successfully');
    }
}
