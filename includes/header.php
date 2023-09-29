<?php 
    require_once 'connection.php';

    $q = "SELECT * FROM `studenti`";
    $res = $conn->query($q);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<header class="header-bar mb-3">
      <div class="container d-flex flex-column justify-content-between flex-md-row align-items-center p-3">
        <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">PopArt Studenti Lista</a></h4>
        <div class="flex-row my-3 my-md-0">
          <a class=" btn btn-sm btn-success mr-2" href="#">Home</a>
        </div>
      </div> 
</header>