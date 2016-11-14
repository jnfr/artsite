<?php require_once("../../resources/configuration.php"); ?>

<?php include(TEMPLATE_BACK . DS . "header.php"); ?>

<?php 

if(!isset($_SESSION['username'])) {
    redirect("../../public");
}

?>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        
        <?php include(TEMPLATE_BACK . DS . "sidebar.php"); ?>

       
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
        <?php 
        
        if(($_SERVER['REQUEST_URI'] == "/artdealer/public/admin/") || ($_SERVER['REQUEST_URI'] == "/artdealer/public/admin/index.php")) {
            
            include(TEMPLATE_BACK . DS . "backcontent.php");
            
        }
        if(isset($_GET['transactions'])){
            
             include(TEMPLATE_BACK . "/transactions.php");
        }
        
        if(isset($_GET['search'])) {
            
            include(TEMPLATE_BACK . "/search.php");
        }
        
        ?>
        
        
        
       
        
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!--footer stuff-->
    
    <?php include(TEMPLATE_BACK . DS . "footer.php"); ?>