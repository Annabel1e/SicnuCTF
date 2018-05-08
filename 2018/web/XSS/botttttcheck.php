    
<html>
<head>
     <meta charset="utf-8">
</head>
<form class="form" method="get" action="">
<input type="hidden" name="sicnu" value="sicnu">
<input name="xss" value="">
<input type="submit" value="submit">
</form>
<?php
error_reporting(0);
if(@$_COOKIE['admin'] !== 'Alyosha_sicnu_webxss_ctf')
    {   
        exit('mb, you are not bot!!!');
    }
    else{
        $took = md5(rand());
        header("Content-Security-Policy:default-src 'self'; script-src 'unsafe-inline'");
        header("Content-Security-Policy: script-src 'nonce-".$took."' 'strict-dynamic'");
        setcookie("flag","X5s_1s_s0oOoOo0_cOoI!");
        @ $db = new mysqli('localhost','sicnu','sicnuctfxss','web');
            if($db->connect_errno)
            {
                echo "Error: Could not connect to database.Please try again later.";
                exit;
            }
            $query="select payload from xss";
            // echo $query;
            $result=$db->query($query);
            @ $num_results = $result->num_rows;
            $row = $result->fetch_assoc();
            // echo $row['payload'];
            $poc =$row['payload'];

        echo "<input type=\"hidden\" class=\"sicnu\"  value=\"$poc\">";

            @$result->free();
            $db->close();

    }


?>
<script nonce="<?php echo $took;?>" src="/js/config.js"></script>
<script nonce="<?php echo $took;?>" src="/js/jquery-3.3.1.min.js"></script>
<script nonce="<?php echo $took;?>" src="/js/sicnu.js"></script>
</html>
