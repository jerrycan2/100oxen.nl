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
    <title>Agamemnon's council</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Agamemnon's council</h1>
<p>
    Agamemnon's council (Il 2.402-3):<br>
</p>
<ol>
    <li><h4>Agamemnon and Menelaos: the old king - the young one</h4>
        They are the only ones who go out to get Helen directly. The others go
        because of a promise.
        Agamemnon is not presented very favourably. He has to be obeyed of course because he is
        the leader and that is how armies work. But the poet shows him:
        <ul>
            <li>refusing Chryses, keeping Chryseis "because he likes her better than his own wife"</li>
            <li>mishandling the Achilles situation</li>
            <li>accepting the wrong advice (Nestor) and the Evil Dream</li>
            <li>being harsh (Adrastos episode, Il 6.37)</li>
            <li>giving up too easily: in Il 11.264- he fights on until the pain becomes "like the pain of a
                woman in childbirth".
                Winning a war demands more than that, certainly more than quitting on a pain that every
                woman has to go through.
            </li>
        </ul>
        Rhetorically of course his greatest sin is the insulting of our greatest hero.<br>
        Menelaos is one of the addressee figures of the poem. He is "you" because "you" are
        going out to fight and capture girls, and dream of honor and great victories. The basic
        ironical contrast between your naive expectations and the actual situation you will find
        yourself in, is the main point of Menelaos' Aristeia (book 17): instead of winning honor
        and prizes, you will be fighting desperately for your life and to recover the dead body
        of your friend.<br>
        Part of the rhetorical picture is that he is young, but a dutiful soldier: he never
        shirks and he is always there where older, cleverer soldiers like Agamemnon, Idomeneus, and Odysseus
        leave him to do the work.<br>

        <br>
    </li>
    <li>
        <h4>Idomeneus and Diomedes: the old hero, the young one</h4>
        Idomeneus seems to be the type of the older, highly aristocratic 'professional soldier'.
        He is honored most by Agamemnon (Il 4.255-), traces his lineage back to Minos himself.
        Idomeneus is not a shining example of eagerness to fight (like Antilochos for instance),
        see the humorous exchange he has with his therapon Meriones in his aristeia (Il 13.206-).
        He does know how to fight well, he also knows to get out before things get too rough,
        leaving his therapon to do the fighting (as Achilles does).<br>

        Diomedes has no therapon to take his place but he is learning the survival-knowledge of an Idomeneus.
        In Homeric terms, this is "recognizing the gods" and drawing one step back before they kill you.
        Diomedes is an ironical fantasy, in that the basic conundrum of Homeric warfare: how to find the
        very narrow middle between "not far enough" and "too far" is not a problem for him: with the
        help of Athena, the goddess of know-how and know-when, he can easily do this.
        He can be very brave and take great risks, but we all know no harm will ever come to him,
        as is proved by his easy sailing home in the Odyssey.<br>
        <br>
    </li>
    <li>
        <h4>The Aiantes</h4>
        Telamonian Aias gets a very positive picture: he is the 'bulwark of the Achaeans', he is
        always there where the situation is dire and he is near-unbeatable.
        In short, he is the warrior every king or war-leader
        would like to be and be seen to be. It is Aias with his laconic remarks who
        <em>almost</em> gets Achilles to fight again. Without him, the Achaeans would have been
        wiped out. Yet he is not a winner. He gets unmanned by Hector in defense of the ships, he
        loses to Odysseus in the contest for Achilles' armor. Athena, the goddess of Victory,
        never helps him. He is a kind of Cinderella-hero: doing all the work, getting no reward.<br>
        The Greater Aias is not a runner, but his companion, the son of Oileus, is. He is known
        most of all for his skill in pursuing enemies on the run (Il 14.520-). Apart from that
        he is shown to be a brave warrior. Both of them are aspects of Achilles: Ach. is 'greater'
        in the sense that he is a hero of the counter-attack: he frees a beleaguered city from
        the enemy so he is a defensive hero. In Achilles' aristeia however, his main occupation
        is 'running': slaughtering enemies on the run. This is useful in war and gives you a reputation,
        but Homer makes the silent point that it is not quite as honorable.<br>
        <br>
    </li>
    <li>
        <h4>Nestor and Odysseus, the two councillors</h4>
        Nestor represents the 'sweet voice' of heroism. Naturally he appears as an old man telling
        tall tales.
        Even in the modern world, we still love
        to hear this voice ("when the going gets tough, the tough get going"). We may need it to
        keep us going but Homer has a few reflections to show us, perhaps to ensure that it is not the
        only voice that we listen to.<br>
        <ul>
            <li>He is often wrong. It is no accident that the 'Lying Dream' of book 2 comes in
                the likeness of Nestor.
            </li>
            <li>His advice is often of the "I cannot do it, you must do it" kind. This is because
                Nestor is an old man and has an excuse, but this is also a typical characteristic of
                heroic advice.
            </li>
            <li>He is harsh. His father's name Neleus (the pitiless) is quite fitting: Nestor is the
                only survivor of 12 brothers. How hard it must be to be a son of Nestor, is shown in
                the picture of his brave son Antilochos. It is almost ensured that the latter
                will get himself killed in his drive to prove himself.
            </li>
            <li>It is Nestor who brings out the slogan "let no one go home before having slept with
                the wife of some Trojan..." (Il 2.354-)
            </li>
            <li>Nestor and his pupil Diomedes think that "courage (ἀλκή) is the greatest force (Il 9.39)":
                if you have enough fighting spirit, you can do anything.
                This is a form of magical thinking in which
                the will can shape reality, if we just will it hard enough. The poets are here
                to remind us that <em>Zeus</em> is the greatest force.
            </li>
        </ul>
        ...
        <br>

    </li>
</ol>
<p>
    These eight little birdies have a mother-bird: Achilles (Il 2.308-316, Il 9.321-)
</p>
<br><br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
