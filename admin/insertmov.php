<?php include 'includes/autoloader.inc.php'; ?>
<?php include("../config/constants.php");?>

<?php
$xerx = '';
$title = '';
$description = '';
$runtme = '';
$year = '';
$image_name = '';
$movie_name = '';
$success = '';
$succe = '';
$name1 = '';
$name = '';
$genre = '';


if(empty($_POST["title"]))
{
    $xerx .= '<p class="error">Movie Title Required</p>';
}else{
    $genre = $_POST["title"];
}

if(empty($_POST["genre"]))
{
    $xerx .= '<p class="error">Movie Genre Required</p>';
}else{
    $title = $_POST["genre"];
}

if(empty($_POST["description"]))
{
    $xerx .= '<p class="error">Movie Description Required</p>';
}else{
    $description = $_POST["description"];
}

if(empty($_POST["runtime"]))
{
    $xerx .= '<p class="error">Movie Runtime Required</p>';
}else{
    $runtme = $_POST["runtime"];
}

if(empty($_POST["year"]))
{
    $xerx .= '<p class="error">Movie Release Year Required</p>';
}else{
    $year = $_POST["year"];
}

$image = $_FILES['image'];
$movie = $_FILES['movie'];

$image_name = $image['name'];
$movie_name = $movie['name'];

if(empty($image_name))
{
    $xerx .= '<p class="error">Movie Cover Required</p>';
}else{
        $size = $image['size'];
        $source = $image['tmp_name'];
        $ext = explode('.',$image_name);
        $real_extension = strtolower(end($ext));

        $name = "Cover".rand(000,999).".".$real_extension;
        $destination = '../images/covers/'.$name;

        if(file_exists( $destination)){
            $xerx .= '<p class="error">Cover Already Available</p>';
        }else{
            $success = move_uploaded_file($source,$destination);
        }
}

if(empty($movie_name))
{
    $xerx .= '<p class="error">Movie Required</p>';
}else{
    $size1 = $movie['size'];
    $source1 = $movie['tmp_name'];
    $ext1 = explode('.',$movie_name);
    $real_extension1 = strtolower(end($ext1));

    $name1 = $title.".".$real_extension1;
    $destination1 = '../movie/'.$name1;

    if(file_exists( $destination1)){
        $xerx .= '<p class="error">Movie Already Available</p>';
    }else{
        $succe = move_uploaded_file($source1,$destination1);
    }
}

function genIndex(){
    $ind = rand(000,999);
    return $ind;
    }
    
    $id = genIndex();

    if(!empty($xerx)){
        print_r($xerx);
    }

    if($succe == true && $success == true && empty($xerx)){
        $insert = new Userscontroller();
        $insert -> createMovie($id,$name1,$name,$description,$runtme,$year);
        $insert -> createGenre($id,$genre);

    }else{
        die();
    }
   

    ?>