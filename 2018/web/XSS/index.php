<html>
<head>
	 <meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="css/all.css">
</head>
	<div id="header">
	</div>
	<div id="content">
		<br>
		<h2 >What will you say to yourself after a second~</h2><br>
		<hr>
		<div id="form1">
			<form class="form" method="get" action="">
				<input id="code1" type="hidden" name="sicnu" value="sicnu">
				<input id="code2" name="xss" value="">
				<input id="button" type="submit" value="submit">
			</form>
		</div>
	</div>
		<?php
		error_reporting(0);
		$xss = $_GET['xss'];
		if (!$xss==null) {
			echo "<div id='mo'>-1s</div>";
		}
		$sicnu = $_GET['sicnu'];
		$took = md5(rand());
		header("Content-Security-Policy:default-src 'self'; script-src 'unsafe-inline'");
		header("Content-Security-Policy: script-src 'nonce-".$took."' 'strict-dynamic'");

		// setcookie("flag","flagggggg");
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
		$xss = filter($xss);
		$sicnu = filter($sicnu);
		echo "<input type=\"hidden\" name=\"xss\" value=\"$xss\">";
		echo "<input type=\"hidden\" class=\"sicnu\"  value=\"$sicnu\">";
		?>
	</div>
	<div id="footer">
	<a id="send" href="send.php">If you decide what you want to say to the magician</a>
	</div>

<script nonce="<?php echo $took;?>" src="/js/config.js"></script>
<script nonce="<?php echo $took;?>" src="/js/jquery-3.3.1.min.js"></script>
<script nonce="<?php echo $took;?>" src="/js/sicnu.js"></script>
</html>

