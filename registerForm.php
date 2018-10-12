<?php
session_start();
$root = dirname(__FILE__);
include("$root/inc/coreHtml.php");
include("errors.php");
   ?>
<form method="post" action="register.php">
   	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="userName" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
  <?php include("inc/coreHtmlBottom.php")?>