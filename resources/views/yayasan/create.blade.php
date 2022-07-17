{{-- Modal Form --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/yayasan/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Yayasan</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">No Telpon</label>
                        <input type="text" name="no_tlp" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea">Address</label>
                        <textarea class="form-control" name="address" id="floatingTextarea"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea">Keterangan</label>
                        <textarea class="form-control" id="floatingTextarea" name="keterangan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Form --}}
