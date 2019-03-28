<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function karyawan()
    {
    	return $this->belongsTo('App\AppModel\Karyawan');
    }

    public function faktor()
    {
    	return $this->belongsTo('App\AppModel\Faktor');
    }

    public function aspek()
    {
    	return $this->belongsTo('App\AppModel\Aspek');
    }
    public function nilai()
    {
    	return $this->belongsTo('App\AppModel\Nilai');
    }
}
