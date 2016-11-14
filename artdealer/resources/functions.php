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

?>