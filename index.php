<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}

    
#uper
{
    
    font-size: 50px;
    color:orange;
}
#uper img{
   
    width: 90px;
    height: 90px;
    border-radius: 360px;
    border: 0.5px white;
}

.footer
{
    height: 150px;
    width: 100%;
    background-color: black;
    
    display: flex;
    justify-content:space-around;
    align-items: center;
}
.footerb
{
    height: 150px;
    width: 220px;
   
    float: left;
    color: white;
    text-align: center;
  
}

    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div id="uper">
    
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><h1 style="color: orange; "> <img src="JSGIbLIdR6SqpVdHHGMw_restaurant/12345.jpg"> <i>ASHI Foods</i></h1></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                   
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span> <span class="badge badge-danger item_count">0</span> <i class="fa fa-shopping-cart"></i>  </span>Cart</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/login.php">Admin</a></li>
                        <?php if(isset($_SESSION['login_user_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome" .$_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off"></i></a></li>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Login</a></li>
                        
                      <?php endif; ?>
                    </ul>
                    </div>
                </div>
            </div>
        </nav>
      
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
              

  <div class="footer">

<div class="footerb">
   <b>Quick Link</b> 
   <br><br>
   Home<br>
   About<br>
   Menu<br>
   Order <br>
   Contact <br>
</div>


<div class="footerb">
   <b>Menu</b> 
   <br><br>
   Veg Thali<br>
   Non-Veg Thali<br>
   Fast Food<br>
   Pasta  <br>
   Soup <br>
   Chaat <br>
</div>
              <div class="footerb">
                <b>Address </b> 
                <br><br>
               Add. Hoshiyarpur sec-51 Noida,
                   U.P - 201301<br>
               Email- ashishupadhyayji023@gmail.com<br>
               Mobile No: 8802324528<br>
               Timing: 9:00 AM to 6:00 PM <br>     
             </div>


             <div class="footerb">
                <b>Directions </b>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d875.8936713808596!2d77.36950583735646!3d28.58253167230558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce58447ecc141%3A0xfed46034db4c5d0d!2sBlock%20F%2C%20Sector%2051%2C%20Noida%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1633247671741!5m2!1sen!2sin" width="210" height="130" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>


         </div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
