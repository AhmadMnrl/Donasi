<div class="visible-print text-center" id="qr-generator">
    <div><h5>{{$yayasan->nama_lengkap}}</h5></div>
    <div>Phone : {{$yayasan->no_tlp}}</div>
    <div>Email : {{$yayasan->email}}</div>
    <div>address : {{$yayasan->address}}</div>
    <div class="mt-2">{{ QrCode::size(100)->generate("http://web-donasi.ilumni.id/qr-donasi?id=" . $yayasan->id) }}</div>
    <p id="text-generate"></p>
     {{-- <a href="/print-qr-donasi/{{$yayasan->id}}" target="blank" class="btnprn btn btn-primary mb-2" >Cetak</a> --}}
</div>
