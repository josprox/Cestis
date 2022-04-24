<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'descargas';

    protected $fillable = ['id_gg','id_esp','id_turn','descripcion','ruta'];
	
}
