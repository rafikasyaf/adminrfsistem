<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;
use App\Operator;
use App\Device;

class Transaction extends Model
{
	protected $table='transactions';
    protected $primaryKey='id_lend';
    public $timestamps=false;

    public function operator()
    {
    	return $this->hasMany('Operator', 'foreign_key');
    }

    public function device()
    {
    	return $this->hasMany('Device', 'foreign_key');
    }

	
}
