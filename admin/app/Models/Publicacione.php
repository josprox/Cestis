<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'publicaciones';

    protected $fillable = ['iduser','titulo','vista','descripcion'];
	
}
