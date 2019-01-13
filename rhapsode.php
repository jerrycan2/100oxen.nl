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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="Homer's instructions to his successors">
    <title>Instructions to rhapsodes</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Instructions</h1>
    Hidden in the episode in Phaeacia (book 7-), there may be some advice to newbie rhapsodes:
    <ol>
    <li>arrive on a ship (accompanied by a 'herald'?)</li>
    <li>remain unseen, don't talk to anyone, go straight to the 'big house' (7.27-)</li>
    <li>enter it bravely (7.50-)</li>
    <li>make 'going home' your first point of business (7.223-)</li>
    <li>introduce, answer questions (7.238-) </li>
    <li>appear at the public feast (8.1-)</li>
    <li>sing in public (8.62-)</li>
    <li>watch the sports (8.108-) but don't compete or quarrel with the local people</li>
    <li>compliment your host (8.382-)</li>
    <li>take textiles (and whatever else they want to give) as payment (8.392-)</li>
    <li>sing (9.1-) in private circle</li>
    <li>travel on as quickly as possible</li>
</ol>
<br>
<p>
    On Ithaca, the same metaphor is continued: Odysseus as the aoidos, visiting a town (to give a song, like a beggar) but first being entertained by the local ruler (Eumaios). But here. the metaphor becomes highly complicated with multiple levels of meaning being interwoven.
</p>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
