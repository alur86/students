<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    protected $fillable = [
        'title',
    ];


   public $timestamps = true;   
    
   protected $table = 'departments';



   public function groups(){

   return $this->hasMany(Group::class);

   } 


}
