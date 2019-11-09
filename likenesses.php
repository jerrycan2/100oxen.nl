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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" CONTENT="A dictionary of Homeric likenesses and Homer's use of them">
    <title>Homeric likenesses</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext"

          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="contents latin">
<h3>dictionary of Homeric likenesses</h3>
<p>When Luke writes about the shepherds who keep watch at night it should be
    understood that he is addressing 'leaders of the people', by whatever name
    they go. Shepherds as metaphor for kings is a universal figure of speech
    all over the Middle East and the 'not sleeping at night' is probably
    understood everywhere. Certainly Agamemnon found sleeping (Il 2.23-) is a
    severe criticism of him. So Luke is addressing his audience in a
    'semi-hidden' way, telling them he has something to offer for managing
    their flocks. Just so Homer is addressing 'kings' among his audience. Here
    is an incomplete overview of the likenesses<a class="ptr">(1)</a> used by him.</p>
<ul>
    <li>acrobat
        <ul>
            <li>'like an acrobat, jumping from horse to horse' (Il 15.679-): a
                self-reflective picture of the poet in performance.
            </li>
        </ul>
    </li>
    <li>Amazons
        <ul>
            <li>(?) 'the men over there are not real men, they're just women
                without breasts'. Propaganda to give emigrants a positive image of
                the target country and the possibility of conquering it.
                Cp. eldorado-myth, or Ofir, or calling a country
                'Greenland'.
            </li>
        </ul>
    </li>
    <li>animals
        <ul>
            <li>All animal picture is human metaphor, taking its meaning from the
                most important attribute(s): the <em>lion</em> from its being the
                strongest hunter, the <em>dog</em> from its slavish but also brave
                nature, the <em>eagle</em> from its soaring highest of all, and its
                keen vision, young animals are 'easy prey', etc. See also the
                individual animals.
            </li>
        </ul>
    </li>
    <li>beggar
        <ul>
            <li>the singer is like a beggar, because he comes to sing a song in
                exchange for a <em>meal</em>. The 'song' can of course also be a
                pitiful life's story, true or not, such as habitually told by
                beggars.
            </li>
            <li>the treatment of a beggar is a sharp measure of <i>justice</i></li>
        </ul>
    </li>
    <li>birds
        <ul>
            <li>birds of prey and carrion-eaters: they sit safely just outside or
                hover above the battlefield: it is a feast to them (as it is to the
                public: 'a prey for the dogs and a feast for the birds').
            </li>
            <li><a id="prophetic_birds">prophetic birds</a>: mostly birds of prey.
                The eagle, highest-flying, is therefore bird of Zeus. All other
                birds are less than he. Its characteristic action: soaring high -
                surveying all - seeing a target - pouncing down unstoppable to get
                what he wants, is a picture of a fateful <i>decision</i> being made
                and executed.
            </li>
            <li>songbirds: singers or mythical figures whose fate it is always to
                tell their (sorrowful) tale in this way
            </li>
            <li>geese: flocks of wild geese, prey for hunters (they gather in the
                'Asian meadow' in Lydia). Domesticated geese:they hang about the
                house, good for nothing, eating themselves fat. Their only purpose
                is to be killed for a meal.
            </li>
            <li>Odysseus' allegory of the nine birds Il 2.308: eight birds and one
                mother-bird killed by a snake - ref. Agamemnon's council, always
                eight people, plus Achilles who sees himself as a mother bird
                feeding its young in Il 9.323
            </li>
        </ul>
    </li>
    <li>boar
        <ul>
            <li>low but dangerous animal, known for hiding in bushes and suddenly
                attacking furiously. Odysseus was once wounded by a boar coming from
                its nest in the bush, and hides in just such a nest after landing on
                the island of the Phaeacians. Its meaning I would suppose to be is:
                'hidden danger on your path'
            </li>
        </ul>
    </li>
    <li><a id="black">black</a>
        <ul>
            <li><a class="textlink" href="#night">night</a>, death, mourning. Note
                the metaphor of 'gold turning black' (Il 18.548) for the effect that
                the Iliad is supposed to have on its audience (see <a class="textlink"

                                                                      href="#ploughing">ploughing</a>).
            </li>
        </ul>
    </li>
    <li>bow and arrow
        <ul>
            <li>fighting at a distance, with bow and arrow, carries a hint of
                cowardice (Paris, Pandaros). The poet stresses (with some irony)
                that part of doing battle is "encouraging others to fight". This can
                also be an important role of poetry. For Homer the exile 'fighting
                at a distance' thus takes on a special meaning.
            </li>
            <li>the lyre (phorminx, kithara) is like a bow, because of its strings
                (a bow can make a sound as well Od 21.404-11) and because, in the
                experience of a poet, he shoots words like arrows, 'feathered
                (usually <em>winged</em>) words' into the hearts of the people. The
                god that connects them both is Apollo: the <em>healer</em>, or
                prophet, also punisher by death or disease. The effect of being
                pierced by a poetical arrow is 'a pleasurable pain': they weep and
                they love it, they go home 'refreshed'. See e.g. the Contest for
                Odysseus' Bow, between him and the suitors (--&gt; the public)
            </li>
            <li>Apollo is called 'Silver Bow'; Achilles' lyre has a silver
                crossbar.
            </li>
            <li>ref. Pandaros' arrow, 'bearer of black pains' Il 4.104-</li>
        </ul>
    </li>
    <li>bread
        <ul>
            <li>bread: food for mortals, or for common people as opposed to
                aristocrats/warriors
            </li>
            <li>Patrocles heaps up the bread, Achilles cuts the meat - a level up
                in the men-gods hierarchy
            </li>
        </ul>
    </li>
    <li><a id="bronze">bronze</a>
        <ul>
            <li>gold - silver - bronze - iron symbolizes decline in the course of
                history acc. to Hesiod.
            </li>
            <li>living in the Iron Age, 'bronze' means 'of the past, of previous
                generations'. Since in the past they were Better Men, it also has a
                ring of heroic nobility. This in contrast with Iron, which is
                thoroughly unromantic and of 'today'
            </li>
        </ul>
    </li>
    <li>cave
        <ul>
            <li>Tartaros, 'a hole in the body of Mother Earth'. The gods came out
                of there, and some went back in: they became 'unborn-again'.
            </li>
            <li>a house ? (in the Odyssey) - 'an empty space, surrounded by earth'
                = mudbrick-and-stone house?
            </li>
        </ul>
    </li>
    <li>chariot
        <ul>
            <li>in Greece, in Homer's past, kings used to have chariot cavalry. In
                historic times, the Lydians were still famous for this type of
                warfare. (as in Sappho's poem: the Lydian chariots vs. the Greek
                heavy infantry). But in Greece there was never a possibility to have
                huge chariot-battles like they had in the Middle-East. More likely,
                the chariots in Mycenean times were a kind of quick-reaction force,
                to protect the rich kingdoms in the plains from attacks by cattle
                raiders.
            </li>
            <li>(?) in Homer's time, an army of foot soldiers would be led by a
                commander on horseback. He had a therapon with him to hold the horse
                in case of trouble or when dismounting to join the fighting (and to
                have it ready in case of defeat).
            </li>
            <li>A city and the men dwelling in it, led by their king, are like a
                team of horses drawing a chariot, steered by a king. In Homer, the
                horses are led by a charioteer and commanded by a king. This seems
                to indicate that the 'king' of the city need not be the actual
                leader of the army. The Diomedes-Aeneas-Pandaros episode (Il 5.166-)
                looks like it might be a discussion of this.
            </li>
        </ul>
    </li>
    <li>cicada
        <ul>
            <li>elders are like cicada's, known for the unceasing quality of their
                chirping.
            </li>
        </ul>
    </li>
    <li>cup
        <ul>
            <li>(depas) a thing that holds <em>wine</em>, a measure (portion) of
                pleasurable drink / intoxication. Listening to a singer also brings
                a sort of intoxication. The Iliad is described as wine (the Thracian
                wine that Od. offers to Polyphemus), or a mixing-bowl, or indeed a
                beaker ('Nestor's cup', also in the famous inscription). Il 11.624,
                1.471, 1.584, 3.3, 9.203, 15.86, 16.225, 23.219- , 24.101,
            </li>
        </ul>
    </li>
    <li>dance
        <ul>
            <li>battle: to know 'the steps of Ares' dance'; but otherwise dancing
                is quite an unheroic activity ('heroes of the dance-floor')
            </li>
        </ul>
    </li>
    <li>deer
        <ul>
            <li>in simile's: victim, prey for the hunter</li>
            <li>Odysseus and the monster-deer he caught (Od 10.168-), 'συνέδησα πόδας δεινοῖο πελώρου' (binding the fearful monster's feet, presumably to keep it from <a class="textlink" href="#running">running</a>), then he gathers the men, with sweet words approaching each man: "Men, we may be suffering, but we shall not go down to Hades before our Day of Fate comes", and invites them to a meal.</li>
        </ul>
    </li>
    <li>dogs
        <ul>
            <li>soldiers are 'the king's dogs', just as any servant can be called
                someone's dog. This a development of the shepherd and sheep
                metaphor: the shepherd may have dogs to help him protect and control
                the herd.
            </li>
            <li>Helen and Hera are called 'dog-eyed', the precise meaning is
                unclear
            </li>
            <li>Achilles and Hector are compared to dogs because of their
                blood-thirst
            </li>
            <li>Scylla is related to 'puppy' acc. to Homer (Od 12.86). This young
                hero - young dog comparison is also present in the tale of Odysseus'
                dog Argos (swift, like Achilles). In the palace, Odysseus will go
                into 'heroic mode' again: one last wag of Argos' tail.
            </li>
        </ul>
    </li>
    <li>dress
        <ul>
            <li>Aphrodite's robe: the Charites made it.</li>
            <li>Athena made her own clothes, and Hera's Il 14.178</li>
            <li>Hector's clothes: women made them Il 22.510</li>
        </ul>
    </li>
    <li>eagle
        <ul>
            <li>bird of Zeus. ref: Eagle crossing the sea, to the east. In the
                mouth of a leader of war, this word means: "God has told me to cross
                the sea and conquer that land".
            </li>
            <li>see <a class="textlink" href="#prophetic_birds">prophetic birds</a></li>
        </ul>
    </li>
    <li>east, west
        <ul>
            <li>sunrise, youth, things beginning -- sunset, old age, things
                ending.
            </li>
        </ul>
    </li>
    <li> Ethiopians
        <ul>
            <li>'burnt faces'? probably, because they live where the sun comes close</li>
            <li>but also: bright eyes</li>
            <li>or possibly: the ones looking upon the αἰθήρ (αἴθε = 'I wish') i.e. they do not have their feet on the ground. Zeus, unfortunately, is the one who occupies the Aither (Il 2.412)</li>
        </ul>
    </li>
    <li>helmet
        <ul>
            <li>The helmet with horsehair plume: the 'heroic' helmet - this hero
                is like a horse, the most noble animal.
            </li>
            <li>Odysseus' boar's tusk helmet (Il 10.260-): a fitting helmet for a
                thoroughly unheroic episode.
            </li>
        </ul>
    </li>
    <li>horse
        <ul>
            <li>The aristocratic animal <i>par excellence</i> and thus, a
                likeness of the noble warrior. Surely Achaean warriors loved to hear
                themselves described as "Achilles' horses".
            </li>
            <li>In this light, the epithet 'horse-taming' of the Trojans has a
                slightly ironical taste
            </li>
            <li>Achilles' speaking horse: it is Hera who gives it voice (Il
                19.407). Ref. also Il 1.55- where Hera makes Achilles himself talk.
            </li>
            <li>The Trojan Horse: a wooden horse, i.e. a horse that does not <a class="textlink"
                 href="#running">run</a>, but wins the war by metis (cleverness,
                trick) and patience.
            </li>
        </ul>
    </li>
    <li>hundred-arm (Briareus)
        <ul>
            <li>
                The picture of a hundred arms, fifty heads is easily linked to advanced phalanx-like fighting where a squadron of men has to act like a single being. If this is the metaphor, it is not easily relatable to what Hesiod says about Briareus (Th 149-, 617-, 714-, 734-, 817). It may be significant, however, that the Hundredarm is the actual fighting force behind Zeus' power (Il 1.402-) in Homer as well as in Hesiod.
            </li>
        </ul>
    </li>
    <li>hunting
        <ul>
            <li>it is like war: going out with a party of armed men, to kill
                something and bring back a trophy and some honor. If successful,
                they get to eat meat. Sometimes it is a more serious matter and the
                hunted is a dangerous plague.
            </li>
            <li>The role of hunter and hunted can be reversed: so Odysseus, while
                on a boarhunt, can be seriously wounded by the beast emerging from
                its lair. In Phaeacea he sleeps in just such a lair before he is
                confronted by Nausicaa and her maidens.
            </li>
            <li>also: Artemis huntress of 'wild beasts': she hunts by making noise
                (Keladeine). She doesn't kill them, she gathers them around her, and
                they obey her. Ref: Kirke and esp. Nausicaa. It is the behavior of a
                young maiden of marriageable age: she is both powerful and
                vulnerable but not to be abused, she is sacred to Artemis. It is not
                Aphrodite (lust) that makes her do this, it is the goddess of fertility.
            </li>
        </ul>
    </li>
    <li>iron
        <ul>
            <li>symbolizes harshness (<i>grey iron</i>) and energy (because it is
                created by <i>fire</i>; someone's<i> menos</i> can be like iron),
                i.e. Achilles.
            </li>
        </ul>
    </li>
    <li>ivory
        <ul>
            <li>Il 4.141- , a Carian or Maeonian woman 'staining the ivory red':
                obvious sexual connotations. Ivory is the color of a maiden's
                thighs, especially when it is 'sawn', parted for the first time.
                Ivory is strongly associated with female, e.g. Od 8.404 (sword and
                ivory scabbard), Od 18.196 (Penelope's complexion whiter than -,
                esp. Od 19.562-: the two gates of dreams, probably meaning female
                (ivory) and male (horn) .<br>
            </li>
        </ul>
    </li>
    <li>light
        <ul>
            <li>Note Nestor's exhortation to Patrocles, that he should fight to
                'become a light to the Achaeans' and the very Homeric irony of its
                fulfillment in bk 23
            </li>
        </ul>
    </li>
    <li>lion
        <ul>
            <li>main actor in many simile's, a picture of the Hero in all his forms</li>
        </ul>
    </li>
    <li>lotos
        <ul>
            <li>A plant which grows on rich land, presumably fertile flood-plains.
                Once you have tasted it, you forget all about homecoming or rowing and
                you just want to stay there. Homer does not say this, but it is related
                to Helen's medicine.
            </li>
        </ul>
    </li>
    <li>meal
        <ul>
            <li>Life is a meal: for common people, the portions are given out by
                the head of their household; for these, by their king or commander;
                for kings, by the gods.
            </li>
            <li>the size/quality of a portion is of course proportional to its
                honour and status. The 'equal meal' is thus a (new?) political
                concept
            </li>
            <li>The feast-meal (dais) is an important social event, and Homeric
                poetry is firmly associated with it.
            </li>
            <li>A battle is a meal, for the dogs and birds, and for Achilles Il
                19.xxx (Odysseus here wants to feed the army before the battle: this
                is to Achilles like feeding your dogs before the hunt. Hungry dogs
                are more fierce, but may be unwilling to give up the prey).
            </li>
            <li>Reflexively, the Iliad itself is a meal since it 'kills many men',
                assigning them their portions and also presenting them to us, the
                public, during a large public meal.
            </li>
        </ul>
    </li>
    <li>meat
        <ul>
            <li>Homeric heroes are never seen eating anything but meat. In this
                society, meat is only eaten after a sacrifice to the gods. see
                <a class="textlink" href="#bread">bread.</a>
            </li>
        </ul>
    </li>
    <li>medicine (pharmakon)
        <ul>
            <li>Odysseus' deadly medicine which he puts on the tip of his arrows (Od
                1.261): is this a reference to 'ink' he used for writing?
            </li>
            <li>Helen's clever medicine which banishes all negative feelings. This
                must be a comment on the cleverness of the 'Helen' myth. see <a class="textlink" title="Helen" href="women.php">Helen</a>
            </li>
            <li>
                pharmakos: the scapegoat-sacrifice. This sacrifice is performed to heal a
                community. Homer is quite aware of it, see Patrocles, Thersites, Achilles himself. <br>
                small pictures, possibly: Il 1.313, where they purify themselves and the 'dirt' goes into the sea,
                and Od 4.244- where Odysseus may be posing as a scapegoat.
            </li>
        </ul>
    </li>
    <li>mix with
        <ul>
            <li>in Greek: (often) to have sex with. Remember the complaint of
                Patrocles' ghost to Achilles: (literally translated) 'they will not
                let me mix across the river'. (Il 23.73 οὐδέ μέ πω μίσγεσθαι ὑπὲρ
                ποταμοῖο ἐῶσιν)
            </li>
        </ul>
    </li>
    <li>moly
        <ul>
            <li>It is a simple, humorous riddle. The context of male-female
                relations (Circe) gives it away. 'What grows that has black roots and a white
                flower, and is hard to uproot?'
            </li>
        </ul>
    </li>
    <li>monsters
        <ul>
            <li>Polyphemus Od 9.428; Skylla Od 12.87; Hephaistos Il 18.410; Aias,
                Hector, Achilles, a deer and Kirke's other animals, a snake
            </li>
        </ul>
    </li>
    <li>mule
        <ul>
            <li>a half-horse. E.g. a <i>nothos</i> (bastard son) is like a mule
                among horses. They are better at ploughing than oxen (Il 10.351-).
            </li>
        </ul>
    </li>
    <li><a id="night">night</a>
        <ul>
            <li>see <a class="textlink" href="#black">black</a>. 'To obey night'
                is to go to retire, to stop working or fighting
            </li>
            <li>'he came like night' (Apollo)</li>
        </ul>
    </li>
    <li>oar
        <ul>
            <li>see rowing. It probably had a wide range of metaphorical uses.</li>
        </ul>
    </li>
    <li>ox
        <ul>
            <li>a measure of value ('worth nine oxen')</li>
            <li>a symbol of strength</li>
        </ul>
    </li>
    <li>phoenix
        <ul>
            <li>'phoenix' appears in many meanings in Homer, but not connected to
                writing although the alfabet was called 'phoenician letters'. If it
                is true however that Homer and his Homeridae had a project of
                writing down the poems, 'Phoenix' might well have been a nickname
                for him.
            </li>
        </ul>
    </li>
    <li>Phthia
        <ul>
            <li>Achilles' homeland. He threatens to go there after refusing
                Odysseus' proposals during the embassy to Achilles. The word is
                connected to phthisis: wasting away, wane (as of the moon),
                recalling Euchēnor (Il 13.663-) who had the choice between getting
                killed in Troy or wasting away (phthisthai) of a terrible disease at
                home. (the disease is <em>shame</em> of course)
            </li>
        </ul>
    </li>
    <li>pig
        <ul>
            <li>A greedy animal that will destroy your garden in its drive to get
                more food. Thus we have a swineherd in ironical contrast with a
                shepherd.
            </li>
        </ul>
    </li>
    <li><a id="ploughing">ploughing</a>
        <ul>
            <li>Writing. As in boustrophedon - 'as the ox turns', i.e. writing
                alternatively right-to-left and left-to-right. Note that Odysseus is
                polutropos, 'of many turns'
            </li>
        </ul>
    </li>
    <li>rain, snow
        <ul>
            <li>Often, a symbol of Zeus' anger.</li>
        </ul>
    </li>
    <li>rainbow
        <ul>
            <li> Iris, the rainbow. The messenger of Zeus, one might say 'goddess of
                epiphany' (Il 24.173). Zeus never talks directly to humans, but always
                sends her (or Hermes) with a message. This does not absolve us from
                the duty of being critical about received epipanies: there is an
                example of Zeus sending an Evil Dream where one would have expected
                Iris, there is also the case of Iris being sent by Hera (il 18.182).
            </li>
        </ul>
    </li>

    <li>ram
        <ul>
            <li>A leader of sheep but not the shepherd. See e.g. Od 9.432</li>
        </ul>
    </li>
    <li>ransom
        <ul>
            <li>As the singer calls himself Ὅμηρος (hostage), the song he sings can
                be called an ἄποινα, a ransom.
            </li>
        </ul>
    </li>
    <li>river
        <ul>
            <li>Great kings have great rivers (and their plains), small kings have
                small ones, like the Meles river, but they all must have a water
                source. Rivers are very much life-giving entities so it is not not
                strange if people are described as 'children' of some river. In the
                metaphorical world the river then stands for the people living there.
            </li>
        </ul>
    </li>
    <li>rock
        <ul>
            <li>'from an oak or from a rock' appears in Hesiod as well as in
                Homer, (Il 22.126, Od 19.163) with frustratingly unclear meaning.
            </li>
            <li>'your heart is like a rock' - Skylla lives in a rock, untouchable
                - symbol of hardness
            </li>
        </ul>
    </li>
    <li>rowing
        <ul>
            <li>What the Ionians have to do: when they found that they could not
                conquer the Asian mainland, they had to choose the sea. This they
                actually did and it served them well, but Homer wrote in the time when
                they still had to make that choice. This is behind e.g. the picture of
                the Lotuseaters, but also behind the riddle-prophecy of Od 11.121-
                where Odysseus has to go until he meets with people who know nothing
                of the sea.
            </li>
        </ul>
    </li>

    <li><a id="running">running</a>
        <ul>
            <li>War, to the ancients, is 'running'. Homer notes with some ironical
                detachment its habit of running 'this way and that (ἔνθα καὶ ἔνθα)'.
                First, you run forward, then you throw your spear, then you run back,
                in the old-fashioned way of fighting. Also you may run in pursuit or
                to escape, like Achilles and Hector.
            </li>
        </ul>
    </li>
    <li>sacrifice, hecatomb
        <ul>
            <li>the typical description of an animal sacrifice and consequent meal
                is a whole collection of reflexive likenesses: the death of the
                animal, the lighting of the fire, the carving of the meat, piercing
                it with skewers (like spears), roasting it, the wine etc. Il 9.211,
                Il 1.457
            </li>
            <li>a sacrifice of a hundred oxen, a hecatomb, is a way to describe a
                major battle
            </li>
        </ul>
    </li>
    <li>scales
        <ul>
            <li>A symbol of Justice: Zeus' scales, or an old woman spinster weighing
                her wool: if the scale is not balanced, there is an injustice
                somewhere. The party whose side goes down, is having too much ('μηδὲν
                ἄγαν', nothing in excess).
            </li>
        </ul>
    </li>
    <li>sea
        <ul>
            <li><br>
            </li>
        </ul>
    </li>
    <li>shepherd and sheep
        <ul>
            <li>A likeness used everywhere to symbolize the relation
                between a king and his people. He protects them and makes the herd
                thrive, but make no mistake: they are there for <em>his</em> sake,
                they are his property, not the other way around. The good shepherd for
                instance does not sleep at night but keeps watch.
            </li>
        </ul>
    </li>
    <li>shield</li>
    <li>ship</li>
    <li>silver</li>
    <li>sing</li>
    <li>sit, stand</li>
    <li>sleep</li>
    <li>smoke, mist, cloud
        <ul>
            <li>that, which prevents us from seeing clearly. The gods may cause it, or lift it as they will.</li>
        </ul>
    </li>
    <li>snake
        <ul>
            <li>unclear symbol, in any case related to fear and death</li>
            <li>Achilles is the snake! Il 12.200-</li>
        </ul>
    </li>
    <li>son, daughter, child</li>
    <li>spear
        <ul>
            <li>main phallus symbol because of its shape and flesh-penetrating
                action (they can be 'craving for flesh' Il 21.70). Size is
                proportional to status in the manliness-hierarchy (Hector 11,
                Achilles 22 feet, the spear 'that no one can wield but he'). e.g: Athena raising her spear against Zeus Il
                8.424; Paris and Menelaos fighting 'with large spears' about Helen
                Il 3.254; sexual connotations in Il 18.207 where Achilles doesn't
                want to be the second; duels described as courtship in
                Achilles-Hector and in Il 13.289 (Meriones).
            </li>
            <li>two kinds of spear exist: the light throwing spear and the heavy
                one for thrusting as in hoplite fighting. (Achilles throws and
                misses, Hector throws and misses, Achilles thrusts and wins, spear
                conquers sword.
            </li>
            <li>δοῦρε δύω (two spears). Likeness? One for throwing away, one for keeping with you? Note that Hector dies for lack of a second spear.</li>
        </ul>
    </li>
    <li>star
        <ul>
            <li>Il 22.30 λαμπρότατος μὲν ὅ γ' ἐστί, κακὸν δέ τε σῆμα τέτυκται,<br>
                Achilles is like Orion's hound, the dog-star, 'though brightest of all, he is a sign of evil'.
                I wonder sometimes if the 'new star' of Bethlehem, the one that the 3 wise men follow, is a Hellenistic metaphor based on this one (except the evil part of course).
            </li>
        </ul>
    </li>
    <li>sun</li>
    <li>sunset</li>
    <li>sword</li>
    <li>tapestry</li>
    <li>teeth, tongue</li>
    <li>three and four
        <ul>
            <li>ref. our 'three times lucky': a fourth is one too many. Cp. the
                theme "3 times..and the fourth.." used in Patrocles' death or
                Hector's attack on the wall (a.o)
            </li>
        </ul>
    </li>
    <li>thunder and lightning
        <ul>
            <li>a thing to be feared in those days: 'anger from the sky' -&gt; the
                wrath of all-seeing Zeus, Justice made visible
            </li>
            <li>Athena and Hera thundering Il 11.45</li>
        </ul>
    </li>
    <li>tower</li>
    <li>treasure</li>
    <li>tree</li>
    <li>tripod</li>
    <li>wall and gate</li>
    <li>wasps</li>
    <li>waves</li>
    <li>whip</li>
    <li>wind(s)</li>
    <li>wine</li>
    <li><a id="winnow">winnowing shovel</a>:
        <ul>
            <li>(?) the
                instrument used for separating the good from the bad (Od 11.128). You carry it on
                your shoulders.
            </li>
        </ul>
    </li>
    <li>woman</li>
    <li>wound
        <ul>
            <li>a man (e.g. Achilles) can also be mentally wounded</li>
            <li>but a wound can also be a perfect excuse for no longer taking part
                in the fighting, as many Achaean heroes on day 3
            </li>
            <li>Apollo healing wounds e.g. Il 16.523</li>
        </ul>
    </li>
</ul>
<hr>
<ol id="footnotes">
    <li>I propose not to go into the technicalities of likenesses, simile's, symbols, metaphors, allegories, parable, analogy etc. All language based on an observation that A 'is-like' B when telling a story about B, I refer to as likeness. The special thing about Homer's poetry is that he can make his rhetoric work on both levels A and B.
    </li>
</ol>
<br>
<br>

<div class="mtime"><!--?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?--><br>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>
</body>
</html>
