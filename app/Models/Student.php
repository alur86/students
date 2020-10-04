<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $hidden = [
        'group_id',
    ];


    protected $guarded = ['id'];


    protected $fillable = [
        'name',
        'surname',
        'birthdate',
    ];


   public $timestamps = true;   
    
   protected $table = 'students';



  public function full_name(){
   
    $full_name = '';
    if($this->name)
    $full_name .= $this->name.", ";
    if($this->surname != '')
    $full_name .= '<br />'.$this->surname;
  
   return safe_output($full_name);
  }

  public function student_count(){

  return $this->Student::orderBy('id')->count();

  }


  public function scopeBirthdate($query){

  return $query->where('birthdate','=',$birthdate);
   
  }


  public function group(){

  return $this->belongsTo(Group::class);

  }








}
