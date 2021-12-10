<?php include_once('partials/header.php'); ?>

<!--search section-->
<div id="search" class="search">
   <div class="container">
    <!--<form action="movie_search.php" method="post">-->
        <input type="search" name="search" id="searcher" placeholder="Input song to search......"><br /><br />
       <input style="color:black; font-weight:bold; font-size:1rem;" type="submit" class="btn" value="Search" onClick="javascript:mov_search();">
       <br />
       <div id="status"></div>
   <!--</form>--> 
   </div>
</div>
<!--end search section-->

<?php  include_once('partials/footer.php'); ?>