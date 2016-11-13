<?php require_once("../resources/configuration.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<body>

    <div id="wrapper">

        <!-- Sidebar -->
        
        <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>

       
        <!-- /#sidebar-wrapper -->

         <!-- Page Content -->
   <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>sign up</h1>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                
     <form action="" method="post" enctype="multipart/form-data">
         
         <?php add_user(); ?>
        
       
           
         <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control">
         </div>
           
         <div class="form-group">
          <label for="password">Password</label>
          <input type="text" name="password" class="form-control">
         </div>
           
           <div class="row">
          <div class="form-group col-md-6">
          <label for="firstname">First Name</label>
          <input type="text" name="firstname" class="form-control">
         </div>
           
           <div class="form-group col-md-6">
          <label for="lastname">Last Name</label>
          <input type="text" name="lastname" class="form-control">
         </div>
          </div>
           
           <div class="form-group">
          <label for="street_address">Street Address</label>
          <input type="text" name="street_address" class="form-control">
         </div>
           
           <div class="row">
           <div class="form-group">
          <label for="city">City</label>
          <input type="text" name="city" class="form-control">
         </div>
           
           <div class="form-group">
          <label for="state">State</label>
          <input type="text" name="state" class="form-control">
         </div>
           
           <div class="form-group">
          <label for="zipcode">Zip code</label>
          <input type="text" name="zipcode" class="form-control">
         </div>
           </div>
           
           <div class="form-group">
          <label for="type">User type</label>
          <input type="text" name="type" class="form-control">
         </div>
           
             <div class="form-group">
                <input type="submit" name="publish" class="btn btn-info btn-md" value="submit">
             </div>
               </form>
           
           </div>
         
        
    
                </div>       
        </div>
</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!--footer stuff-->
    
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>