<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Gap extends Model
{
    protected $guarded = ['selisih', 'created_at', 'updated_at'];
    protected $primaryKey = 'selisih';

    public function hasils()
    {
    	return $this->hasMany('App\AppModel\Hasil');
    }
}
