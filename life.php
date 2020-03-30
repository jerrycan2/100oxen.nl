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
    <meta name="Description" CONTENT="">
    <title>...</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Hypothetical life of Homer</h1>
<ul>
    <li> Born at the earliest first half 8th c. in Smyrna ("Melesigenes") into a branch of the Neleid clan</li>
    <li> these were a royal family from Pylos who claimed descent from Poseidon. They were very involved in the Ionian Migration (via Athens). [Hdt. 1.146]</li>
    <li> father: 'king' of the city, occupant of the Big House in Smyrna. In character like Peleus </li>
    <li> grandfather: the man who stole Smyrna from the Aeolians ("Autolykos<a class="ptr">(1)</a>")</li>
    <li> They must have justified their capture of Smyrna by claiming that they would conquer "Troy" (Sardis) for the Greeks.</li>
    <li> mother: a concubine, possibly non-Greek (ref. Aeneas). Is the only son for many years. His father treats him as a successor (ref. Peleus and Phoenix, Il 9.481-<a class="ptr">(2)</a>).</li>
    <li> Is from an early age (Il 18.569-) a talented singer, kithara-player and speechmaker in his
        father's service. But also an experienced soldier.</li>
    <li> younger half-brother, born from the wedded wife when H. was already at least a teenager</li>
    <li> The younger brother is to become king ("Achilles is nobler than you"- ref. Patroclus) (Notos - theme)</li>
    <li> H. will be 'commander of the army'? (Diomedes vs. Aineias scene)</li>
    <li> Quarrel with father and/or brother: goes into exile (Phoenix' , Patroclus' story etc.)</li>
    <li> Lives for a while as a professional soldier (Thrace? Egypt?)</li>
    <li> Ionia is by then 'full', with no prospect of growing larger. Economic crisis.</li>
    <li> Swears off his name (deal with family?).</li>
    <li> Goes to Kyme. Meets Hesiodos ("Aeolus") (ref. Life of Homer). </li>
    <li> Composes the Iliad. Starts living as an itinerant singer</li>
    <li> Sings for a large royal audience at "Amphidamas' funeral" in Chalkis (ref. "Contest of Homer &
        Hesiod")</li>
    <li> Travels extensively, singing the Iliad everywhere</li>
    <li> Finally settles in Chios (Volissos). Chooses this place because it is far from cities,
    and ships (e.g. from Smyrna) land there waiting for favourable wind before crossing the Aegean
        (Od 3.170-, 9.116-).
        <figure> <a class="piclink" title="modern Volissos" href="/images/Volissos vallei 1.jpg"><img
                class="fitpage" alt="" src="/images/Volissos vallei 1.jpg">
        </a> <figcaption>Modern <b>Volissos</b> on the northwest coast of Chios still has a tradition
            that Homer was a teacher there. It is the first place where a ship can beach
            when sailing around the rocky north side of Chios. It also lies "sloping to the west"
            and seen from there, obviously some of the Greeks live where the sun rises, some where
            it goes down. And of course, Chios is a wooded island just a short distance away from
            the land of the Cyclopes.</figcaption> </figure>

    </li>
    <li> Probably marries (again?). Has a daughter. ("Nausikaa")</li>
    <li> 'school forming' as with later philosophers. Becomes a kind of  teacher to admirers from all over Greece. (Proteus)</li>
    <li> Founds the Guild of Singers, the Homeridae. Composes the Odyssee, meant to be performed by his pupils. </li>
    <li> sings at Delos? (-> Hymn to Apollo)</li>
    <li> To facilitate training his rhapsodes, he and his pupils create written texts of both large poems (revising the Iliad?) (adapting the alphabet: creating long η and ω for the purpose) </li>
    <li> Has problems with eyesight in old age. The one who marries his daughter will be leader of the Homeridae ("Who can string my bow?")</li>
    <li> Dies: 7th c. ?</li>
</ul>

<br><br><br>
<hr>
<ol id="footnotes">
    <li>Admittedly Autolykos is Odysseus <em>maternal</em> grandfather. But he is described
        as the "greatest thief in the world" (Od 19.395-) which seems a good description for someone
        who steals a whole city.
    </li>
    <li>
        If this is true, the story that Phoenix tells is rather rough humour,
        a reversal of the picture that I give.
        Reversing wedded wife and concubine, he appears to say: "I slept with your mother, I could
        be your father". Note how his brother is the addressee, in a hidden way of course. Here in
        the shape of Achilles, but there are other possible examples.
        All this reminds of Hesiod's admonitory address to his brother Perses.
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
