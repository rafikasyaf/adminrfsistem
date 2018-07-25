<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operator;
use App\Transaction;

class Operator extends Model
{
    public $timestamps=false;
    public $primaryKey='nik';
    protected $fillable = [
        'nik','name', 'job','image',
    ];

    public function transaction()
    {
        return $this->belongsTo('Transaction');
    }
	
}
