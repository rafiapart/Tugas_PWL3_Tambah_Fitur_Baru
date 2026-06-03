<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Buku</title>

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #2c2c2c;
            margin: 40px;
            font-size: 13px;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #1a1a2e;
            letter-spacing: 1px;
        }

        .header p {
            margin-top: 6px;
            color: #555;
            font-size: 13px;
        }

        .line {
            width: 100%;
            border: none;
            border-top: 3px solid #1a1a2e;
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #1a1a2e;
            color: #fff;
        }

        th {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
            font-size: 13px;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
            vertical-align: middle;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tbody tr:hover {
            background-color: #eaf0fb;
        }

        .text-center {
            text-align: center;
        }

        .cover-img {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 2px;
        }

        .empty-image {
            color: #aaa;
            font-style: italic;
            font-size: 12px;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            color: #888;
            font-size: 11px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        @media print {
            body { margin: 15px; }
            .footer {
                position: fixed;
                bottom: 0;
                right: 0;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>📚 Laporan Data Buku</h1>
        <p>Rekap Data Buku Perpustakaan &mdash; Tahun 2026</p>
        <div class="line"></div>
    </div>

    <table id="table-data">
        <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="25%">JUDUL</th>
                <th width="20%">PENULIS</th>
                <th width="10%">TAHUN</th>
                <th width="20%">PENERBIT</th>
                <th width="20%">COVER</th>
            </tr>
        </thead>

        <tbody>
            @php $no = 1; @endphp

            @foreach ($books as $book)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td class="text-center">{{ $book->year ?? '-' }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td class="text-center">
                        @if ($book->cover !== null)
                            <img
                                src="{{ public_path('storage/cover_buku/' . $book->cover) }}"
                                width="75"
                                class="cover-img"
                            />
                        @else
                            <span class="empty-image">Tidak tersedia</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ date('d F Y, H:i') }} WIB
    </div>

</body>

</html>