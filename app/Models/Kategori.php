<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'id',
        'nama',
        'gambar'
    ];

    public function task(){
        return $this->hasMany(Task::class);
    }
}
