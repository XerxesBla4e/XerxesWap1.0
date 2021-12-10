
<?php
include_once('connection.php');

$id = $_GET['id'];
$query = "SELECT * FROM songs WHERE id='$id'";
$res = mysqli_query($con,$query);
if($res == true){
    if(mysqli_num_rows($res)==1){
        $rows = mysqli_fetch_assoc($res);
        $unitprice = $rows['price'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XerxesWap Pay</title>
    <link rel="stylesheet" href="style/xer3.css">  
</head>
<body>
    <section class="main-content">
        <h1>Payment At Your Convinience</h1>
        <hr>
        <form action="" method="post" id="payForm">
            <label for="">Full Name:</label>
            <input type="text" id="fullName" placeholder="Enter Your Full Name...." required>
            <label for="">Phone Number:</label>
            <input type="number" id="phoneNumber" placeholder="Enter Your Phone Number...." required>
            <label for="">Email:</label>
            <input type="email" id="email" placeholder="Enter Your Full Email...." required>
            <label for="">Amount:</label>
            <input type="number" id="amount" value="<?= $unitprice; ?>">
            <input type="hidden" id="mvieid" value="<?= $id; ?>">
            <input type="submit" value="Continue">
        </form>
    </section>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script src="js/xerxes.js"></script>
</body>
</html>