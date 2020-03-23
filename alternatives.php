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
    <meta name="Description" CONTENT="">
    <title>...</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>...</h1>
<figure> <a class="piclink" title="E&A1, 1st alternative" href="images/EA1-v1.JPG"><img
        class="fitpage" alt="" src="images/EA1-v1.JPG">
</a> <figcaption>Twice a repeated sequence</figcaption> </figure>
<br>
<figure> <a class="piclink" title="E&A1, 2nd alternative" href="images/EA1-v2.JPG"><img
        class="fitpage" alt="" src="images/EA1-v2.JPG">
</a> <figcaption>embassies split up</figcaption> </figure>

<p>
</p>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
