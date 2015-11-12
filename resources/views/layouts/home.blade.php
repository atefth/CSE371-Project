<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>

<!DOCTYPE html>
<html lang="en" ng-app="advising">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset=utf-8>
    <title>[[ title ]]</title>

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="vendor/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap Font -->
    <link rel="font" href="vendor/bootstrap/dist/fonts/glyphicons-halflings-regular.ttf">

    <!-- Angular UI Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/angular-bootstrap/ui-bootstrap-csp.css">

    <!-- Paper Theme CSS -->
    <link href="assets/css/theme.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link href="assets/css/app.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="flash-container" flash-message="3000"></div>
    <div ui-view></div>

    <!-- jQuery -->
    <script src="vendor/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Angular JS -->
    <script src="vendor/angular/angular.js"></script>

    <!-- Angular UI Bootstrap -->
    <script src="vendor/angular-bootstrap/ui-bootstrap.min.js"></script>
    <script src="vendor/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>

    <!-- Angular UI Router -->
    <script src="vendor/angular-ui-router/release/angular-ui-router.min.js"></script>

    <!-- Angular Flash -->
    <script src="vendor/angular-flash-alert/dist/angular-flash.min.js"></script>

    <!-- App JS -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/routes.js"></script>

    <!-- Controllers -->
    <script src="assets/js/controllers/home.js"></script>
    <script src="assets/js/controllers/user.js"></script>
    <script src="assets/js/controllers/course.js"></script>
    <script src="assets/js/controllers/semester.js"></script>
    <script src="assets/js/controllers/interval.js"></script>
    <script src="assets/js/controllers/room.js"></script>
    <script src="assets/js/controllers/schedule.js"></script>

    <!-- Services -->
    <script src="assets/js/services/auth.js"></script>
    <script src="assets/js/services/user.js"></script>
    <script src="assets/js/services/course.js"></script>
    <script src="assets/js/services/semester.js"></script>
    <script src="assets/js/services/grade.js"></script>
    <script src="assets/js/services/interval.js"></script>
    <script src="assets/js/services/schedule.js"></script>
    <script src="assets/js/services/room.js"></script>

    <!-- Directives -->
    <script src="assets/js/directives/navigation.js"></script>
    <script src="assets/js/directives/studentSnippet.js"></script>
    <script src="assets/js/directives/facultySnippet.js"></script>
    <script src="assets/js/directives/courseSnippet.js"></script>
    <script src="assets/js/directives/courseSnippetSmall.js"></script>
    <script src="assets/js/directives/semesterSnippet.js"></script>
    <script src="assets/js/directives/roomSnippet.js"></script>
    <script src="assets/js/directives/intervalSnippet.js"></script>
    <script src="assets/js/directives/scheduleSnippet.js"></script>

    <!-- CSRF TOKEN -->
    <script>
      angular.module("advising").constant("CSRF_TOKEN", '{{ $encrypted_token }}');
  </script>
</body>
</html>