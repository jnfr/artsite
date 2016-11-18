<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                        
                        function user_display() {
                            
                        $username = $_SESSION['username'];
                            
                         $query = query("SELECT * FROM users WHERE username = '{$username}' "  );
                            
                        while($row = mysqli_fetch_array($query)){
                            
$userinfo = <<<DELIMETER

 <h1>{$row['firstname']} {$row['lastname']}, {$row['type']}</h1>
 <h3>{$row['city']}, {$row['state']}  </h3>
 <p></p>

<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>

DELIMETER;
                            
echo $userinfo;       
                        }}
                        
                        user_display();
 
                        ?>
                        
            <?php 
                   function user_type(){
                       
                       $username = $_SESSION['username'];
                       
                       $query = query("SELECT * FROM users WHERE username = '{$username}' ");
                       
                       while($row = mysqli_fetch_array($query)) {
                       
                           if($row['type'] == "artist") {
                       
                       include(TEMPLATE_BACK . DS . "artist.php");
                               
                       } 
                           
                           
                           elseif ($row['type'] == "promoter"){ 
                              
                               include(TEMPLATE_BACK . DS . "promoter.php");
                       } else {
                               
                                include(TEMPLATE_BACK . DS . "buyer.php");
                           }}}
                          echo user_type();
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
