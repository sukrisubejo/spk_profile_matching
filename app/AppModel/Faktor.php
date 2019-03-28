<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Faktor extends Model
{
    protected $guarded = ['id_faktor', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_faktor';

    public function Aspek()
    {
    	return $this->belongsTo('App\AppModel\Aspek');
    }
}
