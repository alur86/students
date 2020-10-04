<?php namespace App\Repositories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;




class StudentRepository  {


   public function findBySurname($surname){

   return Student::where('surname', $surname)
            ->get();

    }

    public function getStudent($id){

    return Student::where('id',$id)->first();

    }

    public function update(Student $student, array $attributes) {

    Student::where('id', '=', $student->id)->update($attributes);

    return Student::find($student->id);

    }

    public function create(array $attributes) {

    return Student::create($attributes);

    }

    public function all(){

    return Student::all();

    }

    public function delete($id){

    return Student::find($id)->delete();

  }
}