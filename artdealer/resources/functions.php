<?php  

function escape_string($string){
    
    global $connection;
    
    return mysqli_real_escape_string($connection, $string);
    
    
}

function query($sql){
    
    global $connection;
    
    return mysqli_query($connection, $sql);
}

function redirect($location) {
  
 header("Location: $location ");     
    
}

function log_in() {
    
    if(isset($_POST['submit'])){
        
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        
        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
        
        if(mysqli_num_rows($query) == 0){
            
            echo "wrong username or passowrd";
} else {
            
            $_SESSION['username'] = $username;
             redirect("admin");
            echo "HI YOU LOGGED IN " . $username;
        }
    }
    
    
}

function testquery() {
    
    $query = query("SELECT * FROM users");
    
    while($row=  mysqli_fetch_array($query)){
        
$stuff = <<<DELIMETER

<h1> my username</h1>
<p>{$row['username']}</p>

<h2>my password</h2>
<p>{$row['password']}</p>

DELIMETER;
  
        echo $stuff;
        
    }
    
    
}

function add_user() {
    
    if(isset($_POST['publish'])){
        
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        $firstname = escape_string($_POST['firstname']);
        $lastname = escape_string($_POST['lastname']);
        $street = escape_string($_POST['street_address']);
        $city = escape_string($_POST['city']);
        $state = escape_string($_POST['state']);
        $zipcode = escape_string($_POST['zipcode']);
        $type = escape_string($_POST['type']);
        
    $query = query("INSERT INTO users(username, password, firstname, lastname, street_address, city, state, zipcode, type) VALUES('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$street}', '{$city}', '{$state}', '{$zipcode}','{$type}')");
        
        redirect("index.php");
        
    }
    
    
}

 
function get_painting(){
        
$query = query("SELECT * FROM users WHERE user_number = " . escape_string($_GET['id']) . " ");

while($row = mysqli_fetch_array($query)) {

$username = $row['username'];
    
}
    
$query = query("SELECT * FROM paintings WHERE artist_username = '{$username}' ");
while($row = mysqli_fetch_array($query)){
    
$painting_info = <<<DELIMETER

<div class="row">
<div class="col-md-7">
<a href="#">
<img class="img-responsive" src="{$row['painting_image']}" alt="image of {$row['painting_title']}" height="200px">
</a>
</div>
<div class="col-md-5">
<h3>{$row['painting_title']}</h3>
<h4>{$row['category']}, {$row['medium']}, {$row['size']}</h4>
<p>{$row['description']}</p>
<a class="btn btn-primary" href="#">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
</div>


DELIMETER;

echo $painting_info;
}}



function get_artist(){

$query = query("SELECT * FROM users WHERE user_number = " . escape_string($_GET['id']) . " ");

while($row = mysqli_fetch_array($query)){

$artist = <<<DELIMETER
<!-- Heading Row -->
<div class="container col-lg-11">
<div class="row">
<div class="col-md-6">
<h1>{$row['firstname']}{$row['lastname']}</h1>
<h4>{$row['username']}</h4>
<h2>{$row['city']}, {$row['state']}</h2>
<p>{$row['description']}</p>
</div> 

<!-- /.col-md-8 -->
<div class="col-md-6">

<img class="img-thumbnail img-rounded img-circle" src="{$row['profile_pic']}" alt="profile picture of the artist" width="150">


</div>
DELIMETER;
}
echo $artist;   

}

/* function show_promoter_thumbnails(){
    
    
    
    
     <!-- Projects Row -->
        <div class="row">
            <div class="col-md-2 portfolio-item">
                <a href="http://localhost/artdealer/public/promoter.php?id={$row['user_number']}">
                    <img class="img-responsive img-circle" src="{$row['profile-pic']}" alt="profile pic of art promoter">
                    <h4>{$row['username']}</h4>
                </a>
            </div>
            <div class="col-md-2 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                </a>
            </div>
       
        </div>
        <!-- /.row -->
    
    
    
} */


?>