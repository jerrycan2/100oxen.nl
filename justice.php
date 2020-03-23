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
    <meta name="Description" CONTENT="The role of Zeus and justice in ancient poetry and philosophy">
    <title>Zeus and Justice</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
            type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/table.css');?>">
</head>
<body class="latin">
<h1>Zeus and Justice</h1>
<p>
    The dramatic climax of the Iliad is the killing of the leader of the Trojan army, Hector, by the
    Achaean hero Achilles. The latter is irresistible in his blind fury and revenge because Hector was
    the killer of Achilles' friend Patroclus. All by himself, Achilles slaughters half an army. This
    fury, mēnis, is the first word of the Iliad and its primary theme. Mēnis is a word that is used only
    for gods and for Achilles. It is often appropriately translated as "wrath". This scene you might call
    the epicenter of the Iliad.<br>
    Just before that moment Zeus, the god of Fate, balances his scales, symbol of Justice, in an iconic
    gesture measuring the Kēres (doom) of the two heroes. Hector's side goes down to Hades,
    Achilles' Kēr goes up (towards Ouranos, heaven). So it goes. For a long time I wondered if that was
    Homeric Justice.
    Achilles, although a Greek, is a furious monster. His friend Patroclus has only himself to blame
    for his death, Homer makes that very clear. Hector, although a non-Greek, is a real mensch, a
    hero we would like to be, giving his life for his wife, child and city. This, too, is shown with
    great emphasis and pathos. This is a really curious contradiction in the rhetoric of the poem. Still, it is Zeus who
    holds the
    scales, i.e. makes the judgement. How is this just?
</p>
<p>
    If the god of Fate is also the god of Justice, and Fate is "what happens", does that mean that
    everything that happens in the world (or in the Iliad) is just? We know better than that.
</p>
<p>
    But, as always, the answer is provided within the picture. Balancing scales that go down on
    one side, are of course not "straight", not just. Scales that are perfectly balanced are the
    image of justice (Il 12.433-<a class="ptr">(1)</a>). This Zeus with his unequal balance is showing us a judgement
    that
    <em>claims</em> justice but is really one-sided only. It is only just from Achilles' point
    of view.<br>
    Homer does not tell us this, we are supposed to see this ourselves. It is this image that
    made me understand that Homer's gods are not absolute. They are not beings "out there", distinct from us, but <em>phenomena</em>:
    we see and evaluate the world through their eyes subjectively.
    Achilles' mēnis is the wrath of Zeus, but it is the Zeus of Achilles. The latter is filled with
    Justice, or rather self-justification. First in his anger with Agamemnon, later in his
    implacable fury with Hector, for taking Patroclus (i.e. his honour) away from him. But is it Zeus who tells him to
    act this way? Actually his behaviour
    is driven by other gods.
    Homer shows this, too (Il 1.212-, 18.356-)<a class="ptr">(2)</a>. Achilles does not know himself.
</p>
<figure><img class="fitpage" alt="gnothi seauton" src="/images/gnoti.jpg">
    <figcaption>Know Thyself</figcaption>
</figure>
<p>
    So far, this is clear. But it leads to an ethical paradox: <br>
    The image of the scales is about your <em>share</em> (Moira or Aisa = share = fate). The
    archetype is the sharing out of booty by the commander after a successful raid, or the
    share one gets in the common feast meal where everybody gets his portion according to
    status (Il 4.257-). Seen as a one-to-one transaction, the question is: how much for me,
    how much for you<a class="ptr">(2)</a>. The measure of my justice is the proportion I assign to myself. <br>
    This points to one of the motto's of Delphi: Mēden Agan, "not too much". The winner cannot take it
    all. There must be a balance weighing <em>two</em> portions. Zeus is the god, the <em>only</em> god,
    who knows the other person. All the other gods know only one: "me".
</p>
<p>
    So the size of my portion is the measure of my <em>injustice</em> (in your eyes). If you get
    nothing or less than you think you deserve, you are in your own eyes perfectly just (and angry). <br>
    The loser of the judgement goes to Hades, literally or figuratively. Homer has a little pun with a deeper meaning:
</p>
<div class="indent">
    Who are the most just people in the world? The Abioi (wordplay on a-bios: "without life").<br>
    Why? None of them ever committed a crime. <br>
</div>
<p>
    The people in Hades, having no share in anything, are by the law of the balance
    the most just people.
    The poet probably associated the word "Hades" with "not being seen" e.g. Il 5.845), just as
    he associates the mountain "Idē" (seeing) with Zeus' favourite lookout<a class="ptr">(3)</a>.
    Justice is dependent on seeing - seeing the rights of the other person.<br>
    Here lies the problem of judging: one of the parties is judged to be in the right, his side
    of the scales will go up. The loser finds himself disregarded, unseen. But this
    makes him automatically the most just (in his own eyes)! And if this Zeus comes down to
    earth, you had better beware...
</p>
<p>
    Here, as is shown by the figure of Achilles, is the paradox of justice. Zeus is not only a loving
    god who tells us to share equally, he can also be a harsh and unreasonable god. Zeus is a
    god to be feared, the god of vengeance. There are of course echo's of the bible here. The
    problem lies in our <em>judging</em>: when we judge we hold the scales, we take a position
    that we should not,
    because we do not have the "god's eye view", we only know ourselves. Adam and Eve's sin is not
    so much the disobeying of a command, it is the judging, the presumed knowledge of good and evil.
</p>
<p> Here also lies
    the root of the problem we have with understanding it: Zeus does not mean absolute
    justice, it means Achilles' - our - justice. The absolute (in Greece) was only invented or properly
    formulated by Plato. This immediately raises questions about Zeus. Relative justice? That
    does not mean anything at all. It only means that everybody thinks himself just. To see
    why Zeus would still be a worthwhile god, we need to take a detour to Plato.
</p>
<h4>Plato has an Idea</h4>
<p>
    So, how can we live with this? We already ate from the tree and there is no going back. Does
    the freedom we have under Zeus make itself impossible? Plato would affirm this and proceeds,
    in the Republic, to abolish it. What we need according to him, is a sovereign Idea of the Good
    that is to be the philosopher-king's guiding light. This is quite different from the Rule of
    Zeus. Let us compare Zeus' order with that of Plato
</p>
<br>
<section id="table1" class="tablewrap">
    <div id="tableheader">
        <div class="tabcell">
            <p>Homer's gods</p>
        </div>
        <div class="tabcell middle">
            <p>&nbsp;</p>
        </div>
        <div class="tabcell">
            <p>Plato's Good</p>
        </div>
    </div>
    <div class="tablerow">
        <div class="tabcell">
            <p>
                <br>
                <img src="images/zeus3.png" alt="Olympic hierarchy" title="Zeus and the goddesses, hierarchy">
                <br>
                <span class="gold">Zeus</span> is supposed to be in charge. He boasts of being stronger than all the
                other gods together but
                appears to avoid putting it to the test. See "the golden rope", Il. 8.19. <span class="red">Hera</span>
                is number two though she
                wants more, <span class="blue">Athena</span> is Tritogeneia, third-born (just as Zeus became first-born)
                and
                <span class="green">Aphrodite</span> is fourth, though sometimes stronger than Zeus himself.
            </p>
        </div>
        <div class="tabcell middle">
        </div>
        <div class="tabcell">
            <img id="thegood" src="images/platogood.png" alt="Plato's view of the Absolute Good"
                    title="Plato's view of the Absolute Good">
            <p>
                The solid red part is our Nomos, its border is Sophrosyne
            </p>
        </div>
    </div>
    <p><br>
    </p>
</section>
<br>
<br>
<hr>
<ol id="footnotes">
    <li>
        The image of the balance in this citation is used to indicate that the <em>fates</em>
        of the two parties are equal - fate is justice again. In the simile, the woman has to balance the wool and the
        weights perfectly:
        too much and she might get accused of cheating by a stingy patron, too little and she does not
        earn anything. That is δίκαιος.
    </li>
    <li>
        For a further development of this statement, see <a class="textlink" title="about Achilles" target="_self" href="<?php echo autoversion('/achilles.php#wrath');?>"</a>the page about Achilles</a>.
    </li>
    <li>
        We should not have a too materialistic view of this. For the Greeks, <em>honour</em>
        (also a zero-sum commodity) was at least as important: the material portion was for the most part
        a public acknowledgement of this. When the Spartans proudly called themselves "equals", they
        meant equal in honour, not in wealth (which they were not).
    </li>
    <li>
        Zeus is "Ἴδηθεν μεδέων", roughly translatable as "he rules by seeing"
    </li>
    <li>
        Is this why Crete is associated with lying? Rhea's plot was the first lie.
    </li>
    <li>
        M.L. West, Theogony pg. 29
    </li>
</ol>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
