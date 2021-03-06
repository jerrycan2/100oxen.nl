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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="The myth of Helen of Troy as a political tool and Homer's opposition to it">
    <title>Charter Myth</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>In revenge for Helen</h1>
<p>
    "They took our women" - no doubt a very ancient rallying cry. Not suprising: if we look at human behaviour
    throughout history and in all or most cultures, "woman" is what we men fight for, to protect or to acquire.
    Sometimes the acquiring happens in a formalized, ritualized way (e.g. of exogamous marriage) and at the other end of
    the spectrum it may take the form of mass rape taking revenge on the enemy. In all cases it makes an appeal more
    powerful than civilization itself. The myth of the abduction of Helen, I would maintain, represents a conscious
    attempt to mobilize such an appeal.
</p>
<p>
    The concept is explained to us in the story of the Judgement of Paris. Paris, while herding his sheep in the
    mountains, is visited by three goddesses. They want him to decide who is the most beautiful and each goddess offers
    him a bribe. The question for Paris becomes: what is the best bribe?
</p>
<p>
    Hera offers him power/kingship, Athena wisdom/success in war, Aphrodite beauty/the most beautiful woman. This latter
    one is his predictable choice. This woman happens to be Helen, wife of king Menelaos of Sparta. All of Hellas had
    wooed her but Menelaos won. Every competitor had sworn an oath to come to Menelaos' help if someone tried to steal
    her from him. Here, Helen clearly functions as a trophy, a symbol of victory. This sounds like an attempt to
    establish peace in Greece by a freezing of the military/political situation. Part of this attempt at preventing
    stasis in Hellas was a functioning cooperative emigration policy, in the beginning mainly to Asia Minor. See <a class="textlink" title="Poseidon" target="_self" href="<?php echo autoversion('/poseidon.php');?>">'Poseidon'</a>.
</p>
<p>
    But the question discussed in the myth is: 'How do we get them to go?'. What can we bribe them with? Not power,
    because we have that and we are not sharing. Success in war maybe, meaning loot and the spoils of war to be had if
    we win. But usually there is not so much loot available and people may sometimes wonder if that is worth dying for.
    What is it that the second or third son of a poor nobleman dreams of as he is slaving away in his father's asphodel
    field (or herding his sheep) and that he has hardly any chance of acquiring in his native land? (this is a rhetorical question).
</p>
<p>

</p>
<br>
<br>
<br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
