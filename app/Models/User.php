<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto',
        'keahlian',
        'linkedin',
        'status'
    ];

    public function admin (){
        return $this->role ==='admin';
    }

    public function penyedia()
    {
        return $this->role === 'penyedia';
    }
    
    public function pengerja()
    {
        return $this->role === 'pengerja';
    }

    public function task(){
        return $this->hasMany(Task::class);
    }

    public function kerjakanTugas()
    {
        return $this->hasMany(KerjakanTugas::class);
    }

    public function submission (){
        return $this->hasMany(Submission::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
