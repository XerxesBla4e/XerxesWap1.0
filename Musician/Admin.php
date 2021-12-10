
<?php include("action.php");  ?>
<?php include ('../login-check.php');?>

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
    <a class="navbar-brand" href="#">XerxesWap Media System</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">content</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">content</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">content</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
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
                <h3 class="text-center mt-2">XerxesWap</h3>
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
              <h3 class="text-center text-info">Add Song</h3>
              <form action="action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="form-group">
                  <input type="text" name="title" class="form-control" value="<?=$title; ?>" placeholder="Enter Song Title">
                </div>
                <div class="form-group">
                  <input type="number" name="price" class="form-control" value="<?=$price; ?>" placeholder="Enter Price">
                </div>
                <div class="form-group">
                <input type="hidden" name="oldsong" value="<?=$songn; ?>">
                  <input type="file" name="song" class="custom-file">
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
                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
                    <?php }?>
                </div>
              </form>
            </div>
            <div class="col-md-8">
                  <?php
                     $query = "SELECT * FROM songs WHERE id Like '$id%'";
                     $stmt = $con->prepare($query);
                     $stmt->execute();
                     $result = $stmt->get_result();
                  ?>
            <h3 class="text-center text-info">Songs Present In The Database</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Downloads</th>
                    <th>Total Revenue</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php while($s = $result -> fetch_assoc()){?>
                <tr>
                    <td><?= $s['id'];?></td>
                    <td><img src="music/<?=$s['songcover']; ?>" alt="" width="25"></td>
                    <td><?= $s['title']; ?></td>
                    <td><?=  $s['price']; ?></td>
                    <td><?= $s['downloads'];?></td>
                    <td><?= $s['Totalrevenue'];?></td>
                    <td>
                        <a href="details.php?details=<?= $s['id']; ?>" class="badge badge-primary p-1">Details</a>
                        <a href="action.php?delete=<?= $s['id']; ?>"class="badge badge-danger p-1"
                         onclick="return confirm('Do you want to delete this record')">Delete</a>
                        <a href="Admin.php?edit=<?= $s['id']; ?>" class="badge badge-success p-1">Edit</a>
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