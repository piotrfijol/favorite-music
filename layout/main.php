<?php
/*
    $this - View object
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first php server</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Delete later -->
    <link href="/css/app.ad8012b2.css" rel="preload" as="style">
    <link href="/js/app.9ced9596.js" rel="preload" as="script">
    <link href="/js/chunk-vendors.d85e92a9.js" rel="preload" as="script">
    <link href="/css/app.ad8012b2.css" rel="stylesheet">
</head>
<body>
    <?php
        include "partials/navbar.php";
    ?>
    <?php
        $this->renderBody();
    ?>

</body>
</html>