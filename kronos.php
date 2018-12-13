<?php
$lastModified=filemtime(__FILE__);
header('Etag: '.'"'.$lastModified.'"');
header('Cache-Control: no-cache');
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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <title>Plato</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/common.css">
</head>
<body class="latin">
<h1>Sorry, not available yet</h1>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script>
    $(document).ready(function () {
        $("html").niceScroll({
            cursorcolor: "#888",
            cursorwidth: "7px",
            background: "rgba(0,0,0,0.1)",
            cursoropacitymin: 0.2,
            hidecursordelay: 0,
            zindex: 2,
            horizrailenabled: true
        });
    });
</script>
</body>
</html>
