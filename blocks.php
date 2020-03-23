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
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
    <meta name="Description" CONTENT="Block-representation of the structure tree. Each block's height is proportional to the number of Iliad lines it represents.">
    <title>Blocks</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/blocks.css');?>">

</head>
<body class="contents latin">

<h2 id="blocks_header" title="click to show list view">Thematic structure</h2>
<section>
    <p>Here the subdivisions of the poem are shown in proportion. Click in the middle column to go 'up',
        click left to go 'down' again.</p>
    <br>
</section>
<!--div class="radiobtn">
    <input type="radio" id="get_il" name="choose" value="huey"
           checked>
    <label for="get_il">Iliad</label>
</div>

<div class="radiobtn">
    <input type="radio" id="get_od" name="choose" value="dewey">
    <label for="get_od">Odyssey</label>
</div-->
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
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
<!--<script src="<?= autoversion('/scripts/myUtils.js');?>" type="module"></script>-->
<script src="<?= autoversion('/scripts/blocks.js');?>" type="module"></script>

</body>
</html>
