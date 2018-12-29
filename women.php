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
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Women</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">  </head>
  <body class="latin contents">
    <h1>Achaean Women</h1>
    <h4>1: Helen</h4>
    <p>
      In his opposition to the 'abduction of Helen' myth, Homer has to be very careful about the
      picture he draws of the woman. The discussion also takes place, at least partially,
      within the world of myth.
    </p>
    <p>
      So Helen was not abducted as in (what I suppose to be) the original myth.
      Homer makes clear that she follows Paris to Troy because she fell in love with him.
      It is Aphrodite who made her do this, providing Paris with the 'beauty' (μαχλοσύνη<a class="ptr">(1)</a>)
      she bribed him with. In mythical terms, this undercuts the argument for going there with
      an army but it also appears to put the blame on the woman. This is not what Homer, who is
      always concerned to paint a positive picture of the women in his story, wants because
      poetically, Helen stands for "all women". Significant is the remark by Priam (Il 3.164),
      one of Homer's disguises: "I do not blame you, I blame the gods". Obeying a god does
      not diminish our personal responsibility but we can see that: a) there are more gods
      involved than just Aphrodite and b) their forces work not just on her but also
      on the men involved. We all share the blame. And Aphrodite (Il 3.413) can be a
      very dangerous god.
    </p>
    <p>
      Helen, furthermore, is shown as full of remorse and self-loathing and already regretting
      the move that she made. But on the other hand, she is also true to type as the
      "unsatisfied woman". See e.g. her antics when she finds Paris in the bedroom instead
      of the battlefield, or when Hector comes to visit or in her lament when he is dead.
    </p>
    <p><br></p>
    <p>
      <h4>2: Andromache</h4>
    </p>
    <p><br></p>
    <p>
      <h4>3: Penelope</h4>
    </p>
    <p><br></p>
    <p>
      <h4>4: Nausikaa</h4>
    </p>
    <br><br>
    <hr>
    <ol id="footnotes">
        <li>μαχλοσύνη (Il 24.30) is a word under discussion. LSJ translates it as 'lewdness, lust'
          and Aristarchus rejects it as effeminate. But see Homer's initial picture of him: the
          bravado, the pantherskin (Il 3.16-) and Hector's words in Il 3.39-. He is 'pretty boy' Paris,
          the hero of the dance floor, the one whom all the girls fall for. If you seek a Paris,
          you will find him in the bedroom, not on the battlefield. In contemporary terms:
          Helen and Paris are the Prom Queen and Prom King of the day (but there are no Prom Kings on
          the battlefield). It is this kind of beauty that μ. is supposed to signify.
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
