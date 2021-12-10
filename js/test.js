function song_search(){
    var option = $('input[type="radio"]:checked').val();
    var song = document.getElementById("searcher").value;
    
    var pass_data = {
        'option':option,
        'song' : song,
    }

    $.ajax({
        url:"mvie_search.php",
        type: "POST",
        data: pass_data,
        success : function(data){
            document.getElementById("status").innerHTML = data;
        }
    });
    return false;
}
