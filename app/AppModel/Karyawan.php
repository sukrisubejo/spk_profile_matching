<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $guarded = ['id_karyawan', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_karyawan';
    
    public $incrementing = false;
    
    public function hasils()
    {
    	return $this->hasMany('App\AppModel\Hasil');
    }
}
