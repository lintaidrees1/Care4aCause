<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <title>Care4aCause</title>
    <style>
        /* .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 100px;
            width: 100px;
            outline: black;
            background-size: 100%, 100%;
            border-radius: 50%;
            border: 1px solid black;
            background-image: none;
        } */
        /* 
        .carousel-control-next-icon:after {
            content: '>';
            font-size: 55px;
            color: red;
        }

        .carousel-control-prev-icon:after {
            content: '<';
            font-size: 55px;
            color: red;
        } */
    </style>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i style="color: black;" class="fas fa-bars"></i>
        </label>
        <label class="logo"><span style="color: #ce1141;">Care4a</span>Cause </label>
        <ul>
            <li><a class="active" href="index.php"> Home </a></li>
            <li><a href="about.php"> About </a></li>
            <li><a href="contactus.php"> Contact Us </a></li>

            <?php
            if (isset($_SESSION['donorid'])) {
            ?>
                <li><a href="Donor/index.php"> Dashboard </a></li>
            <?php
            } else {
            ?>
                <li><a href="login.php"> Login </a></li>
            <?php
            }
            ?>
        </ul>
    </nav>