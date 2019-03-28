<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_faktor', 'id_karyawan'];

    public function Aspek()
    {
    	return $this->belongsTo('App\AppModel\Aspek');
    }
    public function Faktor()
    {
    	return $this->belongsTo('App\AppModel\SubAspek');
    }
    public function Karyawan()
    {
    	return $this->belongsTo('App\AppModel\Karyawan');
    }
    public function Hasils()
    {
    	return $this->hasMany('App\AppModel\Hasil');
    }
}
