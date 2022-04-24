<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numcontrol extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'numcontrols';

    protected $fillable = ['num','curp'];
	
}
