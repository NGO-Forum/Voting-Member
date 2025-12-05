<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'has_voted',
        'login_locked'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
