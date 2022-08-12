{{-- Modal Form --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/donasi/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Donatur</label>
                        <select class="form-select" name="id_donatur" id="" required>
                            <option value="" disabled selected>Pilih Donatur</option>
                            @foreach ($donatur as $value)
                                <option value="{{ $value->id }}">{{ $value->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Donasi</label>
                        <select class="form-select" name="jenis_donasi" id="" required>
                            <option value="" disabled selected>Pilih Jenis Donasi</option>
                            <option value="barang">Barang</option>
                            <option value="uang">Uang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Pengiriman</label>
                        <select class="form-select" name="pengiriman" id="" required>
                            <option value="" disabled selected>Pilih Jenis Pengiriman</option>
                            <option value="diambil">Diambil</option>
                            <option value="Diantar">Diantar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kelurahan</label>
                        <input type="text" name="kelurahan" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full Address</label>
                        <textarea class="form-control" name="full_address" id="floatingTextarea" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select class="form-select" name="status" id="">
                            <option value="Selesai">Selesai</option>
                            <option value="Belum Selesai">Belum Selesai</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" id="exampleInputEmail1"
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
