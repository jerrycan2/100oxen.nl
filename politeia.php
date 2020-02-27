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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="Description" CONTENT="The politics of power in the ancient world">
    <title>Homer's Politeia</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

      rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
  </head>
  <body class="latin contents">
    <h1>Homer's Politeia</h1>
    <p>An Egyptian pyramid is a very clear statement: it is a picture of a society,
      stressing its hierarchy. Like society, every higher layer of the building rests on, is
      supported by, a layer below it which is larger in size. The golden top, where earth meets heaven, represents the Farao. This is
      fitting since the Egyptian ruler is <em>a god on earth</em>. Such is the picture,
      carved out in stone, of a society ruled by a divine King: everyone is
      below him, conceptually his slave.</p>
    <p>There are other possibilities for organizing a society. The choice that
      Israel made (before the time of Saul and David) was a kingless society. A
      topless pyramid as it were, still hierarchical on the lower levels but this
      did not go all the way to the top. The top of this pyramid, the divine ruler to be obeyed is in heaven, is "virtual", and, this must be emphasized, never comes down to earth<a class="ptr">(1)</a>. It is no less important to obey him, though. There still is a ruling class of course, they are conceptually all equal (the highest layer of the topless pyramid), and free. The
      Phoenicians with their city-states are another example of this option
      and, as I will argue, the post-Mycenean Greeks probably learned from them
      how to organize such a society.</p>
    <p>This situation is an example of the tensions which naturally
      arise in any larger, hierarchical society. There is tension between the
      very top (the King) and the layer below it (the aristocracy). The latter
      desires to be free of Kingly rule, it is usually only because of the
      presence of war, the need for a leader, that they tolerate
      kingly rule at all. The aristocracy after all is the military stratum par
        excellence. The bottom layer (the common people) are ruled or
      exploited by the aristocracy and desire to be free of <em>them</em>.
      Often the common people regard the King as an ally against their local
      rulers<a class="ptr">(1)</a>. Since all three layers of society have a power of their own which
      is not to be ignored, there exists a love triangle which can be found
      all through history.</p>
    <p>So both types of society, the "divine king" model and the "topless
      pyramid" have their intrinsic problems. The Greeks, who in their Myceanean
      past had divine kings (as far as we can tell) were in Homer's day
      working on the establishment of the Phoenician model of independent, equal
      (in principle) city-states and no King. No gods on earth. How is it possible to get local
      rulers to cooperate to maintain such a system? Supposedly they would go to
      war with each other until one comes out on top, proclaiming himself King.
      If no one is strong enough for that, that still would not stop them going
      to war just to get one-up on their neighbours. War, after all, is the raison d'être of an
      aristocracy (Il 12.310-). This situation the Greeks
      called 'stasis'<a class="ptr">(2)</a>. So how can this work?
    </p>
    <br>
    <h5>The Oath of the Styx</h5>
    <p>Hesiod, in his Theogony, has the following important scene:</p>
    <div class="indent">
    <p>
      “[...]For so did Styx the deathless daughter of Ocean plan
      on that day when the Olympian Lightning god called all the deathless gods to great Olympus, and said that
      whosoever of the gods would fight with him against the Titans, he would not cast him out from his rights,
      but each should have the privileges which he had before amongst the deathless gods.
      And he declared that he who was without honours or right under Kronos, should be raised to both honours and
      rights as is just.” <br>
      (Th 389-)
    </p> <br>
    </div>
    <p>
      Why Styx? The river Styx is the boundary between life and death. Cross it, and you are dead. An oath "on your
      life" is also a boundary: cross it and you are dead. Hesiod does not just tell us a myth, he tells in a
      "mythified" manner of an event of his own day:
      the oath that underlies the reign of Zeus, a general peace treaty and the panhellenic reform. Let us elucidate it:<br>
      Mainland Greece is recovering from the so-called dark ages and there is a population explosion. As a result, movements
      like the "Dorian invasion" create unrest everywhere. There is a real risk of civil war, a clash for power
      that will only end when one party is decisively the strongest and declares himself king of all Hellas.
      To prevent such a disaster (for there is apparently no one strong enough to attempt this) they declare a
      system of equal honours (for the top layer of course), a topless pyramid. They swear a solemn oath to
      maintain this situation. It is an attempt to "freeze" the political situation. This is also expressed
      in a part of the story of Helen: <br>
    </p><br>
    <h5>Helen and the Oath of Tyndareus</h5>
    <p>
      Helen the myth is not so much a woman, she is the symbol of Victory. That is why she is a daughter of Zeus,
      for Zeus is the one who gives victory. Sparta has won her, proving to be the best. Sparta is probably the most
      powerful and important state at that moment. All the others have sworn
      an oath to respect and defend the rights and honour of whoever would win her. This is a consequence of
      the oath mentioned above: the political situation must be frozen.<br>
      Another measure they take is also meant to stabilize the situation. To relieve the burden on Mother Earth,
      and prevent further ravaging by "hundred-arms", they institute an emigration policy. As many as possible
      superfluous males are to be transported out of the country<a class="ptr">(4)</a>. For a discussion of this, see
      <a class="textlink" title="charter myth" href="charter.php">here about Helen</a> and
      <a class="textlink" title="Poseidon" href="poseidon.php">here about Poseidon</a>.
    </p><br>

    <h5>Atlas</h5>
    <p>It is the aristocracy that has to "hold up heaven", keep it separated from earth and prevent it
      from crashing down on us. This means that Atlas will have to do without the apples
      (and not rely on Heracles to hold it for him). To promote this there is a whole laundry list of necessary
      things: an arbiter for conflicts, peace and mutual-aid treaties, a sense of 'being one people', ethical
      re-education of local aristocrats but most of all: a fitting religion which
      properly defines the position of everyone in society and creates a model
      "as above, so below" of the world. </p>
    <p>...
    </p>
    <h5>
      kings and commoners
    </h5>
    <p>
      In the Homeric context, a commoner is typically the head of an οἶκος (household),
      a landowner with extended family and
      a number of people of which he is a patron: people who work for him, therapontes
      (high-ranking servants), slaves, people who are dependent
      on his household for a livelihood or who otherwise "owe" him. When there is a war,
      he himself (or possibly his son) is to lead a contingent of these dependants into
      battle. This is a private army and there are no laws to force the householder
      to do this. It is in this light, I would maintain, that we have to see the Homeric picture
      of Achilles and his Myrmidons. In his own household Achilles is king, but in the
      polis where he lives, he has to count with others. There can be no private armies,
      he has to submit some of his sovereignty to the polis and especially to the archon (whatever
      his name and powers were in any city-state) that the city chooses to have: to Agamemnon.
      Not because Agamemnon is 'the better man', no aristocrat would ever concede that, but
      because he is the first among equals. That, at least, is the theory.<br>
      In practice of course the equals are rarely equal. The one who lives in the
      <a class="textlink" title="Big House in Smyrna" href="smyrna.php#house">'big house'</a>
      can be very much a local 'king' because of his actual power, based on economic clout,
      tradition or religion. It would be possible for a rich farmer to force others to sell their
      produce to or through him, for instance if he owns a ship for trade, or has the overseas
      contacts, or has the storage facility. He may be harbour-master and catch a tax on incoming ships,
      he may have judicial authority and collect bribes. Or simply the patronage power: it was a harsh
      and lawless society and protection must have been important. Achilles is reminded by Nestor
      that Agamemnon 'is the better man, because he rules more people (Il 1.281)'.


    </p>
      <p>
      ...
      </p>
      <br><br>
  <hr>
  <ol id="footnotes">
    <li>At most to the top of a mountain</li>
      <li>Hence the ubiquitous myth of the 'Return of the King', such as the Arthur legends.
      </li>
    <li>literally 'standing up'. If you stand up, it is to go to
      war. If you sit down war is over, at least for now</li>
    <li>
      Sparta did not take part in this emigration very much. They, somewhat later, had their own way
      of coping with an overpopulation, treaty or not.
    </li>
  </ol>
    <div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="<?= autoversion('/scripts/iframes.js');?>"></script>

  </body>
</html>
