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
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Women</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">  </head>
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
      on the men involved. We all share the blame. And Aphrodite (Il 3.413) can be a
      very dangerous god.
    </p>
    <p>
      Helen, furthermore, is shown as full of remorse and self-loathing and already regretting
      the move that she made. But on the other hand, she is also true to type as never being
      quite satisfied with the husband she has.
      See e.g. her nagging when she finds Paris in the bedroom instead
      of the battlefield (Il 3.428-), or her antics when Hector comes to visit (Il 6.343-).

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
      having slept with some Trojan's wife, in revenge for Helen.
      Hector, of course, should have taken her advice (Il 6.429-). Hector apparently
      knows this but cannot follow it for fear of being called a coward. It is shame
      that kills him (just as it prevents him from going back to the city in Il 22.33-)
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
      they had no other means. But getting married and becoming accepted citizens?<br>
      There is another part to this story: see Od 19.518-. Here, one of the daughters kills her son
      'by her folly'. The son was by the king himself.
    </p>
    <p>
      This picture of 8th century BCE survival attempts of unprotected women should make clear
      the problems that Penelope faced. Odysseus knows of course but by mutual unspoken agreement they
      agree that nothing has happened. Nothing can be spoken out loud, not in this society.
    </p>
    <p>
      The Odyssey tells us: "go home, sailor, to your wife". He
      appears to play on the sailor's fear: when I come home, will my wife still be my wife?
      The Agamemnon-Clytemnestra story shows that this is not a given. But Odysseus does exactly the
      opposite of Agamemnon's advice (Od 11.441-) and things turn out a lot better for him.
    </p>
    <h4>4: the servant-girls</h4>
    <p>
      What should we do with the servant-girls?<br>
      Take them behind the shed and...<br>
      <div class="indent">22.443 θεινέμεναι ξίφεσιν τανυήκεσιν, εἰς ὅ κε πασέων<br>
        22.444 ψυχὰς ἐξαφέλησθε καὶ ἐκλελάθωντ᾽ Ἀφροδίτης,<br></div>
    <div class="indent">"strike them with your long swords, until from them all<br>
      you take their life and they forget about Love"<br></div>
    <p>
      But "take their life" can also be "make them swoon". Together with the sexual symbolism of 'sword', this means that there could be some wordplay here and that
      Odysseus is punishing them with the same thing that was their crime. Not altogether pc but
      better at any rate than the fate that Telemachus has in store for them.
    </p>
    <p>
      The latter's treatment of the girls I think is meant to raise eyebrows. As explained
      <a class="textlink" title="" href="">elsewhere</a>, the climax of both Iliad and Odyssey
      are gigantic overstatements: Homer is in Aristotelian terms, 'imitating impossibilities', technically as well as morally. The whole of both poems is geared to explaining to us that such things cannot and should not happen (fighting an army on your own, killing your host as guests or your guests as host etc.) but he uses it to reach a huge but ironical crescendo. These things are meant to shock us.
    </p>
    <p><br></p>
      <h4>5: Nausikaa</h4>
    <p>
    </p>
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
