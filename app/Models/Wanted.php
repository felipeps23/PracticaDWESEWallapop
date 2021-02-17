<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wanted extends Model
{
    use HasFactory;
    
    protected $table = 'wanteds';
    
    protected $fillable = ['iduser', 'idproduct'];
    
    public function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
    
    public function category() {
        return $this->belongsTo('App\Models\Category', 'idcategory');
        // return $this->belongsTo('App\Models\Enterprise', 'identerprise', 'id');
    }
}
