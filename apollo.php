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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Apollo Silverbow</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
  </head>
  <body class="latin">
    <h1>Apollo Silverbow</h1>
    <figure> <a class="piclink" target="_blank" title="Apollo shooting arrow" href="images/K5.4BApollon.jpg"><img

          class="fitpage" alt="Apollo shooting arrow" src="images/K5.4BApollon.jpg">
      </a> <figcaption> Apollo the farshooter <br>
        Picture from<a class="textlink" target="_blank" title="theoi.com" href="http://www.theoi.com/Gallery/K5.4B.html">
          theoi.com</a> <br>
      </figcaption> </figure>
    <p>In the Iliad, Apollo is patron of poetry, healing, prophecy and archery.
      If Apollo is the god of poetry, at least certain kinds of poetry, and the
      Iliad is that kind of poetry, then Apollo must be in some sense 'the god
      behind the Iliad'. I will argue that the Iliad is a <span style="font-style: italic;">healing
        song</span>, a paean (as in Il 22.391 : νῦν δ᾽ ἄγ᾽ ἀείδοντες παιήονα
      κοῦροι Ἀχαιῶν on having killed Hector) and therefore properly belongs to
      Apollo. </p>
    <p>A paean is a song to cure an illness or to give thanks for a successful
      cure. As the above example in book 22 shows, this need not be a cure of a
      person, it can also be of the community. A community under siege, for
      instance, may be stressed, fearful, nervous, 'feverish' and many more
      things. To get rid of this unbearable stress they may offer votive gifts
      to mythical heroes who in the past did save their people from similar
      disasters. A wise local leader might order a bard to sing appropriate epic
      tales to boost their courage and give them hope. The best cure of course
      would be military: a successful chasing-away of the enemy would be the
      best cure of all and this is what Achilles (Patroclus) does, and this is
      why he is Achilles the Healer. But Homer has a different idea.</p>
    <p><br>
    </p>
    <p>It pays to take careful stock of everything related to Apollo. A basic
      concept is that of the 'winged words' (better: 'feathered words'). Words
      are like arrows which may hit you in the heart if they are aimed well, so
      a singer is like an archer just as a lyre is like a bow (for this, see
      Odysseus stringing his bow in Od 21.404-). The 'Silverbow' epithet of the
      god is explained in il 9.186-7: it is actually a lyre with a silver
      crossbar; I suspect Homer had one like that.&nbsp; Furthermore, an archer
      is a kind of coward who stands apart from the fighting and kills at a
      distance. A poet who has left his hometown, where the fighters are, to go
      into exile and aim words at them from afar, must be very aware of this
      reflection. It is not without significance that Apollo is presented as
      pro-Trojan.</p>
    <p><br>
    </p>
    <p><br>
    </p>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>

  </body>
</html>
