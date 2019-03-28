<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $guarded = ['id_aspek', 'created_at', 'updated_at'];
    protected $primaryKey = 'id_aspek';
    protected $table = 'aspeks';

    public function Faktor()
    {
    	return $this->hasMany('App\AppModel\Faktor');
    }
}
