<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;

class AdminController extends Controller
{
    public function results()
    {
        $candidates = Candidate::withCount('votes')
            ->orderByDesc('votes_count')
            ->get();

        $totalVotes = Vote::count();

        return view('admin.results', compact('candidates', 'totalVotes'));
    }
}
