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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="Description" CONTENT="A discussion of the individual gods in the poems">
    <title>The Gods</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents" id="thegods">
<header>
    <div id="up"><img id="zeus" src="images/zeus1.gif" alt="Zeus with thunderbolt facing Achilles"
            title="Zeus with thunderbolt facing Achilles"></div>
    <div><img id="warrior" src="images/warrior1.gif" alt="Achilles with shield and spear facing Zeus"
            title="Achilles with shield and spear facing Zeus"></div>
</header>
<h1>"The gods", usage:</h1>
<ul>
    <li>(the administrator of) Fate (Zeus)</li>
    <li>the instrument of Fate (the other gods, as in the warning to Diomedes),
        for better or for worse.
    </li>
    <li>the ones who rule us and the cosmos, or even created us</li>
    <li>do ut des - sacrifices and promises</li>
    <li>a denial of responsibility
        <ul>
            <li>an excuse for behaviour (a god made me do it)</li>
            <li>do not boast of that! (it was a god who helped you)</li>
        </ul>
    </li>
    <li>ironically, any unpredictable higher power "the gods have ordained..."
        <ul>
            <li>a metaphor for the leaders of society. Ref. "the oath by the Styx",
                the foundation of Zeus' reign. (Th 390-). see <a class="textlink" title="the oath" target="_self" href="<?php echo autoversion('/politeia.php#styx');?>">here</a>.
            </li>
        </ul>
    </li>
    <li>indication of status (divine/noble father, mother) e.g. Il 12.312</li>
    <li>(young) humans, ironically ("Oὖτίς με κτείνει - Nobody kills me"): they think themselves gods.
        <ul>
            <li>ref. Achilles, Patroclus, Elpenor</li>
        </ul>
    </li>
    <li>gods as spectators (Il 4.1-10)</li>
    <li>mirror of humanity (as below, so above) also: comic relief (battle of the gods)</li>
    <li>opposite of humanity (forever young, immortal)</li>
    <li>"like a god(dess)" epitome of beauty, skill etc.</li>
    <li>façon de parler (Kirk)</li>
    <li>"<b>what we obey</b>" - the source of any remarkable human action
        <ul>
            <li>the causes of all things (Plato)</li>
            <li>personifications?: Not "mere personification", but "eternal,
                metaphysical forces that drive us all"
            </li>
        </ul>
    </li>
</ul>
<p>
    Clearly this list with its inclusion ironical items does not reflect the awe and reverence
    that was prominent in Greek public life.
    But for the aristocracy, that was only the public side. Towards the "common people" they would
    project a shepherd-sheep kind of relation, the gods as beings to be obeyed without argument who would
    be kind to you if you payed them their due respect and sacrifices. Plato shows this aristocratic attitude clearly -
    religion as a tool for rulers.
    Privately (in symposia for instance), as Homer and Hesiod show, they had no problems with ironical
    and humorous references to the gods<a class="ptr">(1)</a>. <br>
    This does not at all mean that they were irreligious or atheist. They had a much less naive view
    which still took the gods very seriously.
    This "intellectual" perspective was developed into the well-known philosophical theories
    by Plato and Aristotle and their predecessors
    but I hope to demonstrate from the texts that its roots were already there in the time of Homer and Hesiod.
</p>
<h2>Homer's gods</h2>
<h4>Hera</h4>
<p>Hera, the eldest daughter of Kronos (in Homer, Il 4.59), is married to
    Zeus, his youngest son. In popular religion, her main domain appears to be
    marriage. This is fitting because in an aristocratic world marriage is
    inextricably linked to status and thus to power. Also Zeus' reign and Kronos' reign before
    him must be seen as dependent on their marriage to the eldest daughter of
    their respective fathers. (More about marriages of the gods<a class="textlink" title="about Kronos" target="_self" href="<?php echo autoversion('/kronos.php');?>">here</a>).
    In the Iliad, Hera is always in conflict with Zeus about her status.
    To name some examples: she is angry about Zeus' promise to Thetis (Il 1.541-);
    Zeus is angry about Hera and Athena's disobedience (Il 8.444-); about Hera's trick (Il 15.12-).
    Two other scenes are important for an understanding of the goddess: it is Hera who gets
    Achilles to call an embassy (Il 1.53-) and to rise again to fight Hector (Il 18.165-, 356-).
    She is the one who remains opposed to rescuing Hector's body from the jaws of Achilles,
    protesting that Hector is not "one of us" and should not be given equal honour (Il 24.55-).
    The Heracles tales, on the edges of the picture that Homer paints, show her to be
    angry with Zeus always because of this and many other affairs producing famous children. By herself
    she can only produce a cripple god. Her whole attitude towards her husband Zeus is: "I should
    be your equal". She is the goddess of thumos (spirit), of wanting to be number one.
    As Zeus admits, nothing else but this sort of behaviour can be expected of her (Il 8.407-).
    </p>

<h4>Athena</h4>
<p>Athena and the choices that she offers is one of the the main subjects in
    the Iliad and Homer has a great deal to say about her. He paints her within
    the Olympic family as the
    favourite daughter who always knows a way to get what she wants<br>
    She is the daughter of Zeus and <em>Mētis</em>
    (cleverness, craft, wisdom, trick). The story (not in Homer) is that again
    there was a prophecy that a child of hers would overthrow him, so he
    swallowed the pregnant Mētis in order to make the child his own (ref. <a class="textlink" title="about Kronos" target="_self" href="<?php echo autoversion('/kronos.php');?>">Kronos</a>).
    The child finally was born by splitting Zeus' head with an axe; a fully
    grown and armed maiden sprang out, his favourite daughter Athena.</p>
<figure><a class="piclink" target="_blank" title="Birth of Athena from Zeus' head"
        href="images/judgement.jpg"><img class="fitpage" alt="Birth of Athena" src="images/athbir.jpg"
        height="45%" width="50%"></a>
    <figcaption>Bronze relief, shield band
        panel from Olympia.<br>
        Birth of Athena. Zeus sits on his throne holding a thunderbolt as
        Athena, wearing a helmet and brandishing a spear and shield, emerges
        from his head. Eileithuia serves as midwife and Hephaistos moves away,
        having split Zeus' skull with an axe.<a class="ptr">(1)</a><br>
        Image and text from: Art and Myth in Ancient Greece - T.H. Carpenter
    </figcaption>
</figure>
<p> A mētis is a way to attain something by cleverness. It is know-how and
    know-when (boldness or caution). This dangerous and very powerful capacity
    is now to be ruled by Zeus as is his daughter but, as the Iliad shows, she
    is by no means fully under his command.<br>
    The domains belonging to Athena range from woman's handicraft like
    weaving (which can be <em>clever</em>) to being
    a full-scale war goddess and protector of the city. It is, in the Greek experience,
    after all not military
    power alone that decides wars, it is most of all cleverness and knowledge.
    In individual
    battle, Athena gives courage and fierceness (menos) because that is how to
    win in a battle. The λόχος (ambush) is also her domain: lying
    in ambush, or going on a night raid, you "know more" than the one
    you are ambushing - namely that you are there. Again, it is a <em>cleverness</em>.
</p>
<h4>Aphrodite</h4>

<figure class="floatpic"><a class="piclink" target="_blank" title="Sappho, Greek vase painting"
        href="images/Sappho.jpg"><img alt="Sappho with lyre" src="images/Sappho.jpg" width="50%"></a>
    <figcaption>One of the earliest surviving images of Sappho,<br> from c. 470 BC. from <a
            href="http://classicalpoets.org">classicalpoets.org</a></figcaption>
</figure>
<h6>Sappho, frag. 16:</h6>
<div class="indent">
    “οἰ μὲν ἰππήων στρότον οἰ δὲ πέσδων<br>
    οἰ δὲ νάων φαῖσ’ ἐπὶ γᾶν μέλαιναν<br>
    ἔμμεναι κάλλιστον, ἔγω δὲ κῆν’ ὄτ-<br>
    τω τις ἔραται·”<br><br>
    “Some say an army of horsemen - some say it's footmen,<br>
    for others it's ships - is the most beautiful thing<br>
    on this black earth. I say it's the one you love.”<br>
</div>
<p>Aphrodite is the goddess of sexual desire. As such, an explanation of
    Paris' choice is simply that he desired her, the most beautiful woman in
    the world. Homer, however, has a slightly more sophisticated view of the
    issue: he makes his choice a choice for beauty. Beautiful is something
    that you desire to have or desire to be and Homer paints a picture of the
    situation where Paris chooses to <em>be</em> beautiful (Il 24.30). So
    beautiful in fact that Helen falls in love with him and willingly follows
    him to Troy. This is the manner in which Aphrodite delivers Helen to
    Paris. In Homer there is no hint of rape or abduction though he is careful
    to protect her from the potential hate of his public by showing that she
    has no choice against such a powerful goddess (the poet of the Iliad and
    Odyssey always seems to love the women more than the men). For Homer's
    wonderful picture of their relationship, see the part 'Paris in the
    bedroom', Il 3.383-449.</p>
<p>
    Paris is rebuked by Helen and by Hector for "not fighting", being a coward (Il 3.38, 3.426, 6.325). This diminishes his beauty (and Helen proceeds to invite the hero Hector to sit next to her, Il 6.354) and he is persuaded by those two to go to battle after all. When he goes, he goes "ἀγλαΐηφι πεποιθὼς", literally "persuaded by the force of beauty" (Il 6.510)<a class="ptr">(3)</a>.
</p>
<p>In an eyebrow-raising scene in book 5 (Il 5.330-430) Diomedes goes after
    the goddess, wounds her and chases her from the battlefield. More on this,
    and the relation Ares-Aphrodite <a class="textlink" title="Helen, Ares and Aphrodite" target="_self" href="<?php echo autoversion('/helen.php');?>">here</a>.</p>
<br>
<h5>The Olympic "oikos"</h5>
<p>
    ...
</p>
<h2>Paris' judgement</h2>
<p>Thetis, Achilles' mother, was supposed to marry Zeus. But after Zeus
    heard a prophecy that her son was destined to be greater than his father,
    he declined and married Thetis off to a mortal, the hero Peleus. At their
    wedding all the gods were invited except Eris (discord). She, in revenge,
    threw a golden apple into the hall inscribed "for the most beautiful" and
    three goddesses, Hera, Athena and Aphrodite, claimed this honor. So there
    was to be a beauty contest and Zeus was to be the judge. He however,
    understandably declined. So they found a Trojan shepherd-prince, Paris
    (also called Alexander) to do the job.</p>
<p>So the goddesses proceeded to bribe Paris: Hera offered him
    power/kingship, Athena offered him wisdom/success in war, Aphrodite
    offered him beauty. Paris chose beauty and Aphrodite, so as reward he
    received the love of Helen, the most beautiful of women and took her to
    Troy. It is shown here that Paris "obeys beauty" more than anything. So,
    by the way, does Zeus in "the deception of Zeus"-episode (il 14.292-) in
    the centre of the Iliad.<br>
</p>
<figure><a class="piclink" target="_blank" title="Paris' judgement" href="images/judgement.jpg"><img
        class="fitpage" alt="Paris' judgement" src="images/judgement.jpg" height="45%"
        width="80%"></a>
    <figcaption> Hermes leads the three goddesses
        Aphrodite, Athene and Hera to Paris for his judgement in the contest for
        the golden apple. The Trojan prince sits in a pillared doorway, holding
        a royal staff and lyre. Before him stands Hermes, holding a kerykeion
        (herald's wand) and wearing a chlamys (traveller's cloak) and winged
        cap. Of the three goddesses, Aphrodite is veiled, and holds a winged
        Eros (love god) and myrtle wreath in her hands; Athene wears the aigis
        cloak, and holds a spear and helm; Hera is crowned and bears a miniature
        lion and royal lotus-tipped staff. <br>
        Picture and text from <a class="textlink" target="_blank" title="Paris' judgement"
                href="http://www.theoi.com/Gallery/K4.5.html"> theoi.com</a> <br>
    </figcaption>
</figure>
<p>Helen however was already married to king Menelaos of Sparta who asked
    his brother king Agamemnon of Mycenea for help in raising an army from all
    of Greece to get her back. Thus the Trojan War started.<br>
    This story exists in many slight variations but I give it
    as Homer uses it (though he never refers to it directly) because it is
    absolutely crucial to understanding the Iliad. In this poem Achilles is
    the chooser and he gets to make the same choice as Paris: power, success
    in war or "beauty".
</p>
<p>So Paris judged that beauty was the thing to have/be. What about
    Achilles?</p>
<br>
<h4>Gods and goddesses</h4>
<p>There are two things that we may obey: rules and desires. I would suggest
    that female gods are "desire" gods, while male gods "rule". Neither Homer
    nor Hesiod ever hints at a difference like this but the picture fits. Gods
    like Zeus, Ares and Apollo in Homer impose a rule or duty on us. Goddesses like
    the three beauties Hera, Athena and Aphrodite represent desires. Athena in
    a way is both: a woman in a man's armour, an armed maiden. More on Athena
    below. </p>

<p>In Homer, the gods are <em>what we obey</em><a class="ptr">(2)</a>. The classical formulation
    of this is that we are <em>moved</em> by the gods.
    We may obey humans: they ironically can be said to become (like) gods to us. We may obey nature:
    night, storms, the sea; all these make their special demands on us.
    We are eager to obey, to emulate, heroes (as Patroclus does), so much so that they
    can be described as halfgods<a class="ptr">(3)</a>. And there are
    major gods all of whom may tell us to do different things.
    Because of their superior power, these are high up in the Olympic hierarchy. We obey them,
    although it is still <em>we</em> who make the decision.
    The gods proper are a major subject of the Iliad.
    Without the gods we are "mere bellies" (Hesiod Th 26), nothing
    noteworthy will come out of our hands. But when we make an important
    decision, fight a brave battle, create something new and interesting, we
    are obeying gods.</p>

<p>I believe the people of Homer's time have
    developed their ideas about the gods quite far. Of course I do not know
    what role Homer played in this, but since he and Hesiod are effectively the
    only voices we are hearing, I will proceed as if he is the one who is responsible
    for this view of the gods.
    He links the gods to qualities that we see
    as being inside ourselves but the Greeks saw as originating outside us:
    e.g. cleverness, the drive for status and
    power, sexual desire and others. These are forces which <em>move</em> us.
    See also <a class="textlink" title="Plato's gods" target="_self" href="<?php echo autoversion('/plato_gods.php');?>">Plato's gods</a>.<br>
    This may still sound as if I am reducing the gods to some
    psychological level, as if they were only a symbolic presentation of our
    human drives and intentions, i.e. personifications. This is not quite what I
    mean. I do not think that Homer, when he tells us that Odysseus is a
    favourite of Athena, is merely saying that O. is a clever guy. The
    "psychological" view is a very modern, individualistic view of humans, not
    applicable here. Martin West, in his "Theogony", says the
    following about the gods representing abstractions like Sleep and Strife:</p>
<div class="indent">
    <p>“In Hesiod's time it was not understood what abstractions are [...]. They
        must be something; they are invisible, imperishable and have great
        influence over humans; they must be gods.”</p>
</div>
<p>
    I am not so sure about what they
    did or did not understand, but these are not abstractions: Sleep and Strife
    are among the things that "come over you" and you may or may not give in to them.
    These gods are
    seen as real metaphysical<a class="ptr">(2)</a> forces that
    transcend individual humans, and that we <em>obey</em> (or not) as
    individuals or as groups. They come and go seemingly at their own whim: we
    cannot say "now I am going to be clever" and be sure that it will be so.
    Implicitly or explicitly we have to pray (or "boast" which is the same
    thing) i.e. put our trust in them, and "go for it" as they say nowadays,
    act and see if the god fulfills your prayer/boast. We have to do this if
    we want to live well for if we do not, we are "mere bellies".
</p>
<p> It should be noted that this intellectual view of the gods is not that of
    popular religion. If anyone did subscribe to this view, they would not have
    been able to express this in public anyway. There was indeed freedom of speech
    in their city-states, but there was also the freedom of other people to
    get very angry with you. Homer could get away with
    much, but only because of the use of the images of the gods as an allegory
    whose ground is private (to a class of people) and whose figure is public.
    Even Plato is ever reluctant to use straightforward language.
</p>
<p>Sometimes people complain about the "amoral" character of most Greek
    gods. This is a misunderstanding and betrays a naive view of the gods as
    "larger people". They may be depicted as such but we must not confuse the
    picture with what it depicts. The gods are what we obey, they represent
    only one rule or desire. Morality is something we may or may not obey and
    as such, it is a god: Zeus (I am talking about Ancient Greek morality, not
    modern Western). The other gods are not Zeus, they must <em>obey</em> Zeus.
    They do not rule fate, they rule only their own
    domain so they are amoral; our behaviour is a result of the conflicts
    between these gods.</p>


<h4>Achilles' judgement</h4>
<p>
    In Iliad 1.53/4 Achilles, in response to the bad situation the Achaeans
    are in, calls an assembly. It is <em>Hera</em><a class="ptr">(2)</a> that put him up to it. But
    he does not call the council first, as is absolutely necessary in the
    Greek politics of the day. He makes proposals (let's go home or ask a
    seer) without even talking to the king first. These acts alone would brand
    him as a would-be tyrant in any polis of the archaic age. With typical
    Homeric irony, the poet reverses the roles in the scene where Agamemnon
    wants another prize and Achilles says "when we take Troy" (Il 1.127-9).
    The normal order is of course the king saying "follow me and you will get
    your reward when we take Troy". They come for a promise of loot and honor.<br>
    Basically, the whole quarrel is because Agamemnon cannot but see Achilles'
    action as an attempt to be the leader. <br>
    So that is his first attempt: power. As he learns quickly, he cannot have
    it.
</p>
<p>We have seen that Achilles cannot have power, Agamemnon already has it.
    In book 1, the first assembly, when Achilles is on the point of drawing
    his sword to kill Agamemnon, Athena intervenes. She is sent by Hera who is
    worried about both men: that makes sense because Achaean power is at stake
    here: they will never sack Troy if they start fighting among themselves.
    She convinces Achilles not to draw the sword and promises threefold gifts
    if he obeys her. His common sense wins out against his emotions and he
    does what she says. All this sets in motion the Plan of Zeus, where
    Achilles will stop taking part in the war, the Achaeans will lose because
    of that until they beg him and offer gifts to come back, thus restoring
    his honor and teaching Agamemnon a lesson. But, again, what about
    Achilles?</p>
<p>In book 9, the embassy to Achilles, he appears to get what he wanted:
    they offer him gifts, they do the begging but still he refuses, leaving
    his comrades quite stunned. He refuses to fight and threatens to go home
    to Phthia.</p>
<p>Thetis had prophesied to him that he had a choice of staying at home and
    gain no honor or going to Troy and have a short but glorious life (Il
    9.410-, recalling Euchēnor, boaster, who had a similar choice: go to Troy
    and be killed or stay at home and waste away from a terrible disease, Il
    13.663-. The disease of course is <em>shame</em>.)<br>
    A new version of Zeus' plan is born: Achilles will stay out of the
    fighting, Hector will breach the Achaeans' wall and set fire to the ships,
    making Achilles send his friend Patroclus instead of going himself. Hector
    will kill Patroclus and that will finally bring Achilles back into the
    battle. Achilles' motivation in all this is never explained by Homer (he
    never explains anything, he just shows the pictures). On the surface it's
    just continued anger with Agamemnon. But careful reading shows (e.g.
    9.401-) that the real reason is simply that he does not want to die. He is
    going for Athena's offer which implies that he should survive to enjoy his
    loot (9.364-). This could never be said out loud in a warrior society, nor
    could Homer write it about their hero but he makes it clear: Achilles
    would like to be a <em>Diomedes</em>.</p>
<br>
<p>
    [Instead of cleverness, wisdom or intelligence is often mentioned as her
    domain but this is too detached. She is an <em>acquiring</em> goddess, a
    desire, amoral and single-minded. She is the goddess of victory, and the
    goddess of plunder (Il 10.460). She is both a rule and a desire.<br>
    Athena can teach you how to be a hero, as she does with <a class="textlink txtfrmlink"
        title="goto diomedes" onclick="parent.loadAndGotoTextframeAnchor('2:1.1')">Diomedes</a>.
    This means not only killing many enemies but also knowing when to
    withdraw. A hero like this is a survivor, like Diomedes and Odysseus, not
    a gloriously dead one like Achilles, Patroclus or Hector who give their
    life in defense of their people. The former can of course never be as
    great or beautiful as the latter, which brings us to our next goddess:]
</p>
<h4>Other gods</h4>
<ul>
    <li>Zeus, Apollo</li>
    <li>Poseidon</li>
    <li>Ares</li>
    <li><a id="artemis">Artemis</a></li>
    <li>Hephaistos</li>
    <li>Hermes</li>
</ul>
<br>
<br>
<hr>
<ol id="footnotes">
    <li>The mention of Hesiod here may raise some questions which I hope to answer in due course.</li>
    <li>
        This picture can be seen as an illustration of the saying: "παθὼν δέ τε νήπιος ἔγνω (WD 218)":
        by suffering (having his skull split open), even the fool learns.
    </li>
    <li>
        The other occurrence of these words and the whole simile are in Il 15.267, where Hector after being wounded has been persuaded by Apollo ("why are you not fighting?") to rejoin the battle. Being wounded may be an excuse, but "beauty" knows no excuses: it will be diminished.
    </li>
    <li>
        the word is πείθω: actively, to persuade, prevail upon. Passive and medium: be persuaded, obey,
        believe, trust.
    </li>
    <li>
        This must be
        why many are called δῖος (god-like): because we respond to their call.
    </li>
    <li>
        I use "metaphysics" in the sense of "relating to the part of philosophy that is about understanding
        existence and knowledge" as in the Cambridge Dictionary.
    </li>
    <li>Hera is also the one who makes Achilles' horses talk until the Erinyes shut them up again (Il 19.407). For
        Achilles and the other horses it is not their place to talk, just obey silently.
    </li>
</ol>
<br>
<br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
