<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Device;

class Device extends Model
{
    // protected $table='devices';
    public $primaryKey='id_rf';
    protected $fillable = [
        'id_rf','brand', 'model','property','station','status',
    ];
    public $timestamps=false;
    
    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class, 'id_rf');
    // }

    public function transaction()
    {
        return $this->belongsTo('Transaction');
    }
	
}
