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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="The Neleid clan, their descendance from Poseidon and their role in the Ionian migration">
    <title>Poseidon</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Poseidon</h1>
<p>An interesting citation from the 'battle of the gods' is Il 20.67</p>
<div class="indent">
    <p>ἤτοι μὲν γὰρ ἔναντα Ποσειδάωνος ἄνακτος</p>
    <p>ἵστατ᾽ Ἀπόλλων Φοῖβος ἔχων ἰὰ πτερόεντα,</p>
</div>
<div class="indent">
    <p>And opposite King Poseidon</p>
    <p>stood Phoebus Apollo with his feathered arrows</p>
</div>
<p>
    Always in Homer's version of the Troy story, Apollo and Poseidon find themselves on opposite sides.
    Scholars have wondered why this is the case. See e.g. Il 24.25-
</p>
<p>
    Poseidon and Zeus are also in a somewhat ambivalent relation. Perhaps because Zeus was born the youngest
    of three brothers but (like his father Kronos) he became the leader of the gods (Il 13.355).
    Normally of course it is the eldest son who takes the inheritance. So, like Jacob in the bible, Zeus
    'becomes first-born'<a class="ptr">(1)</a>. Poseidon accepts this but not wholeheartedly and there is clearly some tension left.
    See most clearly Il 15.157-219. There are a number of other features which are important:
    <ul>
    <li>The Ionians had a common religious festival at Mycale, the Panionion, in honour of
    Poseidon.</li>
    <li>A powerful Great House, the Neleids from Pylos, claimed descendance from the god.</li>
    <li>A branch of this family was powerful in Athens and was also connected to the Ionian
    migration. </li>
    <li>Smyrna was a Ionian-ruled city but they were not original members of the Ionian league,
        for reasons which Herodotus explains in Hdt 1.148: the city was Aeolian but was
        captured at an unknown date by a group who was exiled from Colophon. This group
        'stole' the city by locking out the nobles of the town when they were outside
        for a religious festival.</li>
    <li>Mimnermus of Colophon connects this group explicitly to Pylos so possibly
        they were (led by) members of this same Neleid family.</li>
</ul>
</p>
<p>
    All this forms the context in which Homer's pictuer of Poseidon is drawn. I find it likely that
    members of this family, as I suppose Homer was, would refer to their city as 'sandy Pylos' or
    'Pylos-on-the-beach' and that if they refer to the will of Poseidon, they refer to a
    long-standing family policy aimed at acquiring a strong power-base on the Asian mainland. In
    terms of the Homeric picture: Poseidon, like the Ionians, 'has the sea' but 'wants the land'.
    Zeus however says that he cannot have it. See Il 15.187-. The whole picture suggests strongly that Poseidon has <a class="textlink" title="Kronos" href="kronos.php">Kronos</a>-like ambitions: he wants to rule (again<a class="ptr">(2)</a>) on earth.
</p>
<p>
    The rivalry between Zeus and Poseidon
</p>
<hr>
<ol id="footnotes">
    <li>The youngest son taking power is a well-known trope in storytelling. For a possible
        connection with Zeus and Kronos, see <a class="textlink" target="_self" title="kronos"
                                                href="kronos.php">Kronos</a>
    </li>
    <li>
        There is an unconfirmed theory that 'Poseidon' originally meant 'husband of the earth'.
    </li>
</ol>
<br>
<br>

<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
