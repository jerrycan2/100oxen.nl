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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Explanation of themata</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body style="direction: ltr;">
<div id="expltext" class="latin">
    <h1>Inter&#8203;pretation</h1>
    <h3>The Chimaera Model</h3>
    <p>The Iliad divides into three<a class="ptr">(1)</a> battle parts: the immortal hero - the plan of Zeus - the mortal
        hero. An apt metaphor for the top level structure is the Chimaera<a class="ptr">(2)</a>
        (she-goat),
        a fire-breathing monster killed by Bellerophon (Il 6.179-) that has three parts and four legs:
        a lion (representing the immortal hero Diomedes)
        in front, a goat (a common sacrificial animal) in the middle and a snake
        at the rear (representing the mortality of the main hero). All this will be explained below in
        commentaries on the individual parts.
        The first and last of the three parts each have two "embassy and assembly" episodes, dedicated to
        talk rather than to battle. These are the four legs of the beast. All the E&A parts are mainly
        focused on Achilles. The first two deal with his absence, the last two with his coming back.<br>
        The boundaries of the parts (or "themata") have been chosen because of a strong shift of focus
        there in the poem and because of internal symmetry. Some parts fall more or less outside the
        symmetry of the structure: mainly the proem, the catalogue of ships, Patroclus' funeral games
        and the "introduction" of the aristeia's, typically an arming and marching out part.
        The Embassy and Assembly 2, books 8-10, are a bit of an anomaly. This is dealt with
        <a class="textlink" title="anomalies" target="pageframe" href="<?php echo autoversion('/stitches.php');?>">here</a>.
        <br>
        For more on the structure,
        see <a class="textlink" title="load themata page" target="pageframe" href="<?php echo autoversion('/themata.php');?>">here</a>.
        There may also be a <a class="textlink" title="time-structure" target="pageframe" href="<?php echo autoversion('/days.php');?>">time-structure</a> corresponding to the "what was, what is and what
        will be"
        which is the expertise of the seer Kalchas (Il 1.70). So the first part would refer to the past,
        the middle part, the long day of battle, to the present (Homer's present of course) and the last,
        the Achilles part, to the future. More about this ad loc. <br>


        <figure><a class="piclink" target="_blank" title="Chimaera" href="images/chimaera3.jpg"><img class="fitpage" alt="Chimaera" src="images/chimaera3.jpg"></a>
            <figcaption>The Chimera on a red-figure Apulian plate, c. 350–340
                BC (Musée du Louvre) <br>
                Picture and text from <a class="textlink" target="_blank" title="Chimera"
                                         href="https://en.wikipedia.org/wiki/Chimera_%28mythology%29">
                    wikipedia</a> <br>
            </figcaption>
        </figure>
    </p>
    <br>
    <hr>
    <a id="1:1.1">&nbsp;</a>
    <h3>I: The Immortal Hero</h3>
    <p>
        In the E&A themata of the "immortal hero", Achilles chooses life. In the quarrel with Agamemnon,
        when he sheaths his sword; in the Embassy of E&A 2, when he refuses to go to battle.
        In E&A 3,he chooses death (as does Hector). In 4, he is virtually dead already and his proxy
        Patroclus actually is. This fits the "immortal" in the title of the thema.
        The picture that
        Homer draws of Diomedes, the too-good-to-be-true hero, is another reason for this title.
        For more on Diomedes see <a class="explink" title="link to explanation page" data-ref="2:3.15">here</a>. <br>
        The focus on Diomedes is no reason to associate this part with the past. The two
        "Truce and duel" themata surrounding his aristeia are. Also, the focus on the absence of
        Achilles.



    </p><br>
    <a id="2:3.15">&nbsp;</a>
    <h4>Diomedes or 'How to be a Hero'</h4>
    <p>
        The head of the chimaera has Diomedes' aristeia as the centre piece. The head is of course
        the most heroic part of the animal: it breaths fire. The aristeia
        is surrounded by two "truce and duel" themata which really would make sense mainly in the
        beginning of the war. So this thema is firmly associated with "yesterday" or "what was".
        Moreover it is not dedicated to Diomedes only. The two duels are a comment on proper
        heroic behaviour: a) take responsibility and b) be brave. In a heroic society the whole
        Helen-affair should have been settled by a duel, an ordeal, as the closest approximation
        to justice available. First the two most interested parties. That however, is not a
        realistic option: see below. The next possibility is a duel of both side's champions.
        All duellers do as they ought to do even though some of them are not strong fighters.
        Paris has to be shamed into this, an echo of Achilles. They do this for their own honour or
        for their comrades. <br>
        The tone of this whole part is somewhat lighthearted and ironical, a tone which gradually
        changes into the tragic as the poem progresses. This characterizes the poet's approach to
        Diomedes as contrasted with Achilles, the tragic hero. Diomedes gets his golden armour
        at a very cheap price<a class="ptr">(1)</a>, Achilles pays for his with his life and that of his comrade. <br>
    </p>
    <a id="3:4.220">&nbsp;</a>
    <h5>Diomedes' aristeia<a class="ptr">(7)</a></h5>
        Diomedes is an ironical hero. The irony already becomes clear in the introduction
        where Agamemnon does the round of his troops and manages to say just about the wrong thing
        to everybody. An introductory episode was very likely a traditional part of an
        aristeia, a laudatory poem for a warrior: compare the more traditional sounding
        intro's to Patroclus' and Achilles' aristeia's. Diomedes does not get such a glorious
        'arming and marching out' picture, he gets unfairly dissed by Agamemnon. He is a good
        soldier though, does not talk back to his commander. The unspoken consequence of this
        scene, is that Diomedes is extra motivated to prove his worth on the battlefield.<br>
        Note the likeness to - and contrast with Achilles who also gets insulted by the king.
        More severely wounded in his honour, Achilles withdraws as a result of this. Both heroes
        have a special relation to Athena, again with a difference: she makes the 'wounded'
        Achilles withdraw from the fight, she heals the physically wounded Diomedes and
        makes him fight with redoubled fury.<br>
        Athena likes Diomedes. He prays to her and she not only heals him, she teaches him
        'to know gods from men'. In Homeric parlance this means to know exactly how far you can go
        and take a step back when faced with a fight you cannot win, i.e. your fate. This
        is demonstrated in Diomedes' confrontation with Apollo, the first of three such in the poem.
        Patroclus goes too far and dies, Achilles in ironic reversal is 'like a god', and survives
        the confrontation when he attacks Hector who is under the protection of Apollo.<br>
        For the extraordinary scene of Diomedes chasing Aphrodite from the battlefield, see
        <a class="textlink" target="pageframe" href="helen.php" title="about Helen, Ares and Aphrodite">here</a>.
    </p><br>
    <hr>
    <a id="1:11.1">&nbsp;</a>
    <h3>II: The Plan of Zeus </h3>
    <p>
        The middle part tells us the harsh reality of war. The name comes from Il 2.3-4 where Zeus is pondering
        how to honour Achilles and decides to have many Achaeans slaughtered. This is first part of a Plan whose
        full meaning only becomes clear in book 24, with Priam's embassy to Achilles.<br>
        This thema forms the transition between the immortality and the mortality of the hero. The stories of Idomeneus, Patrocles, Menelaos and Hector illustrate this learning curve.
        The day starts with the confident marching out of the Achaeans, and it ends with Menelaos
        desperately defending the body of his comrade and Antilochos running for help to Achilles. In the
        middle, an irreverent story about Hera trying to get her way by seducing Zeus. In the middle of <em>that</em>, the counterattack: a short preview of Patroclus' aristeia surrounded
        by warning flags: this cannot happen, Zeus does not sleep, you cannot win "against fate".

        Their manipulation of Patroclus (the Achilles) is a
        trick (metis) and Homer makes it quite clear. See <a class="textlink" target="pageframe" href="goat.php"
            title="page about scapegoats">here</a>.
    </p>
    <br>
    <a id="2:13.1">&nbsp;</a>
    <h5>Idomeneus' aristeia</h5>
    <p>pom pom pom</p>
    <br>
    <hr>
    <a id="1:18.1">&nbsp;</a>
    <h3>III: The Mortal Hero</h3>
    <p>
        Patroclus, of course, is <em>an Achilles</em>. He
        is "the mortal hero" and the addressee of the poem. The shock and
        horror of the Achaean near-defeat and Patroclus' death are healed by
        what seems very much like a revenge fantasy, the rampage of Achilles.
        Justice at work again: if you want too much (like Patroclus), you pay
        for it with your life. Achilles avoids his fate in the Iliad, but
        everyone knows what will happen: one day he will go too far, just like
        his friend. He is still the greatest of heroes though: a 'hero of the
        counter-attack' who takes revenge for and <em>heals</em>
        the suffering of the population during the siege and
        who in so doing gives up his life as per Thetis' prophecy.</p>
    <br>
    <a id="3:20.1">&nbsp;</a>
    <h5>The gods may help you...</h5>
    <p>
        ti ti ti
    </p>
    <hr>
    <h3>The Chimaera's legs</h3>
    <a id="2:1.1">&nbsp;</a>
    <h5>Embassy &amp; Assembly 1</h5>
    <p>A most carefully structured part of the poem. Two assemblies
        surround an intermezzo which is set up as a repeated sequence of
        themes. The assembly parts start off with a short introduction, first
        explaining the wrath of Apollo, then the plan/wrath of Zeus (both kill
        many Achaeans). Also Agamemnon's position is set out: he "obeys the
        wrong old man" (sending away Chryses and obeying the Dream in the form
        of Nestor). Agamemnon does not get a good press in Homer.</p>
    <br>
    <hr>
    <ol id="footnotes">
        <li>Oliver Taplin also sees a "three-arched structure on four
            pillars" but his is not quite like mine.
        </li>
        <li>This is <em>my</em> image. I'm not sure Homer
            uses it in this manner, but the the likenesses are too good to pass up.
        </li>
        <li>
            "χρύσεα χαλκείων, ἑκατόμβοι' ἐννεαβοίων" (Il 6.236): "gold for bronze, a hundred oxen
            for nine" see <a class="textlink" title="100 oxen" target="pageframe" href="<?php echo autoversion('/100oxen.php#100oxen');?>">here</a>.
        </li>
        <li>An aristeia is a part of the poem with a typical structure (introduction - battle,
            where the introduction
            is typically made up of arming - praying - exhortation - marching out), likely an independent
            form of praise poetry describing the excellence in battle of one hero.
            There are 4 complete aristeia's in the Iliad: those of
            Diomedes, Agamemnon, Patroclus and Achilles. The latter two are presumably the most typical
            and un-ironical. Idomeneus and Menelaos also get a large stretch mainly devoted to them
            but they are not standard aristeia's.
        </li>
        <li>sacrifice to the gods of a "hundred oxen" (or just many cattle), the ultimate
            sacrifice. Also simply meaning a great slaughter, like a battle.
        </li>
    </ol>
    <br>
    <br>
</div>
<div class="mtime"><br>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="scripts/jquery.nicescroll.min.js"></script>
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
