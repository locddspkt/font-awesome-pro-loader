<?php
include_once __DIR__ . '/src/FaLoader.php';

FaLoader\Icons::init(__DIR__ . '/test/fa-pro-icons');

$appleProIcon = FaLoader\Icons::Load('far_fa-apple-alt.svg');
$copyProIcon = FaLoader\Icons::Load('fal_fa-copy.svg');

?>
<html>
<head>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- END bootstrap css -->


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- END bootstrap js -->

    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="w-100 text-center">
        <a class="navbar-brand">Fontawesome Pro demo</a>
    </div>
    <button class="btn btn-success fa-icon-h-16-wrapper"><i class="fab fa-apple"></i> Apple Free (fab fa-apple)</button>
    <button class="btn btn-success fa-icon-h-16-wrapper"><?= $appleProIcon ?> Apple Pro (far fa-apple-alt)</button>
    <div class="w-100" style="height: 10px"></div>
    <button class="btn btn-success fa-icon-h-16-wrapper"><i class="fas fa-copy"></i> Copy (fas fa-copy)</button>
    <button class="btn btn-success fa-icon-h-16-wrapper"><?= $copyProIcon ?> Copy pro (fal fa-copy)</button>
</div>
<style>

    /*-- prevent the css is loaded later --*/
    .svg-inline--fa {
        vertical-align: -.125em;
    }

    /*-- improve the performance --*/
    .fa-icon-h-16-wrapper svg.svg-inline--fa{
        height: 16px !important;
    }
</style>
</body>
</html>
