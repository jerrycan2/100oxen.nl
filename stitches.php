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
    <meta http-equiv="Content-Language" content="en-us">
    <title>Structure</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
  </head>
  <body class="latin">
    <h1>Structural changes?</h1>
    <div class="treefragment" id="frag" data-lnr="8.1" data-lvl="1"
         data-title="Embassy & Assembly 2: the embassy to Achilles"></div>
    <p>The structural summary brings out some oddities in the structure. The
      most important and interesting one concerns the 'Embassy and Assembly II'
      intermezzo which at first sight is quite unlike the other E &amp; A's. It
      is made up of three parts 'Failure by Day', 'Embassy to Achilles' and
      'Success by night'. The battles in the first part (book 8) seem rather
      redundant, while the night episode of book 10 is universally condemned as
      an insertion. Its central episode however, the Embassy to Achilles, is
      very much a necessary part of the story.</p>
    <p>First it should be noted that at the end of book 7, what I call the 'the
      people choose war' episode, is in itself an Embassy &amp; Assembly part.
      There is an Achaean and a Trojan assembly and a Trojan envoy goes to the
      ships with the Trojans' peace proposal. So structurally the whole of books
      8, 9 and 10 could be removed and the basic plan would still be intact.</p>
    <p>Secondly, there is the 'somewhat odd'-ness of the 'Deception of Zeus'
      episode. Brilliant as it is and also well-placed poetically as a temporary
      escape from all the fighting and tension, it still feels a bit off-topic.
      Then there are the famous <em>duals</em> in book 9 (Homer is using a
      grammatical form indicating two people while there are three, plus two
      heralds (Il 9.183-98) which appear to leave stitches visible in the
      patchwork. I suggest the following solution:</p>
    <p>Originally, the Embassy to Achilles was in the place of the Deception of
      Zeus. This fits: the Achaeans are desperate and send for Achilles. Phoenix
      was added to the ambassadors and the scene was partially re-composed.
      Later, the poet (presumably) decided that the embassy had to be moved
      forward. On a reason for this we can, as usual, only speculate. Perhaps he thought
      the poem went on for too long without Achilles appearing, perhaps
      he found the original sequence with Patrocles' death hard upon Achilles'
      refusal to fight, too harsh. The wine too strong, as it were. But in the
      logic of the storyline the embassy would fit much better in the very
      centre of the poem.</p>
    <p>So he decided to bring the Embassy to Achilles forward to a point before
      the beginning of the central Day of Battle. This created a problem for the
      poet who is always so conscious of the state of mind of the individual fighters and
      the armies (like a sports coach, he knows that winning or losing in battle
      is for a large part 'between the ears'). At the end of book 7 and the
      beginning of book 11 the Achaeans are full of self-confidence. The events
      of book 7 and earlier have been no reason for desperation. The embassy
      however obviously requires that the Achaeans be in desparate mood. So we
      need the 'failure by day' episode (book 8) to switch from confidence to
      desperation and the 'success by night' (book 10) to switch back to
      confidence.</p>
    <p>Other analyses are possible of course. The Doloneia has often been
      described as non-heroic and therefore non-Homeric. Heroes at war do not do
      such things. Or perhaps they do, but they certainly do not <em>talk</em>
      publicly about it. But Homer does, just as he talks about the
      taking-women-in-revenge-for-Helen theme. This aspect of it makes the
      Doloneia very Homeric.</p>
    <p><br>
    </p>

    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?></div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
