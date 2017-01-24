<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exterior extends Model
{
    //
	public $timestamps = false;
	protected $fillable = ['baseID', 'base1Value', 'base2Value', 'base3Value', 'base4Value', 'wpl', 'antifungal', 'monsoon', 'dirt', 'efflorescene', 'hiding', 'gloss', 'coverage', 'sp_ltr', 'base_Type', 'brand', 'sb_Brand', 'base', 'Deleted'];
}
