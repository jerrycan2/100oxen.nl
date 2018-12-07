<!DOCTYPE html>
<?php
$lastModified=filemtime(__FILE__);
header('Etag: '.'"'.$lastModified.'"');
header('Cache-Control: public');
function autoversion($file)
{
  if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
    return $file;

  $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}
?>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Homeric likenesses</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

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
      their flocks. Just so Homer is addressing 'kings' among his audience. Here is an
      incomplete overview of the language used by him.</p>
    <ul>
      <li>acrobat
        <ul>
          <li>'like an acrobat, jumping from horse to horse' (Il 15.679-): a
            self-reflective picture of the poet in performance. </li>
        </ul>
      </li>
      <li>Amazons
        <ul>
          <li>(?) 'the men over there are not real men, they're just women
            without breasts'. Propaganda to give emigrants a positive image of
            the target country. Cp. eldorado-myth, or Ofir, or calling a country
            'Greenland'. </li>
        </ul>
      </li>
      <li>animals
        <ul>
          <li>All animal picture is human metaphor, taking its meaning from the
            most important attribute(s): the <em>lion</em> from its being the
            strongest hunter, the <em>dog</em> from its slavish but also brave
            nature, the <em>eagle</em> from its soaring highest of all, and its
            keen vision, young animals are 'easy prey', etc. See also the
            individual animals. </li>
        </ul>
      </li>
      <li>beggar
        <ul>
          <li>the singer is like a beggar, because he comes to sing a song in
            exchange for a <em>meal</em>. The 'song' can of course also be a
            pitiful life's story, true or not, such as habitually told by
            beggars. </li>
          <li>the treatment of a beggar is a sharp measure of <i>justice</i></li>
        </ul>
      </li>
      <li>birds
        <ul>
          <li>birds of prey and carrion-eaters: they sit safely just outside or
            hover above the battlefield: it is a feast to them (as it is to the
            public: 'a prey for the dogs and a feast for the birds'). </li>
          <li><a id="prophetic_birds">prophetic birds</a>:
            mostly birds of prey. The eagle, highest-flying, is therefore bird
            of Zeus. All other birds are less than he. Its characteristic
            action: soaring high - surveying all - seeing a target - pouncing
            down unstoppable to get what he wants, is a picture of a fateful <i>decision</i>
            being made and executed. </li>
          <li>songbirds: singers or mythical figures whose fate it is always to
            tell their (sorrowful) tale in this way </li>
          <li>geese: flocks of wild geese, prey for hunters (they gather in the
            'Asian meadow' in Lydia). Domesticated geese:they hang about the
            house, good for nothing, eating themselves fat. Their only purpose
            is to be killed for a meal. </li>
          <li>Odysseus' allegory of the nine birds Il 2.308: eight birds and one
            mother-bird killed by a snake - ref. Agamemnon's council, always
            eight people, plus Achilles who sees himself as a mother bird
            feeding its young in Il 9.323 </li>
        </ul>
      </li>
      <li>boar
        <ul>
          <li>low but dangerous animal, known for hiding in bushes and suddenly
            attacking furiously. Odysseus was once wounded by a boar coming from
            its nest in the bush, and hides in just such a nest after landing on
            the island of the Phaeacians. Its meaning I would suppose to be is:
            'hidden danger on your path'</li>
        </ul>
      </li>
      <li><a id="black">black</a>
        <ul>
          <li><a class="textlink" href="#night">night</a>, death, mourning. Note
            the metaphor of 'gold turning black' (Il 18.548) for the
            effect that the Iliad is supposed to have on its audience (see <a class="textlink"
              href="#ploughing">ploughing</a>). </li>
        </ul>
      </li>
      <li>bow and arrow
        <ul>
          <li>fighting at a distance, with bow and arrow, carries a hint of
            cowardice (Paris, Pandaros). The poet stresses (with some irony)
            that part of doing battle is "encouraging others to fight". This can
            also be an important role of poetry. For Homer the exile 'fighting
            at a distance' thus takes on a special meaning. </li>
          <li>the lyre (phorminx, kithara) is like a bow, because of its strings
            (a bow can make a sound as well Od 21.404-11) and because, in the
            experience of a poet, he shoots words like arrows, 'feathered
            (usually <em>winged</em>) words' into the hearts of the people. The
            god that connects them both is Apollo: the <em>healer</em>, or
            prophet, also punisher by death or disease. The effect of being
            pierced by a poetical arrow is 'a pleasurable pain': they weep and
            they love it, they go home 'refreshed'. See e.g. the Contest for
            Odysseus' Bow, between him and the suitors (--&gt; the public) </li>
          <li>Apollo is called 'Silver Bow'; Achilles' lyre has a silver
            crossbar. </li>
          <li>ref. Pandaros' arrow, 'bearer of black pains' Il 4.104-</li>
        </ul>
      </li>
      <li>bread
        <ul>
          <li>bread: food for mortals, or for common people as opposed to
            aristocrats/warriors </li>
          <li>Patrocles heaps up the bread, Achilles cuts the meat - a level up
            in the men-gods hierarchy </li>
        </ul>
      </li>
      <li><a id="bronze">bronze</a>
        <ul>
          <li>gold - silver - bronze - iron symbolizes decline in the course of
            history acc. to Hesiod. </li>
          <li>living in the Iron Age, 'bronze' means 'of the past, of previous
            generations'. Since in the past they were Better Men, it also has a
            ring of heroic nobility. This in contrast with Iron, which is
            thoroughly unromantic and of 'today' </li>
        </ul>
      </li>
      <li>cave
        <ul>
          <li>Tartaros, 'a hole in the body of Mother Earth'. The gods came out
            of there, and some went back in: they became 'unborn-again'.</li>
          <li>a house ? (in the Odyssey) - 'an empty space, surrounded by earth'
            = mudbrick-and-stone house? </li>
        </ul>
      </li>
      <li>chariot
        <ul>
          <li>in Greece, in Homer's past, kings used to have chariot cavalry. In
            historic times, the Lydians were still famous for this type of
            warfare. (as in Sappho's poem: the Lydian chariots vs. the Greek
            heavy infantry). But in Greece there was never a possibility to have
            huge chariot-battles like they had in the Middle-East. More likely, the
            chariots in Mycenean times were a kind of quick-reaction force, to protect
            the rich kingdoms in the plains from attacks by cattle raiders.</li>
          <li>(?) in Homer's time, an army of foot soldiers would be led by a
            commander on horseback. He had a therapon with him to hold the horse
            in case of trouble or when dismounting to join the fighting (and to
            have it ready in case of defeat). </li>
          <li>A city and the men dwelling in it, led by their king, are like a
            team of horses drawing a chariot, steered by a king. In Homer, the
            horses are led by a charioteer and commanded by a king. This seems
            to indicate that the 'king' of the city need not be the actual leader
            of the army. The Diomedes-Aeneas-Pandaros episode (Il 5.166-) looks
            like it might be a discussion of this.</li>
        </ul>
      </li>
      <li>cicada
        <ul>
          <li>elders are like cicada's, known for the unceasing quality of their
            chirping. </li>
        </ul>
      </li>
      <li>cup
        <ul>
          <li>(depas) a thing that holds <em>wine</em>, a measure (portion) of
            pleasurable drink / intoxication. Listening to a singer also brings
            a sort of intoxication. The Iliad is described as wine (the Thracian
            wine that Od. offers to Polyphemus), or a mixing-bowl, or indeed a
            beaker ('Nestor's cup', also in the famous inscription). Il 11.624,
            1.471, 1.584, 3.3, 9.203, 15.86, 16.225, 23.219- , 24.101, </li>
        </ul>
      </li>
      <li>dance
        <ul>
          <li>battle: to know 'the steps of Ares' dance'; but otherwise dancing is quite
            an unheroic activity ('heroes of the dance-floor') </li>
        </ul>
      </li>
      <li>deer
        <ul>
          <li>victim, prey for the hunter</li>
        </ul>
      </li>
      <li>dogs
        <ul>
          <li>soldiers are 'the king's dogs', just as any servant can be called
            someone's dog. This a development of the shepherd and sheep
            metaphor: the shepherd may have dogs to help him protect and control
            the herd.</li>
          <li>Helen and Hera are called 'dog-eyed', the precise meaning is
            unclear</li>
          <li>Achilles and Hector are compared to dogs because of their
            blood-thirst</li>
          <li>Scylla is related to 'puppy' acc. to Homer (Od 12.86). This young
            hero - young dog comparison is also present in the tale of Odysseus'
            dog Argos (swift, like Achilles). In the palace, Odysseus will go
            into 'heroic mode' again: one last wag of Argos' tail.</li>
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
            the sea and conquer that land". </li>
          <li>see <a class="textlink" href="#prophetic_birds">prophetic birds</a></li>
        </ul>
      </li>
      <li>east, west
        <ul>
          <li>sunrise, youth, things beginning -- sunset, old age, things
            ending.</li>
        </ul>
      </li>
      <li>helmet
        <ul>
          <li>The helmet with horsehair plume: the 'heroic' helmet - this hero
            is like a horse, the most noble animal. </li>
          <li>Odysseus' boar's tusk helmet (Il 10.260-): a fitting helmet for a
            thoroughly unheroic episode. </li>
        </ul>
      </li>
      <li>horse
        <ul>
          <li>The aristocratic animal <i>par excellence</i> and thus, a
            likeness of the noble warrior. Surely Achaean warriors loved to hear
            themselves described as "Achilles' horses". </li>
          <li>In this light, the epithet 'horse-taming' of the Trojans has a
            slightly ironical taste </li>
          <li>Achilles' speaking horse: it is Hera who gives it voice (Il
            19.407). Ref. also Il 1.55- where Hera makes Achilles himself talk.
          </li>
          <li>The Trojan Horse: a wooden horse, i.e. a horse that does not <a class="textlink"

              href="#running">run</a>, but wins the war by metis (cleverness,
            trick) and patience. </li>
        </ul>
      </li>
      <li>house</li>
      <li>hunting
        <ul>
          <li>it is like war: going out with a party of armed men, to kill
            something and bring back a trophy and some honor. If successful,
            they get to eat meat. Sometimes it is a more serious matter and the
            hunted is a dangerous plague. </li>
          <li>The role of hunter and hunted can be reversed: so Odysseus, while
            on a boarhunt, can be seriously wounded by the beast emerging from
            its lair. In Phaeacea he sleeps in just such a lair before he is
            confronted by Nausicaa and her maidens. </li>
          <li>also: Artemis huntress of 'wild beasts': she hunts by making noise
            (Keladeine). She doesn't kill them, she gathers them around her, and
            they obey her. Ref: Kirke and esp. Nausicaa. It is the behavior of a
            young maiden of marriageable age: she is both powerful and vulnerable
            but not to be abused, she is sacred to Artemis. </li>
        </ul>
      </li>
      <li>iron
        <ul>
          <li>symbolizes harshness (<i>grey iron</i>) and energy (because it is
            created by <i>fire</i>; someone's<i> menos</i> can be like iron),
            i.e. Achilles. </li>
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
      <li>light</li>
      <li>lion</li>
      <li>lotos</li>
      <li>lyre</li>
      <li>mast</li>
      <li>meal
        <ul>
          <li>Life is a meal: for common people, the portions are given out by
            the head of their household; for these, by their king or commander;
            for kings, by the gods. </li>
          <li>the size/quality of a portion is of course proportional to its
            honour and status. The 'equal meal' is thus a (new?) political concept </li>
          <li>The feast-meal (dais) is an important social event, and Homeric
            poetry is firmly associated with it.</li>
          <li>A battle is a meal, for the dogs and birds, and for Achilles Il 19.xxx
            (Odysseus here wants to feed the army before the battle: this is to Achilles
            like feeding your dogs before the hunt. Hungry dogs are more fierce,
            but may be unwilling to give up the prey). </li>
          <li>Reflexively, the Iliad itself is a meal since it 'kills many men',
            assigning them their portions and also presenting them to us, the
            public, during a large public meal. </li>
        </ul>
      </li>
      <li>meat
        <ul>
          <li>Homeric heroes are never seen eating anything but meat. In this
            society, meat is only eaten after a sacrifice to the gods.
            see <a class="textlink" href="#bread">bread</a>
          </li>
        </ul>
      </li>
      <li>mixing bowl</li>
      <li>mix with</li>
      <li>moly</li>
      <li>monsters
        <ul>
          <li>Polyphemus Od 9.428; Skylla Od 12.87; Hephaistos Il 18.410; Aias,
            Hector, Achilles, a deer and Kirke's other animals, a snake </li>
          <li>kEtos: hollow -&gt; gaping mouth -&gt; monster. Monsters from the
            deep watch Poseidon...Il 13.27 </li>
        </ul>
      </li>
      <li>moon</li>
      <li>mountain</li>
      <li>mule
        <ul>
          <li>a half-horse. E.g. a <i>notos</i> (bastard son) is like a mule
            among horses. Usually unwilling to work.</li>
        </ul>
      </li>
      <li><a id="night">night</a>
        <ul>
          <li>see <a class="textlink" href="#black">black</a>. 'To obey night'
            is to go to retire, to stop working or fighting </li>
          <li>'he came like night' (Apollo)</li>
        </ul>
      </li>
      <li>oar, rowing</li>
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
            for him. </li>
        </ul>
      </li>
      <li>Phthia
        <ul>
          <li>Achilles' homeland. He threatens to go there after refusing
            Odysseus' proposals during the embassy to Achilles. The word is
            connected to phthisis: wasting away, wane (as of the moon),
            recalling Euchēnor (Il 13.663-) who had the choice between getting
            killed in Troy or wasting away (phthisthai) of a terrible disease at
            home. (the disease is <em>shame</em> of course) </li>
        </ul>
      </li>
      <li>pig</li>
      <li><a id="ploughing">ploughing</a></li>
      <ul>
        <li>Writing. As in boustrophedon - 'as the ox turns', i.e. writing
          alternatively right-to-left and left-to-right. Note that Odysseus is 
          polutropos, 'of many turns'</li>
      </ul>
      <li>rain, snow</li>
      <li>rainbow</li>
      <ul>
        <li> Iris, the rainbow. The messenger of Zeus, one might say 'goddess of
          epiphany' (Il 24.173). Zeus never talks directly to humans, but always sends her
          (or Hermes) with a message. This does not absolve us from the duty of
          being critical about received epipanies: there is an example of Zeus
          sending an Evil Dream where one would have expected Iris, there is
          also the case of Iris being sent by Hera (il 18.182). </li>
      </ul>
      <li>ransom</li>
      <ul>
        <li>As the singer calls himself Ὅμηρος (hostage), the song he sings can be called
          an ἄποινα, a ransom. 
        </li>
      </ul>
      <li>river</li>
      <li>rock 
        <ul>
          <li>'from an oak or from a rock' appears in Hesiod as well as in Homer,
              (Il 22.126, Od 19.163) with frustratingly unclear meaning.</li>
          <li>'your heart is like a rock' - Skylla lives in a rock, untouchable
            - symbol of hardness </li>
        </ul>
      </li>
      <li>running</li>
      <li>sacrifice, hecatomb
        <ul>
          <li>the typical description of an animal sacrifice and consequent meal
            is a whole collection of reflexive likenesses: the death of the
            animal, the lighting of the fire, the carving of the meat, piercing
            it with skewers (like spears), roasting it, the wine etc. Il 9.211,
            Il 1.457 </li>
          <li>a sacrifice of a hundred oxen, a hecatomb, is a way to describe a
            major battle </li>
        </ul>
      </li>
      <li>salt</li>
      <li>scales</li>
      <li>sea</li>
      <li>shadow</li>
      <li>shepherd and sheep, goat</li>
      <li>shield</li>
      <li>ship</li>
      <li>shoulders
        <ul>
          <li>Carry on your shoulders: you carry your <b>head</b> on your
            shoulders. E.g. Il 19.11, Od 11.126-8 (see <a class="textlink" href="#winnow">winnowing
              shovel</a>) </li>
        </ul>
      </li>
      <li>silver</li>
      <li>sing</li>
      <li>sit, stand</li>
      <li>sleep</li>
      <li>smoke, mist, cloud</li>
      <li>snake
        <ul>
          <li>? lowest of animals, crawls on its belly all the time</li>
          <li>? poisonous --&gt; unclean</li>
          <li>? snakes are prey for eagles -&gt; ref. Homer's eagle-simile's.</li>
          <li>treacherous attack --&gt; the enemy</li>
          <li>refs: Hdt. horses eating snakes; Il 2.308 at Aulis; Il 11.26 Aga.
            breastplates 39 shield; Il 3.33 simile; </li>
        </ul>
      </li>
      <li>son, daughter, child</li>
      <li>spear
        <ul>
          <li>main phallus symbol because of its shape and flesh-penetrating
            action (they can be 'craving for flesh' il 21.70). Size is
            proportional to status in the manliness-hierarchy (Hector 11,
            Achilles 22 feet). e.g: Athena raising her spear against Zeus Il
            8.424; Paris and Menelaos fighting 'with large spears' about Helen
            Il 3.254; sexual connotations in Il 18.207 where Achilles doesn't
            want to be the second; duels described as courtship in
            Achilles-Hector and in Il 13.289 (Meriones). </li>
          <li>two kinds of spear exist: the light throwing spear and the heavy
            one for thrusting as in hoplite fighting. (Achilles throws and
            misses, Hector throws and misses, Achilles thrusts and wins, spear
            conquers sword. </li>
        </ul>
      </li>
      <li>spring</li>
      <li>star</li>
      <li>sun</li>
      <li>sunset</li>
      <li>sword</li>
      <li>tapestry</li>
      <li>teeth, tongue</li>
      <li>three and four
        <ul>
          <li>ref. our 'three times lucky': a fourth is one too many. Cp. the
            theme "3 times..and the fourth.." used in Patrocles' death or
            Hector's attack on the wall (a.o) </li>
        </ul>
      </li>
      <li>thunder and lightning
        <ul>
          <li>a thing to be feared in those days: 'anger from the sky' -&gt; the
            wrath of all-seeing Zeus, Justice made visible </li>
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
      <li><a class="textlink" id="winnow">winnowing shovel</a>: (?) the
        instrument used for separating the good from the bad (Od 11.128) </li>
      <li>woman</li>
      <li>wound
        <ul>
          <li>a man (e.g. Achilles) can also be mentally wounded</li>
          <li>but a wound can also be a perfect excuse for no longer taking part
            in the fighting, as many Achaean heroes on day 3 </li>
          <li>Apollo healing wounds e.g.Il 16.523</li>
        </ul>
      </li>
    </ul>
    <span class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?></span>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>
  </body>
</html>
