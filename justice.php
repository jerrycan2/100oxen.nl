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
    <title>Zeus and Justice</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin">
<h1>Tractatus Theologico-Poeticus</h1>
<h4>Zeus and Justice</h4>
<p>
    Plato was quite right: Homer is not a philosopher. He is a poet, an imitator, and rhetoric
    and irony are nearer to him than objectivity and precise laqnguage.
    But he has a lot to say, to <em>show</em> rather, about
    a subject which is dear to Socrates' heart: Justice. Homer argues about it, not from a philosopher's
    point of view but from a political one, in a world where Zeus could be used to make an argument
    undeniable. It is easy to be skeptical about people doing this, but we should show respect and
    accept that some people, when they claim to do something because "Zeus commanded it", actually
    are fully convinced of the truth of that statement. For some others of course it is merely
    a political trick. But "Iris" is a very real god and we should listen to her, though not uncritically
    (see Il 18.170-186).
    One of the things Homer shows rather than tells, is the fact that Zeus never talks to people.
    If he has something to say, he will send Iris (or informally Hermes) to bring the message. The rule
    appears to be: every word from Zeus comes through Iris, but not every word from Iris is from Zeus.
</p>
<p>
    In archaic society or today, if people claim that, for instance, conquering Troy or commencing
    some battle is a Zeus-given, it is futile or even dangerous simply to deny this.
    In a political discussion it is necessary to
    take a "yes, but..." approach and this is exactly what Homer is doing. He already goes very far in
    his criticism: see the intro to the second assembly (Il 2.1-40) where he calls the idea that we can
    conquer Troy "today", an Evil Dream.
</p>
<p>
    An often recurring statement is that Zeus has promised us Troy and we shall have it, but "not now". 
    So why has Troy not fallen yet? It is because Agamemnon has dishonored the great Achilles and he is not
    fighting for us. Actually it is because the local peoples are too strong and it is more likely that
    Smyrna or Milete will fall to the Lydians and Carians<a class="ptr">(1)</a>, than vice-versa.
    We sorely need a "hero of the counter-attack" like Achilles.
</p>
<br>
<br>
<hr>
<ol id="footnotes">
    <li>The gods Lydos and Kar are brothers (Hdt 1.171). Is their cooperation behind the <em>two</em> armies
        that beleaguer the second city (Il 18.509-)?
        Also, In Achilles' aristeia, he is threatened by two rivers,
        Skamandros and Simoeis. Skam. calls the other "brother" (Il 21.308) in a significant speech.
    </li>
</ol>

<br>
<br>
<br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
