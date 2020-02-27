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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Explanation</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body style="direction: ltr;">
<div id="expltext" class="latin">
    <h1>Interpretation</h1>
    <h3>The Chimaera Model</h3>
    <p>A useful metaphor for the top level structure is the Chimaera<a class="ptr">(0)</a> (she-goat),
        a fire-breathing monster killed by Bellerophon (Il 6.179-) that has three parts and four legs: a lion
        in front, a snake at the rear and a goat in the middle<a class="ptr">(2)</a>.
        The Iliad divides into three battle parts: the immortal hero - the plan of Zeus - the mortal
        hero. The first and last of these have two 'embassy and assembly' episodes, dedicated to
        'talk' rather than battle. These are the four legs of the beast. For more on the structure,
        see <a class="textlink" target="pageframe" href="themata.php" title="load themata page">here</a>.

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
    <a id="2:1.1">&nbsp;</a>
    <h3>I: The Immortal Hero</h3>
    <p>
        Diomedes, the 'head' of the chimaera, forms the centre piece of this triptych. His aristeia
        is surrounded by two 'truce and duel' themata which really would make sense mainly in the
        beginning of the war. Thus this thema is firmly associated with 'yesterday' or 'what was'.
        The B themata look like ironical comments on the 'abduction of Helen' motif,
        the supposed cause of the war. Ironical because, in the real world, impossible.
        They appear to refer to each other rather than to Diomedes' aristeia proper. More about them ad loc.<br>
        The tone of this whole thema is somewhat lighthearted and ironical, a tone which gradually
        changes into the tragic as the poem progresses through the other two top-level themata.<br>
        In the E&A parts of the 'immortal hero', Achilles chooses life. In the Quarrel with Agamemnon,
        when he sheaths his sword, in E&A 2, the Embassy, when he refuses to go to battle.
        In E&A 3, he chooses death (as does Hector). In 4, he is virtually dead already and his proxy Patroclus actually
        is. For more on Diomedes see <a class="explink" title="link to explanation page" data-ref="3:3.15">here</a>.
    </p><br>
    <a id="3:3.15">&nbsp;</a>
    <h5>Diomedes' aristeia<a class="ptr">(7)</a></h5>
    <p>
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
    <a id="2:11.1">&nbsp;</a>
    <h3>II: The Plan of Zeus </h3>
    <p>
        The middle part tells us the harsh reality of war. The name comes from Il 2.3-4 where Zeus is pondering
        how to honour Achilles and decides to have many Achaeans slaughtered. This is first part of a Plan whose
        full meaning only becomes clear in book 24, with Priam's embassy to Achilles.<br>
        The day starts with the confident marching out of the Achaeans, and it ends with Menelaos
        desperately defending the body of his comrade and Antilochos running for help to Achilles. In the
        middle, an irreverent story about Hera trying to get her way by seducing Zeus

        Their manipulation of Patroclus (the Achilles) is a
        trick (metis) and Homer makes it quite clear. See <a class="textlink" target="pageframe" href="goat.php"
            title="page about scapegoats">here</a>.
    </p>
    <br>
    <a id="3:13.1">&nbsp;</a>
    <h5>Idomeneus' aristeia</h5>
    <p>pom pom pom</p>
    <br>
    <hr>
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
    <a id="4:20.1">&nbsp;</a>
    <h5>The gods may help you...</h5>
    <p>
        ti ti ti
    </p>
    <hr>
    <h3>The Chimaera's legs</h3>
    <a id="3:1.1">&nbsp;</a>
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
        <li>This is <em>my</em> image. I'm not sure Homer
            uses it in this manner, but the the likeness is too good to pass up.
        </li>
        <li>Oliver Taplin also sees a 'three-arched structure on four
            pillars' but his is not quite like mine.
        </li>
        <li>a part of the poem with a typical structure (introduction - battle, where the introduction
            is typically made up of arming - praying - exhortation - marching out), likely an independant
            form of praise poetry describing the excellence in battle of one hero.
            There are 4 complete aristeia's in the Iliad: those of
            Diomedes, Agamemnon, Patroclus and Achilles. The latter two are presumably the most typical
            and un-ironical. Idomeneus and Menelaos also get a large stretch mainly devoted to them but they
            are not standard aristeia's.
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
