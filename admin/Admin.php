
<?php include("action.php");?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">XerxesWap</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="main">Movies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        </ul>
    </div>

    <form class="form-inline" action="/action_page.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </nav>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center mt-2">XerxesWap Admin Panel</h3>
                <hr>
                <?php if(isset($_SESSION['response'])){?>
                <div class="alert alert-<?= $_SESSION['res_type']; ?>
                      alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$_SESSION['response']; ?> 
                </div>
                <?php } unset($_SESSION['response']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <h3 class="text-center text-info">Add Admin Record</h3>
              <form action="action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" value="<?= $name; ?>" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" value="<?= $email; ?>" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <input type="tel" name="phone" class="form-control" value="<?= $phone; ?>" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                 <input type="hidden" name="oldimage" value="<?=$photo; ?>">
                  <input type="file" name="image" class="custom-file">
                  <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
                </div>
                <div class="form-group">
                    <?php  if($update==true){?>
                  <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
                   <?php }else {?>
                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Admin Record">
                    <?php }?>
                </div>
              </form>
            </div>
            <div class="col-md-8">
                  <?php
                     $retrieve = new Usersview();
                     $stmt = $retrieve -> retrieveAdmin();
                  ?>
            <h3 class="text-center text-info">Records Present In The Database</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php foreach($stmt as $s){?>
                <tr>
                    <td><?= $s['id'];?></td>
                    <td><img src="<?=$s['photo']; ?>" alt="" width="25"></td>
                    <td><?= $s['name']; ?></td>
                    <td><?=  $s['email']; ?></td>
                    <td><?= $s['phone'];?></td>
                    <td>
                        <a href="details.php?details=<?= $s['id']; ?>" class="badge badge-primary p-2">Details</a>
                        <a href="action.php?delete=<?= $s['id']; ?>"class="badge badge-danger p-2"
                         onclick="return confirm('Do you want to delete this record')">Delete</a>
                        <a href="Admin.php?edit=<?= $s['id']; ?>" class="badge badge-success p-2">Edit</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>