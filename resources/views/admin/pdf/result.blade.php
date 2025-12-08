<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: "NotoSansKhmer", sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }

        h2 {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        p.subtitle {
            text-align: center;
            font-size: 15px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #444;
            padding: 8px;
            font-size: 14px;
        }

        th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        td:nth-child(1),
        td:nth-child(4),
        td:nth-child(5) {
            text-align: center;
            width: 50px;
        }
    </style>
</head>

<body>

<h2>លទ្ធផលបោះឆ្នោត</h2>

<p class="subtitle">
    សរុបបោះឆ្នោត ៖ <strong>{{ $totalVotes }}</strong> សន្លឹក
</p>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>ឈ្មោះបេក្ខជន</th>
            <th>ព័ត៌មានបន្ថែម</th>
            <th>សន្លឹកឆ្នោត</th>
            <th>%</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($candidates as $index => $candidate)
            @php
                $percent = $totalVotes > 0 
                    ? round(($candidate->votes_count / $totalVotes) * 100, 2) 
                    : 0;
            @endphp

            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $candidate->name }}</td>
                <td>{{ $candidate->meta }}</td>
                <td>{{ $candidate->votes_count }}</td>
                <td>{{ $percent }}%</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
