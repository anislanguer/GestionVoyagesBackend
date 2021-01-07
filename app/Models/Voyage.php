<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;
		protected $fillable = [
		'lieu_dep',
		'lieu_arr',
		'dateh_dep',
		'num_voiture',
		'num_tel',
		'nbr_places',
		'prix'
	];
}
