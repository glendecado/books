<?php
echo "<center>";
foreach ($books as $title => $MybookList) {
    echo ' <div class=" card col-12 text-center p-5 w-50">
    <div class="card-header">
        <h3 class="card-title card-title-center">' . $MybookList["Title"] . '</h3>
        <div class="card p-5"><h6>Author</h6><br>' . $MybookList["Author"] . '</div>      
        <div class="card p-5"><h6>Abstract</h6><br>' . $MybookList["Abstract"] . '</div>
        <div class="card p-5"><h6>Description</h6><br>' . $MybookList["Description"] . '</div>
        <div class="card p-5"><h6>Publisher</h6><br>' . $MybookList["Publisher"] . '</div>
        <div class="card p-5"><h6>CopyRightYear</h6><br>' . $MybookList["CopyRightYear"] . '</div>
        <div class="card p-5"><h6>Category</h6><br>' . $MybookList["Category"] . '</div>
        <div class="card p-5"><h6>UnitPrice</h6><br>' . $MybookList["UnitPrice"] . '</div>
    </div>
</div>
<a href=index.php?command=3 class="text-light text-decoration-none m-5"><button type="button" class="btn btn-primary mt-5">back</button></a>';
    echo "</center>";
}
