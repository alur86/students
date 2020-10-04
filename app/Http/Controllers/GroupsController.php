<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Models\Department;
use Carbon\Carbon;



class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    $groups = Group::orderBy('id', 'desc')->paginate(10);

    return view('groups.index',compact('groups'));

}
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
  
    $departments = Department::all();

    return view('groups.add_group')->with('departments',$departments);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupCreateRequest $request)
    {
       $group = new Group;
       $group->group_number = $request->get('group_number');
       $group->department_id = $request->get('department_id');
       $group->course = $request->get('course');
       $group->created_at = Carbon::now();
       $group->save();

       return redirect('/groups')->with('success','Group successfully created');  
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       
    $group = Group::findOrFail($id);
    $departments = Department::all();

    return view('groups.show')->with('group',$group)->with('department',$departments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    
    $group = Group::findOrFail($id);
    $departments = Department::all();

    return view('groups.edit_group')->with('group',$group)->with('departments',$departments);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( GroupUpdateRequest $request){

       $group_id = intval($request->get('group_id'));
       $group = Group::where( 'id', '=', $group_id )->first();
       $group->group_number = $request->get('group_number');
       $group->department_id = $request->get('department_id');
       $group->course = $request->get('course');
       $group->updated_at = Carbon::now();
       $group->save();

       return redirect('/groups')->with('success','Group successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $group = Group::findOrFail($id);
        $group->delete();

        return redirect('/groups')->with('success','Group successfully deleted');
    }
}
