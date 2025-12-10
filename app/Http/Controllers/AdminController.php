<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use App\Models\Member;
use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

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

    public function exportResultsPDF()
    {
        $candidates = Candidate::withCount('votes')
            ->orderByDesc('votes_count')
            ->get();

        $totalVotes = Vote::count();

        $html = view('admin.pdf.result', compact('candidates', 'totalVotes'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'NotoSansKhmer',

            // IMPORTANT FOR KHMER
            'autoScriptToLang' => true,
            'autoLangToFont'   => true,
            'useOTL'           => 0xFF,  // Enable OpenType Layout (required)
            'useKashida'       => 0,     // Disable Arabic stretching
            'tempDir'          => storage_path('mpdf-temp'),
        ]);


        // OLD MPDF FONT METHOD (NO getFontDirs)
        $mpdf->fontdata = $mpdf->fontdata + [
            "NotoSansKhmer" => [
                'R' => public_path("fonts/khmer/NotoSansKhmer-Regular.ttf"),
                'B' => public_path("fonts/khmer/NotoSansKhmer-Bold.ttf"),
            ],
        ];


        $mpdf->WriteHTML($html);

        return $mpdf->Output('voting.pdf', 'D');
    }

    public function ngosList()
    {
        // Get all NGOs (members)
        $ngos = Member::orderBy('full_name', 'ASC')->get();

        return view('admin.ngos-list', compact('ngos'));
    }
}
