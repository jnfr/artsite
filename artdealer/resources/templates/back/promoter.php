<h4>promoter stuff
</h4>

<div class="container">
  <h2>Paintings I am promoting</h2>
    

    get username, query promotions for that username, return id's of paintings promoted, check if less than 5.  if so display add.  either way display edit button.
    
    <ul>
    <?php get_promoted_paintings_for_admin(); ?>
    
    </ul>

  <form action="" method="post" enctype="multipart/form-data">
      
      <?php 
function add_promotion(){
    
$username = $_SESSION['username'];
static $promoter_number;
static $profile_pic;

$c_query = query("SELECT * FROM users WHERE username = '{$username}' ");
    
    while($row = mysqli_fetch_array($c_query)){   

    $promoter_number = $row['user_number'];
    $profile_pic = $row['profile_pic'];
        
        }

if(isset($_POST['add'])){

   $art_number = escape_string($_POST['art_number']);

   $b_query = query("INSERT INTO promotions(promoter_number, promoter_username, profile_pic, art_number) VALUES ('{$promoter_number}', '{$username}', '{$profile_pic}', '{$art_number}' )");
    
$art_number == "";
header('Location:http://localhost/artdealer/public/admin/');
                 
            }  
    
        } 

add_promotion();
?>
      
      
      
    <div class="form-group">
      <input type="text" class="form-control" name="art_number" placeholder="add painting id #">
    </div>

    <input type="submit" name="add" class="btn btn-default" value="add">
  </form>
    
     
</div>

<p>etc etc</p>
