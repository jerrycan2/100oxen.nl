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
            content="Introduction to the site and its purpose and the axioms of my interpretation">
    <title>100 oxen, a hecatomb and a price to pay</title>
    <meta name="Description" content="">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext" rel="stylesheet"
            type="text/css">
    <link rel="stylesheet" href="<?php echo autoversion('/css/common.css');?>">
</head>
<body style="direction: ltr;" id="hundredoxen" class="latin contents">
<figure><a class="piclink" href="images/Characters-in-the-Iliad.jpg" target="_blank"><img class="fitpage"
        src="images/Characters-in-the-Iliad.jpg" alt="some of the oxen" width="60%"></a>
    <figcaption>Some
        of the oxen.
    </figcaption>
</figure>
<h1>Introduction</h1>
<p>You really should go and see the oldest movie we know of - the
    Iliad. Sung by a lyre-playing bard for an audience, it must have been much like a movie
    to them. Sound-only, all the roles played by one actor, but for the public it must have
    been terribly exciting and emotional, far more than it can ever be to us.
    So why should we give it our attention? <br>
    I think we can learn from it. There are a lot of things that we know and
    the ancients did not: for instance, we know more about their history than
    they themselves did. We have a long literary culture behind us (which started with them
    by the way), they had only oral tradition. But the more I get to know them,
    the more I feel that they had at least this: they had a clearer view of human beings
    and what drives them than we do. 2500 years of philosophy and religion, however worthy
    of admiration, have obscured our view with ideology and political bias<a
            class="ptr">(1)</a>.
    The human sciences have not been much help.<br>
    To give an important example, let me compare the Iliad
    to a modern epic tale of war and heroism, the "Lord of the Rings" movie
    and explain why I deem the Iliad to be several levels higher as
    a work of art and human interest. Even though we have to work harder to
    learn to appreciate it.</p>
<p>Both are myth-like tales about the fateful human habit that
    shapes our history and our very being: war. How shall we act given the
    life-or-death situations that we face? The simple answer we already
    know, for it is always the same: we shall be brave, we shall do our
    duty even if it kills us. No surprises here.
    But there is a lot more to be said about it, let us take a brief look
    at one of the differences.</p>
<p>The LOTR takes place in a world of simple Good and Evil. Both
    of these are pure: the Good has no evil mixed in, although it may have
    some internal cleaning up to do in some cases, for the sake of a story.
    The Evil is just that: irredeemable, to be utterly despised and
    destroyed. The soldiers of Evil are extremely ugly, they do not know
    love, only hate; they do not have wives and children, they never brush
    their teeth. This has a strong advantage for filmmaker and audience: we
    can recognize them at once and kill zillions of them without feeling
    the least bit uneasy about it. The whole is one huge and violent
    feelgood operation.</p>
<p>In the Iliad on the other hand there is <em>no evil</em>.
    It shows anger, courage, revenge, love, cruelty from both sides. It
    shows the whole range of human passions and the reasons why these
    passions are awakened, but evil it knows not. Take a moment to
    realize how rare this is especially because, as I will argue, the
    Trojan War that Homer describes stands for a war going on
    in Homer's own time. He lived in a heavily walled army camp, in a
    society that was <em>always</em> at war (Il 14.85-).
    It is by no means the case that the poet (let alone
    the public) is "objective" or above the parties, he is very much a
    Greek and he knows that his audience is, too (Il 24.64-). Yet he paints the real
    hero, the one he sets up for admiration, as the Trojan Hector, with his
    lovable wife and child. We are left in no doubt about the fate that
    awaits them. Not only that, but every death, Greek or Trojan, in the
    poem (and there are many) is accompanied by a short anecdote or
    biographical detail of the victim bringing out the common humanity of
    the warriors and a sense of waste and loss for each one of them. This
    may not make us feel better. Yet the poet knows and shows with emphasis
    that the fighting has to be done, there is no escape from it. That is
    what Achilles tried to do and it cost him Patroclus.</p>
<p>Both movies are basically revenge fantasies. The LOTR is a
    simplified one, sanitized for our protection so we shall not catch
    crippling diseases like pity or doubt. Homer, I say, aims at raising us
    up to a higher human level, to become warriors who know clearly what
    they are doing and why. </p>
<p>Some would object to this. What Homer did is not so far from
    the "love your enemy like yourself" that another prophet tried (and failed) to teach
    us. This may sound surprising for a poet who showed us this image
    of Achilles and his rampage. But in these pages I will try to explain
    why I came to this conclusion.<br>
    War-time leaders as well as the voice of heroism, e.g. Nestor
    in the Iliad, would see this as potential weakness on our side. This
    goes some way to explain the tradition that he was an exile. Love
    your enemy? Kill your enemy and love his wife, or his daughter, all in
    revenge for Helen (Il 2.354): that is what is supposed to keep us
    going. No pity. Nestor's honeyed voice is what we want to hear, and go
    kill some more orcs. Homer knows this very well and he plays us. He
    grabs us by some body part and leads us to a place where we can see Man
    as he is. Homer is not the one who thinks Achilles the most beautiful.
    The poet is not a believer: he is a make-believer, with a purpose.</p>
<p>Trying to discover the ways of a poet like that is a bit like like
    tracking an animal in the wilderness. A single trace means nothing, but
    together the traces form a track which we can follow, hopefully, even
    if it is very old. There are, however, plenty of traces and I think the
    poet made a lot of them consciously.
</p>
<br>
<h4>Axioms</h4>
<p>In order to explain how I came to this interpretation, I have
    to discuss the following characteristics of the poetry. These I take as
    axioms. Not because their truth is self-evident, but because without them I cannot
    find a reasonable interpretation of the poem, and they are hypotheses that cannot be proved.
    The only test is how well they work, i.e. whether they can explain more than another
    set of axioms and raise fewer problemata<a class="ptr">(1)</a> by themselves. <br>
    Right here I am limiting myself to the Iliad, because these webpages are mainly about that poem.
    The Odyssey and Hesiod I use mainly as illustration and because those poems seem to
    comment on the Iliad.
</p>
<div class="accheader">
    <button class="accordion">1.
        The Iliad is a very carefully crafted, unified text.
    </button>
</div>
<div class="panel">
    <p>A thing which never fails to impress me about the Iliad is its
        clarity and well-formedness. Its language runs smoothly off the tongue,
        its ideas are presented in an easy to understand, straightforward way.
        Its paratactic style, its use of epithets and type-scenes all make it
        easy on the listener. All-pervasive <a class="textlink" title="about ring-structures" target="_self" href="<?php echo autoversion('/themata.php');?>">ring-composition</a> also has a lot to
        do with this clarity and this website aims to bring this out. </p>
    <p>If you think of "oral composition" not as well-rehearsed
        improvisation but as an poet creating a poem inside his head, knowing
        every line by heart and carrying it around with him from performance to
        performance, the reason for this refinement is clear: the poet had
        ample time to adapt and clarify his creation based on his own
        experience performing and discussing it. The tale grew in the telling
        and what we have is the mature form. Traces of this "growing" are
        visible, more about this
        <a class="textlink" title="alterations in the structure?" target="_self" href="<?php echo autoversion('/stitches.php');?>">elsewhere</a>.
    </p>
    <p>This oral-composition hypothesis is related to the poetic
        structure that I wish to bring out: to compose a huge poem without
        writing, I think you need a clear structural skeleton to build your
        poem on, a mnemonic aid and an ordered way of setting up your story.
        This is what I think this 'thematic map' is a trace of. It is not
        a formal structure, it may mainly serve the needs of the poet himself. It helps him
        go from point to point in an orderly fashion and presents themata that are related
        close together. How noticeable the map itself
        can have been for the public is hard to say. We may
        suppose that people were used to ring structures in the speeches that they heard.
        On the other hand, a recursive structure as elaborate as this would be hard to
        follow when listening to a performance.
    </p>
    <p>The Odyssey seems to present a much less unified picture although ring structure
        certainly is present. Taking a
        hint from Penelope's weaving and unraveling of the shroud: perhaps the
        poem was unfinished when its primary author died and was completed by
        his successor members of the Homeridae. </p>
</div>
<div class="accheader">
    <button class="accordion">2.
        The Iliad is fiercely rhetorical (on two levels).
    </button>
</div>
<div class="panel">
    <p>Homer is the first creator (that we know of<a class="ptr">(2)</a>)
        of an <em>icon</em> with all the persuasive power that
        implies. I would even say "religious power"
        and that would not be wrong, but we modern people have been brought up
        with a very different view of religion and this leads to all kinds of
        misunderstandings. Later, the Christian church disagreed with the image
        of Achilles and created new icons and saint-heroes of its own. They
        surely took their model from him. <br>
        Painting his icons in words, Homer knows the first
        rule for the successful preacher: do not preach. Show them, do not tell
        them right and wrong but let them draw their own conclusions - or at
        least let them think they do. He very rarely breaks this rule (e.g. Il
        23.176). <br>
        Homeric poetry is not surface-only, any more than an icon is. Its images
        are likenesses that refer to ideas and its intention is to persuade.
        Just like Odysseus in his efforts to calm down the people in
        the second assembly (Il 2.188-206), Homer uses a two-pronged
        <a class="textlink" title="rhetoric" target="_self" href="<?php echo autoversion('/rhetoric.php');?>">rhetorical</a> attack:</p>
    <p><b>a)</b> to commoners:<b> learning by pathos</b> (hit
        them with the sceptre). We must imagine his public as mainly young,
        male, aristocratic (all little Achillesses), eager for honour and glory
        and very much philhellene. Also, importantly, <em>angry</em>
        at least at some level. Like angry young men of all times, potentially
        feeling they lack honour
        because they do not get the recognition they think they deserve.<br>
        This is the public that the literal level of meaning is aimed at:
        wildly enthusiastic, the heart swelling with pride with every Greek
        heroic act. He could control their pity and fear as well as other
        emotions like no other poet could. This way of frightening them into
        submission, as Odysseus does and as Homer does with his Achilles icon,
        was attacked by Plato who called it "being courageous through fear"
        meaning fear of shame. The Iliad is very much a poem about shame. For
        instance Il 24.44, Apollo to the gods:</p>
    <div class="indent">
        ὣς Ἀχιλεὺς ἔλεον μὲν ἀπώλεσεν, οὐδέ οἱ αἰδὼς<br>
        γίγνεται, ἥ τ᾽ ἄνδρας μέγα σίνεται ἠδ᾽ ὀνίνησι. <br>
        <br>
        So Achilles has killed Pity, nor does he feel Shame<br>
        which so greatly hurts and benefits mankind<br>
    </div>
    <p>Both the hurt and the benefit of shame are treated in depth in
        the figures of Achilles and Hector.<br>
        <b>b)</b> to "kings and prominent people": <em>allusion </em>(persuade
        them with arguments). On this level there is a sharp criticism of Ionian politics of
        his day and especially of the Helen-myth. It is generally aimed at
        those who understand metaphor, façon de parler and irony and who are
        "shepherds" (or swineherds) rather than "sheep". For this audience, the
        Iliad is meant to function as a <em>speculum regis</em>, a
        king's mirror. It becomes the ethical constitution of the city-state:
        "this is how we are". <br>
        This manner of speaking, the use of language with both public
        and insider meanings combined with a dose of irony, word-play and
        competitive digs at each other, has been named <em>sympotic
            language</em>. Plato was a master of this (e.g. the Symposium).
        It must have been an aristocratic skill mostly. This is one of the
        things which indicate that this poet was no lowly bard, he was an
        aristocrat, one familiar with power and leadership - and <a class="textlink" title="about Homer's rhetoric" target="_self" href="<?php echo autoversion('/rhetoric.php');?>">rhetoric</a>.
    </p>
</div>
<div class="accheader">
    <button class="accordion">3.
        The poem is about Homer's own time and place
    </button>
</div>
<div class="panel">
    <p>The Iliad refers to a historical reality in two ways: as a
        possible dim memory of events in the distant past, something that does
        not concern me here, and as a mirror of events in Homer's own time (εἴ
        ποτ' ἔην γε). The most important aspect of it: it is about a community <em>at
            war</em>. We presume that a Ionian poet in the 8-7th c. composed
        one or two poems to comment on events and developments in his own world
        and that he used and adapted well-known stories from the world of myth
        to express his ideas, <em>and also to hide them</em>. This
        was a common use of myth. One example is the political use of <a class="textlink"
                title="myth and history" target="_self"
                href="<?php echo autoversion('/history.php');?>">charter myth</a>.&nbsp;
        The charter myth that this is all about is the story of the Abduction
        of Helen. I believe this myth was actively used as a political banner
        in Homer's time, to explain and legitimize Greek presence on and propagandize
        emigration to the Asian mainland. The point of such a myth is not
        whether it is true or false: it is whether you are for or against it.
        Homer makes abundantly clear that he is against it. The fact that he
        did this within a society at war (at least locally, in Ionia) is a
        strong clue that his traditional association with "exile" is not
        without foundation. The fact that he takes such a political position
        also indicates that he cannot have stood alone, there must have been
        some Greece-wide movement, perhaps related to the foundation of Delphi
        and the redirection of migration to the west and the Black Sea instead
        of Ionia, which provided patronage for him. There may be a reflection
        of political tension in the Greek world in the picture of the discord
        between Zeus and Poseidon. More about this <a class="textlink" title="Poseidon" target="_self" href="<?php echo autoversion('/poseidon.php');?>">here</a>.</p>
</div>
<div class="accheader">
    <button class="accordion">4.
        The Iliad is an attempt to explain to us what the <em>gods</em> are.
    </button>
</div>
<div class="panel">
    <p> Homer's view of the gods is not naive and not characteristic
        of the public opinion of the Greeks in general.
        Nor are they there for 'comic relief' only
        though that seems at least part of their function. The amazing stories
        of the gods must have been controversial even in Homer's day and the
        view is much normalized in the Odyssey. The divine-human interaction
        and especially the so-called 'double determination' of human actions
        are created by Homer to explain something to us concerning human
        character, fate and justice. The most important background story for
        this is the 'Judgement of Paris', the prelude to the Trojan War. <br>
        The Olympic scenes sometimes tie in with self-reflection: the way the gods
        watch us is like the way we, the listeners, carefree but committed,
        watch in fascination the story and its characters. We are <em>like</em>
        the gods: we think (or at least act as if) we will never die:&nbsp;
        “Οὖτίς με κτείνει”, “Nobody kills me”(Od 9.408). Too late we discover
        that our feet are not on the ground and we fall to our death. (Od
        10.551- about Elpenor, "hopeful").</p>
    <p>The key concept in approaching Homer's gods, is seeing that
        they are "what we obey". Obey, persuade, trust, follow, all part of the
        same semantic field which is very important and central in the ancient
        world and likewise in the Iliad. We may simply "obey Night" and go to
        sleep. This makes Night a god. See Hesiod, WD 760-, for another example
        of this principle. We may be persuaded by Beauty, like Paris or like
        Zeus in Il 14.153-. We may fail to honour (obey) them and they will be angry
        at us. Homer, in the guise of Proteus, claims to be able to tell us
        "θεῶν ὅς τίς σε χαλέπτει" - which of the gods is angry at us.
        More about the gods
        <a class="textlink" title="about Homer's gods" target="_self" href="<?php echo autoversion('/thegods.php');?>">here</a>.
    </p>
</div>
<br>
<h4>What it is not</h4>
<p>
    First: the poem is <em>not primitive</em>. There has been a constant tendency
    to see the oldest poems of western culture as somehow representing a more
    primitive kind of thinking: "he was the first to...", "they were not yet..." both
    intellectually and morally. <br>
    There is not any a priori evidence for that and I think the habit of putting
    ourselves at the centre or the summit of human culture is not really a sign of
    advanced thinking. <br>
    Second, it must be clearly stated: the Iliad is <em>not a novel</em> in the sense
    that it is not about an individual and his/her character, it is generic:
    about <em>all of us</em> and our actions. What do we do and why do we do it.
    The hero's actions are not described in terms of character. It is about whom
    we obey: a god or another human being.<br>
    Homer is too good a poet to give us only cardboard characters, they seem
    taken from real life, as if you might meet them when visiting archaic Greece.
    But Homer's whole approach to poetry is about the generic. Ships are "swift" because
    that is what they generically are, even if they are not moving now. All the typical
    epithets qualify the <em>idea</em> of the person or thing, regardless of the actual
    situation. The same goes for typical scenes: they represent an idea. Variations, deviations
    from the standard, are a communication to us.
</p>
<h2>A hundred oxen</h2>
<p>A hundred oxen for slaughter, a hecatomb, that is the Iliad. A
    feast for the dogs and birds, a giant cup full of strong intoxicating
    wine, a vision of our world that only an Achilles can bear to look at.
    A healing song. An immeasurable ransom. A fierce, angry poem which does
    not have its equal. The ancient Greeks were completely bowled over when
    it first hit them though whether they 'got the message' is another
    question. In these pages I hope to show that the Iliad really is all
    those things. It is a poem with a message and Homer is a kind of
    prophet or seer. His epiphany and <b>mission statement</b>
    are here (Il 24.173, Iris to Priam):</p>
<div class="indent">
    “... Διὸς δέ τοι ἄγγελός εἰμι,<br>
    ὅς σευ ἄνευθεν ἐὼν μέγα κήδεται ἠδ' ἐλεαίρει.<br>
    λύσασθαί σ' ἐκέλευσεν Ὀλύμπιος Ἕκτορα δῖον,<br>
    δῶρα δ'Ἀχιλλῆϊ φερέμεν τά κε θυμὸν ἰήνῃ”<br>
</div>
<div class="indent">
    “...I am a messenger from Zeus,<br>
    who, although far away, is concerned and pities you<br>
    He orders you to ransom the great Hector,<br>
    bringing gifts to Achilles to melt his heart” <br>
</div>
<p>Achilles at that moment is acting like a hunting dog who
    refuses to give up his prey, Priam is to get him to release the body.
    The gifts are the same gifts, the “<i>ἀπερείσι᾽ ἄποινα</i>”
    (immeasurable ransom) that the priest of Apollo Chryses brings to
    ransom his daughter in book 1. The ransom, of course, is the poem
    itself. Achilles is its main addressee and Homer is thus on a mission
    to visit all Achilleses in Hellas and "melt their heart", teach them
    (Il 9.496, Phoenix to Achilles):</p>
<div class="indent">
    “ἀλλ᾽ Ἀχιλεῦ δάμασον θυμὸν μέγαν: οὐδέ τί σε χρὴ<br>
    νηλεὲς ἦτορ ἔχειν...”<br>
    <br>
    “Conquer your great passions, Achilles. There is no need<br>
    for you to have a pitiless heart...”<br>
</div>
<p>He wants them to know compassion, to recognize the enemy as a
    human being, even while having to fight him. For this purpose he paints
    Hector as a <i>real </i>hero who is fighting for the
    defense of his wife, child and city. He paints a powerful picture and
    pulls out all the emotional stops to gain that result. All the while he
    has to maintain the greatness and glory of Achilles, his public, which
    would never let him give "equal honor" to both (Il 24.55-).</p>
<p> Achilles' great rampage (books 20, 21) may establish his
    greatness in the eyes of the public, but Homer uses it for a special
    purpose. Just like in the Odyssey, he uses <em>gigantic
        overstatement</em> to try to get a point across: this is a
    revenge fantasy. He seems to hope that we will react like Hera when she
    sees Hephaistos' fiery rampage (Il 21.379-) even though she called
    Hephaistos out herself.<br>
    Homer gives hints throughout the poems that such enormous slaughter or
    such implacable revenge is both impossible and inhuman (e.g. Il
    20.356-, Il 24,39-). He is by no means a pacifist, but he expects us to
    realise that here the heroes "go too far": Achilles with his implacable
    revenge, Odysseus in the Odyssey with his "killing guests at a dinner"
    and Telemachus' revenge on the servant-girls. These things were not
    allright in Homer's time and they are meant to shock the public.
    Another way of saying it: Homer is "feeding the dogs before the hunt" -
    in the guise of Odysseus (Il 19.198-). See <a class="textlink" title="about Achilles, the mortal hero" target="_self" href="<?php echo autoversion('/achilles.php');?>">The Mortal Hero</a>
</p>
<p>So the poet is on a mission. First he travels on his own,
    later he finds that he is gathering a following: young men from all
    over Greece come to visit him and probably want to follow in his
    footsteps. For this, he creates a "school" for rhapsodes, the
    Homeridae. They wrote down the Iliad and the Odyssey for easier
    teaching and as a monument for later generations. So he became not only
    The Poet but also the first schoolmaster.</p>
<a id="100oxen">&nbsp;</a>
<p>
    The name "100 oxen" of this website ties in with a wonderful joke the poet makes in
    Il 6.234-6:</p>
<div class="indent">
    ἔνθ' αὖτε Γλαύκῳ Κρονίδης φρένας ἐξέλετο Ζεύς, <br>
    ὃς πρὸς Τυδεΐδην Διομήδεα τεύχε' ἄμειβε <br>
    χρύσεα χαλκείων, ἑκατόμβοι' ἐννεαβοίων. <br><br>

    but there Zeus took Glaucus' wits away <br>
    the way he exchanged armour with Diomedes: <br>
    gold for bronze, (worth) a hundred oxen for nine. <br>
</div>
<p>
    This is not only an ironical comment on the likelihood of acquiring your
    "golden armour", your superhero status (like Achilles), by meeting an old friend in battle
    and exchanging gifts with him. It is also a byword for the whole Iliad: a hecatomb
    of nine oxen. The nine being the 8 members of Agamemnon's council or the eight little
    birds caught by the snake in Aulis, plus Achilles the motherbird. This is the poet
    asking us, the eager-for-glory listener: "do you think it will be like that?" just as he asks us this
    when he lets Achilles pray to Zeus "I will stay here but I will send my comrade out
    to battle [...] let him come home unharmed" (Il 16.239-)
    or when we hear how he single-handedly wipes out half an army. Are we so gullible
    that even there we suspend our disbelief?
</p>
<br><br><br>
<hr>
<aside></aside>
<ol id="footnotes">
    <li>
        I am not saying that they did not have their bias: it is all
        too clear that Homer addresses the aristocracy and not at all
        the common people. He created a "speculum regis", a king's mirror.
        But the view in this mirror is relatively unclouded by
        ideology.
    </li>
    <li>
        On the other end of the scale, there is of course the hardcore oralist
        point of view: that it is useless to search for meaning because these are
        just the automatic ramblings of a traditional singer of epic tales. All
        choice of words or formulae is determined by the metre.<br>
        The statement that a text has "no meaning" can never be falsified. It
        relieves us of many problemata, but makes it an uninteresting statement.
    </li>
    <li>There is Heracles who must be older than Homer's Achilles
        but we have no idea how this icon came into being. The poet draws a
        parallel between Heracles and Achilles: when Achilles decides to fight
        and end his quarrel with Agamemnon (Il 19.95-), Agamemnon tells the
        tale of the birth of Heracles, the one who has to do all these labours
        for the king. Achilles is not exactly a Heracles, though: Heracles is
        a servant who "ought to be" a king; Achilles is a king who "ought to
        be" a servant.
    </li>
    <li>Od 9.3-11, note the reference to "the most beautiful thing".</li>
    <li>accordingly, I prefer δαῖτα to πᾶσι in line 5</li>
</ol>
<div class="mtime"><br>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
