<?php
$lastModified=filemtime(__FILE__);
header('Etag: '.'"'.$lastModified.'"');
header('Cache-Control: public');
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
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
    <title>Showing proportions</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/page1.css');?>">

</head>
<body class="contents latin">

<h2>Poetic structure in the Iliad</h2>
<section>
    <p>Here the subdivisions of the poem are shown in proportion. Click in the middle column to go 'down',
        click left to go 'up' again.</p>
    <br>
</section>
<section id="wrap">
    <h5 id="parenttitle"></h5>
    <h6 id="lines"></h6>
    <div id="col1"></div>
    <div id="col2"></div>
    <div id="col3"></div>
</section>
<section>
    <p>...</p>
</section>

<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="scripts/jquery.color-2.1.2.min.js"></script>
<script src="<?= autoversion('/scripts/page1.js');?>"></script>

</body>
</html>
