<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $table = 'controls';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'note',
        'created_by',
        'status',
        'type',
        'parent_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Control','parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Control','parent_id');
    }
    public function followers(){
        
        return $this->hasMany(Follow::class);
    }

    public function followedBy(User $user){
        return $this->followers->contains('user_id',$user->id);
    }

    public function industries(){
        return $this->hasMany(Rccontrol::class);
    }

    public function rccontrols(){
        return $this->hasMany(Rccontrol::class,'control_id');
    }
}
