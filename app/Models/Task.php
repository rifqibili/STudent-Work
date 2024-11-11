<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory ,  SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'gambar1',
        'gambar2',
        'gambar3',
        'user_id',
        'kategori_id',
        'ketentuan',
        'status_work'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function kerjakanTugas()
    {
        return $this->hasMany(KerjakanTugas::class);
    }

    public function submissions (){
        return $this->hasMany(Submission::class,  'task_id');
    }

    public function isCompleted ()
    {
        return $this->status_work === 'selesai';
    }
}
