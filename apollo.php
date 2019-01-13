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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="Description" CONTENT="Apollo, god of healing, poetry and prophecy. Why he is central to the Iliad.">
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
        Picture from<a class="textlink" target="_blank" title="theoi.com" href="https://www.theoi.com/Olympios/Apollon.html">
          theoi.com</a> <br>
      </figcaption> </figure>
    <p>In book 1 of the Iliad, Apollo has quite an entrée. He "comes like night", the arrows in his quiver sounding out, as does as his bow when he sits down to shoot the Achaeans from afar. Apollo is patron of poetry, healing, prophecy and archery.
      If he is the god of poetry, at least certain kinds of poetry, and the
      Iliad is that kind of poetry, then Apollo must be in some sense the god
      behind the Iliad. The poet is 'obeying Apollo' because:  </p>
    <ul>
    <li>
      The Iliad is, among other things, a <em>healing
      song</em>, a paean as in Il 22.391 :
      <div class="indent">νῦν δ᾽ ἄγ᾽ ἀείδοντες παιήονα κοῦροι Ἀχαιῶν <br>
      <br>
      "Allons enfants de la Patrie", let us sing a song of triumph and healing...<br>
      </div>
      A paean is a song to ask for, give thanks for or as here, to boast of a successful
      cure. This need not be a cure of a
      person, it can also be of the community. A community under siege or otherwise in trouble may be stressed, fearful, 'feverish' and many more
      things. To get rid of this unbearable stress they have several options.
      <ol>
        <li>They might offer votive gifts
          to mythical heroes who in the past did save their people from similar
          disasters.</li>
        <li>A wise local leader might order a bard to sing appropriate epic
          tales to boost their courage and give them hope.</li>
        <li>Another possibility is
          the sacrifice of a <em>pharmakos</em>, a scapegoat. Also connected to Apollo.</li>
        <li>There is the military
          option: a successful chasing away of the enemy would be the
          best cure of all.</li>
      </ol>
      These options are not strictly separated:
      there are tales of pharmakoi managing to get rid of enemy armies.
      Achilles (Patroclus) is a kind of exile who manages, on his own,
      to defeat the Trojan army. Achilles is also like Thersites (he voices the same criticism)
      who is, in his capacity as 'worst of the Achaeans', another candidate for
      scapegoat. In short, the image of Achilles seems to be a combination of point 3 and 4. More on the scapegoat below.
    </li>
      <br>
      <li>
        Prophecy. E.g. Il 1.240:
        <div class="indent">
          ἦ ποτ' Ἀχιλλῆος ποθὴ ἵξεται υἷας Ἀχαιῶν<br>
          <br>
          Soon the Achaeans will <em>need</em> Achilles
        </div>
        To Achilles this is an oath, he is saying that he will not come. But in the subtext
        it is a prophecy, the basic political message that drives the Iliad. In the Odyssey
        there is also a prophecy, a "return of the king<a class="ptr">(1)</a>" kind of message that seems much like
        a warning against tyranny. More about this <a class="textlink" title="" href="sorry.php">here</a>.
      </li>
    </ul>
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
    <hr>
    <ol id="footnotes">
        <li>The king, who "νοστήσει καὶ τίσεται". Helen makes this prediction in Od 15.177
        </li>
    </ol>
    <br>
    <br>
    
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>

  </body>
</html>
