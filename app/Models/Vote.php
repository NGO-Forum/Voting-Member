<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'candidate_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
