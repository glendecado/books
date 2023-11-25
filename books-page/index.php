<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decado, Glen Brian</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>




</head>

<body>
    <?php
    include_once('./view/header.php'); // Include the header

    include_once('./controller/controller.php');
    include_once('./model/model.php');

    $page = new controller();


    $page->getPage();

    include_once('./view/footer.php'); // Include the footer



    ?>
    <script></script>
</body>

</html>