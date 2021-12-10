
<?php include 'includes/autoloader.inc.php'; ?>
<?php include("../config/constants.php");?>

<?php 
include ('check-login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/adminstyle.css">
    <link rel="stylesheet" href="../style/form1.css">
    <link rel="stylesheet" href="../style/movie.css">
    <title>Document</title>
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
</head>
<body>  

<nav class="nav_bar nav_bg">
<ul>
        <li><a href="<?php echo HOMEURL;?>admin/dashboard">Home</a></li>
        <li><a href="<?php echo HOMEURL;?>admin/main">Movies</a></li>
        <li><a href="<?php echo HOMEURL;?>admin/Admin.php">Admin</a></li>
        <li><a href="<?php echo HOMEURL;?>admin/stats/index2.php">Analytics</a></li>
        <li><a href="<?php echo HOMEURL;?>admin/report/report.php">Report</a></li>
        <li><a href="<?php echo HOMEURL;?>admin/logout">Logout</a></li>
    </ul>
</nav>

