<?php  include("partials/menu.php"); ?>

  <div  class="form_box">
    <div class="container">
          <form method="POST" action="http://localhost/mvie/admin/insertmov.php" enctype="multipart/form-data">
                    <input type="text" name="title" id="title" placeholder="Input Movie Title">
                    <input type="text" name="description" id="description" placeholder="Input Movie Description">
                    <input type="text" name="genre" id="genre" placeholder="Input Movie Genre">
                    <input type="number" name="runtime" id="runtime" placeholder="Input Movie Runtime"><br />
                    <input type="number" name="year" id="year" placeholder="Input Release Year"><br />
                    <label for="">Movie Cover:</label>
                    <input type="file" name="image" id="movie2" placeholder="Select Cover"><br />
                    <label for="">Movie Video:</label>
                    <input type="file" name="movie" id="movie1">
                    <input type="submit" name="submit" id="submit" value="Submit">
                    
            </form>
            <span id="upload_message"></span><br />
            <span id="insert_message"></span><br />
    </div>
  </div>
 