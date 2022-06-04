<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'social';

    protected $fillable = ['id_usuario','info_datos'];
	
}
