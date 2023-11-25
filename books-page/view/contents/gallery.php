<form action="index.php?command=2&&action=uploadpic" method="post" enctype="multipart/form-data">

    <input type="file" name="my_image">

    <input type="submit" name="submit" value="Upload">

</form>
<?php
foreach ($imageUrl as $url) {
    echo "<img width=25% height=auto style='margin: 5px'src=images/" . $url['image_url'] . ">";
}
?>