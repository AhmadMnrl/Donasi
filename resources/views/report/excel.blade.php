<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Donatur</th>
            <th>Jenis Donasi</th>
            <th>Jumlah</th>
            <th>Pengiriman</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Full Address</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($donasi as $no => $value)
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $value->donatur->nama ?? ($value->name ?? '') }}</td>
                <td>{{ $value->jenis_donasi }}</td>
                <td>{{ $value->jumlah }}</td>
                <td>{{ $value->pengiriman }}</td>
                <td>{{ $value->provinsi }}</td>
                <td>{{ $value->kota }}</td>
                <td>{{ $value->kecamatan }}</td>
                <td>{{ $value->kelurahan }}</td>
                <td>{{ $value->full_address }}</td>
                <td>{{ $value->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
