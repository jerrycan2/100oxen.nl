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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="Description" CONTENT="A description of the important women in Iliad and Odyssey">
    <title>Achaean Women</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
  </head>
  <body class="latin contents">
    <h1>Achaean Women</h1>
    <p>
      Homer clearly loves women. All his main adult heroines Helen, Andromache, Arete, and Penelope
      he shows to be cleverer and more realistic than their husband(s). There are no evil people
      in Homer, only fools; and the women are no fools.
    </p>
    <h4>1: Helen</h4>
    <p>
      In his opposition to the 'abduction of Helen' myth, Homer has to be very careful about the
      picture he draws of the woman. The discussion also takes place, at least partially,
      within the world of myth.
    </p>
    <p>
      So Helen was not abducted as in (what I suppose to be) the original myth.
      Homer makes clear that she follows Paris to Troy because she fell in love with him.
      It is Aphrodite who made her do this, providing Paris with the 'beauty' (μαχλοσύνη<a class="ptr">(1)</a>)
      she bribed him with. In mythical terms, this undercuts the argument for going there with
      an army but it also appears to put the blame on the woman. This is not what Homer, who is
      always concerned to paint a positive picture of the women in his story, wants because
      poetically, Helen stands for "all women". Significant is the remark by Priam (Il 3.164),
      one of Homer's disguises: "I do not blame you, I blame the gods". Obeying a god does
      not diminish our personal responsibility but we can see that: a) there are more gods
      involved than just Aphrodite and b) their forces work not just on her but also
      on the men involved. We all share the blame for the war. And Aphrodite (Il 3.413) can be a very dangerous god.
    </p>
    <p>
      Helen, furthermore, is shown as full of remorse and self-loathing and regretting
      the move that she made. But on the other hand, she is also true to type as never being
      quite satisfied with the husband she has.
      See e.g. her nagging when she finds Paris in the bedroom instead
      of the battlefield (Il 3.428-), or her antics when Hector comes to visit (Il 6.343-).
    </p>
    <p>
      All this approaches Helen as a full-blooded human being. Generic, but still full-blooded. But there is another aspect of her (and of Penelope, and to a lesser degree of any woman mentioned in these poems): she is The Prize. Our being Number One depends on her presence, she is the image of the goddess of victory. This is something else than a human being and for us it complicates attempts to understand the poems. For instance in the Odyssey, when Menelaos and his guests start weeping over all the suffering caused by the Trojan war (Od 4.219-), Helen produces a clever medicine (φάρμακα μητιόεντα, given by Πολύδαμνα 'seduces all') that will make them bear any suffering without shedding a tear. Here she is acting in her capacity of being 'what men fight for' rather than as Helen the woman.
    </p>
    <p><br></p>
      <h4>2: Andromache</h4>
    <p>
      In the figures of Andromache and her son, Homer pulls out all the emotional stops.
      She is shown to be loving, loyal, vulnerable and dependent,
      just as we heroes would like to see our wives. Her
      fate and that of Astyanax is made very clear to us.
      Let us not forget that she is one of the 'Trojan wives' that Nestor is
      talking about when he states that no Achaean should go home before
      having slept with some Trojan's wife, in revenge for Helen (Il 2.354-). Her name says it already,
      she is 'what men fight for'. In that way, she is the link between the "symbol of victory" and real
      human beings.<br>
      Hector, of course, should have taken her advice (Il 6.429-). Hector apparently
      knows this but cannot follow it for fear of being called a coward. It is shame
      that kills him (it prevents him from going back to the city in Il 22.33-)
      and she pays the price.
    </p>
    <p><br></p>
    <h4>3: Penelope</h4>
    <p>
      Did she do it? Did she sleep with one of the suitors? Homer never gives it away
      but if you read between the lines the answer is clear. Of course she did, she had to.
      She needed the protection of at least one of the powerful men around her to keep
      her head above water, and who knows if there were other motives. There are several
      things which give it away:<br>
      1) Telemachus' attitude towards his mother and towards the disloyal servant-girls. <br>
      2) Her whole super-careful approach. This, to her, in archaic times, is a life-and-death
      situation. He can kill her and no one will lift a finger to protect her. But most telling of all:
      <p>
      3) Her prayer to Artemis, worth quoting here:
      <div class="indent">
      20.61 Ἄρτεμι, πότνα θεά, θύγατερ Διός, αἴθε μοι ἤδη<br>

      20.62 ἰὸν ἐνὶ στήθεσσι βαλοῦσ᾽ ἐκ θυμὸν ἕλοιο<br>

      20.63 αὐτίκα νῦν, ἢ ἔπειτα μ᾽ ἀναρπάξασα θύελλα<br>

      20.64 οἴχοιτο προφέρουσα κατ᾽ ἠερόεντα κέλευθα,<br>

      20.65 ἐν προχοῇς δὲ βάλοι ἀψορρόου Ὠκεανοῖο.<br>

      20.66 ὡς δ᾽ ὅτε Πανδαρέου κούρας ἀνέλοντο θύελλαι:<br>

      20.67 τῇσι τοκῆας μὲν φθῖσαν θεοί, αἱ δ᾽ ἐλίποντο<br>

      20.68 ὀρφαναὶ ἐν μεγάροισι, κόμισσε δὲ δῖ᾽ Ἀφροδίτη<br>

      20.69 τυρῷ καὶ μέλιτι γλυκερῷ καὶ ἡδέϊ οἴνῳ:<br>

      20.70 Ἥρη δ᾽ αὐτῇσιν περὶ πασέων δῶκε γυναικῶν<br>

      20.71 εἶδος καὶ πινυτήν, μῆκος δ᾽ ἔπορ᾽ Ἄρτεμις ἁγνή,<br>

      20.72 ἔργα δ᾽ Ἀθηναίη δέδαε κλυτὰ ἐργάζεσθαι.<br>

      20.73 εὖτ᾽ Ἀφροδίτη δῖα προσέστιχε μακρὸν Ὄλυμπον,<br>

      20.74 κούρῃς αἰτήσουσα τέλος θαλεροῖο γάμοιο—<br>

      20.75 ἐς Δία τερπικέραυνον, ὁ γάρ τ᾽ εὖ οἶδεν ἅπαντα,<br>

      20.76 μοῖράν τ᾽ ἀμμορίην τε καταθνητῶν ἀνθρώπων—<br>

      20.77 τόφρα δὲ τὰς κούρας ἅρπυιαι ἀνηρείψαντο<br>

      20.78 καί ῥ᾽ ἔδοσαν στυγερῇσιν ἐρινύσιν ἀμφιπολεύειν:<br><br>

      "Great Goddess Artemis, daughter of Zeus, drive an arrow into my heart and slay me; or let some whirlwind
        snatch me up and bear me through paths of darkness till it drop me into the mouths of overflowing Okeanos, as it
        did the daughters of Pandareus. The daughters of Pandareus lost their father and mother, for the gods killed
        them, so they were left orphans. But Aphrodite took care of them, and fed them on cheese, honey, and sweet wine.
        Hera taught them to excel all women in beauty of form and understanding; Artemis gave them an imposing presence,
        and Athena endowed them with every kind of accomplishment; but one day when Aphrodite had gone up to Olympus to
        see Zeus about getting them married (for well does he know both what shall happen and what not happen to every
        one) the storm winds came and spirited them away to become handmaids to the dread Erinyes."
    </div>
    <p>
      "Aphrodite took care of them": that should tell us enough; they lived off those gifts for
      they had no other means. The local men could have sex for a pound of cheese. But getting married and becoming accepted citizens?<br>
      There is another part to this story: see Od 19.518-. Here, one of the daughters kills her son 'by her folly'. The son was by the king himself.
    </p>
    <p>
      This picture of 8th century BCE survival attempts of unprotected women should make clear
      the problems that Penelope faced. Odysseus knows of course but by mutual unspoken agreement they
      agree that nothing has happened. Nothing can be spoken out loud, not in this society.
    </p>
    <p>
      The Odyssey tells us: "go home, sailor, to your wife". He
      appears to discuss the sailor's fear: when I come home, will my wife still be my wife?
      The Agamemnon-Clytemnestra story (as well as Helen and Menelaos) shows that this is not a given. But Odysseus does exactly the
      opposite of Agamemnon's advice (Od 11.441-) and things turn out a lot better for him.
    </p>
    <h4>4: the servant-girls</h4>
    <p>
      What should we do with the servant-girls?<br>
      Take them behind the shed and...<br>
    </p>
      <div class="indent">22.443 θεινέμεναι ξίφεσιν τανυήκεσιν, εἰς ὅ κε πασέων<br>
        22.444 ψυχὰς ἐξαφέλησθε καὶ ἐκλελάθωντ᾽ Ἀφροδίτης,<br></div>
    <div class="indent">"strike them with your long swords, until from them all<br>
      you take their life and they forget about Love"<br></div>
    <p>
      But "take their life" can also mean "make them swoon". Together with the sexual symbolism of 'sword', this means that there could be some wordplay here and that
      Odysseus is proposing to punish them with the same thing that was their crime. Not altogether pc but
      better at any rate than the fate that Telemachus has in store for them.
    </p>
    <p>
      The latter's treatment of the girls I think is meant to raise eyebrows. As explained
      <a class="textlink" title="" target="_self" href="<?php echo autoversion('/sorry.php');?>">elsewhere</a>, the climax of both Iliad and Odyssey
      are gigantic overstatements: Homer is in Aristotelian terms, 'imitating impossibilities', technically as well as morally. The whole of both poems is geared to explaining to us that such things cannot and should not happen (fighting an army on your own, killing your host as guests or your guests as host etc.) but he uses it to reach a huge but ironical crescendo. These things are meant to shock us.
    </p>
    <p><br></p>
      <h4>5: Arete</h4>
    <p>
      "Pass by my father, go to my mother and clasp her knees if you want to see your homecoming..."
      (Od 6.310-, Nausikaa to Odysseus).
      If one finds a piece of literature where the woman is the dominant force in the household, no matter how common this may be in reality, literary comedy is always suspected. I do think the Phaeacia-episode is comedy of manners. It is not a description of an earthly paradise or a bridge between the dead and the living, it is a humorous comment on contemporary habits and, as always in comedy, between what we <em>say</em> we are and what we actually are. The episode may also contain, as described <a class="textlink" title="instructions to rhapsode" target="_self" href="<?php echo autoversion('/rhapsode.php');?>">here</a>, basic instructions for a singer on how to visit a town where a public feast is held.
    </p>
    <p>
      It is highly unlikely that bursting in to an ancient Greek household, going up to the lady of the house and embracing her knees will get you anything except thrown out, at least. This must be comedy. As a metaphor it works better: to acquire the good opinion of the mistress is probably a great advantage if you want their help. One of the clever things Odysseus does is weaving in the list of heroines (and his mother) to the first part of his visit to the underworld, causing Arete to be the first to speak in praise (Od 11.336-) (Note the subsequent speech by Alkinoos, reminding us that <em>he</em> is the chief here(Od 11.353)).
    </p>
    <p><br></p>
      <h4>6: Nausikaā</h4>
      <div class="indent">
      6.115 σφαῖραν ἔπειτ᾽ ἔρριψε μετ᾽ ἀμφίπολον βασίλεια:<br>
      6.116 ἀμφιπόλου μὲν ἅμαρτε, βαθείῃ δ᾽ ἔμβαλε δίνῃ:<br>
      6.117 αἱ δ᾽ ἐπὶ μακρὸν ἄυσαν: ὁ δ᾽ ἔγρετο δῖος Ὀδυσσεύς,<br>
      <br>
      The princess threw a ball to one of the maids,<br>
      who missed it and it fell in deep water.<br>
      They shouted loudly, waking up Odysseus...<br>
    </div>
    <p>
    This game is called 'hunting by making noise' and it is an activity of the goddess <a class="textlink" title="about Artemis" target="_self" href="<?php echo autoversion('/thegods.php#artemis');?>">Artemis</a> (Keladeine) (Od 6.151), protector of virgins. Odysseus here is like one of the wild beasts that she gathers around her (6.130-), also he is coming out of a hiding place like that of the wild boar that wounded him (Od 5.475-, 19.439-). Circe can do the same trick though she is probably no virgin. The latter's picture is somewhat more complicated (see below). The picture of Nausikaa is so lovingly drawn, she must be based on someone special. Either I am not the first to feel this, or there was some remaining knowledge about the poet, but in the traditional tales about Homer there is a daughter. Her husband will be the successor of her father as leader of the Homeridae.
    </p>
    <p>
      Nausikaa's excursion (book 6) to wash their clothes is very much like an aristeia. She has much to win (a husband), much to lose (a reputation) and successful action depends on her finding the fine line between not going far enough and going too far:
    </p>
      <ul>
      <li>The dream beforehand, the inspiration by Athena</li>
      <li>Her wagon, like a chariot; her maids like her Myrmidons</li>
      <li>She is brave: when Odysseus approaches, she alone stays (6.139)</li>
      <li>She treats Odysseus like a captive (6.316-)</li>
    </ul>
  <p>But make no mistake: Nausikaa is a handful, for her parents:</p>
      <ul>
      <li>She talks to strangers, wearing no veil (6.100)</li>
      <li>She does not tell her father</li>
      <li>She does not show the stranger into town, she shows him a hiding place (where the women come!)</li>
      <li>Odysseus appears before her parents dressed in her father's or her brother's clothes</li>
    </ul>
  <p>
      Her father is apparently not one to get angry easily. But he does offer her hand in marriage even before he knows the stranger's name... (Od 7.313)
    </p>
    <p>
      No doubt piracy, robbery and kidknapping were real dangers for anyone living near where a ship could land and children were carefully instructed what to do when seeing strangers. A reaction like that of the Laestrygonians (Od 10.82-) seems rather more realistic.
    </p>
    <p><br></p>
    <h4>7: Circe</h4>
    <p>...</p>
    <br><br>
    <hr>
    <ol id="footnotes">
        <li>μαχλοσύνη (Il 24.30) is a word under discussion. LSJ translates it as 'lewdness, lust'
          and Aristarchus rejects it as effeminate. But see Homer's initial picture of Paris: the
          bravado, the pantherskin (Il 3.16-) and Hector's words in Il 3.39-. He is 'pretty boy' Paris,
          the hero of the dance floor, the one whom all the girls fall for. If you seek a Paris,
          you will find him in the bedroom, not on the battlefield. In contemporary terms:
          Helen and Paris are the Prom Queen and Prom King of the day (but there are no Prom Kings on
          the battlefield). It is this kind of beauty that μ. is supposed to signify.
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
