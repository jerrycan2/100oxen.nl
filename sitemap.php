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
    <title>sitemap</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/sitemap.css');?>">
  </head>
  <body class="latin">
    <h1>What was, what is and what will be</h1>
    <h4>Sitemap</h4>
    <div class="map"> 1. Introduction, axioms ⇨ <a class="textlink" href="100oxen.php">
        One hundred oxen</a><br>
      2. <a class="textlink" target="_self" title="explanation" href="textframe.php">Explanation page</a><br>
      3. Chapters:
      <ul>
        <li> <span class="emph2">Where &amp; when (historical)</span>
          <ul>
            <li> Charter Myth
              <ul>
                <li>the Ionian migration <a class="textlink" href="history.php">⇨
                    History</a></li>
                <li><a class="textlink" target="_self" title="Poseidon" href="poseidon.php">Poseidon</a></li>
              </ul>
            </li>
            <li> Renaissance and Reform
              <ul>
                <li>Homer's <a class="textlink" target="_self"
                                    title="Homer's Politeia" href="politeia.php">Politeia </a></li>
              </ul>
            </li>
            <li>Smyrna and Lydia
              <ul>
                <li>'Danger on the flanks', Sardis, rivers</li>
              </ul>
            </li>
          </ul>
        </li>
        <li> <span class="emph2">How (poetical)</span>
          <ul>
            <li> the Singer
              <ul>
                <li>aoidic style, epithets, typical scenes, formulas</li>
                <li><a class="textlink" target="_self" title="likenesses"
                       href="likenesses.php">Likenesses</a></li>
                <li>type, character and 'position'</li>
              </ul>
            </li>
            <li> Structures
              <ul>
                <li><a class="textlink" target="_self" title="proportional view"
                       href="blocks.php">A proportional view of the summary</a></li>
                <li>Geometrics: <a class="textlink" href="ring.php">ring composition</a>,
                  balanced expansion, catalogues</li>
                <li><a class="textlink" target="_self" title="Stitched verse"
                       href="stitches.php">Stitched verse - alterations? </a></li>
              </ul>
            </li>
            <li> Apollo and the Art of Archery
              <ul>
                <li><a class="textlink" target="_self" title="Persuasive rhetoric"
                       href="rhetoric.php">persuasive rhetoric</a> </li>
                <li><a class="textlink" target="_self" title=" Poetry, Prophecy, Healing" href="apollo.php"> Poetry, Prophecy, Healing</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li> <span class="emph2">What (topical)</span>
          <ul>
            <li> the Wrath of Apollo
              <ul>
                <li>'let the girl go': Chryseis, Briseis, Helen</li>
                <li>Ares and Aphrodite</li>
              </ul>
            </li>
            <li> The Iliad
              <ul>
                <li>1. the Immortal Hero</li>
                <li>2. the Plan of Zeus</li>
                <li>3. the Mortal Hero</li>
              </ul>
            </li>
            <li> the Good, the True, the Beautiful
              <ul>
                <li><a class="textlink" href="thegods.php">'What we obey'</a></li>
                <li>Paris', Achilles' judgement, the Deception of Zeus</li>
                <li>shame, the Plan of Zeus, the new Polis</li>
                <li><a class="textlink" href="gtb.php">Plato</a>, the Good</li>
              </ul>
            </li>
          </ul>
        </li>
        <li> <span class="emph2">Who (reflexive)</span>
          <ul>
            <li> Self-reflection in Iliad and Odyssey
              <ul>
                <li>The Odyssey's discussion of the Iliad</li>
                <li>What the singer does: Proteus</li>
                <li>'I am Odysseus', 'My name is Nobody'</li>
                <li>Iliad: Fantasy &amp; Reality, Od: Lie &amp; Truth</li>
              </ul>
            </li>
            <li><a class="textlink" href="smyrna.php">Smyrna</a>, Melesigenes, 2 brothers -
              theme</li>
            <li>Chios, Phoenix, Nausikaa</li>
          </ul>
        </li>
        <li>
          <span class="emph2">Target (did he hit it?)</span>
          <ul>
            <li> Was Achilles stronger than Homer?</li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
