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
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta http-equiv="Content-Language" content="en-us">
    <title>summary</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin">
<p align="center"></p>
<h1>Summary of the history</h1>
<p>The story of Helen and the Trojan War was a Charter Myth
    for the Ionian migration in the same way the story of
    Heracles' children claiming their inheritance was a charter
    for the Dorian invasion. These stories functioned as political banners
    and were actively promoted by leaders of those movements,
    in this case: a channeling of migration to
    Ionia, through Athens.
    It is easy to see why: travel through today's western Turkey and you will see
    that the floodplains of the rivers 'Gediz' and 'Büyük Menderes', then called the Hermus
    and the Meander, are prize land, larger and more fertile than any land in
    mainland Greece. A nice powerbase for any clan with royal aspirations.
    If this is true, it is easy to see that the
    Iliad is a very political poem and that the poet would need a 'hidden'
    level of meaning to discuss these topics. Ionia in Homers day was a
    society under threat of war and Homer was writing about this war.
    Although he created an epic distance by, for instance, not mentioning
    Ionia and by stressing the fact that these stories took place a long
    time ago ("conscious archaization"), he still would have made a lot of
    enemies by his anti-war stance. He effectively says: "Zeus will give us
    Troy one day, <em>but not now</em>".<br>
    I place Homer in Smyrna, and Smyrna's Troy was Sardis, the main city of
    the not-yet-unified Lydians. These were the people that Smyrna built its
    strong wall against though that did not stop the Lydians sacking their city by the
    end of the 7th century. </p>
<p>The Iliad, while set in Homer's past, is about a crisis of his present
    day: the failure of the Ionian migration. This was a movement,
    organized/stimulated by a powerful family in Athens called the Neleids,
    rulers in Pylos in the past and probably a "great house" dating back to
    Mycenean times, even claiming descendance from Poseidon. They found a new
    powerbase in Athens but they had branches everywhere. In the Iliad they
    are represented by Nestor and <a class="textlink" target="_self"
                                     title="Poseidon" href="poseidon.php">Poseidon</a>).
</p>
<p>The aim of their policy was to increase the stability of the mainland by
    emigration (of landless younger sons of nobles and other 'superfluous'
    men) and with these people build an army in Ionia, aiming to conquer the
    two great floodplains of the Hermus and the Maeander. The important Greek
    cities in this plan, in Homer's time, were Smyrna and Miletus. </p>
<figure><a class="piclink" target="_blank" href="images/ionia.jpg">
    <img class="fitpage"
         src="images/ionia.jpg" alt="map of ionia"
         height="50%" width="60%"></a>
    <figcaption>from: Bos schoolatlas, Map of Ionia</figcaption>
</figure>
<p>A glance at the map will show how little they succeeded. After a number of
    generations of this Ionian migration they still found themselves on a
    small strip of land on the coast, 'leaning against the shore', as Homer
    calls it, unable to defeat the inhabitants of the plains who were both
    numerous and skilled in fighting. This caused a crisis for, while
    immigration went on, the available land did not grow. So the Neleids' plan
    had to be put on hold, emigration redirected to other lands. Miletus, for
    instance, even became the mother city to a large number of settlements
    elsewhere. </p>
<p>The focus of Homer's story seems to be on Smyrna, situated near the
    Hermus delta, separated from the plain by mountains. The Hermus plain,
    later to become Lydia the richest country of the time, was not yet unified
    but it was led to a degree from a high, impregnable stronghold called Sardis. </p>
<figure><a class="piclink" target="_blank" href="images/Sardis1.jpg">
    <img class="fitpage"
         src="images/Sardis1.jpg" alt="the acropolis of Sardis"
         height="50%" width="60%"></a>
    <figcaption>from: Sardis, G.M.A. Hanfmann</figcaption>
</figure>

    <p>As the
    poet Mimnermus of Colophon (his name means 'remember the Hermus')
    testifies, troops from Colophon and Smyrna fought many a battle in this
    plain, without success. </p>
<p>Sardis is Smyrna's Troy. Homer carefully avoids all mention of Smyrna and
    Sardis or any open reference to the contemporary situation. We may suppose
    that the whole cycle of stories about Menelaos and Helen and the thousand
    ships that sailed to get her back, functioned like a charter-myth for the
    migrants to justify their conquering 'Troy'. Living in a city at war, it
    is a dangerous thing to say "you can't win this" and that is exactly what
    Homer is doing, as well as criticizing the in-revenge-for-Helen concept.
    The situation in Smyrna in his day must have been very feverish and tense.
    While they went on the attack sometimes, the very presence of their
    enormous city wall also shows that they were under real threat. The climax
    of the Iliad is the freeing of the beleaguered Achaean 'city' (it's a shipcamp with a wall)
    by Achilles, the 'Hero of the counter-attack'. Its conclusion is:
    defend your city with all your
    might, but do not go to the gates of Troy for it will be your death. </p>
<p>A song with controversial subject like the Iliad could not have been sung
    without the backing of powerful patrons. The Neleids would certainly have
    been outraged by it. (This also ties in with the tradition of Homer's
    exile from Smyrna, which was ruled by a member of the Neleid family.) My
    guess is that there was a strong movement for the pacification of Greece
    and the end of stasis. Linked to this are the foundation of Delphi, the
    formation of regional leagues, the establishment of the Olympic games and
    the creation of a more or less unified olympic religion made known by
    cycles of stories of heroes from all over Greece and hymns to the gods
    defining their sphere of power (such as Hesiod), and a definition of the
    polis. This pacification of Greece also included Ionia. </p>
<p>The attempt to freeze the political situation for instance, is nicely
    reflected in the story of Helen: Menelaos (Sparta) had been acknowledged
    victor (the most powerful one), possibly after the first Messenian war.
    Symbol of this is Helen, the Prize. Everyone agreed to come to Menelaos'
    aid if anyone attempted to steal Helen (victory) from him. </p>


<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
