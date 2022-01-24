<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
<!-- to enable navigation dropdown when viewed in mobile device -->
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<!-- Change "Your Site" to your site name -->
<a class="navbar-brand" href="<?php echo $home_url; ?>">Session Handling Example</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<!-- link to the "Cart" page, highlight if current page is cart.php -->
<li>
<a href="<?php echo $home_url; ?>">Home</a>
</li>
</ul>
<?php
// check if users was logged in
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
            ?> 
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
&nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
&nbsp;&nbsp;<span class="caret"></span>
</a>
<ul class="dropdown-menu" role="menu">
<li><a href="<?php echo $home_url; ?>logout.php">Logout</a></li>
</ul>
</li>
</ul>
<?php
}
/// if user was not logged in, show the "login" and "register" options
else{
?>
<ul class="nav navbar-nav navbar-right">
    <li >
        
            <?php 
            if(isset($_GET['sess_id']))
                echo '<a href="http://localhost/session_handling/index.php?v=logout"><span class="glyphicon glyphicon-log-out pb-modalreglog-submit"></span> Log Out</a>';
            else
                echo '<a href="#" data-toggle="modal" data-target="#myModal2" ><span class="glyphicon glyphicon-log-in pb-modalreglog-submit"></span> Log In</a>';
        ?>    
        
    </li>
 
    <li >
        <a href="#" data-toggle="modal" data-target="#myModal1" >
            <span class="glyphicon glyphicon-check pb-modalreglog-submit"   ></span> Register
        </a>
    </li>
</ul>
<?php
}
?>
</div><!--/.nav-collapse -->
</div>
</div>
<!-- /navbar -->



<!-- Registration Modal -->
<div class="modal fade" id="myModal1" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="myModalLabel">User Registration</h4>
</div>
<div class="modal-body">
<form name="regForm" id="regForm" method="post" >
<div class="form-group">
<div id="pb-modalreglog-progressbar"></div>
</div>
<div class="form-group">
<div id="ele1" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="" required >
</div>
</div>
<div class="form-group">
<div id="ele1" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="" required >
</div>
</div>
<div class="form-group">
<div id="ele1" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="contact" name="contact" placeholder="Contact No" value="" required >
</div>
</div>
<div class="form-group">
<div id="ele2" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="email" class="form-control" name="email" class="log_email" id="email" autocomplete="off" value="" required placeholder="Email">
</div>
</div>
<div class="form-group">
<div id="ele3" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
<input type="password" class="form-control" placeholder="Password" name="password" id="password" autocomplete="off" value="" required >
</div>
</div>
<div class="form-group">
<div id="ele4" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
<input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword" autocomplete="off" value="" required >
</div>
</div>
<div class="form-group" id="capdiv">
<label for="confirmpassword">Enter the captcha code</label><br/>
<img alt="captcha" name="vimg" id="captcha_code" />
<img src="images/refresh.png" alt="reload" class="refresh" id="capimg" />
<div id="ele5" class="input-group">
<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-cog" aria-hidden="true"></i></span>
<input type="text" class="form-control" placeholder="Captcha" name="captcha" id="captcha" autocomplete="off" value="" required>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<div >
<button type="button" class="btn btn-labeled btn-success" id="Regsubmit" ><span class="btn-label"><i class="fa fa-check" aria-hidden="true"></i></span>Submit</button>
<button type="button" class="btn btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-close" aria-hidden="true"></i></span>Close</button>
</div>
</div>
</div>
</div>
</div>
<!-- Registration modal -->



<!-- Login modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="myModalLabel">User Login</h4>
</div>
<div class="modal-body">
<form name="logForm" id="logForm" method="post" >
<div class="form-group">
<img class='profile-img' src='images/login-icon.png'>
<div id="logemail" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="email" class="form-control" id="lemail" class="log_email" name="lemail" placeholder="Email" autocomplete="off" value="" class="req mail">
</div>
</div>
<div class="form-group">
<div id="logpass" class="input-group pb-modalreglog-input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
<input type="password" class="form-control" id="lpassword" name="lpassword" placeholder="Password" autocomplete="off" value="" class="req" >
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-labeled btn-success" id="Logsubmit" ><span class="btn-label"><i class="fa fa-check" aria-hidden="true"></i></span>Log In</button>
<button type="button" class="btn btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-close" aria-hidden="true"></i></span>Close</button>
</div>
</div>
</div>
</div>
<!-- Login modal -->