<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argalumno extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'arg_alumno';

    protected $fillable = ['id_gg','id_esp','id_alm','id_turn','id_sexo'];
	
}
