<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
 
class Food extends Model {
   protected $fillable = ['id', 'cat_id', 'feed_time', 'food_amount', 'food_type'];
   protected $table = 'food'; 
}