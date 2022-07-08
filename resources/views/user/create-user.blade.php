{{-- Modal Form --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/user/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea">Email</label>
                        <input class="form-control" type="email" name="email" id="exampleInputEmail1">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Role</label>
                        <select class="form-select" name="role" id="">
                            <option value="administrator">Administrator</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1"
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
