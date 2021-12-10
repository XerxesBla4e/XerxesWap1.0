<?php  include("partials/menu.php"); ?>


    <div class="mvie_page">
    <div class="search1">
        <input type="text" name="search_text" id="search_text" placeholder="Search By Title">
    </div><br />
     <div  class="container">
        <a href="<?php echo HOMEURL;?>admin/upload.php" class="btn-primary">ADD</a>
         <table id="movt" class="tb-width">
          <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>IMAGE</th>
                <th>DESCRIPTION</th>
                <th>RUNTIME</th>
                <th>YEAR</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
           </tbody>
         </table>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $.ajax({
    url: 'retrieve/ajaxx.php',
    type: 'get', 
    dataType: 'json',
    success: function(response){
      var len = response.length;
      for(var i=0; i<len; i++){
         var id = response[i].id;
         var title = response[i].title;
         var image_url = response[i].image_url;
         var description = response[i].description;
         var runtme = response[i].runtme;
         var year = response[i].year;

         var tr_str = "<tr>"+
           "<td align='center'>"+(i+1)+"</td>"+
           "<td align='center'>"+title+"</td>"+
           "<td align='center'>"+image_url+"</td>"+
           "<td align='center'>"+description+"</td>"+
           "<td align='center'>"+runtme+"</td>"+
           "<td align='center'>"+year+"</td>"+
           "<td align='center'>"+"<a class='btn-secondary' href='update.php?id="+id+"'>UPDATE</a>"+
           "<td align='center'>"+"<a class='btn-danger' href='delete.php?id="+id+" '>DELETE</a>"+"</td>"
           +"</td>"
          
          +"</tr>";

         $('#movt tbody').append(tr_str);
      }
    }
  });
});
</script>

<script>
$(document).ready(function(){
  $('#search_text').keypress(function(){
    $.ajax({
      type:'POST',
      url:'retrieve/fetch.php',
      data:{
        name:$("#search_text").val(),
      },
       success:function(data){
         $("#movt tbody").html(data);
       }
    });
  });  
});
</script>   
<?php  include("partials/footer.php"); ?>