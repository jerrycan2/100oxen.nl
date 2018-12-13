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
    <title>100 oxen</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo autoversion('/css/common.css');?>">
  </head>
  <body id="hundredoxen" class="latin">
    <figure><a class="piclink" href="images/Characters-in-the-Iliad.jpg" target="_blank"><img

          class="fitpage" src="images/Characters-in-the-Iliad.jpg" alt="some of the oxen"></a>
      <figcaption>Some of the oxen.</figcaption> </figure>
    <h1>Introduction</h1>
    <p>This is an experimental website about the Iliad and the Odyssey; it is
      experimental in two ways: as a programming project, to see how best to
      present this content (I am an amateur programmer, just learning to do this
      because I like to), but mainly as an experiment in literary analysis of
      the Homeric poems. This analysis again has two main aspects: first,&nbsp;
      to see how far I get building a 'structured summary' of the whole Iliad as
      shown&nbsp; in the <u>collapsible tree</u>. Second, to try out a
      thoroughly reflective reading of both poems in the sense of showing how
      they reflect their author. Admittedly the author is dead, but he left us
      his words in more or less complete form. Can we get at <em>his</em>
      meaning? I am more and more convinced that we are dealing with a poet who
      is anonymous indeed, but very aware of himself and what he is doing and
      why. He plays games with self-reflection all the time, especially in the
      Odyssey ("I am Odysseus"). He also explains himself all the time. I am
      very aware that this way of reading it might raise some eyebrows but bear
      with me and share with me a glimpse of an amazing poet-on-a-mission with
      strong emotions and a deep black sense of irony.</p>
    <p>The structure and the self-reflection do not depend on each other, you
      can accept or reject independently. In both the technical and the literary
      dimensions of the experiment, there will be errors, malfunctions and
      sudden alterations as I change my mind about the best approach. Please be
      patient and communicate problems or remarks to me. I like that.</p>
    <p>The site is meant mainly for myself and for anyone who actually studies
      Homer or knows the poems well. For anyone else: read them first! Read them
      well and slowly before diving into commentaries like this which may
      prejudice you.</p>
    <p><br>
    </p>
    <h3>A hundred oxen</h3>
    <p>A hundred oxen for slaughter, a hecatomb, that is the Iliad. A feast for
      the dogs and birds, a giant cup full of strong intoxicating wine, a vision
      of our world that only an Achilles can bear to look at, a healing
      song.&nbsp; A fierce, angry poem which does not have its equal. The
      ancient Greeks were completely bowled over when it first hit them though
      whether they 'got the message' is another question. In these pages I hope
      to show that the Iliad really is a poem with a message and Homer a kind of
      prophet. His mission statement is here (Il 24.173, Iris to Priam):</p>
    <br>
    <div style="margin-left: 80px;">
      <p>... Διὸς δέ τοι ἄγγελός εἰμι,</p>
      <p>ὅς σευ ἄνευθεν ἐὼν μέγα κήδεται ἠδ' ἐλεαίρει.</p>
      <p>λύσασθαί σ' ἐκέλευσεν Ὀλύμπιος Ἕκτορα δῖον,</p>
      <p>δῶρα δ'Ἀχιλλῆϊ φερέμεν τά κε θυμὸν ἰήνῃ&nbsp;&nbsp;&nbsp;&nbsp; </p>
      <p><br>
      </p>
    </div>
    <div style="margin-left: 80px;">
      <p>'...I am a messenger from Zeus,</p>
      <p>who, although far away, is concerned and pities you</p>
      <p>He orders you to ransom the great Hector,</p>
      <p>bringing gifts to Achilles to melt his heart' </p>
      <p><br>
      </p>
    </div>
    <p>The gifts are the same gifts, the <i>ἀπερείσι᾽ ἄποινα</i> (immeasurable
      ransom) that the priest of Apollo Chryses brings to ransom his daughter in
      book 1. The ransom, of course, is the poem itself. Achilles is its
      addressee and Homer is thus on a mission to visit all Achilleses in Hellas
      and 'melt their heart', teach them (Il 9.496, Phoenix to Achilles):</p>
    <br>
    <div style="margin-left: 80px;">
      <p>ἀλλ᾽ Ἀχιλεῦ δάμασον θυμὸν μέγαν: οὐδέ τί σε χρὴ</p>
      <p> νηλεὲς ἦτορ ἔχειν...</p>
      <br>
      <p>'Conquer your great passions, Achilles. There is no need</p>
      <p>for you to have a pitiless heart...'</p>
      <br>
    </div>
    <p>He wants them to know compassion, to recognize the enemy as a human
      being. He wants them to be able to weep for Hector, the enemy, and for
      this purpose he paints Hector as a <i>real </i>hero, fighting for
      defense of his wife, child and city. He paints a powerful icon and pulls
      out all the emotional stops to gain that result. All the while he has to
      maintain the greatness and honor of Achilles, his public would never let
      him give 'equal honor' to both heroes (Il 24.55-).</p>
    <br>
    <p>So the poet is on a mission. First he travels on his own, later he finds
      that he is gathering a following: young men from all over Greece come to
      visit him and probably want to follow in his footsteps. For this, he
      creates a 'school' for rhapsodes, the Homeridae. He (or they) wrote down
      the Iliad and the Odyssey for easier teaching and as a monument for later
      generations. So he became not only The Poet but also the first
      schoolmaster.</p>
    <p><br>
    </p>
    <p>In order to explain how I came to this interpretation, I have to discuss
      the following characteristics of the poetry:</p>
    <div class="accheader">
      <button class="accordion">1. Rhetoric: persuasive rhetoric on two levels:</button>
    </div>
    <div class="panel">
      <p>Homer is the first creator (that we know of<a class="ptr">(1)</a>) of
        an <em>icon</em> with all the persuasive power that implies. I would
        even say 'religious power' and that&nbsp; would not be&nbsp; wrong, but
        we modern people have been brought up with a very different view of
        religion and this leads to all kinds of misunderstandings. Later, the
        Christian church of course disagreed with the image of Achilles and
        created new icons and saint-heroes of its own. They surely took their
        model from him. </p>
      <p>Painting not in pictures but in words, Homer knows the first rule for
        the successful preacher: do not preach. Show them, do not tell them
        right and wrong but let them draw their own conclusions (or at least let
        them think they do). He very rarely breaks this rule (e.g. Il 23.176).</p>
      <p>Just like Odysseus in his efforts to calm down the people in the second
        assembly (Il 2.188-206), Homer uses a two-pronged attack:</p>
      <p>a) to commoners:<b> learning by pathos</b>(hit them with the sceptre).
        We must imagine his public as mainly young, male, aristocratic (all
        little Achillesses), eager for honor and glory and very much pro-Greek.
        This is the public that the literal level of meaning is aimed at: wildly
        enthusiastic, the heart swelling with pride with every Greek heroic act.
        He could control their pity and fear (another Aristotle reference here)
        as well as other emotions like no other poet could. This way of
        frightening them into submission, as Odysseus does and as Homer does
        with his Achilles icon, was attacked by Plato who called it 'being
        courageous through fear' meaning fear of shame. The Iliad is very much a
        poem about shame (Il 24.44, Apollo to the gods):</p>
      <p><br>
      </p>
      <div style="margin-left: 80px;">
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
        meant to function as a<em> speculum regis</em>, a king's mirror. It
        becomes the 'ethical constitution' of the city-state, with 'ethics'
        meaning 'this is how we are'. </p>
      <p> This manner of speaking, the use of language with both public and
        private meanings, has been named <em>sympotic language</em>. Plato was
        a master of this (e.g. the Symposium) but all well-educated men (which
        probably meant aristocrats in Homer's day) could probably deal with it
        to some degree.</p>
    </div>
    <div class="accheader">
      <button class="accordion">2. The Iliad is about about Homer's own time and
        place:
      </button>
    </div>
    <div class="panel">
      <p>The Iliad refers to a historical reality outside itself and outside the
        world of myth. The most important aspect of it: it is a society <em>at
          war</em>. We presume that a Ionian poet in the 8-7th c. composed one
        or two poems to comment on events and developments in his own world and
        that he used and adapted well-known stories from the world of myth to
        express his ideas, <em>and also to hide them</em>. This was a common
        use of myth. One example of this is the political use of <a class="textlink"

          href="history.php">charter-myth</a>.&nbsp; The charter-myth that this
        is all about is of course the story of the Abduction of Helen. I believe
        this myth was actively used as a political banner in Homer's time, to
        explain and legitimize Greek presence on and emigration to the Asian
        mainland. Remember, the point of a charter-myth is not whether it is
        true or false: it is whether you are for or against it. Homer makes
        abundantly clear that he is against it. The fact that he did this within
        a society at war (at least locally, in Ionia) is a very strong clue that
        his traditional association with 'exile' is not without foundation. The
        fact that he takes such a political position also indicates that he
        cannot have stood alone, there must have been some Greece-wide movement,
        perhaps related to the foundation of Delphi and the redirection of
        migration to the west and the Black Sea instead of Ionia, which provided
        patronage for him.</p>
    </div>
    <div class="accheader">
      <button class="accordion">3. Internal structure: they are very carefully
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
        the mature form. Traces of this 'growing' are visible, more about this <a

          class="textlink" target="_self" title="structure" href="stitches.php">elsewhere</a>.</p>
      <p>This oral-composition hypothesis is related to the poetic structure
        that I wish to bring out: to compose a huge poem without writing, I
        think you need a clear structural skeleton to build your poem on, a
        mnemonic aid and an ordered way of setting up your story. This is what I
        think this 'structured summary' is a trace of. It is not a formal
        structure, it is not even meant for the listener, but for the poet
        himself. Interestingly, trying to trace such a structure in the Odyssey
        does not succeed. It is peculiar to the Iliad and even in this poem it
        is not equally apparent everywhere. My guess is that the Odyssey is not
        oral but composed with the help of writing. The Iliad came first and was
        written down or dictated at some point but its original composition was
        by memory only. More about writing <a class="textlink" target="_self" title="writing"

          href="writing.php">here</a>.</p>
      <p></p>
      <p><br>
      </p>
    </div>
    <div class="accheader">
      <button class="accordion">4. Their self-reflectiveness: in spite of their
        anonimity, the poems are very self-aware (the Odyssey even more so than
        the Iliad)
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
        which make me believe that Homer had a daughter (ref. <a class="textlink"

          target="_self" title="women" href="women.html">Nausikaa, Kalypso,
          Eidothea</a>). If indeed the poet was concerned with writing and/or
        dictating the poems, it seems well possible that a nickname for him was
        Phoenix (letters were called Phoenician scribbles).</p>
      <p>Examples of reference to the poem itself, are abundant from the first
        moment. The meal (dais) is a keyword, being a metaphor for life in
        general but also the setting for performances of the poem. The Iliad
        begins with a rather shocking reference to it being a 'feast for the
        dogs and birds' (Il 1.4-5). This is how Homer sees it, I think. The poem
        <strong>is</strong> the 'wrath of Achilles' and also the wrath of
        Apollo. Scores of people die in it and the listeners enjoy all this at a
        great feast. And because it is about them, you could say they are
        'killed by Apollo' and his arrows. In the Odyssey's climactic slaughter,
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
        'Judgement of Paris', the prelude to the Trojan War.The Olympic scenes
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
        and likewise in the Iliad.We may simply 'obey Night' and go to sleep, or
        we may be persuaded by beauty, like Paris or like Zeus in Il 14.153-.
        More about the gods <a class="textlink" title="what we obey" href="thegods.php">here</a>.
      </p>
    </div>
    <br>
    <p>It must be clear that the Iliad is <em>not a novel</em>. It is not about
      character, it is about <em>action</em> (Aristotle said this). Action here
      is not determined by individual character but by <em>position</em>. With
      'position' I mean the sum of the forces acting upon a person when he/she
      is making a decision, such as social status and expectations of others but
      also, in Homeric terms, a choice which god to obey.&nbsp; I do not mean to
      say that the characters in the poem are only types. Homer is too good a
      poet for that. We could say they are not without character, but individual
      character is not the driving force of their actions. The gods are. </p>
    <br>
    <hr>
    <ol id="footnotes">
      <li>There is Heracles who must be older than Homer's Achilles but we have no idea
        how this icon came into being.The poet draws a parallel between Heracles
        and Achilles: when Achilles decides to fight and end his quarrel with
        Agamemnon (Il 19.95-), Agamemnon tells the tale of the birth of
        Heracles. Achilles is not Heracles: Heracles is a servant who 'really
        is' a king; Achilles is a king who 'really is' a servant.</li>
    </ol>
    <br>
    <br>
    <br>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
