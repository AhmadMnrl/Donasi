<div class="visible-print text-center" id="qr-generator">
    <div>{{$yayasan->nama_lengkap}}</div>
    <div>Phone : {{$yayasan->no_tlp}}</div>
    <div>Email : {{$yayasan->email}}</div>
    <div>address : {{$yayasan->address}}</div>
    {{ QrCode::size(100)->generate("http://web-donasi.ilumni.id/qr-donasi?id=" . $yayasan->id) }}
    <p id="text-generate"></p>
</div>
