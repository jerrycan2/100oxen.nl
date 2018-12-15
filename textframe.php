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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Explanation</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="css/common.css" type="text/css">
</head>
<body>
<div id="expltext" class="latin">
    <a id="1:1.1"></a>
    <h2>Interpretation</h2>
    <h4>The structure</h4>
    <p> The structure presented in the left-hand frame is an organization of
        the large and small themes of the Iliad, in the form of a hierarchical
        tree-structure. It is not meant to be a formal structure, nor does it
        claim to be the only possible arrangement. What it aims to do is present
        the themes in such a way that correspondences (that is, themes related
        by likeness and contrast) are emphasized by color and to show that they
        form <em>ring-structures</em> and <em>catalogues</em> all through the poem
        and on many levels (see <a class="textlink" target="pageframe" href="ring.php"
                                   onclick="parent.site100oxen.configColumns(0, 2, true)">ring.html</a>
        for more details).<br>
        What exactly constitutes a 'theme' and how best to formulate it, is of
        course not a self-evident matter. It cannot be separated from
        interpretation, therefore not from subjectivity, making the whole a
        possibly too flexible affair. It often depends on a judgement of "what
        the poet is trying to tell us here" which historically has led to an
        infinite number of wildly different interpretations. Nevertheless, some
        of the correspondences are too obvious and simple to ignore and they
        form the basis of our structure. This basis can help with the
        interpretation which in turn allows us a better view of themes. Thus we
        can bootstrap our way up the tree to the smallest structures.</p>
    <h4>The Chimaera Model</h4>
    <p>A useful analogy for the top level is the Chimaera<a class="ptr">(0)</a> (she-goat), a
        fire-breathing monster killed by Bellerophon (Il 6.179-) that has three
        parts: a lion in front, a snake at the rear and a goat in the middle<a class="ptr">(2)</a>.
        <figure><a class="piclink" target="_blank" title="Chimaera" href="images/chimaera3.jpg"><img

                class="fitpage" alt="Chimaera" src="images/chimaera3.jpg"></a>
            <figcaption>The Chimera on a red-figure Apulian plate, c. 350–340 BC (Musée du Louvre) <br>
                Picture and text from <a class="textlink" target="_blank" title="Chimera"
                                         href="https://en.wikipedia.org/wiki/Chimera_(mythology)">
                    wikipedia</a> <br>
            </figcaption>
        </figure>
    </p><p>
        I take the lion's head to stand for the 'immortal hero' (Diomedes), the
        goat as a (scapegoat-)sacrifice, i.e. Patrocles, and the snake as a
        symbol of death and the 'mortal hero' (Achilles). The four legs can be
        seen as the four 'embassy and assembly' parts that connect the three
        battle-parts. This description may need some clarification but I will
        provide this ad loc.
    </p>
    <p>
        Oliver Taplin talks about a 'three-arched structure on four pillars'
    </p>
    <p>The point is that the three parts create a balanced structure or <em>ring-structure</em> and the whole
        composition of the Iliad is based on that kind of structures. The
        principle is that a central part is surrounded by two parts that are
        related by sameness or contrast. Often they are a comment on the central
        part, though this is not always so. See the page about
        <a class="textlink" title="ring structures" href="ring.php">ring-structures</a>
        for more on the subject.</p>
    <p>The intention of all this is to make clear that the Iliad is a careful
        oral composition most likely by one man, using this structure as a mnemonic for
        organizing and remembering his poem. This is not something that is intended to be noticed by a
        listening public but a way to keep a handle on a large amount of
        material that would otherwise be amorphous and, even for someone from a
        scriptless culture, hard to remember. It should be noted that the
        Odyssey shows no trace of such a structure. This must mean that the
        latter poem is either by a different poet or by the same poet but not an
        oral composition. See here for a theory on that subject.</p>
    <br>
    <hr>
    <a id="2:3.15">&nbsp;</a> <a id="dio1">&nbsp;</a>
    <h4>I: The Immortal Hero</h4>
    <p>Diomedes' aristeia<a class="ptr">(7)</a> forms the
        centerpiece of the first part. I call him 'the Immortal
        Hero' because that is what he becomes through the help of Athena.
        He is basically an ironical Achilles. Ref. Il 5.118-20 where D. is angry,
        because someone hit him with an arrow and said he didn't have long to live...<br>
        Everybody loves him, especially Nestor, and he acquires a golden armor, the
        unfailing sign of immortal heroism. This picture is in strong ironical
        contrast with that of Achilles. The latter of course will never come
        home again and he knows it, he is the greatest hero <em>because he dies for us</em>,
        while D. will sail home without a hitch and is the
        first one to reach it.
        It is Athena who teaches him that. All he has to do is: learn to <em>distinguish gods from men</em> on the
        battlefield, i.e. know when to fight and when not to fight. Keep this in
        mind when we see Diomedes during Hector's attack on the wall and on the
        ships together with the other (conveniently) wounded heroes at the back
        Agamemnon, Odysseus and Nestor (see Il 11.407-10 for the standard
        heroic view), 'encouraging from behind' as Homer calls it. Diomedes'
        story is summed up nicely by Homer saying that Diomedes' deal acquiring
        his golden armour is like making a deal worth 'a hundred oxen for nine'
        (with double meaning: a hecatomb<a class="ptr">(1)</a> for nine oxen).</p>
    <br>
    <hr>
    <a id="2:11.1">&nbsp;</a>
    <h4>II: The Plan of Zeus </h4>
    <p>The middle part tells us the reality of heroic war. It starts with the
        confident marching-out of the Achaeans, and it ends with Menelaos
        desperately defending the body of his comrade and Antilochos running for
        help to Achilles. In the middle is a harsh analysis of the justice (in
        Achaean terms) of war, as the 'Plan of Zeus' comes to fulfillment. The
        scales of Zeus are the symbol of this justice: are you willing to pay
        for what you want? The Achaeans, when Poseidon is helping them, are not.
        Patrocles is, and Apollo makes him pay the price. This is why this part
        has the wonderful "deception of Zeus" episode at its center.  </p>
    <br>
    <hr>
    <a id="2:19.357">&nbsp;</a>
    <h4>III: The Mortal Hero</h4>
    <p>Patrocles, of course, is <em>an Achilles</em>.
        He is "the mortal hero" and the addressee of the poem. The shock and horror of the Achaean
        near-defeat and Patrocles' death are healed by what seems very much like
        a revenge fantasy, the rampage of Achilles. Justice at work again: if
        you want too much (like Patrocles), you pay for it with your life.
        Achilles avoids his fate in the Iliad, but everyone knows what will
        happen: one day he will go too far, just like his friend. He is still
        the greatest of heroes though: a 'hero of the counter-attack' who takes
        revenge for and <em>heals</em> the
        suffering of the population during the siege<em>
        </em>and who in so doing gives up his life as per Thetis' prophecy.</p>
    <br>
    <hr>
    <a id="2:1.1">&nbsp;</a>
    <h3>The Chimaera's legs</h3>

    <h4>Embassy &amp; Assembly 1</h4>
    <p>A most carefully structured part of the poem. Two assemblies surround
        an intermezzo which is set up as a repeated sequence of themes. The
        assembly parts start off with a short introduction, first explaining the
        wrath of Apollo, then the plan/wrath of Zeus (both kill many Achaeans).
        Also Agamemnon's position is set out: he "obeys the wrong old man"
        (sending away Chryses and obeying the Dream in the form of Nestor).
        Agamemnon does not get a good press in Homer.</p>
    <br>
    <hr>
    <ol id="footnotes">
        <li>it is doubtful whether Homer uses this analogy, but the the likeness is
            too good to pass up.
        </li>
        <li>Oliver Taplin also sees a 'three-arched structure on four pillars' but
            his is not quite like mine.
        </li>
        <li>a part of the poem with a typical formal structure (arming - marching
            out - doing battle), describing the excellence in battle of one hero.
            There are 4 complete aristeia's in the Iliad: those of Diomedes,
            Agamemnon, Patrocles and Achilles.
        </li>
        <li>sacrifice to the gods of a hundred oxen, the ultimate sacrifice. Also
            simply meaning a great slaughter, like a battle.
        </li>
    </ol>
    <br>
    <br>

</div>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script src="scripts/iframes.js" type="module"></script>
</body>
</html>
