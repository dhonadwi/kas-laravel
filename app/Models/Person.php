<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function cluster() {
        return $this->hasOne(Cluster::class,'id','cluster_id');
    }

    public function transaction() 
    {
        return $this->hasMany(Transaction::class, 'person_id','id');
    }
}
