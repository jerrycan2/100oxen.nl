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
    <meta name="Description" CONTENT="">
    <title>Plato's gods</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>The gods of Plato</h1>
<p>
    <h4>Plato Laws X, 891C-: a summary</h4>
<ul>
    <li>"Fire, water, earth, air", things of the body, are not first</li>
    <li>"Soul" (Psychē) is first, because it is older than body</li>
    <li>"Things of the soul": opinion, thought, art, law etc. come before concrete things.</li>
    <li>the works of "techne" come before the things of nature, which is wrongly called "physis"</li>
    <li>Soul itself, being first, should be called physis</li>
    <li>and it is the prime mover, which is life.</li>
    <li>so the soul is the cause of all things fair and foul, just and unjust and all the opposites. (896D)</li>
    <li>soul also controls heaven</li>
    <li>but not fewer than 2 souls: a beneficent one and an opposite (unreason)
        <ul>
            <li>This is Plato's purification of the gods: he splits off the bad.
                <ul>
                    <li>You might say he is eating of the tree of knowledge of good and evil.</li>
                </ul>
            </li>
            <li>He <em>creates</em> evil & virtue by this separation.</li>
            <li>see <a class="textlink" title="100oxen" href="100oxen.php">100 oxen, introduction</a>.</li>
            <li>This is where he makes "new gods" (896E). Nice of the anonymous Athenian to answer for Clinias!</li>
        </ul>
    </li>
    <li>thus are caused all the "motions" like thought, joy, fear, confidence etc. (but also the things like
        hardness, wetness, the things of the body), all in conjunction with either reason or unreason.</li>
    <li>and, the world being what it is, it must be a reasonable and beneficent soul who is in control of
        heaven and earth
    </li>
    <li>since "moving in place" (rotating) is eminently more "reasonable" than moving about all over,
        the gods are not moved themselves, they only move us.</li>
</ul>
</p>
<p> This is of course some distance away from Homer's gods. But the main feature, their <em>moving</em> us,
    is unchanged. The all-important difference is that Plato's god (or gods) must be absolutely <em>good</em>
    and <em>reasonable</em> - the evil ones he does not talk about anymore. Homer's gods, except Zeus, are monofocal: they
    focus on only one thing each. E.g. Aphrodite knows nothing about cleverness or status, none of the goddesses understand
    justice. Zeus is the one who has to take all their strivings into account. <br>
    So they are as good and as reasonable as we humans are. Or let us say it more precisely:
    as the human obeying them is. <br>
    For if they are not absolute then they are relative. To us. Another way of saying this is
    that the gods are <em>phenomena</em>. They are not just what we obey, as a voice coming from outside, they are
    what we are, they are <em>how we perceive the world</em>. This thought is developed <a class="textlink" title="Phenomena"
            href="">here</a>.
</p><br>
<br> <br>

<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
