<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>guestbook</title>
	<link rel="stylesheet" href="./css/send.css" type="text/css" />
  <body>
  <?php

    @ session_start();

    #写入验证码
    $captcha=substr(md5(rand(100000,999999)),0,6);
    $_SESSION['captcha']=$captcha;

  ?>
	<div id="header">
		
	</div>
	
	<div id="content">
		<br>
		<h2 >Give your payload to the magician. If the magician is satisfied, he will give you a little gift!</h2><br>
		<hr>
		<form  action="adminsee.php" method="POST">
			<textarea name="message"  cols="8" rows="4" placeholder="input message" required></textarea>
			<br>
			<p>substr(md5($code),0,6) =='<?php echo $captcha?>'</p>
			<br>
			<input id="code" type="text"  name="code" />
			<input id="button" type="submit" value="Send">
		</form>
	</div>

	<div id="footer">
		
	</div>
    
  </body>
</html>
