<?php

namespace Bantenprov\Advancetrust\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use That0n3guy\Transliteration;
use App\Role;
use App\Permission;
use App\User;

class RoleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();        

        return view('advancetrust::roles.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advancetrust::roles.rolecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = strtolower(\Transliteration::clean_filename($request->name));
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        return redirect()->to('/advancetrust/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        
        return view('advancetrust::roles.roleshow',compact('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addPermission($id)
    {
        $role = Role::find($id);
        $available_permissions = [0];
        foreach($role->permissions as $role_permission){
            $available_permissions[$role_permission->id] = $role_permission->id;          
        }        

        $permissions = Permission::all();        
        
        return view('advancetrust::roles.addpermission',compact('role','permissions','available_permissions'));
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storePermission(Request $request,$id)
    {        

        $role = new Role();        
        $role_permission = $role->where('id',$id)->first()->permissions;

        foreach($role_permission as $detachPermission){            
            $role->where('id',$id)->first()->detachPermission($detachPermission->id);
        }

        if(count($request->permission) > 0)
        {
            $role->where('id',$id)->first()->attachPermissions($request->permission);
        }
        
            
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return view('advancetrust::roles.roleedit',compact('role'));
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
        $role = new Role();

        $role->where('id',$id)->update([
            'name' => strtolower(\Transliteration::clean_filename($request->name)),
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        
        return redirect()->to('/advancetrust/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();

        return redirect()->back();
    }
}

