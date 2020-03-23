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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>...</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/table.css');?>">
  </head>
  <body class="contents latin">
  <br> <br>
     <section id="table" class="tablewrap">
      <div id="tableheader">
        <div class="tabcell rowname">
          <p>a:</p>
        </div>
        <div class="tabcell">
          <p>a1</p>
        </div>
        <div class="tabcell">
          <p>a2</p>
        </div>
        <div class="tabcell">
          <p>a3</p>
        </div>
        <div class="tabcell">
          <p>a4</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="tabcell rowname">
          <p>b:</p>
        </div>
        <div class="tabcell">
          <p>b1</p>
        </div>
        <div class="tabcell">
          <p>b2</p>
        </div>
        <div class="tabcell">
          <p>b3</p>
        </div>
        <div class="tabcell">
          <p>b4</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="tabcell rowname">
          <p>c:</p>
        </div>
        <div class="tabcell">
          <p>c1</p>
        </div>
        <div class="tabcell">
          <p>c2</p>
        </div>
        <div class="tabcell">
          <p>c3</p>
        </div>
        <div class="tabcell">
          <p>c4</p>
        </div>
      </div>
      <p><br>
      </p>
    </section>
    <br>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
