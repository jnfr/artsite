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

 
function get_paintings_artist_page(){
        
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
    echo $artist; 
}
  

}

                        
function show_arts(){

$query = query("SELECT * FROM paintings ORDER BY rand() LIMIT 20");

$x = 1;

while($row = mysqli_fetch_array($query)){

$display = <<<DELIMETER

<div class="col-md-3 portfolio-item">
<a href="painting.php?id={$row['painting_number']}">
<img class="img-responsive" src="{$row['painting_image']}" alt="">
</a>
</div>

DELIMETER;

echo $display;
if($x % 4 === 0) echo "</div><div class='row'>";
$x++;

}}

                
function add_artist_info(){

$query = query("SELECT * FROM paintings WHERE painting_number = " . escape_string($_GET['id']) . " ");


while($row= mysqli_fetch_array($query)){
 $artist_name = $row['artist_username']; 
    
 $newquery = query("SELECT * FROM users WHERE username = '{$artist_name}'");
 while($row = mysqli_fetch_array($newquery)){

$shownow = <<<DELIMETER

<div class="col-md-7">
<a href="#">
<h4>Artist:{$row['username']}</h4>
<img class="img-responsive" src="{$row['profile_pic']}" alt="image of {$row['username']}" width=50px>
</a>
</div>

DELIMETER;
        
    }
    
echo $shownow;

}}

function painting_page(){
    
$query = query("SELECT * FROM paintings WHERE painting_number = " . escape_string($_GET['id']) . " ");
    
while($row = mysqli_fetch_array($query)){
    
$painting = <<<DELIMETER
  <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-6">
                <img class="img-responsive" src="{$row['painting_image']}" alt="image of {$row['painting_title']}">
            </div>

            <div class="col-md-6">
                <h3>{$row['painting_title']}</h3>
                <p>{$row['description']}</p>
                <h3>Details</h3>
                <ul>
                    <li>{$row['medium']}</li>
                    <li>{$row['category']}</li>
                    <li>{$row['size']}</li>
                    <li>{$row['date_added']}</li>
                </ul>
            </div>

        </div>
        <!-- /.row -->




DELIMETER;
   
echo $painting;
    
}}

function get_promoted_paintings_for_admin(){

$username = $_SESSION['username'];
                       
$query = query("SELECT * FROM promotions WHERE promoter_username = '{$username}' ");

while($row = mysqli_fetch_array($query)){

$promotions = <<<DELIMETER

<a href="http://localhost/artdealer/public/painting.php?id={$row['art_number']}"><li>{$row['art_number']}</li></a>

DELIMETER;

echo $promotions;  
}   
}



function get_promoted_paintings_for_display(){
    
$query = query("SELECT * FROM users WHERE user_number = " . escape_string($_GET['id']) . " "); 
    
while($row = mysqli_fetch_array($query)) {

$username = $row['username'];
    
$b_query = query("SELECT * FROM promotions WHERE promoter_username = '{$username}' ");
    
 while($row = mysqli_fetch_array($b_query)){
    
    $art_number = $row['art_number'];
    
    $c_query = query("SELECT * FROM paintings WHERE painting_number = '{$art_number}' ");
    
    while($row = mysqli_fetch_array($c_query)){
        
$show_choices = <<<DELIMETER

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
echo $show_choices;
    }
   
}
   
}}

function see_random_artist(){
    
$type = "Artist";
    
    $query = query("SELECT * FROM users  WHERE type = '{$type}' ORDER BY rand() LIMIT 1");
    
    while($row= mysqli_fetch_array($query)){
        
$add_random = <<<DELIMETER

<a href = "http://localhost/artdealer/public/artist.php?id={$row['user_number']}"><h2>Click to see random artist</h2></a>

DELIMETER;
        
    echo $add_random;
    }  
}

function see_random_painting(){

    
    $query = query("SELECT * FROM paintings ORDER BY rand() LIMIT 1");
    
    while($row= mysqli_fetch_array($query)){
        
$add_random = <<<DELIMETER

<a href = "http://localhost/artdealer/public/painting.php?id={$row['painting_number']}"><h2>Click to see random painting</h2></a>

DELIMETER;
        
    echo $add_random;
    }  
}

function see_random_promoter(){
    
$type = "Art Dealer";
    
    $query = query("SELECT * FROM users  WHERE type = '{$type}' ORDER BY rand() LIMIT 1");
    
    while($row= mysqli_fetch_array($query)){
        
$add_random = <<<DELIMETER

<a href = "http://localhost/artdealer/public/promoter.php?id={$row['user_number']}"><h2>Click to see random art promoter</h2></a>

DELIMETER;
        
    echo $add_random;
    }  
}

                

?>