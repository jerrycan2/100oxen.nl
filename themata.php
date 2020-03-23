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
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description"
            content="Thematic structure and ring composition, the basic plan of the Iliad.">
    <title>Thematic structure</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext" rel="stylesheet"
            type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<p align="center"></p>
<h1>Thematic Structure</h1>
<p>The collapsible list called 'Thematic Structure' or 'Map' in the
    leftmost column is an attempt to discover a plan, an underlying recursive <em>structure of ideas</em> that shapes
    the whole composition. I divided the poem into short
    segments (mostly less than 10 greek lines) representing - as much as possible
    - a single topic. These, the lowest level of my tree<a class="ptr">(1)</a>, I call 'segments'.
    These segments are gathered together in groups called "themata"
    (θέμα: I give it a meaning close to, but not exactly "theme") in such a way that they fit
    together naturally and bring out the
    organisation of&nbsp;ideas that govern the text. A thema can represent the simple <em>topic</em> of a segment or of
    a stretch of (child-)themata, it can also bring out the underlying <em>theme</em> of that part of the poem,
    especially on higher levels. It is often difficult to distinguish theme and topic
    so I decided to use a different word. Different topics can have the same theme, especially within the same structure. This is important for interpretation, it can help us figure out what the local
    theme is. A task of the "explanation page" is to make clear these themes underlying different topics.
</p>
<p>
    Boundaries are often not exact. The poet may change topic in mid-sentence or go through a number
    of topics in a few lines. Sometimes they <i>are</i> clear: beginning and end of a speech is always beginning or end
    of a thema. So is a radical switch of focus or the beginning of a day. Speeches are most often
    introduced by a line identifying the speaker
    (“and answering him, Telamonian Aias said...”): sometimes such a line seems to belong to the preceding
    part, sometimes more to the speech.
    All this is not that important. What we have is an informal structure, a map for the singer.
    Formal precision is not in there.
</p><br>
<p>
    There are three forms:<br>
    1) ring-structure, mostly tripartite (BAB) but sometimes having more
    rings; the corresponding parts of these rings are related to each other
    by likeness or contrast. I will call the centre of the ring A, the closest
    ring B (B1 and B2), the next closest C and so forth. The outer, opening and closing
    themata, can be called R.
    Tripartite rings with a clear centre are the most common.<br>
    2) repeated sequences, such as BB or BCDBCD. <br>
    3) catalogues: longer sequences of similar themata (AAAA...), e.g. the catalogue of
    ships and men, the individual games in Patroclus' funeral games, the
    Epipolesis in book IV. These themata may have rather varying lengths.
    see e.g. the Epipolesis (Il 4.220) or the parts of Patroclus' funeral games.<br>
    The related parts of any ring structure may or may not have the same inner structure. In rare cases
    they do: e.g. the "Truce and Duel" themata.
</p>
<p>
    It is not true that the centre of a ring is always the main topic, the rings being comments
    on it. That is the case as often as not. What is true is that the central thema is a switch of
    <em>topic</em>, but not of <em>theme</em>, changing focus for a while and returning to the
    original topic when it is finished. <br>
    The relative length of the corresponding rings varies quite a bit, but they remain reasonably
    balanced. If there is great disparity in
    length, there must be suspicion that my interpretation of the structure is wrong or that
    something else has intervened with the text.
</p>
<br>
<figure><a class="piclink" target="_blank" href="images/geometric1.jpg"><img class="fitpage" src="images/geometric1.jpg"
        alt="geometric style crater fragment"
        height="50%" width="60%"></a>
    <figcaption>
        The same principles of symmetry and balance turn up in the decoration
        of geometric pottery (this crater found in Smyrna, Homer's birthplace,
        possibly from about the same period as his life). Note that we have, horizontally,
        a ring DCBABCD where the centre, vertically, is a repeated sequence A<sub>1</sub>A<sub>2</sub>.<br>
        <i>from: Alt-Smyrna, I: Wohnschichten und Athenatempel, by Ekrem Akurgal.</i>
    </figcaption>
</figure>
<br>
<p>This thematic structure is emphatically <em>not</em>
    meant to describe a formal structure, it is a - no doubt imperfect - attempt
    to recreate a <em>plan</em> of the poem, an inner structure to organise its
    composition and possibly to serve the singer as a memory-aid during performance.
    Writers who immediately write down what they compose do not need such
    an elaborate structure. Rhapsodes who only recite a part of the poem do
    not need it either. The listening public needs all its concentration to
    follow the singer - it has no time for structures. I see this as a
    composer's aid, to keep a handle on the material: created by an aoidos who
    composed this poem in his
    head, knew it by heart - he certainly did not improvise - and refined
    his poem and this structure over many years and many performances. In order to
    explain some anomalies in the structure, I prefer the "dictation" hypothesis
    more or less as advanced by Martin West and Oliver Taplin among others:
    the poet had already orally composed the
    Iliad (I am not talking about the Odyssey here)
    and had performed and improved it over many years, when (with the help of others)
    he managed to create a written
    copy of it, probably recomposing and expanding the already huge poem to something
    like the length that we have now.
    More about this <a class="textlink" title="about writing" target="_self" href="<?php echo autoversion('/writing.php');?>">here</a> about writing</a>
    and <a class="textlink" title="visible stitches" target="_self" href="<?php echo autoversion('/stitches.php');?>">here</a> about anomalies</a>.</p>
<p>Another function of this map is that it shows the "seams" of the "stitched verse".
    This simplifies the adaption of the length of the recital to circumstances. I could imagine that
    a full performance of the poem as we have it now would have been rare because of the length of time it takes<a
            class="ptr">(1)</a>.
    This manner of composing makes it easier to adapt to the occasion, to make a selection of parts to perform and still
    give the public a complete experience.</p>
<h3>Interpretation</h3>
<p>Clearly, this analysis into themata
    cannot be separated from interpretation ("what is the poet talking
    about here?") and therefore not from subjectivity. We all know how even intelligent and
    sensitive interpretation can produce an infinite number of wildly varying
    results. Also the above method is vulnerable to a reproach of "begging the question": assuming
    the existence of a structure to prove its existence. But this is what a tracker of wild
    animals does: he or she assumes the passage of a beast to prove that it has been there.
    The truth is not decided by this process but by the actual finding of the lion. Whether we
    found it or not, is for others to judge.
    It is true that discovering this structure entails identifying stretches of poem that are
    about one topic or discuss one theme: this is not too difficult most of the time. But it also entails
    identifying the corresponding themata, the B<sub>2</sub> to some B<sub>1</sub>, the
    likeness or contrast. In this there is no fixed rule to follow and arbitrariness may creep in.
    Nevertheless there are also many themata where the likeness is on the surface and easy to see.
    These must form the basis of our structure.
    Experience teaches that the A, the central thema in a ring, is often a focus switch
    e.g. from human to divine or from Achaean to Trojan. This helps,
    but if and how the neighbouring themata should be grouped remains a judgement call.
    Also, there are sequences of segments and themata that do not show an obvious structure, sometimes for more
    than 40 lines. Possibly closer study or different segmentation would produce better results.
    Therefore, since many eyes see more than two, it would be good if many other opinions
    concerning this structure challenged mine. <span class="hidden">See the <a class="textlink" title="contact"
            href="send.php">communications page</a> for more info.</span> <br>
    Surely we will never have exactly the same map that our poet carried around - this would be very
    unlikely. What matters is that we identify the important themata, the landmarks,
    correctly because we can use these for a better interpretation. So we work from the highest level
    to the lowest and vice versa in a dialectical process between interpreting and mapmaking.
</p>
<p>The most interesting correspondences are those on a higher level that form a contrasting pair. For
    instance, the pair <a class="explink" title="link to explanation page"
            data-ref="2:3.15">Diomedes</a> - Achilles
    (the immortal -, the mortal hero), the aristeia's of Idomeneus and
    Patroclus (not going far enough - going too far, see <a class="explink" title="link to explanation page"
            data-ref="2:13.1">Idomeneus' aristeia</a>) or the first and
    the second half of
    <a class="explink" title="link to explanation page" data-ref="3:20.1">Achilles' aristeia</a>
    (the gods may help you - the gods may deceive you). These are three enormously important themes for
    the interpretation of the whole poem.</p>
<br><br>
<h4>examples</h4>
<p> A low-level example: Odysseus' speech in
    book IX, trying to persuade Achilles to help the Achaeans: </p>
<div class="indent">
    <p> 9.223 comments on the "equal meal" (this really belongs to the previous thema)<br>
        9.228 (R) we will perish if you don't fight <br>
        9.232 (E) Hector is here, raging <br>
        9.247 (D) save the Achaeans, you'll regret it if you don't <br>
        9.252 (C) Peleus' words: put away quarrels, friendliness is best, it
        gives honour... <br>
        9.259 (B) put away your anger <br>
        <b>9.264 (A) catalogue of gifts / these will be yours... </b>
        <br>
        9.299 (B) ...if you put away your anger <br>
        9.300 (C) but if you hate Agamemnon and his gifts... <br>
        9.303 (D) pity the Achaeans, for they honour you like a god <br>
        9.304 (E) now you can get Hector who is raging <br>
        9.305 (R) no one else is up to him </p>
</div>
<p> Odysseus goes neatly from point to point till he reaches the
    central statement, the catalogue of gifts. Then he works back through a
    series of shorter points in reverse order to the starting statement:
    "only you can do it". <br>
    Not all is ring-structure though. Achilles, in his answer to Odysseus,
    goes through the same series of points twice: </p>
<div class="indent">
    <p>
        9.307 (R) Achilles: don't try to sweet-talk me<br>
        9.312 (B) I hate liars, I will not obey<br>
        9.318 (C) I gave him everything<br>
        9.332 (D) he took the girl from me<br>
        9.346 (E) Hector will beat you, but I will sail home<br>
        9.369 (B) tell the others: he cheated me<br>
        9.378 (C) I will not fight for any amount of treasure<br>
        9.388 (D) I will not marry his daughter<br>
        9.401 (E) I will take Thetis' advice and go home<br>
        9.421 (R) Tell the leaders their plan will not work<br><br>
        This repeated sequence with a closing ring could be summarized as
        RA<sub>1</sub>A<sub>2</sub>R<br>.
    </p>
</div>
<br>
<p>
    A special example of a repeated sequence belonging to separate themata
    is in the embassies sequences at the end of book I: </p>
<div class="indent">
    <ul class="nobullets">
        <li> 1.306 Embassies to Achilles and Chryses
            <ul>
                <li>1.306 (R) Achilles in his hut</li>
                <li>1.308 (B) A request: Agamemnon sends for Briseis (Achilles gives in, reluctantly)</li>
                <li>1.348 (C) A complaint: Achilles complains to Thetis</li>
                <li>1.430 (D) A meal and a reconciliation: Odysseus leads an embassy to mollify
                    both Chryses and Apollo
                </li>
                <li>1.488 (R) Achilles in his hut</li>
            </ul>
        </li>
    </ul>
    <ul class="nobullets">
        <li> 1.493 Thetis' embassy to Zeus
            <ul>
                <li>1.493 (R) After 12 days, the gods gather on Olympos</li>
                <li>1.495 (B) A request: from Thetis to Zeus (Zeus gives in, reluctantly)</li>
                <li>1.536 (C) A complaint: Hera complains to Zeus</li>
                <li>1.571 (D) A meal and a reconciliation: Hephaistos makes peace - meal on Olympus</li>
                <li>1.605 (R) At sunset, the gods retire to their homes</li>
            </ul>
        </li>
    </ul>
</div>
<figure><a class="piclink" title="E&A1, 2nd alternative" href="images/EA1-v2.JPG"><img
        class="fitpage" alt="" src="images/EA1-v2.JPG">
</a>
    <figcaption>Embassies</figcaption>
</figure>
<p>
    The above two consecutive themata show enough likeness to be called "repeated sequences",
    so normally they would have formed one thema. This is a good example of ambiguity of the
    created structure. I decided to split them up and move the second one, Thetis' embassy,
    to the A (centre) position between the two assemblies, for the following reasons: <br>
    a) There is a shift of of focus from the human to the divine <br>
    b) The first one, the embassies to Achilles and Chryses, shows a strong relation to the
    "wrath of Apollo" (1.8-52) because of the roles of Chryses and Apollo and because a girl
    is to be taken away in both of them. <br>
    c) Nicer ring structures can be created by doing this.
</p>
<p>
    A good question is, whether the structural likeness also hides a meaning. Is the second
    thema in any way related to or a comment on the first? I think it is but I will clarify
    my point of view elsewhere.
</p>
<br><br><br>
<hr>
<ol id="footnotes">
    <li>Because the number of nodes in a tree increases exponentially if you increase the number of levels,
        I did not always pursue the identification of ring-structures to the bottom level (such as in Odysseus'
        speech below). Not only would the
        amount of work be prohibitive but also the size of the HTML structure that the browser has to deal with.
        So I decided on a segment size of 10 lines or less, another motive being that the translation is not
        line-by-line
        so to synchronize the text and the translation it was necessary to force some grouping on the
        material. This is a disadvantage:
        the divisions of the lowest level could be a useful check on the boundaries of themata in higher levels.
        Now there are many lowest-level rings that do not show up; however this is not a study of
        ring-structures: it is an attempt to recreate a "map of ideas" of the poem.
    </li>
    <li>
        25 hours divided over three days, according to Oliver Taplin (Homeric Soundings). I somewhat
        prefer to think he spread it out over 9 days, because of Il 1.53 and 24.784. It is a difficult
        matter: three days seems too demanding, nine days seems too long a period.
    </li>
</ol>
<br>
<br>
<div class="mtime"><br>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
