<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Start Bootstrap
            </a>
        </li>
        <!-- user account sidebar stuff -->
        
       <?php

            function check_login() {

                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    include(TEMPLATE_FRONT . DS . "sideuseraccount.php");
                } else {
                    include(TEMPLATE_FRONT . DS . "sidelogin.php");
                }

            }
        check_login();

?>
        
       

        <li>
            ~~~~~~~~~~
        </li>
        <!-- search art sidebar stuff -->
        <?php include(TEMPLATE_FRONT . DS . "sidebarartsearch.php"); ?>

    </ul>
</div>