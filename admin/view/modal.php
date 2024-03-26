<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="_id" id="id">
          <label for="name">Name</label>
          <input type="text" name="_name" id="name" class="form-control">
          <label for="name">Image</label>
          <input type="file" name="_file" id="file" class="form-control">
          <input type="text" name="old_profile" id="old_profile">
          <label for="name">Price</label>
          <input type="text" name="_price" id="price" class="form-control">
          <label for="name">Category</label>
          <select name="_category" id="category" class="form-select">
            <option value="Mobile Phone">Mobile Phone</option>
            <option value="Laptop">Laptop</option>
            <option value="Desktop">Desktop</option>
          </select>
          <label for="name">Brand</label>
          <select name="_brand" id="brand" class="form-select">
            <option value="Samsung">Samsung</option>
            <option value="Apple">Apple</option>
            <option value="Asus">Asus</option>
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button id="accept_add" name="accept_add" type="submit" class="btn btn-success">Confirm Add</button>
            <button id="accept_edit" name="accept_edit" type="submit" class="btn btn-warning">Edit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>