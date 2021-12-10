
let links ="";
let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
let letterarray = letters.split("");

for(let x=0; x<26; x++){
    let first_letter = letterarray.shift();
    links+='<button class="responsive" onclick="moviesearcher(\''+first_letter+'\');">'+first_letter+'</button>';
}

function moviesearcher(let){
    window.location = "http://localhost/mvie/moviefobia.php?letter="+let;
}

