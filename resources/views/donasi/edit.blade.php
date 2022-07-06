{{-- Modal Form --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/donasi/update/{{$value->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Donatur</label>
                        <select class="form-select" name="id_donatur" id="">
                            <option value="" disabled selected>Pilih Donatur</option>
                            @foreach($donatur as $value)
                            <option value="{{$value->id}}">{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Donasi</label>
                        <select class="form-select" name="jenis_donasi" id="">
                            <option value="{{$value->jenis_donasi}}">{{$value->jenis_donasi}}</option>
                            <option value="barang">Barang</option>
                            <option value="uang">Uang</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" value="{{$value->jumlah}}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Pengiriman</label>
                        <select class="form-select" name="pengiriman" id="">
                            <option value="" disabled selected>Pilih Jenis Pengiriman</option>
                            <option value="diambil">Diambil</option>
                            <option value="Diantar">Diantar</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" value="{{$value->provinsi}}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kelurahan</label>
                        <input type="text" name="kelurahan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Form --}}
