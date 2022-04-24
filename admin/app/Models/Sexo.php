<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sexo';

    protected $fillable = ['sexo'];
	
}
