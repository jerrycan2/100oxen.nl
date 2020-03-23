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
    <meta name="Description" CONTENT="A discussion of the words 'good', 'true', 'beautiful' and 'just' in the context of Homer and Plato.">
    <title>The Good, the True, the Beautiful</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/gtb.css');?>">
  </head>
  <body class="contents latin">
    <section>
      <figure> <a class="piclink" href="/images/5gods.png"><img

            alt="Aphrodite, Athena, Hera and Zeus, acc. by Apollo" src="/images/5gods_tn.jpg"

            width="60%"></a> <figcaption>Archaistic relief showing five
          divinities: Apollo, Aphrodite, Athena, Hera, and Zeus.</figcaption> </figure>
    </section>
    <h2>The Good, the True, the Beautiful...and Justice</h2>
    <section>
      <p>From the mythical to the philosophical...</p>
      <br> <br>
    </section>
    <br> <br>
    <section id="table1" class="tablewrap1">
      <div id="tableheader1">
        <div class="tabcell1">
          <p>Homer's gods</p>
        </div>
        <div class="tabcell1 middle">
          <p>&nbsp;</p>
        </div>
        <div class="tabcell1">
          <p>Plato's Good</p>
        </div>
      </div>
      <div class="tablerow1">
        <div class="tabcell1">
          <p>
            <br>
            <img src="images/zeus3.png" alt="Olympic hierarchy" title="Zeus and the goddesses, hierarchy">
            <br>
            <span class="gold">Zeus</span> is supposed to be in charge. He boasts of being stronger than all the other gods together but
            appears to avoid putting it to the test. See 'the golden rope', Il. 8.19. <span class="red">Hera</span> is number two though she
            wants more, <span class="blue">Athena</span> is Tritogeneia, third-born (just as Zeus became first-born) and
            <span class="green">Aphrodite</span> is fourth, though sometimes stronger than Zeus himself.
          </p>
        </div>
        <div class="tabcell1 middle">
        </div>
        <div class="tabcell1">
          <img id="thegood" src="images/platogood.png" alt="Plato's view of the Absolute Good"
                  title="Plato's view of the Absolute Good">
          <p>
            The solid red part is our Nomos, its border is Sophrosyne
          </p>
        </div>
      </div>
      <p><br>
      </p>
    </section>
    <br>
    <section id="gtbjtable" class="tablewrap1">
      <div id="tableheader2">
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
          <p>cleverness (μῆτις), know-how,</p><p> know-when (boldness)</p>
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
          <p>Spirit<a class="ptr">(1)</a>, thumos</p>
        </div>
        <div class="tabcell">
          <p>Reason, calculation</p>
        </div>
        <div class="tabcell">
          <p>Desire, Eros</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>class:</p>
        </div>
        <div class="tabcell">
          <p>auxiliaries (soldiers)</p>
        </div>
        <div class="tabcell">
          <p>rulers</p>
        </div>
        <div class="tabcell">
          <p>working class</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <div class="tablerow">
        <div class="rowname">
          <p>object<a class="ptr">(1)</a>:</p>
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
          <p>subject<a class="ptr">(1)</a>:</p>
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
          <p>φρόνησις, σοφία</p>
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
          <p>wife<a class="ptr">(4)</a>:</p>
        </div>
        <div class="tabcell">
          <p>Χρυσόθεμις</p>
          <p>"golden order"</p>
        </div>
        <div class="tabcell">
          <p>Λαοδίκη</p>
          <p>"people (or army)'s justice"</p>
        </div>
        <div class="tabcell">
          <p>Ἰφιάνασσα</p>
          <p>"she rules by force"</p>
        </div>
        <div class="tabcell">
          <p>-</p>
        </div>
      </div>
      <p><br>
      </p>
    </section>
    <br>
    <h4>What is Good?</h4>
    <p>
      What is Good in Plato's Republic is made clear by the postulated similarity between the soul and the polis. The three classes of the population (
    </p><br>
    <h4>What is best?</h4>
    <p>
      First, one important caveat: 'good' here is the <em>qualitative</em> good, not the <em>moral</em> good. It is a-moral (see <a class="textlink" title="the gods and morality" target="_self" href="<?php echo autoversion('/thegods.php#morality.php');?>">the gods</a>). Our platonist and christian habits of speech have really shifted the meaning of the word. So what is the good in ancient Greece?
    </p>
    <p>
      A member of Plato's class, the aristocracy, would soon know the answer to that: '<em>we</em> are'. We are Kalos kagathos; our fathers were the best men and we inherited their ἀρετὴ; we boast of being warriors and winners. Here is one characteristic of the good: it is that which gives <em>status</em>. But birth or boasting alone is not enough: a good man must be manly (ἀνδρεία) with all that implies: brave, dominant, steady (not going this way and that,
      ἔνθα καὶ ἔνθα<a class="ptr">(2)</a> but straight on), and possessing
        <em>spirit</em> (the Homeric word is thymos, θῡμός)<a class="ptr">(3)</a>, an important concept which describes the man of quality. It implies all the above character traits and also a dynamic quality: ambition, energy, drive.
    </p>
    <p>
        There is another aspect of the ancient Greek 'good': it is unchanging. A good apple is one that does not rot, a good sword stays sharp. Again, a natural point of view for an aristocrat. The proper order of society (themis) has the best people on top and this ought not to change. To be able to resist the onslaught of change, a thing needs <em>power</em>, strength. Thus the semantic range of the concept includes status, quality, power, courage<a class="ptr">(4)</a>.
    </p>
    <p>
        <br><br>
    </p>

    <hr>
    <ol id="footnotes">
        <li>Plato actually distinguishes two levels of 'the Good': the lower,
          which is 'Spirit', the declared aristocratic quality, and the higher, which is the highest Platonic Good,
          the source of everything. This one appropriates the place of Zeus.
        </li>
      <li>
        "what it gives"
      </li>
      <li>
        "what it is about"
      </li>
      <li>
        One of Agamemnon's daughters, promised to Achilles if he will come back to fight (Il 9.287)
      </li>
      <li>As in the metaphor in Il 2.397 or 2.779</li>
        <li>One can have too much of it, it is also related to anger. It may lead to hubris (ὕβρις) and ἀγηνορίη, like the lion in Il 12.46, Achilles in Il 24.42, Hector in Il 22.457 or the suitors. <br>
        Unfortunately the Homeric style is not really geared to precise use of individual words so we have to struggle to decide by context what words such as thumos mean.</li>
        <li>I use 'courage' here in the sense of 'not turning to run, not giving up'. There is a related kind of courage more associated with Athena, that is 'boldness', know-when, grabbing the opportunity.</li>
    </ol>
    <br>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
