function toggle(){
    var x = document.getElementById("password");

    boolval = (x.type === "password");

    if(boolval){
        document.getElementById("password").setAttribute("type","text");
    }else{
        document.getElementById("password").setAttribute("type","password");
    }}