<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';
    
    protected $fillable = ['iduser', 'idcategory', 'name', 'description', 'use', 'price', 'date', 'state', 'photo'];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
    
    public function category() {
        return $this->belongsTo('App\Models\Category', 'idcategory');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
}
