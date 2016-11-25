<?php require_once("../resources/configuration.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<body>

    <div id="wrapper">

        <!-- Sidebar -->
        
        <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>

       
        <!-- /#sidebar-wrapper -->
        
        

<!-- Page Content -->
    <div class="container">
        
    

        <!-- Portfolio Item Heading -->
        <div class="row">
            
            <div class="col-lg-6">
                <?php add_artist_info(); ?>
                
                 <h1 class="page-header">Portfolio Item
                    <small>Item Subheading</small>
                </h1>
                <?php painting_page(); ?>
            </div>
        </div>
        <!-- /.row -->
          
        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
        
            </div>
    <!-- /#wrapper -->

    <!--footer stuff-->
    
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>