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
    <p>There are other possibilities for organizing a society. Historically it looks like
      in the Middle East there was one choice: kingdom or independent city states.
      Egypt always chose kingship and the scribes tell us they were happy
      with that. Whenever great and divine kings arose in, for instance, Assyria or Babylon,
      smaller states trembled because they knew what was going to happen. The choice that
      Israel made (before the time of Saul and David) was a kingless society. A
      topless pyramid as it were, still hierarchical on the lower levels but not
      all the way to the top. The implicit top of this pyramid, the divine ruler to be
      obeyed is in heaven, is "virtual"<a class="ptr">(1)</a>, and, this must be emphasized,
      never comes down to earth (at most to a mountain top). It is no less important to obey him,
      though. This is the rule of Zeus. There still is a ruling class,
      they are conceptually all equal
      (the highest layer of the topless pyramid), and free. The
      Phoenicians with their city-states are another example of this option
      and, as I will argue, the post-Mycenean Greeks probably learned from them
      how to organize such a society<a class="ptr">(1)</a>. There are many ancient Greek reports of
      Phoenicians in Greece although it is likely that they called someone from anywhere in the
      Middle East a Phoenician.</p>
    <p>In any larger, hierarchical society, there is tension between the
      very top (the King) and the layer below it (the aristocracy). The latter
      desires to be free of Kingly rule, it is usually only because of the
      threat of war, the need for a leader, that they tolerate
      kingly rule at all. The bottom layer (the common people) are ruled or
      exploited by the aristocracy and desire to be free of <em>them</em>.
      Often the common people regard the King as an ally against their local
      rulers<a class="ptr">(1)</a>. Since all three layers of society have a power of their own which
      is not to be ignored, there exists a Platonic love triangle which can be found
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
    <a id="styx">&nbsp;</a>
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
      Mainland Greece is recovering from the so-called dark ages and there is a population explosion and hunger for land as a result. Movements
      like the "Dorian invasion" create unrest everywhere. There is a real risk of prolonged civil war,
      a clash for power
      that will only end when one party subjugates all the others and declares himself king of all Hellas.
      To prevent such a disaster - for there is apparently no one strong enough to win this outright - they
      declare a
      system of equal honours (for the top layer mainly but not exclusively), a topless pyramid.
      This is the reign of Zeus.
      They swear a solemn oath to
      maintain this situation because it is in their interest. It is an attempt to freeze the political
      situation. This is also expressed in a part of the story of Helen: <br>
    </p><br>
    <h5>Helen and the Oath of Tyndareus</h5>
    <p>
      Helen<a class="ptr">(4)</a> is not so much a woman, as she is the symbol of Victory. That is why she is a daughter of Zeus,
      for Zeus is the one who gives victory. Sparta has won her, proving to be the strongest. Sparta is probably the most
      powerful and important state at that moment - whatever that moment is. I leave it to historians
      to correlate all this with the first Messenian war. All the states have sworn
      an oath to respect and defend the rights and honour of whoever would win her. This is a consequence of
      the oath mentioned above: the political situation must be frozen.<br>
      Another measure they take is also meant to stabilize the situation. To relieve the burden on Mother Earth
      and prevent further ravaging by "hundred-arms", they institute an emigration policy. As many as possible
      superfluous males are to be transported out of the country<a class="ptr">(4)</a>. For a discussion of this, see
      <a class="textlink" title="charter myth" target="_self" href="<?php echo autoversion('/helen.php');?>">here</a> about Helen.
    </p>
    <h5>The rule of Zeus</h5>
    <p>
      So the rule of Zeus was established with agreement to stand up together
      against anyone who would try to bring back Kronos. This seems like a simple peace treaty but
      the religion and the politics of a whole culture were to be reshaped to make it a reality. They did an
      enormous amount of work to reach this goal: regional peace treaties, the (re-)foundation of Delphi,
      collection and creation of a "library" of stories, genealogies, hymns and epics that could appeal to all Greeks,
      building of temples and religious standardization (more or less). They were well aware that all layers
      of society would have to find a place in the new order. A Heracles, the popular servant who is better
      than the king, would have to receive a share in the available honour.
    </p>
    <p>
      All this could not hide the fact that this was a system based on voluntary compliance.
      Political reality remained what it always was. The Zeus option is in that reality a weaker
      option: unlike Zeus, Kronos rules with the whip and is more sure of being obeyed. Especially if
      issues arise beyond the border that call for concerted military action,
      absolute kingship becomes more attractive. In Greece, the Olympian system held out reasonably
      well until the Persian invasions, then it broke down. The creation of the Athenian empire and
      its war with Sparta were the result of that. But the Greek
      aristocracy knew that they had defeated the Persians twice, they could do it again and a new
      system was called for. Enter Alexander.
    </p>
    <p>
      In Homer's time there must have been those who went with this Zeus rule only because it was
      opportune to do so. I suspect that <a class="textlink" title="about Poseidon" target="_self" href="<?php echo autoversion('/poseidon.php');?>">"Poseidon"</a> was one of them.
    </p>
    <br>
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
    <a id="classes">&nbsp;</a>
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
      <a class="textlink" title="the Big House in Smyrna" target="_self" href="<?php echo autoversion('/smyrna.php#house');?>">'big house'</a>
      can be very much a local 'king' because of his actual power, based on economic clout,
      tradition or religion. It would be possible for a rich farmer to force others to sell their
      produce to or through him, for instance if he owns a ship for trade, or has the overseas
      contacts, or has the storage facility. He may be harbour-master and catch a tax on incoming ships,
      he may have judicial authority and collect bribes. Or simply the patronage power: it was a harsh
      and lawless society and protection must have been important. Achilles is reminded by Nestor
      that Agamemnon 'is the better man, because he rules more people (Il 1.281)'.


    </p>
    or:
    <p>
      First, let me describe what I mean
      by kings, prominent men and commoners.
      The 'prominent man' is typically the head of an οἶκος (household), a landowner with extended family and


      a number of people of which he is a 'patron': people who work for him, slaves, people who are dependent
      on his household for a livelyhood or who otherwise 'owe' him. When there is a war, he himself (or
      perhaps his son) is
      to lead this 'private army' into battle, and they will obey <em>him</em> first, not the
      commander-in-chief, the Agamemnon. Achilles' Myrmidons
      are a case in point. There is no law or formal obligation for him to join, but the majority
      of the community, which is more powerful than he, may punish him if he does not. <br>
      The 'king' is not much different, but he is the actual leader of a community, conceptually a member
      of a long-established
      aristocratic family. He sees himself as the shepherd of his flock. He is also the one who
      maintains patronage relations with everyone in the community. In case of war he organizes the
      army and he divides the loot if there is any. By himself he is probably not
      more powerful than the rest of the community together, so he needs a council (βουλή) of the
      most prominent men and even
      an assembly (ἀγορὴ) which includes the common people to gauge the level of support he may have for his plans.<br>
      Where exactly the boundary lies between the classes is unclear and probably not the same in all places.
      I suppose the top group are the people who take part in symposia and who understand the kind of allusive
      language that is an integral part of that elite culture. I am thinking here of Alkinoös and his circle,
      listening to 'Odysseus the bard' in a private session.
      Those would be the addressees of the first speech.
      The scaring tactics of the second speech would be aimed at those who are not familiar with this
      use of language, the commoners. For them is the learning-by-pathos approach as exemplified
      by Achilles' learning curve.
    </p>
      <p>
      ...
      </p>
      <br><br>
  <hr>
  <ol id="footnotes">
    <li>which does <em>not</em> mean nonexistent. More about this in the  chapters about
      <a class="textlink" title="Zeus and Justice" target="_self" href="<?php echo autoversion('/justice.php');?>">Zeus and justice.</a></li>
    <li>
      There is only some circumstantial evidence for this. The fact that the Greek alphabet is based on theirs
      and it was used very much in the service of this project. There is also the story in the bible that
      Solomon engaged the Phoenicians to build his temple. Unfortunately not much is known about
      the Phoenicians at all.
    </li>
      <li>Hence the ubiquitous myth of the 'Return of the King', such as the Arthur legends.
      </li>
    <li>literally 'standing up'. If you stand up, it is to go to
      war. If you sit down war is over, at least for now</li>
    <li>Pre-homeric Helen; In Homer main women Helen and Penelope are both symbol and real people.
    </li>
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
