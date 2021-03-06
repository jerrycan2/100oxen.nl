<?php
$lastModified=filemtime(__FILE__);
header('Etag: '.'"'.$lastModified.'"');

function autoversion($file)
{
  if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
    return $file;

  $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="What is myth">
    <title>Myth</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Myth</h1>
<p>
    When I was a child, there was a game we sometimes played at birthday parties: we would have a piece of paper passed around with one line of a story written on it. Everyone could add one line, then the paper was folded in such a way that only the last line written was visible to the next contributor. Finally the whole was read aloud, being a strange, rambling, funny kind of story.
</p>
<p>
    This way of creating stories seems to me like the way myth is produced through the generations. Stories that have meaning to us we pass on to our children, who often do not completely know the circumstances that gave rise to our tale, so they make up their own meaning which they pass on to their children. After some generations the original intent will be all but lost.
</p>
<br>
<br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
