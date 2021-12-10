<?php include_once('partials/header.php'); ?>

<!--search section-->
<div id="search" class="search">
   <div class="container">
    <!--<form action="movie_search.php" method="post">-->
        <input type="search" name="search" id="searcher" placeholder="Input song to search......"><br /><br />
        <input type="radio" name="search_by" id="search_by" value="Director">Director
        <input type="radio" name="search_by" id="search_by" value="Genre">Genre
        <input type="radio" name="search_by" id="search_by" value="Title">Title<br /><br />
       <input style="color:black; font-weight:bold; font-size:1rem;" type="submit" class="btn" value="Search" onClick="javascript:song_search();">
       <br />
       <div id="status"></div>
   <!--</form>--> 
   </div>
</div>
<!--end search section-->

<?php  include_once('partials/footer.php'); ?>