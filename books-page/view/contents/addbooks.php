<form action="index.php?command=5" class="p-5" method="post" class="was-validated">
    <div class="form-floating mb-3 mt-3">

        <input type="text" class="form-control" placeholder="Enter ISBN" name="ID" required>
        <label for="ID">ISBN</label>


    </div>
    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter Title" name="Title">
        <label for="Title">Title</label>
    </div>
    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter Author" name="Author">
        <label for="Author">Author</label>
    </div>
    <label for="exampleFormControlTextarea1" class="form-label">Abstract</label>
    <textarea class="form-control" rows="3" name='Abstract'></textarea>

    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter Description" name="Description">
        <label for="Description">Description</label>
    </div>

    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter Publisher" name="Publisher">
        <label for="Publisher">Publisher</label>
    </div>

    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter Copyright" name="Copyright">
        <label for="Copyright">Copyright</label>
    </div>

    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter Category" name="Category">
        <label for="Category">Category</label>
    </div>

    <div class="form-floating mt-3 mb-3">
        <input type="text" class="form-control" placeholder="Enter UnitPrice" name="UnitPrice">
        <label for="UnitPrice">UnitPrice</label>
    </div>

    <button type="submit" class="btn btn-primary" name="saveRecords">Submit</button>
    <button type="reset" class="btn btn-warning">Reset</button>


</form>