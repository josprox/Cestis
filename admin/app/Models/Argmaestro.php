<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argmaestro extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'arg_maestro';

    protected $fillable = ['id_gg','id_esp','id_mst','id_turno','id_sexo'];
	
}
