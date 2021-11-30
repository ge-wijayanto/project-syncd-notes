<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    use LogsActivity;
    
    protected $table = 'activity_log';

    public function user()
    {
        return $this->belongsTo('App\Models\User','causer_id','id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project','subject_id','id');
    }
}
