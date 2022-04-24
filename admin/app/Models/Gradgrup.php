<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradgrup extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'gradgrup';

    protected $fillable = ['grado','grupo'];
	
}
