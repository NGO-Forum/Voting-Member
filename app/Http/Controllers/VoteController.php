<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    // Login page
    public function loginForm()
    {
        $ngos = Member::select('full_name', 'short_name')->orderBy('full_name')->get();
        return view('login', compact('ngos'));
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'login_input' => 'required'
        ]);

        $input = trim($request->login_input);

        // Find by full name, short name, or member ID
        $member = Member::where('full_name', 'LIKE', $input)
            ->orWhere('short_name', 'LIKE', $input)
            ->first();

        // Not found → reject
        if (!$member) {
            return back()->with('error', 'ឈ្មោះ NGO ឬ Short Name មិនត្រឹមត្រូវទេ!');
        }

        // Already logged in → block
        if ($member->login_locked) {
            return back()->with('error', 'NGO នេះបានចូលប្រើរួចម្តងហើយ!');
        }

        // Lock login immediately
        $member->update(['login_locked' => true]);

        // Save to session
        session(['member_id' => $member->short_name]);

        return redirect('/vote');
    }




    // Show voting form
    public function voteForm()
    {
        $member = Member::where('short_name', session('member_id'))->firstOrFail();

        if ($member->has_voted) {
            return view('already_voted');
        }

        $candidates = Candidate::all();

        return view('vote', compact('candidates', 'member'));
    }

    // Handle vote submission
    public function submitVote(Request $request)
    {
        $request->validate([
            'candidates' => 'required|array|max:5',
            'candidates.*' => 'exists:candidates,id',
        ]);

         // Get member by short_name (fix)
        $member = Member::where('short_name', session('member_id'))->firstOrFail();

        if ($member->has_voted) {
            return redirect()->route('vote.form')->with('error', 'You have already voted.');
        }

        foreach ($request->candidates as $candidateId) {
            Vote::create([
                'member_id' => $member->id,
                'candidate_id' => $candidateId,
            ]);
        }

        $member->has_voted = true;
        $member->save();

        return redirect()->route('thankyou');
    }

    // Thank you page
    public function thankYou()
    {
        return view('thank_you');
    }

    // Optional: logout
    public function logout()
    {
        session()->forget('member_id');
        return redirect('/');
    }
}
