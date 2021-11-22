<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $hidden = [
        'id'
    ];
    protected $fillable = [
        'name',
        'code',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }
}
