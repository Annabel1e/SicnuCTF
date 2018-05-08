<?php
@ session_start();
if(empty($_POST['message']) && empty($_POST['code']))
	{
		echo "<script>alert('maybe you have nothing to say');	";
		echo "location.href='index.php';</script>";
		exit;
	}
	$message = $_POST['message'];
	$captcha=$_SESSION['captcha'];
	@$code = trim($_POST['code']);

// echo $message.'<br>';
// echo $captcha.'<br>';
// echo $code.'<br>';
		function filter($string)
			{
				$escape = array('\'','\\\\');
				$escape = '/' . implode('|', $escape) . '/';
				$string = preg_replace($escape, '_', $string);

				$xsssafe = array('script','on','svg','link');
				$xsssafe = '/' . implode('|', $xsssafe) . '/i';
				$string = preg_replace($xsssafe, '', $string);

				$safe = array('select', 'insert', 'update', 'delete', 'where', 'from', 'img', 'form');
				$safe = '/' . implode('|', $safe) . '/i';
				return preg_replace($safe, 'hacker!!', $string);
			}

	function GetIP(){
	 if(!empty($_SERVER["HTTP_CLIENT_IP"])){
			$cip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif(!empty($_SERVER["REMOTE_ADDR"])){
			$cip = $_SERVER["REMOTE_ADDR"];
		}
		else{
			$cip = "NULL";
		}
		 return $cip;
	}

if($captcha === substr(md5($code),0,6))
    {
		$message = filter($message);

		@ $db = new mysqli('localhost','sicnu','sicnuctfxss','web');

		if($db->connect_errno)
		{
			echo "Error: Could not connect to database.Please try again later.";
			exit;
		}

		$query = "UPDATE xss set payload='$message' where id=1";
		// $query = "INSERT INTO xss(payload) VALUES('$message');";
		// echo $message;
		// echo $query;
		$result2 = $db->query($query);


		echo "<script>alert('The magician has received your message and will respond to you within a short period of time. If your request is reasonable, you will get what you want :)');location.href='index.php';</script>";
	}
    else{
        echo "<script>alert('the code is wrong :)');";
		echo "location.href='send.php';</script>";
    }

?>
