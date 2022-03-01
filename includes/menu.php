<div class="navigation-strip">
	<a href="#"><img src="images/logo.png" class="img-responsive" alt="" style="display: inline-block; padding: 0 0; margin: 0 0;" /> </a>
	<?php
        error_reporting(0);
        if ($user_type == 'admin') 
        {
    ?>
    		<div class="top-menu">
                <ul class="megamenu skyblue">
                	<li><a href="addfooditem.php">Add Food Item</a></li>
                	<li><a href="viewfooditems.php">View Food Items</a></li>
                	<li><a href="viewpreferedfood.php">View Prefered Food</a></li>
                	<li><a href="logout.php">Logout</a></li>
                </ul>
        	</div>
					
	<?php 
        }
        else if($user_type == 'user')
        {
    ?>
    		<div class="top-menu">
                <ul class="megamenu skyblue">
                	<li><a href="viewmenu.php">View Menu</a></li>
					<li><a href="viewfooditems.php">View Food Items</a></li>
                	<li><a href="viewpreferedfood.php">View Prefered Food</a></li>
                	<li><a href="logout.php">Logout</a></li>
                </ul>
        	</div>
	<?php
        }
        else
        {
    ?>
    		<div class="top-menu">
                <ul class="megamenu skyblue">
                	<li><a href="index.php">Home</a></li>
                	<li><a href="login.php">Login</a></li>
					<li><a href="registration.php">Registration</a></li>
                </ul>
        	</div>
	<?php
        }
    ?>
    <div class="clearfix"></div>
</div>