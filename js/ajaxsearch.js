function mov_search(){
            
    var xe = new XMLHttpRequest();

    var url = "movie_search.php";

   var m1 =document.getElementById("searcher").value;

    var data = "movie="+m1;
    xe.open("POST", url, true);

    xe.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xe.onreadystatechange = function(){
        if (xe.readyState == 4 && xe.status == 200){
            var feedback = xe.responseText;
            document.getElementById("status").innerHTML = feedback;
        }
    }

    xe.send(data);
    document.getElementById("status").innerHTML = "processing............";
}