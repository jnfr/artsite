<?php require_once("../resources/configuration.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<body>

    <div id="wrapper">

        <!-- Sidebar -->
        
        <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>

       
        <!-- /#sidebar-wrapper -->
        
        

            <!-- Page Content -->
    <?php get_artist(); ?>

            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

    
        <!-- Content Row -->
  <!-- Project One -->
    
    <?php get_promoted_paintings_for_display(); ?>
       
        <!-- /.row -->

    </div>
    <!-- /.container -->
        
        
        

        
            </div>
    <!-- /#wrapper -->

    <!--footer stuff-->
    
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>