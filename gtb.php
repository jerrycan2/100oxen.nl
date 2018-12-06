<!DOCTYPE html>
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
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>The Good, the True, the Beautiful</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/gtb.css');?>">
  </head>
  <body class="contents latin">
    <section>
      <figure> <a class="piclink" target="_blank" href="http://search.openlibrary.artstor.org/object/AYALEARTIG_10312577701"><img

            alt="Hera, Athena, Aphrodite and Zeus, acc. by Apollo" src="images/5gods_tn.jpg"

            width="40%"></a> <figcaption>Archaistic relief showing five
          divinities: Zeus, Hera, Athena, Aphrodite, and Apollo.</figcaption> </figure>
    </section>
    <h2>The Good, the True, the Beautiful...and Justice</h2>
    <section>
      <p>From the mythical to the philosophical...</p>
    </section>
    <section id="gtbjtable" class="wrap">
      <div id="tableheader">
        <div class="rowname">
          <p>concept:</p>
        </div>
        <div class="tabcell">
          <p>the Good</p>
        </div>
        <div class="tabcell">
          <p>the True</p>
        </div>
        <div class="tabcell">
          <p>the Beautiful</p>
        </div>
        <div class="tabcell">
          <p>Justice</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>god:</p>
        </div>
        <div class="tabcell">
          <p>Hera</p>
        </div>
        <div class="tabcell">
          <p>Athena</p>
        </div>
        <div class="tabcell">
          <p>Aphrodite</p>
        </div>
        <div class="tabcell">
          <p>Zeus</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>gift:</p>
        </div>
        <div class="tabcell">
          <p>Power</p>
        </div>
        <div class="tabcell">
          <p>Victory</p>
        </div>
        <div class="tabcell">
          <p>Beauty</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>Homer:</p>
        </div>
        <div class="tabcell">
          <p>status</p>
        </div>
        <div class="tabcell">
          <p>cleverness (μῆτις), know-how, know-when (boldness)</p>
        </div>
        <div class="tabcell">
          <p>"have" beauty or "be" beauty</p>
        </div>
        <div class="tabcell">
          <p>Fate</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>Plato:</p>
        </div>
        <div class="tabcell">
          <p>Spirit <a class="ptr">(1)</a></p>
        </div>
        <div class="tabcell">
          <p>Reason</p>
        </div>
        <div class="tabcell">
          <p>Desire</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>subject:</p>
        </div>
        <div class="tabcell">
          <p>status</p>
        </div>
        <div class="tabcell">
          <p>success</p>
        </div>
        <div class="tabcell">
          <p>pleasure</p>
        </div>
        <div class="tabcell">
          <p>share</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>object:</p>
        </div>
        <div class="tabcell">
          <p>excellence (ἀρετή),</p>
          <p>'unchanging'-ness</p>
        </div>
        <div class="tabcell">
          <p>truth</p>
        </div>
        <div class="tabcell">
          <p>beauty</p>
        </div>
        <div class="tabcell">
          <p>proportion</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>virtue:</p>
          <p>(Plato)</p>
        </div>
        <div class="tabcell">
          <p>ἀνδρεία</p>
          <p>courage, manliness</p>
        </div>
        <div class="tabcell">
          <p>φρόνησις</p>
          <p>wisdom</p>
        </div>
        <div class="tabcell">
          <p>σωφροσύνη</p>
          <p>moderation</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>vice:</p>
        </div>
        <div class="tabcell">
          <p>hubris</p>
        </div>
        <div class="tabcell">
          <p>deception</p>
        </div>
        <div class="tabcell">
          <p>indulgence</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>Agamemnon's daughter:</p>
        </div>
        <div class="tabcell">
          <p>Χρυσόθεμις</p>
          <p>"golden rule"</p>
        </div>
        <div class="tabcell">
          <p>Λαοδίκη</p>
          <p>"people (or army)'s justice"</p>
        </div>
        <div class="tabcell">
          <p>Ἰφιάνασσα</p>
          <p>"rules by force"</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <p><br>
      </p>
    </section>
    <hr>
    <ol id="footnotes">
        <li>Plato actually distinguishes two levels of 'the Good': the lower,
          which is 'Spirit', and the higher, which is the highest Platonic Good,
          the source of everything. Thus it appropriates the place of Zeus.
        </li>
    </ol>
    <br>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?></div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
