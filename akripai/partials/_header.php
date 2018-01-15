<?php include_once 'bootstrap.php'; ?>
<html>
<head>
    <title>AST + Naive Bayes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/navbar.css"/>
    <link rel="stylesheet" href="assets/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

    <script type="text/javascript" src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Scanner</a>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="training.php">Training</a>
            </li>
            <li>
                <a href="classify.php">Classify</a>
            </li>
            <li>
                <a href="settings.php">Automatic Scan Settings</a>
            </li>
        </ul>
    </div>
</nav>