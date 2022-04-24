<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Argpublic extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'arg_public';

    protected $fillable = ['id_mst','id_pbc','id_gradgrup','id_esp','id_turno'];
	
}
