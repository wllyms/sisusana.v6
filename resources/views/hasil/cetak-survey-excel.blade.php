<table>
    <thead>
        <tr>
            <th>No. Responden</th>
            <th>Layanan</th>
            @foreach ($pertanyaan as $no => $data)
                <th>U{{ $no+1 }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($survey as $no => $data)
        <tr>
            <td>{{ $no + 1 }}</td>
            <td>{{ $data->jlayanan }}</td>
            @foreach ($data->jawaban as $jawab)
                <td>{{ $jawab->jawaban }}</td>
            @endforeach
        </tr>
        @endforeach

        <tr>
            <td colspan='2'>Nilai/Unsur</td>
            @foreach ($pertanyaan as $data)
                <td>{{ $totalNilaiPerPertanyaan[$data->id] ?? 0 }}</td>
            @endforeach
        </tr>

        <tr>
            <td colspan='2'>NRR/Unsur</td>
            @foreach ($pertanyaan as $data)
                <td>{{ number_format($NRRPerPertanyaan[$data->id] ?? 0, 3) }}</td>
            @endforeach
        </tr>

        <tr>
            <td colspan='2'>NRR Tertimbang/Unsur</td>
            @foreach ($pertanyaan as $data)
                <td>{{ number_format($NRRTertimbangPerPertanyaan[$data->id] ?? 0, 3) }}</td>
            @endforeach
            <td>{{ number_format($totalNRRTertimbang, 3) }}</td>
        </tr>

        <tr>
            <td colspan='11'>IKM Unit Pelayanan</td>
            <td>{{ number_format(array_sum($IKMPerPertanyaan), 1) }}</td>
        </tr>
    </tbody>
</table>
