<?php
foreach ($books as $title => $MybookList) {

    echo '        
<form action="index.php?command=9" class="p-5" method="post">
<a href="index.php?command=3" class="btn btn-warning">Back</button></a>
        <div class="form-floating mb-3 mt-3">
            <input type="hidden" class="form-control" placeholder="Enter ISBN" name="ID" value="' . $MybookList["ISBN"] . '" >
            <label for="ID">ISBN</label>
        </div>
        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Enter Title" name="Title" value="' . $MybookList["Title"] . '">
            <label for="Title">Title</label>
        </div>
        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Enter Author" name="Author" value="' . $MybookList["Author"] . '">
            <label for="Author">Author</label>
        </div>
        <label for="exampleFormControlTextarea1" class="form-label">Abstract</label>
        <textarea class="form-control" rows="3" name="Abstract">' . $MybookList["Abstract"] . '</textarea>

        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Enter Description" name="Description" value="' . $MybookList["Description"] . '">
            <label for="Description">Description</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Enter Publisher" name="Publisher" value="' . $MybookList["Publisher"] . '">
            <label for="Publisher">Publisher</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Enter Copyright" name="Copyright" value="' . $MybookList["CopyRightYear"] . '">
            <label for="Copyright">Copyright</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" placeholder="Enter Category" name="Category" value="' . $MybookList["Category"] . '">
            <label for="Category">Category</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <input type="number" class="form-control" placeholder="Enter UnitPrice" name="UnitPrice" value="' . $MybookList["UnitPrice"] . '">
            <label for="UnitPrice">UnitPrice</label>
        </div>

        <button type="submit" class="btn btn-primary" name="updateRecords">Update</button>



    </form>';
}
