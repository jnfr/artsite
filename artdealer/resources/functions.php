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
}
echo $artist;   

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
                

?>