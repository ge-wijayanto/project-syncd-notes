<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = "participant";
    protected $fillable = [
        'user_id',
        'project_id'
    ];
    public function project()
    {
        return $this->belongsTo('App\Models\Project','project_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
