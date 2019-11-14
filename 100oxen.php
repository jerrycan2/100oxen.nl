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
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="Description"
          CONTENT="Introduction to the site and its purpose and the 5 major axioms of my interpretation">
    <title>100 oxen, a hecatomb and a price to pay</title>
    <meta name="Description" CONTENT="">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo autoversion('/css/common.css');?>">
</head>
<body id="hundredoxen" class="latin contents">
<figure><a class="piclink" href="images/Characters-in-the-Iliad.jpg" target="_blank"><img
        width="60%"
        class="fitpage" src="images/Characters-in-the-Iliad.jpg" alt="some of the oxen"></a>
    <figcaption>Some of the oxen.</figcaption>
</figure>
<h1>Introduction</h1>
<p>You really should go and see the oldest movie we know of - the Iliad. For us this may be just an old book, a
    hard-to-read one, but for Homer's audience it must have been much more like a movie. Sound-only, all the roles
    played by one actor, but the medium is definitely like a movie, a genuine blockbuster if ever there was one. Let me
    compare it to a modern epic tale of war and heroism, the "Lord of the Rings" (movie) and explain why I deem the
    Iliad to be several levels higher as a work of art and human interest even if we have to work harder to learn to
    appreciate it.</p>
<p>Both are myth-like tales about the fateful human habit that shapes our history and our very being: war. How shall we
    act given the life-or-death situations that we face? The simple answer we already know, for it is always the same:
    we shall be brave. No surprises here. But there is a lot more to be said about it, let us take a brief look at the
    differences.</p>
<p>The LOTR takes place in a world of simple good and evil. Both of these are pure: the good has no evil mixed in,
    although it may have some internal cleaning up to do in some cases, for the sake of a story. The evil is just that:
    unredeemable, to be utterly despised and destroyed. The soldiers of evil are extremely ugly, they do not know love,
    only hate; they do not have wives and children, they never brush their teeth. This has a strong advantage for
    filmmaker and audience: we can recognize them at once and kill zillions of them without feeling the least bit uneasy
    about it. The whole is one huge feelgood operation.</p>
<p>In the Iliad on the other hand there is <em>no evil</em>. It shows anger, courage, revenge, love, cruelty from both
    sides. It shows the whole range of human passions and the reasons why these passions are awakened, but it does not
    know evil. Take a moment to realize how rare this is especially because, as I will argue, the Trojan War that Homer
    describes stands for a war going on or threatening in Homer's time. He lived in a society that was <em>always</em>
    at war (Il 14.85-). It is by no means the case that the poet (let alone the public) is 'objective' or above the
    parties, he is very much a Greek and he knows that his audience is, too. Yet he paints the real hero, the one he
    sets up for admiration, as the Trojan Hector, with his lovable wife and child. We are left in no doubt about the
    fate that awaits them. Not only that, but every death, Greek or Trojan, in the poem (and there are many) is
    accompanied by a short anecdote or biographical detail of the victim bringing out the common humanity of the
    warriors and a sense of waste and loss for each one of them. This may not make us feel better. Yet the poem knows
    and shows with emphasis that the fighting has to be done, there is no escape from it.</p>
<p>Both movies are basically revenge fantasies. The LOTR is a simplified one, sanitized for our protection so we shall
    not catch crippling diseases like pity or doubt. Homer, I say, aims at raising us up to a higher human level, to
    become warriors who know clearly what they are doing and why. </p>
<p>Some would object to this. What Homer does is not so far from the 'love your enemy like yourself' that another
    prophet tried to teach us. Our war-time leaders as well as the voice of heroism, e.g. Nestor in the Iliad, would see
    this as potential weakness on our side. Love your enemy? Kill your enemy and love his wife, or his daughter, all in
    revenge for Helen (Il 2.354): that is what is supposed to keep us going. No pity. But somewhere we know better: we
    worship our saints and prophets who tell us to love and to forgive, we declare them most beautiful, promote them to
    heaven but then ignore all they were saying. Nestor's honeyed voice is what we want to hear, and go kill some more
    orcs. Homer knows this very well and he plays us. He grabs us by some body part and leads us to a place where we can
    see the human being as it is. Homer is not the one who thinks Achilles the most beautiful. The poet is not a
    believer: he is a make-believer, with a purpose.</p>
<p><br>
</p>
<h3>A hundred oxen</h3>
<p>A hundred oxen for slaughter, a hecatomb, that is the Iliad. A feast for
    the dogs and birds, a giant cup full of strong intoxicating wine, a vision
    of our world that only an Achilles can bear to look at. A healing
    song. An immeasurable ransom. A fierce, angry poem which does not
    have its equal. The
    ancient Greeks were completely bowled over when it first hit them though
    whether they 'got the message' is another question. In these pages I hope
    to show that the Iliad really is all those things. It is a poem with
    a message and Homer is a kind of
    prophet or seer. His epiphany and <b>mission statement</b> are here
    (Il 24.173, Iris to Priam):</p>
<br>
<div class="indent">
    <p>... Διὸς δέ τοι ἄγγελός εἰμι,</p>
    <p>ὅς σευ ἄνευθεν ἐὼν μέγα κήδεται ἠδ' ἐλεαίρει.</p>
    <p>λύσασθαί σ' ἐκέλευσεν Ὀλύμπιος Ἕκτορα δῖον,</p>
    <p>δῶρα δ'Ἀχιλλῆϊ φερέμεν τά κε θυμὸν ἰήνῃ&nbsp;&nbsp;&nbsp;&nbsp; </p>
    <p><br>
    </p>
</div>
<div class="indent">
    <p>'...I am a messenger from Zeus,</p>
    <p>who, although far away, is concerned and pities you</p>
    <p>He orders you to ransom the great Hector,</p>
    <p>bringing gifts to Achilles to melt his heart' </p>
    <p><br>
    </p>
</div>
<p>Achilles is acting like a hunting dog who refuses to give up his prey, Priam is to get him to release the body.
    The gifts are the same gifts, the <i>ἀπερείσι᾽ ἄποινα</i> (immeasurable
    ransom) that the priest of Apollo Chryses brings to ransom his daughter in
    book 1. The ransom, of course, is the poem itself. Achilles is its main
    addressee and Homer is thus on a mission to visit all Achilleses in Hellas
    and 'melt their heart', teach them (Il 9.496, Phoenix to Achilles):</p>
<br>
<div class="indent">
    <p>ἀλλ᾽ Ἀχιλεῦ δάμασον θυμὸν μέγαν: οὐδέ τί σε χρὴ</p>
    <p> νηλεὲς ἦτορ ἔχειν...</p>
    <br>
    <p>'Conquer your great passions, Achilles. There is no need</p>
    <p>for you to have a pitiless heart...'</p>
    <br>
</div>
<p>He wants them to know compassion, to recognize the enemy as a human
    being, even while having to fight him. For
    this purpose he paints Hector as a <i>real </i>hero who is fighting for the
    defense of his wife, child and city. He paints a powerful picture and pulls
    out all the emotional stops to gain that result. All the while he has to
    maintain the greatness and glory of Achilles, his public would never let
    him give 'equal honor' to both heroes (Il 24.55-).</p>
<p>
    Achilles' great rampage (books 20, 21) may establish his greatness in the eyes
    of the public, but Homer uses it for a special purpose. Just like in the Odyssey, he uses
    <em>gigantic overstatement</em> to try to get a point across: this is a revenge fantasy. He seems to hope that we
    will react like Hera when she sees Hephaistos' fiery rampage (Il 21.379-) even
    though she called Hephaistos out herself.<br>
    Homer gives hints throughout the poems that such enormous slaughter or such
    implacable revenge is both impossible and inhuman (e.g. Il 20.356-, Il 24,39-).
    He is by no means a pacifist, but he expects us to realise that here the heroes
    'go too far': Achilles with his implacable revenge, Odysseus in the Odyssey with his
    'killing guests at a dinner' and Telemachus' revenge on the servant-girls. These
    things were not allright in Homer's time and they are meant to shock the public.
</p>
<br>
<p>So the poet is on a mission. First he travels on his own, later he finds
    that he is gathering a following: young men from all over Greece come to
    visit him and probably want to follow in his footsteps. For this, he
    creates a 'school' for rhapsodes, the Homeridae. They wrote down
    the Iliad and the Odyssey for easier teaching and as a monument for later
    generations. So he became not only The Poet but also the first
    schoolmaster.</p>
<p><br>
</p>
<p>Trying to discover a poet like that is a bit like like tracking an
    animal in the wilderness. A single trace means nothing, but together
    the traces form a track which we can follow, hopefully, even if it is
    very old. There are, however, plenty of traces and I think the poet made
    a lot of them consciously.
</p>
<p>In order to explain how I came to this interpretation, I have to discuss
    the following characteristics of the poetry. These I take as axioms, since they
    cannot be proved. The only point is how well they work:</p>
<div class="accheader">
    <button class="accordion">1. These are very carefully
        crafted, unified texts, the Iliad more so than the Odyssey.
    </button>
</div>
<div class="panel">
    <p>A thing which never fails to impress me about the Iliad is its clarity
        and well-formedness. Its language runs smoothly off the tongue, its
        ideas are presented in an easy to understand, straightforward way. Its
        paratactic style, its use of epithets and type-scenes all make it easy
        on the listener. All-pervasive ring-composition also has a lot to do
        with this clarity and this website aims to bring this out. </p>
    <p>If you think of 'oral composition' not as well-rehearsed improvisation
        but as an author creating a poem inside his head, knowing every line by
        heart and carrying it around with him from performance to performance,
        the reason for this refinement is clear: the poet had ample time to
        adapt and clarify his creation based on his own experience performing
        and discussing it. The tale 'grew in the telling' and what we have is
        the mature form. Traces of this 'growing' are visible, more about this
        <a class="textlink" title="structure" href="stitches.php">elsewhere</a>.
    </p>
    <p>This oral-composition hypothesis is related to the poetic structure
        that I wish to bring out: to compose a huge poem without writing, I
        think you need a clear structural skeleton to build your poem on, a
        mnemonic aid and an ordered way of setting up your story. This is what I
        think this 'thematic structure' is a trace of. It is not a formal
        structure, it may not even be meant for the listener, but for the poet
        himself. More about writing <a class="textlink" target="_self" title="writing"
                                       href="writing.php">here</a>.
    </p>
    <p>The Odyssey presents a much less unified picture. Taking a hint from Penelope's
        weaving and unraveling of the shroud: perhaps the poem was unfinished when
        its primary author died and was completed by his successor members of the Homeridae.
    </p>
    <p><br>
    </p>
</div>
<div class="accheader">
    <button class="accordion">2. The Iliad is fiercely rhetorical (on two levels).</button>
</div>
<div class="panel">
    <p>Homer is the first creator (that we know of<a class="ptr">(2)</a>) of
        an <em>icon</em> with all the persuasive power that implies. I would
        even say '<a class="textlink" title="scapegoat" href="goat.php">religious power</a>' and that
        would not be wrong, but
        we modern people have been brought up with a very different view of
        religion and this leads to all kinds of misunderstandings. Later, the
        Christian church disagreed with the image of Achilles and
        created new icons and saint-heroes of its own. They surely took their
        model from him. </p>
    <p>Painting not in pictures but in words, Homer knows the first rule for
        the successful preacher: do not preach. Show them, do not tell them
        right and wrong but let them draw their own conclusions (or at least let
        them think they do). He very rarely breaks this rule (e.g. Il 23.176).</p>
    <p>Just like Odysseus in his efforts to calm down the people in the second
        assembly (Il 2.188-206), Homer uses a two-pronged attack:</p>
    <br>
    <p>a) to commoners:<b> learning by pathos</b> (hit them with the sceptre).
        We must imagine his public as mainly young, male, aristocratic (all
        little Achillesses), eager for honour and glory and very much philhellene. Also, importantly, <em>angry</em> at
        least at some level. Like young men of all times, potentially angry because they do not get the recognition they
        think they deserve.<br>
        This is the public that the literal level of meaning is aimed at: wildly
        enthusiastic, the heart swelling with pride with every Greek heroic act.
        He could control their pity and fear
        as well as other emotions like no other poet could. This way of
        frightening them into submission, as Odysseus does and as Homer does
        with his Achilles icon, was attacked by Plato who called it 'being
        courageous through fear' meaning fear of shame. The Iliad is very much a
        poem about shame. For instance Il 24.44, Apollo to the gods:</p>
    <p><br>
    </p>
    <div class="indent">
        <p>ὣς Ἀχιλεὺς ἔλεον μὲν ἀπώλεσεν, οὐδέ οἱ αἰδὼς</p>
        <p>γίγνεται, ἥ τ᾽ ἄνδρας μέγα σίνεται ἠδ᾽ ὀνίνησι. </p>
        <p><br>
        </p>
        <p>So Achilles has killed Pity, nor does he feel Shame</p>
        <p>which so greatly hurts and benefits mankind</p>
    </div>
    <p><br>
    </p>
    <p>Both the hurt and the benefit of shame are treated in depth in the
        figures of Achilles and Hector.</p>
    <p><br>
    </p>
    <p>b) to 'kings and prominent people': <b>allusion </b>(persuade them
        with arguments). Here is a sharp criticism of Ionian politics of his day
        and especially of the Helen-myth. It is generally aimed at those who
        understand metaphor, 'façon de parler' and irony and who are 'shepherds'
        (or swineherds) rather than 'sheep'. For this audience, the Iliad is
        meant to function as a <em>speculum regis</em>, a king's mirror. It
        becomes the ethical constitution of the city-state, with ethics
        meaning 'this is how we are'. </p>
    <p> This manner of speaking, the use of language with both public and
        insider meanings combined with a dose of irony, word-play and competitive digs at each other, has been named
        <em>sympotic language</em>. Plato was
        a master of this (e.g. the Symposium). It must have been an aristocratic skill mostly. This is one of the things
        which indicate that this poet was no lowly bard, he was an aristocrat, one familiar with power and leadership.
    </p>
</div>
<div class="accheader">
    <button class="accordion">3. They are about Homer's own time and
        place
    </button>
</div>
<div class="panel">
    <p>The Iliad refers to a historical reality in two ways: as a possible dim memory of events in the distant past,
        something that does not concern me here, and as a mirror of events in Homer's own time (εἴ ποτ' ἔην γε).
        The most important aspect of it: it is about a community <em>at war</em>.
        We presume that a Ionian poet in the 8-7th c. composed one
        or two poems to comment on events and developments in his own world and
        that he used and adapted well-known stories from the world of myth to
        express his ideas, <em>and also to hide them</em>. This was a common
        use of myth. One example of this is the political use of
        <a class="textlink" href="history.php">charter myth</a>.&nbsp; The
        charter myth that this
        is all about is the story of the Abduction of Helen. I believe
        this myth was actively used as a political banner in Homer's time, to
        explain and legitimize Greek presence on and emigration to the Asian
        mainland. The point of such a myth is not whether it is
        true or false: it is whether you are for or against it. Homer makes
        abundantly clear that he is against it. The fact that he did this within
        a society at war (at least locally, in Ionia) is a very strong clue that
        his traditional association with 'exile' is not without foundation. The
        fact that he takes such a political position also indicates that he
        cannot have stood alone, there must have been some Greece-wide movement,
        perhaps related to the foundation of Delphi and the redirection of
        migration to the west and the Black Sea instead of Ionia, which provided
        patronage for him. There may be a reflection of political tension in the Greek
        world in the picture of the discord between Zeus and Poseidon.
        More about this <a class="textlink" href="poseidon.php">here</a>.</p>
</div>
<div class="accheader">
    <button class="accordion">4. Their self-reflection: in spite of their
        anonymity, both Homeric poems are very self-aware, the Odyssey more so than the Iliad.
    </button>
</div>
<div class="panel">
    <p>Never forget that these are not books, they are songs and they came out
        of the composer's mouth while he lived. While singing a direct speech by
        one of his characters, he virtually becomes that character. Homer shows
        himself very aware of this curious position.</p>
    <p>The poetic centre of self-reflection is the lyre-playing god of
        prophecy, healing and poetry <a class="textlink" target="_self" title="apollo"
                                        href="apollo.php">Apollo</a> : 'the Destroyer', 'Silverbow',
        'Far-shooter'. If the Iliad is a tour-de-force of poetry then, in some
        sense, the god of poetry must be acting through it. And it is a healing
        poem: it aims to heal not only 'Achilles' but Ionian society in general
        which must have been under pressure in Homer's day. Also it is a
        prophecy in a political and ethical sense of the word.</p>
    <p>In these pages I am mainly concerned with pointing out some of the
        myriad examples so the reader can learn to recognize them where they
        occur. An example of almost-open self reference would be 'Phoenix': I
        believe that the person Phoenix as occurring in Il 9 the Embassy to
        Achilles, is a late addition to the Iliad (from the time it was written
        down), representing the poet as an old man. His tale is strongly
        suggestive of autobiographical references, especially because of the
        'exile' aspect. Also the phrase 'φοίνικος νέον&nbsp;ἔρνος' (a young
        shoot of the 'phoenix' or date-palm, Od 6.163) is one of the things
        which make me believe that the tradition that Homer had a daughter (ref. <a class="textlink"
                                                                                    target="_self" title="women"
                                                                                    href="women.php">women</a>) is based
        on something.
        If indeed the poet was concerned with writing and/or
        dictating the poems, it seems well possible that a nickname for him was
        Phoenix (letters were called Phoenician).</p>
    <p>Examples of reference to the poem itself are abundant from the first
        moment. The meal (dais) is a keyword, being a metaphor for life in
        general but also the setting for performances of the poem<a class="ptr">(2)</a>. In this light, the Iliad
        begins with a rather shocking reference to it being a 'feast for the
        dogs and birds' (Il 1.4-5)<a class="ptr">(3)</a>. This is how Homer sees it, I think. The poem
        <strong>is</strong> the 'wrath of Achilles' and also the wrath of
        Apollo. Scores of people die in it and the listeners enjoy all this while listening to a bard at a public feast.
        And because it is about them, you could say they are
        'killed by Apollo' and his arrows. In the Odyssey's climactic and ironic slaughter,
        the poet does it all over again: he slaughters everyone at a feast. </p>
    <p>The poet rules the events in the poem just like Zeus rules the world.
        While he is performing it, he turns into all the heroes (even in direct
        speech), and e.g. lions, and forces of nature one by one just like
        Proteus (Od 4.384-).</p>
    <p><br>
    </p>
</div>
<div class="accheader">
    <button class="accordion">5. These remarkable <em>gods</em> are to be taken
        seriously and they belong to Homer only
    </button>
</div>
<div class="panel">
    <p> Homer's view of the gods is not naive and not characteristic of the
        Greeks in general. Nor are they there for 'comic relief' only though
        that seems at least part of their function. The amazing stories of the
        gods must have been controversial even in Homer's day and the view is
        much normalized in the Odyssey. The divine-human interaction and
        especially the so-called 'double determination' of human actions are
        created by Homer to explain something to us concerning human character,
        fate and justice. The most important background story for this is the
        'Judgement of Paris', the prelude to the Trojan War. The Olympic scenes
        sometimes tie in with self-reflection: the way the gods watch us is like
        the way we, the listeners, carefree but committed, fascinatedly watch
        the characters in the story. We are <em>like</em> the gods: we think
        (or at least act as if) we will never die:&nbsp; 'Οὖτίς με κτείνει',
        'Nobody kills me' (Od 9.408). Too late we discover that our feet are not
        on the ground and we fall to our death. (Od 10.551- about Elpenor,
        'hopeful').</p>
    <p>The key concept in approaching Homer's gods, is seeing that they are
        'what we obey'. Obey, persuade, trust, follow, all part of the same
        semantic field which is very important and central in the ancient world
        and likewise in the Iliad. We may simply 'obey Night' and go to sleep.
        This makes Night a god. See Hesiod, WD 760-, for another example of this principle.
      We may be persuaded by Beauty, like Paris or like Zeus in Il 14.153-.
        More about the gods <a class="textlink" title="about the gods" href="thegods.php">here</a>.
    </p>
</div>
<br>
<p>It must be clear that the Iliad is <em>not a novel</em>.
    It is not about an individual or his/her
    character, it is generic: about us and our actions. What do we do and why do we do it. Individual character is not
    the driving force of the hero's actions. The gods are:
    without the gods we are mere bellies. Homer splits us up in eight 'types' (see <a class="textlink"
                                                                                      title="Agamemnon's council"
                                                                                      href="council.php">Agamemnon's
        council</a>). Then he shows us how we are like Achilles in different ways in our actions. He is also trying to
    teach us to 'recognize the gods', i.e. to know ourselves. This is why Athena is the most important one, why Zeus has
    high hopes for her (Il 8.406-), and why she should be thoroughly understood with all her (sometimes contradictory)
    characteristics. Recognizing Athena is a trope in both the Iliad and the Odyssey.
</p>
<br>
<hr>
<aside>
    <ol id="footnotes">
        <li>There is Heracles who must be older than Homer's Achilles but we have no idea
            how this icon came into being. The poet draws a parallel between Heracles
            and Achilles: when Achilles decides to fight and end his quarrel with
            Agamemnon (Il 19.95-), Agamemnon tells the tale of the birth of
            Heracles. Achilles is not a Heracles: Heracles is a servant who 'ought to be' a king; Achilles is a king who
            'ought to be' a servant.
        </li>
        <li>Od 9.3-11, note the reference to 'the most beautiful thing'.</li>
        <li>accordingly, I prefer δαῖτα to πᾶσι in line 5</li>
    </ol>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
