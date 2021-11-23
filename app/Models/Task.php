<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at'
    ];

    public function saveTask($data) {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}
