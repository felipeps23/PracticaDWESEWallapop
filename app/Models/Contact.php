<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    protected $table = 'contacts';

    protected $fillable = ['iduser1', 'iduser2', 'idproduct', 'contacttext'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser1');
        return $this->belongsTo('App\Models\User', 'iduser2');

    }

    public function producto() {
        return $this->belongsTo('App\Models\Product', 'idproduct');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }

}