<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("jeroen1952@gmail.com","test",$msg);
?>
</body>
</html>
