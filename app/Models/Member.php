<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'has_voted',
        'login_locked'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
