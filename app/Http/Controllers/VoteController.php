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
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'member_id' => 'required'
        ]);

        // Check if member already exists
        $member = Member::where('member_id', $request->member_id)->first();

        // If exists and login_locked = true → BLOCK login
        if ($member && $member->login_locked) {
            return back()->with('error', 'លេខ​ សម្គាល់ ( Member ID ) នេះបានចូលប្រើរួចម្តងហើយ។ មិនអាចចូលម្ដងទៀតបានទេ។');
        }

        // If member not exist → create & lock immediately
        if (!$member) {
            $member = Member::create([
                'member_id' => $request->member_id,
                'login_locked' => true
            ]);
        } else {
            // If exists and not locked → lock it now
            $member->update([
                'login_locked' => true
            ]);
        }

        // Save the active login session
        session(['member_id' => $member->id]);

        return redirect('/vote');
    }



    // Show voting form
    public function voteForm()
    {
        $member = Member::findOrFail(session('member_id'));

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
            'candidates' => 'required|array|max:3',
            'candidates.*' => 'exists:candidates,id',
        ]);

        $member = Member::findOrFail(session('member_id'));

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
