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
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="Traces of alterations in the Thematic Structure of the Iliad">
    <title>Structure</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
  </head>
  <body class="latin contents">
    <h1>Structural changes?</h1>
    <figure> <img class="fitpage"

          src="images/frag01.JPG" alt="tree fragment" height="50%"

          width="60%"></a>  </figure>
    <p>The thematic map brings out some oddities in the composition. The
      most important and interesting one concerns the "Embassy and Assembly II"
      intermezzo which at first sight is quite unlike the other E &amp; A's. It
      is made up of three parts: Failure by Day, Embassy to Achilles and
      Success by night. The battles in the first part (book 8) seem rather
      redundant, while the night episode of book 10 is universally condemned as
      an insertion. Its central episode however, the Embassy to Achilles, is
      very much a necessary part of the story.</p>
    <p>First it should be noted that the end of book 7, what I call the "the
      people choose war" thema, is in itself an Embassy &amp; Assembly part.
      There is an Achaean and a Trojan assembly and a Trojan envoy goes to the
      ships with the Trojans' peace proposal. So structurally the whole of books
      8, 9 and 10 could be removed and the basic plan would still be intact. The
      story could move effortlessly from the end of 7 to the beginning of 11.</p>
    <p>Secondly, there is the "somewhat odd"-ness of the Deception of Zeus
      episode. Brilliant as it is and also well-placed poetically as a temporary
      escape from all the fighting and tension, it still feels a bit off-topic.
      We could almost be tempted to call it a digression.
      Then there are the famous <em>duals</em> in book 9 (Homer is using a
      grammatical form indicating two people while there are three, apart from the two
      heralds (Il 9.183-98). This error appears to leave stitches visible in the
      patchwork. I suggest the following solution:</p>
    <p>Originally, the Embassy to Achilles was in the place of the Deception of
      Zeus. This fits: the Achaeans are desperate and send for Achilles. He refuses
      but a little later sends Patroclus.
      The poet (or "a poet") decided that the embassy had to be moved
      forward. Phoenix<a class="ptr">(1)</a> was added to the ambassadors and the scene was partially re-composed. On a reason for this we can, as usual, only speculate. Perhaps he thought
      the poem went on for too long without Achilles appearing, perhaps
      he found the original sequence with Patroclus' death hard upon Achilles'
      refusal to fight, unsatisfactory. Too much climax in a short stretch of poem maybe. But in the
      logic of the storyline the embassy would fit much better in the very
      centre of the poem.</p>
    <p>So he decided to bring the Embassy to Achilles forward to a point before
      the beginning of the central Day of Battle. This created a problem for the
      poet who is always so conscious of the state of mind of the individual fighters and
      the armies (like a sports coach, he knows that winning or losing in battle
      is for a large part "between the ears"). At the end of book 7 and the
      beginning of book 11 the Achaeans are full of self-confidence. The events
      of book 7 and earlier have been no reason for desperation. The embassy
      however obviously requires that the Achaeans be in despairing mood. After the
      embassy, it would be odd if the Achaeans went to battle confidently as they do
      in book 11. So we need the Failure by Day episode (book 8) to switch from confidence to
      desperation and the Success by Night (book 10) to switch back to
      confidence.</p>
    <p>Other analyses are possible of course. The Doloneia has often been
      described as non-heroic and therefore non-Homeric. Heroes at war do not do
      such things. Or perhaps they do, but they certainly do not <em>sing</em>
      publicly about it. But Homer does, just as he sings angrily about the
      taking-women-in-revenge-for-Helen theme. This aspect of it makes the
      Doloneia very Homeric in my interpretation.</p>
    <p>However: the theory that the Embassy to Achilles was moved from the centre to E&A2 and that books 8 and 10 were created to make the story fit, has a slight problem:
      In 18.259 Polydamas appears to refer back to bk 8, saying: “I, too was (always) glad to sleep near the ships in the hope of capturing them”. (the Butler translation is wrong. χαίρεσκον "I always liked to..")
      (but: it may refer to Polydamas' advice in 13.726-)
      Also:
      Menelaos in 17.24 refers to a killing (Hyperenor) he did in 14.516, the Counterattack 2.<br>

      All this goes to show that if the above theory is true, it is not about a simple
      cut-and-paste but a partial rewrite</p>
    <br><br><br>
    <hr>
<ol id="footnotes">
    <li>I suspect the name 'Phoenix' in the Iliad to indicate addition in the time when the
      poem was written down. More about this <a class="textlink" title="about writing" target="_self" href="<?php echo autoversion('/writing.php');?>">here</a>.
    </li>
</ol>
<br>
<br>

    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
