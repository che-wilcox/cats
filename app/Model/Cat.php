<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
 
class Cat extends Model {
   protected $fillable = ['id', 'name'];
   protected $table = 'cats'; 
}