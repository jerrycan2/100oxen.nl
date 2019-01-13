<?php
$lastModified=filemtime(__FILE__);
function autoversion($file)
{
  global $lastModified;
  if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
    return $file;

  return preg_replace('{\\.([^./]+)$}', ".$lastModified.\$1", $file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="Description" CONTENT="A political analysis of the divine succession myth">
        <title>Kronos</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/common.css">
</head>
<body class="latin contents">
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
