function insert_move(){
    var xe = new XMLHttpRequest();

    var url = "insertmov.php";
    var m1 = document.getElementById("title").value;
    var m2 = document.getElementById("movie2").value;
    var data = "movie="+m1+"&image="+m2;
    xe.open("POST", url, true);

    xe.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xe.onreadystatechange = function(){
        if (xe.readyState == 4 && xe.status == 200){
            var feedback = xe.responseText;
            document.getElementById("insert_message").innerHTML = feedback;
        }
    }

    xe.send(data);
    document.getElementById("insert_message").innerHTML = "processing............";

   
}
    
