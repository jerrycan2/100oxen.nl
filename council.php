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
    <meta name="Description" CONTENT="Characterization of the 8 major Greek heroes in the Iliad">
    <title>Agamemnon's council</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Agamemnon's council</h1>
<p>
    Agamemnon's council (Il 2.402-3): 8 little birdies caught by the snake. The birds have a mother-bird: Achilles (Il 2.308-16, Il 9.321-). The members all have something in
    common with the universal hero, each according to his own character and relation with the gods.
    There are four pairs:
</p>
<ol>
    <li><h4>Agamemnon and Menelaos: the old and the young king</h4>
        <b>Agamemnon</b> is not presented very favourably. He has to be obeyed of course because he is
        the leader and that is how armies work. But the poet shows him:
        <ul>
            <li>refusing Chryses, keeping Chryseis “because I prefer her to my wedded wife” (Il 1.113). This may be
                honesty but then as now, you cannot say such things without condemning yourself.
            </li>
            <li>mishandling the Achilles situation</li>
            <li>accepting the wrong advice (Nestor) and the Evil Dream</li>
            <li>being harsh (Adrastos episode, Il 6.37)</li>
            <li>giving up too easily: in Il 11.264- he is wounded but fights on until the pain becomes "like the pain of a woman in childbirth".
                Winning a war demands more than that, certainly more than quitting on a pain that every
                woman has to go through. Besides, he does not pray to the gods like Diomedes or Glaucos (Il 16.513-).
            </li>
        </ul>
        Like Achilles, he boasts of being the best of the Achaeans (Il 1.91), like Achilles he does foolish things when he is in the grip of anger (Il 1.101-, 19.85-).
        Rhetorically of course his greatest sin is the insulting of our greatest hero.<br>
        <b>Menelaos</b> is one of the addressee figures of the poem<a class="ptr">(2)</a>. He is "you" because "you" are young,
        going out to war and capture girls, and dream of honor and great victories (like Achilles).
        The basic
        ironical contrast between your naive expectations and the actual situation you will find
        yourself in, is the main point of Menelaos' Aristeia (book 17): instead of winning honor
        and prizes, you will be fighting desperately for your life and to recover the dead body
        of your friend. In the Odyssey he is not very happy about the whole affair (Od 4.97-). <br>
        Part of the rhetorical picture is that he is young, but a dutiful soldier: he never
        shirks and he is always there where older, cleverer soldiers such as Agamemnon, Idomeneus, and Odysseus leave
        him to do the work.<br>

        <br>
    </li>
    <li>
        <h4>Idomeneus and Diomedes: the old and the young soldier </h4>
        <b>Idomeneus</b> seems to be the type of the older, highly aristocratic 'professional soldier'.
        He is honored most by Agamemnon (Il 4.255-), traces his lineage back to Minos himself.
        Idomeneus is not a shining example of eagerness to fight (like Antilochos for instance),
        see the humorous exchange he has with his therapon Meriones in his aristeia (Il 13.206-).
        He does know how to fight well, he also knows to get out before things get too rough,
        leaving his therapon to do the fighting (as Achilles does).<br>

        <b>Diomedes</b> has no therapon to take his place but he is learning the survival-knowledge of an Idomeneus.
        In Homeric terms, this is "recognizing the gods" and drawing one step back before they kill you.
        Diomedes is an ironical fantasy, in that the basic conundrum of Homeric warfare: how to find the
        very narrow middle between "not far enough" and "too far" is not a problem for him: with the
        help of Athena, the goddess of know-how and know-when, he can easily do this.
        He can be very brave and take great risks, but we all know no harm will ever come to him,
        as is proved by his easy sailing home in the Odyssey. He is the perfect soldier:
        Unlike Achilles, when he is slighted by Agamemnon (Il 4.370-) he keeps his mouth shut and swallows the rebuke
        (though he does not forget it: Il 9.32-).
        <br>
    </li>
    <li>
        <h4>The Aiantes</h4>
        <b>Telamonian Aias</b> gets a very positive picture: he is the 'bulwark of the Achaeans', he is
        always there where the situation is dire and he is near-unbeatable.
        It is Aias with his laconic remarks who
        <em>almost</em> gets Achilles to fight again. Without him, the Achaeans would have been
        wiped out. Yet he is not a winner. He gets unmanned by Hector in defense of the ships, he
        loses to Odysseus in the contest for Achilles' armor. The goddess of Victory
        never helps him. He is the part of Achilles that speaks in Il 9.316-: 'I do all the work and get nothing for
        it'.<br>
        The Greater Aias is not a runner, but his companion, the <b>son of Oileus</b>, is. He is known
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
        <b>Nestor</b> represents the 'sweet voice' of heroism. In this capacity he rules the young generation (Il
        1.252). He appears as an old man telling tall tales but he is more than that: as Achilles is the best man in
        battle, Nestor is the best in assembly, winning every debate.<br>
        Even in the modern world, we still love
        to hear this voice ("when the going gets tough, the tough get going"). We may need this voice to
        keep us going but Homer has a few reflections to show us, perhaps to ensure that it is not the only voice that
        we listen to:<br>
        <ul>
            <li>He is often wrong. It is no accident that the 'Lying Dream' of book 2 comes in
                the likeness of Nestor.
            </li>
            <li>His advice is often of the "I cannot do it, you must do it" kind. This is because
                Nestor is an old man and has an excuse, but this is also a typical characteristic of
                heroic advice.
            </li>
            <li>He is harsh. Not just to his enemies, but to his own: his father's name Neleus (the pitiless) is quite
                fitting: Nestor is the
                only survivor of 12 brothers. How hard it must be to be a son of Nestor, is shown in
                the picture of his brave son Antilochos (the first to kill a man, Il 4.457). It is almost ensured that
                the latter
                will get himself killed in his drive to prove himself.
            </li>
            <li>It is Nestor who brings out the slogan "let no one go home before having slept with
                the wife of some Trojan..." (Il 2.354-)
            </li>
            <li>Nestor and his pupil Diomedes think that "courage (or fighting spirit, ἀλκή) is the greatest force (Il
                9.39)":
                if you have enough fighting spirit, you can do anything.
                This is a common form of magical thinking in which
                the will can shape reality, if we just will it hard enough. The poets are here
                to remind us that <em>Zeus</em> is the greatest force.
            </li>
            <li>
                The 'voice of heroism' may not always be a completely sober voice: Il 11.636-7, 8.232-3
            </li>
        </ul>
        <br>
        <b>Odysseus</b> the calculating hero (Il 11.401-), the champion of Athena and of <em>metis</em> (cleverness). Unlike Nestor, he is usually right. In
        the Iliad he does not yet have the prominence that he has in the Odyssey and where he does (in the Doloneia for
        instance, or in the second assembly) there is some suggestion of late addition by the poet. Here I will limit
        the view to the Iliad.<br>
        Like Achilles, Odysseus is slighted by Agamemnon (Il 4.349-). This irritates him a little and he also has a <em>wrath</em>, albeit a short one (Il
        4.494-). When Achilles obeys Athena in book 1, he is making a calculating move, aimed at his own advantage. At this
        moment he is acting like an Odysseus. This strategy fails because it causes the death of Patrocles and thus
        indirectly his own death. Could this be what Demodokos is referring to when he sings of the 'quarrel of Odysseus
        and Achilles' in Od. 8.75-? On a literal level, it would be unfair to blame Odysseus for this. But on a deeper
        level, it could be said that Achilles goes through a phase of 'being an Odysseus' until he finds out the consequences of this choice. In other words, that Zeus is stronger than Athena.<br>
        This difference between Odysseus and Achilles shows why Achilles is the greater hero: Odysseus <em>knows no shame</em>.
        <br>
    </li>
</ol>
<p>
    So, not only is Achilles greater than any of the other heroes, he is <em>all of them</em>. There is no question of
    his greatness. The question that Homer poses us, is: is this beautiful?
</p>
<br><br>
<hr>
<ol id="footnotes">
    <li>
        In direct address by the poet, e.g. Il 4.127, 4.146, 7.104 etc.
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
