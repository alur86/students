<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Group;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Requests\StudentSearchRequest;

class StudentsController extends Controller
{
    
   
    protected $studentRepository;


  
    public function __construct(StudentRepository $studentRepository
                               ){
        $this->studentRepository = $studentRepository;
       
    }


     public function index() {
       
     $students = $this->studentRepository->all();

     return view('students.index',compact('students'));

    } 


    public function new() {

    $groups = Group::all();

    return view('students.new',compact('groups'));

    }

    public function create(StudentCreateRequest $request) {

    $attributes =([ 
		    'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'birthdate' => $request->get('birthdate'),
            'group_id' => intval($request->get('group_id'))
        ]);


    $student = $this->studentRepository->create($attributes);

    return redirect(route('students'))->with('success', 'Student was created ok');


    }

  

    public function edit($id) {

    $groups = Group::all();
    $student = $this->studentRepository->getStudent($id);

    return view('students.edit',compact('groups', 'student'));

    }



    public function update(StudentUpdateRequest $request) {
    
     $student_id = intval($request->get('student_id'));
     $student = Student::where( 'id', '=', $student_id )->first();

      $attributes =([ 
		    'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'birthdate' => $request->get('birthdate'),
            'group_id' => intval($request->get('group_id'))
        ]);

    $student = $this->studentRepository->update( $student,$attributes);

    return redirect(route('students'))->with('success', 'Student was edited ok');


    }



    public function delete($id) {
  
    $student = $this->studentRepository->delete($id);

    return redirect(route('students'))->with('success', 'Student was deleted');

    }



    public function search(StudentSearchRequest $request) {

     $query = $request->get('query');

     $students = Student::where('name', 'LIKE', "%$query%")->orWhere('surname', 'LIKE', "%$query%")->paginate(10);

      $total = Student::where('name', 'LIKE', "%$query%")->orWhere('surname', 'LIKE', "%$query%")->count();

     return view('students.search')->with('students',$students)->with('query',$query)->with('total',$total);
     
     }





}
