<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'user_id',
        'task_id',
        'deskripsi',
        'file_tugas',
        'status'
    ];

    public function task (){
        return $this->belongsTo(Task::class,'task_id');
    }

    public function user (){
        return $this->belongsTo(User::class , 'user_id');
    }

    
}
