<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Group extends Model
{
    use HasFactory;


    protected $hidden = [
        'department_id',
    ];



    protected $guarded = ['id'];


    protected $fillable = [
        'group_number',
        'course',
    ];

  

   public $timestamps = true;   
    
   protected $table = 'groups';


   public function students(){

   return $this->hasMany(Student::class);

   } 

   
   public function department(){

   return $this->belongsTo(Department::class);

   }


   
}
