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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>The Gods</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
  </head>
  <body class="latin contents" id="thegods">
    <header>
      <div id="up"><img id="zeus" src="images/zeus1.gif" alt="Zeus with thunderbolt facing Achilles"

          title="Zeus with thunderbolt facing Achilles"> </div>
      <div><img id="warrior" src="images/warrior1.gif" alt="Achilles with shield and spear facing Zeus"

          title="Achilles with shield and spear facing Zeus"> </div>
    </header>
    <h2>Homer's gods</h2>
    <p>In Homer, the gods are <em>what we obey</em> when we are doing something
      important. Without the gods we are 'mere bellies' (Hesiod Th 26), nothing
      noteworthy will come out of our hands. But when we make an important
      decision, fight a brave battle, create something new and interesting, we
      are obeying the gods. This is quite obvious when it comes to gods with a
      simple personification but it also applies to the main gods of the Iliad.</p>
    <p>This is not a new observation but I believe Homer has developed his ideas
      about the gods quite far.&nbsp; He links the gods to qualities that we see
      as being inside ourselves: e.g. cleverness, the drive for status and
      power, sexual desire and others. A closer discussion of these qualities is
      necessary because the Greek way of categorizing these 'drives' is not
      quite like our modern way. Homer gives an analysis of the different drives
      of Achilles as the events unfold and he comments on that in the
      interactions of lesser heroes (e.g. Diomedes, Odysseus) with the gods.<br>
      One important remark: this may sound as if I am reducing the gods to some
      psychological level, as if they were only a symbolic presentation of our
      human drives and intentions, personifications. This is not quite what I
      mean. I do not think that Homer, when he tells us that Odysseus is a
      favourite of Athena, is merely saying that O. is a clever guy. The
      'psychological' view is a very modern, individualistic view of humans, not
      applicable here. Martin West, in his 'Theogony', says the
      following about the gods representing abstractions like Sleep and Strife:</p>
    <p>"In Hesiod's time it was not understood what abstractions are [...]. They
      must be something; they are invisible, imperishable and have great
      influence over humans; they must be gods." I am not so sure about them not
      understanding abstractions, but the point is clear: these are forces that
      transcend individual humans, and that we <em>obey</em> (or not) as
      individuals or as groups. They come and go seemingly at their own whim: we
      cannot say "now I am going to be clever" and be sure that it will be so.
      Implicitly or explicitly we have to pray (or 'boast' which is the same
      thing), then act and hope for the best. Whether Homer is talking about
      actual metaphysical presences or exactly how he viewed these 'forces'
      seems an unanswerable question.</p>
    <p>There are two things that we may obey: rules and desires. I would suggest
      that female gods are 'desire' gods, while male gods 'rule'. Neither Homer
      nor Hesiod ever hints at something like this but the picture fits. Gods
      like Zeus, Ares and Apollo in Homer impose a rule on us. Goddesses like
      the three beauties Hera, Athena and Aphrodite represent desires. Athena in
      a way is both: a woman in man's armour, an armed maiden. More on Athena
      below. </p>
    <p> It should be noted that this 'intellectual' view of the gods belongs to
      Homer only and has very little to do with popular religion. Neither Hesiod
      nor any of the tragedians or philosophers gives clear sign of
      understanding the gods in this manner. If they did, they would not have
      been able to express this in public anyway, only Homer could get away with
      something like that. In fact the only one I find discussing these issues
      is Plato and he is ever reluctant to mention the gods at all. </p>
    <p><br>
    </p>
    <p>Sometimes people complain about the 'a-moral' character of most Greek
      gods. This is a misunderstanding and betrays a naive view of the gods as
      'larger people'. They may be depicted as such but we must not confuse the
      picture with what it depicts. The gods are 'what we obey', they represent
      only one rule or desire. Morality is something we may or may not obey and
      as such, it is a god: Zeus (I am talking about Ancient Greek morality, not
      modern Western). The other gods are not Zeus, they rule only their own
      domain so they are a-moral; our behaviour is a result of the conflicts
      between these gods.</p>
    <h2>Paris' judgement</h2>
    <p>Thetis, Achilles' mother, was supposed to marry Zeus. But after Zeus
      heard a prophecy that her son was destined to be greater than his father,
      he declined and married Thetis off to a mortal, the hero Peleus. At their
      wedding all the gods were invited except Eris (discord). She, in revenge,
      threw a golden apple into the hall inscribed 'for the most beautiful' and
      three goddesses, Hera, Athena and Aphrodite, claimed this honor. So there
      was to be a beauty contest and Zeus was to be the judge. He however,
      understandably declined. So they found a Trojan shepherd-prince, Paris
      (also called Alexander) to do the job.</p>
    <p>So the goddesses proceeded to bribe Paris: Hera offered him
      power/kingship, Athena offered him wisdom/success in war, Aphrodite
      offered him beauty. Paris chose beauty and Aphrodite so as reward he
      received the love of Helen, the most beautiful of women and took her to
      Troy. It is shown here that Paris 'obeys beauty' more than anything. So,
      by the way, does Zeus in 'the deception of Zeus'-episode (il 14.292-) in
      the centre of the Iliad.<br>
    </p>
    <figure> <a class="piclink" target="_blank" title="Paris' judgement" href="images/judgement.jpg"><img

          class="fitpage" alt="Paris' judgement" src="images/judgement.jpg" height="45%"

          width="80%"></a> <figcaption> Hermes leads the three goddesses
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
      </figcaption> </figure>
    <p>Helen however was already married to king Menelaos of Sparta who asked
      his brother king Agamemnon of Mycenea for help in raising an army from all
      of Greece to get her back. Thus the Trojan War started.<br>
      This story exists in many slight variations and re-tellings but I give it
      as Homer uses it (though he never refers to it directly) because it is
      absolutely crucial to understanding the Iliad. In this poem Achilles is
      the chooser and he gets to make the same choice as Paris: power, success
      in war or 'beauty'.<br>
      <br>
    </p>
    <h4>Hera</h4>
    <p>Hera, the eldest daughter of Kronos (in Homer, Il 4.59), is married to
      Zeus, his youngest son. In popular religion, her main domain appears to be
      marriage. This is fitting because in an aristocratic world marriage is
      inextricably linked to power. Also Zeus' power and Kronos' power before
      him must be seen as dependent on their marriage to the eldest daughter of
      their respective fathers. (More about the Titans and 'upward' marriages <a

        class="textlink" target="_self" title="kronos" href="kronos.php">here</a>).
      In the Iliad, Hera is always in conflict with Zeus about her power.<br>
      So the bribe that Hera offers is kingship, in other words power. Now note
      the following:<br>
      In Iliad 1.53/4 Achilles, in response to the bad situation the Achaeans
      are in, calls an assembly. It is <em>Hera</em> that put him up to it. But
      he does not call the council first, as is absolutely necessary in the
      Greek politics of the day. He makes proposals (let's go home or ask a
      seer) without even talking to the king first. These acts alone would brand
      him as a would-be tyrant in any polis of the archaic age. With typical
      Homeric irony, the poet reverses the roles in the scene where Agamemnon
      wants another prize and Achilles says 'when we take Troy' (Il 1.127-9).
      The normal order is of course the king saying 'obey me and you will get
      your reward when we take Troy'. They follow him for a promise of loot
      (=honor).<br>
      Basically, the whole quarrel is because Agamemnon cannot but see Achilles'
      action as an attempt to be the leader. <br>
      So that is his first attempt: power. As he learns quickly, he cannot have
      it.</p>
    <h4>Athena</h4>
    <p>Athena and the choice that she offers is one of the the main subjects in
      the Iliad and Homer has a great deal to say about it.<br>
      She is the daughter of Zeus and <span style="font-style: italic;">Mētis</span>
      (cleverness, craft, wisdom, trick). The story (not in Homer) is that again
      there was a prophecy that a child of hers would overthrow him, so he
      swallowed the pregnant Mētis in order to make the child his own (ref. <a

        class="textlink" target="_self" title="kronos" href="kronos.php">Kronos</a>).
      The child finally was born by splitting Zeus' head with an axe and a fully
      grown and armed maiden sprang out, his favourite daughter Athena.</p>
    <figure> <a class="piclink" target="_blank" title="Birth of Athena from Zeus' head"

        href="images/judgement.jpg"><img class="fitpage" alt="Birth of Athena" src="images/athbir.jpg"

          height="45%" width="50%"></a> <figcaption>Bronze relief, shield band
        panel from Olympia.<br>
        Birth of Athena. Zeus sits on his throne holding a thunderbolt as
        Athena, wearing a helmet and brandishing a spear and shield, emerges
        from his head. Eileithuia serves as midwife and Hephaistos moves away,
        having split Zeus' skull with an axe.<br>
        Image and text from: Art and Myth in Ancient Greece - T.H. Carpenter</figcaption></figure>
    <p> A mētis is a way to attain something by cleverness. It is know-how and
      know-when (boldness or caution). This dangerous and very powerful capacity
      is now to be ruled by Zeus as is his daughter but, as the Iliad shows, she
      is by no means fully under his command.<br>
      So the domains belonging to Athena now range from woman's handicraft like
      weaving (which can be <span style="font-style: italic;">clever</span>) to
      a full-scale war goddess. It is, in the Greek experience, after all not
      power alone that decides wars, it is most of all cleverness. In individual
      battle, Athena gives courage and fierceness (menos) because that is how to
      win in a battle. The <em>lochos</em> (ambush) is also her domain: lying
      in ambush, you know more about the world than the one you are ambushing.<br>
      Instead of cleverness, wisdom or intelligence is often mentioned as her
      domain but this is too detached. She is an <em>acquiring</em> goddess, a
      desire, amoral and single-minded. She is the goddess of victory, and the
      goddess of plunder (Il 10.460). She both a rule and a desire.<br>
      Athena can teach you how to be a hero, as she does with <a class="textlink txtfrmlink"

        title="goto diomedes" onclick="parent.loadAndGotoTextframeAnchor('2:1.1')">Diomedes</a>.
      This means not only killing many enemies but also knowing when to
      withdraw. A hero like this is a survivor, like Diomedes and Odysseus, not
      a gloriously dead one like Achilles, Patrocles or Hector who give their
      life in defense of their people. The former can of course never be as
      great or beautiful as the latter, which brings us to our next goddess:</p>
    <h4>Aphrodite</h4>
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
    <p>In an eyebrow-raising scene in book 5 (Il 5.330-430) Diomedes goes after
      the goddess, wounds her and chases her from the battlefield. More on this,
      and the relation Ares-Aphrodite <a class="textlink" target="_self" title="Helen, Ares and Aphrodite"

        href="helen.php">here</a>.</p>
    <p>So Paris judged that beauty was the thing to have/be. What about
      Achilles?</p>
    <h4>Achilles' judgement</h4>
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
      making Achilles send his friend Patrocles instead of going himself. Hector
      will kill Patrocles and that will finally bring Achilles back into the
      battle. Achilles' motivation in all this is never explained by Homer (he
      never explains anything, he just shows the pictures). On the surface it's
      just continued anger with Agamemnon. But careful reading shows (e.g.
      9.401-) that the real reason is simply that he does not want to die. He is
      going for Athena's offer which implies that he should survive to enjoy his
      loot (9.364-). This could never be said out loud in a warrior society, nor
      could Homer write it about their hero but he makes it clear: Achilles
      would like to be a <a class="textlink txtfrmlink" title="goto Diomedes" onclick="parent.loadAndGotoTextframeAnchor('2:1.1')">Diomedes</a>.</p>
    <h4>Other gods</h4>
    <ul>
      <li>Zeus, Apollo</li>
      <li>Poseidon  </li>
      <li>Ares</li>
      <li>Artemis</li>
      <li>Hephaistos</li>
      <li>Hermes</li>
    </ul>
    <p> <br>
    </p>
    <br>
    <br>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
