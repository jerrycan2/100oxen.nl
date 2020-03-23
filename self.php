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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description"
          CONTENT="a list of references from Iliad and Odyssey where the poem refers to itself, to the poet or to the world he lives in">
    <title>Self-reflection</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Self-reflection overview</h1>
<p>
    This list is by no means pretending to be complete; some items are quite tentative.
</p>
<ul>
    <li>family
        <ul>
            <li>Neleids</li>
            <li>father and mother
                <ul>
                    <li>father-and-son references really too numerous to mention</li>
                    <li>the Cretan story (Od 14.199-)</li>
                    <li>Skamandros rebuking Apollo (Il 21.228)</li>
                    <li>Odysseus like a ram (Il 3.197, Od 9.432-)</li>
                    <li>Melesigenes: wordplay? ('born from/near the Meles river' - 'caring for his genos')</li>
                </ul>
            </li>
            <li>brother, bastard-son (νόθος)
                <ul>
                    <li>Aga. & Menelaos, Hector & Paris</li>
                    <li>Aeneas, in a way, as a child of Aphrodite</li>
                    <li>indirectly:
                        <ul>
                            <li>Odysseus and Menelaos, as described by Antenor (Il 3.203-24)</li>
                            <li>Phoenix teaching Achilles (Il 9.438-)</li>
                        </ul>
                    </li>
                    <li>Aias & Teucer (Il 8.284, 12.350)</li>
                    <li>Automedon & Alkimedon (Il 17.456)</li>
                    <li>Iphidamas & Koōn (Il 11.218)</li>
                    <li>the Lapithai (Il 12.128)</li>
                    <li>Hector and Polydamas</li>
                    <li>Sleep and Death (Il 14.231)</li>
                    <li>Isos and Antiphos (Il 11.102)</li>
                    <li>Pedaios (Il 5.69)</li>
                    <li>Medon (Il 2.727)</li>
                    <li>Teucer (Τεῦκρος), bastard-brother of Aias (Il 8.292-)</li>
                    <li>Menesthios (Il 16.173)</li>
                    <li>Idaios and Phegeus (Il 5.20)</li>
                    <li>Helenos to Hector (Il 7.48)</li>
                    <li>Mule better at ploughing (Il 10.351)</li>
                </ul>
            </li>
            <li>daughter</li>
            <li>Hesiod? Note that Aeolus can also be heard as 'Aeolean', as Hesiod's father was. see <a class="textlink" title="about Kronos" target="_self" href="<?php echo autoversion('/kronos.php');?>">here</a>.
                <div class="indent">
                    Od 10.5-, Aeolus episode: <br>
                    τοῦ καὶ δώδεκα παῖδες ἐνὶ μεγάροις γεγάασιν, <br>
                    ἓξ μὲν θυγατέρες, ἓξ δ᾽ υἱέες ἡβώοντες: <br>
                    ἔνθ᾽ ὅ γε θυγατέρας πόρεν υἱάσιν εἶναι ἀκοίτις. <br>
                    <br>
                    Aeolus has 12 children in his house, <br>
                    Six sons and six daughters, in their youth. <br>
                    There he gave the daughters in marriage to his sons.. <br>
                </div>

            </li>
        </ul>
    </li>
    <li> exile
        <ul>
            <li>exile, controversy
                <ul>
                    <li>plague (νοῦσον, Il 1.10)</li>
                    <li>Apollo's epithets like 'far-shooter', 'hitting from afar'</li>
                    <li>Il 24.650: 'ἐκτὸς μὲν δὴ λέξο', 'you must sleep outside, old man', Achilles to Priam</li>
                    <li>Ursa Major, the Wain: Il 18.488-9</li>
                    <li>Aoidos sent to island (by Aegisthus) Od 3.267-</li>
                    <li>Achilles 'not mingling with the Achaeans' (Il 18.215)</li>
                    <li>'Eurypylos, I cannot stay any longer' (Il 15.399)</li>
                </ul>
            </li>
            <li>Tree
                <ul>
                    <li>The sceptre that Achilles swears by (Il 1.234-9)</li>
                    <li>Phoenix is judge in the chariot-race of bk 23 (Il 23.360) at the "stump that hasn't
                        rotted in the rain" (see above entry)
                    </li>
                    <li>Also: the tree that is the foundation of Odysseus' bed (Od 23.184-)</li>
                    <li>split logs 'without leaves' (Il 2.425)</li>
                </ul>
            </li>
            <li>Iliad refs:
                <ul>
                    <li>Il 1.26: don't let me see you near the ships</li>
                    <li>Il 1.35: going away, 1.48: apart from the ships</li>
                    <li>Il 1.313: Agamemnon's purification. The bad goes 'into the sea' (see pharmakos)</li>
                    <li>Il 1.349: sat down far from his comrades</li>
                    <li>Il 5.351: shudder at war, 'καὶ εἴ χ' ἑτέρωθι πύθηαι'</li>
                    <li>Il 8.10: fight 'far from the gods'</li>
                    <li>Il 24.531: whom Zeus gives evil</li>
                    <li>Il 11.81: Zeus sitting down 'far from the others'</li>
                    <li>Il 15.173: Iris to Poseidon - among the gods or into the sea</li>
                    <li>Il 16.59: Agamemnon treats me 'like an outcast'</li>
                    <li>Il 22.416: Priam begging to be allowed to go</li>
                </ul>
            </li>
            <li>Patroclus, Phoinix
                <ul>
                    <li>Menoitius to Patroclus: 'Achilles is of nobler birth, but you are older' (Il 11.786-)
                    </li>
                    <li>Phoenix like a father (Il 9.485-)</li>
                </ul>
            </li>
            <li>anonimity
                <ul>
                    <li>My name is Nobody (Od 9.366)</li>
                    <li>'who are you?' 'I am Odysseus'</li>
                    <li>'invisible above all (ἄιστον περὶ πάντων)' Od 1.235</li>
                    <li>Athena dons Ἄϊδος κυνέην, a cap of invisibility, so Ares doesn't see her. (Il 5.845)</li>

                </ul>
            </li>
            <li>hostage
                <ul>
                    <li>Achilles warns Priam (Il 24.686)</li>
                    <li>Melampos (Od 11.287- esp. 297)</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>the singer
        <ul>
            <li>the singer
                <ul>
                    <li>'ἄνδρα μοι ἔννεπε' (Od 1.1)</li>
                    <li>'εἴμ᾽ Ὀδυσεὺς Λαερτιάδης' (Od 9.19)</li>
                    <li>a youth singing the Linos(the thread of life)-song Il 18.569</li>
                    <li>An aoidos singing:
                        <ul>
                            <li>the Nostoi (Od 1.325-)</li>
                            <li>of Ares and Aphrodite (Od 8.266-)</li>
                            <li>Φήμιος Τερπιάδης 'Speechmaker son of Entertainer' (Od 22.30-)</li>
                            <li>Δημόδοκος (Od 8.44, 106, 472, 486, 537, 13.28)</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>the speaker
                <ul>
                    <li>the ugly fellow with the powerful voice
                        <ul>
                            <li>Il 3.224 Odysseus</li>
                            <li>Il 2.212 Thersites</li>
                            <li>Od 8.169- Odysseus</li>
                        </ul>
                    </li>
                    <li>Words like snow (Odysseus) Il 3.222</li>
                    <li>Snow like words (Zeus, ἀνθρώποισι πιφαυσκόμενος τὰ ἃ κῆλα) Il 12.278-</li>
                </ul>
            </li>
            <li>the meal, spectators
                <ul>
                    <li>A feast for the dogs and birds (Il 1.4, 22.354)</li>
                    <li>Song and dance, 'ἀναθήματα δαιτός' (Od 1.152)</li>
                    <li>the lyre, δαιτὶ ἑταίρη (Od 17.271)</li>
                    <li>no quarreling at meals (Il 1.575, Od 18.403)</li>
                    <li>Sacrifice and meal (Il 1.458-)</li>
                    <li>thighbones: Meriones, Patroclus (Il 23.253)</li>
                    <li>Achilles entertaining Patroclus, singing 'κλέα ἀνδρῶν', 'famous deeds of men' (Il
                        9.189)
                    </li>
                </ul>
            </li>
            <li>Apollo, bow & arrow, healing
                <ul>
                    <li>a furious god shooting arrows (Il 1.43-)</li>
                    <li>ἔπεα πτερόεντα, winged words</li>
                    <li>Odysseus strings his bow (Od 21.404-)</li>
                    <li>building and destroying a sandcastle Il 15.360-</li>
                    <li>Apollo playing the lyre Il 1.603</li>
                    <li>Apollo at Peleus' wedding Il 24.62-</li>
                    <li>'Silverbow': Apollo's epithet, Achilles with a - (Il 9.189-)</li>
                    <li>Apollo's quiver (Il 1.45, Od 21.11-)</li>
                    <li>arrow, 'loaded with black pain' Il 4.116-7</li>
                    <li>Odysseus leads the horses with his bow (Il 10.498)</li>
                    <li>Odysseus' bow (Od 21.1-)</li>
                </ul>
            </li>
            <li>Healing, pharmakos
                <ul>
                    <li>'Deadly medicine (φάρμακον ἀνδροφόνον)' Od 1.261</li>
                    <li>Paieon's 'pain-killing' medicine (ὀδυνήφατα φάρμακα), healing Ares (Il 5.401) or Hades
                        (Il 5.899)
                    </li>
                    <li>young men singing (Il 1.473)</li>
                    <li>singing after the death of Hector (Il 22.391)</li>
                </ul>
            </li>
            <li>performing, bewitching, weaving
                <ul>
                    <li>Proteus (Od 4.385-):
                        <ul>
                            <li>subject of Poseidon(Od 4.386),</li>
                            <li>will tell you the way home (Od 4.390),</li>
                            <li>the good and bad you will find there (Od 4.392),</li>
                            <li>has a 'following' (Od 4.404-),</li>
                            <li>can change into everything (Od 4.417-),</li>
                            <li>can tell you which of the gods it is... (Od 4.423)</li>
                        </ul>
                    </li>
                    <li>an acrobat, jumping from horse to horse (Il 15.679)</li>
                    <li>the singer's art: 'βροτῶν θελκτήρια' (bewitching) Od 1.337</li>
                    <li>It is Athena's work, she can make me look as she wishes (Od 16.207)</li>
                    <li>Hephaistos' golden girls who can speak and obey him (Il 18.417)</li>
                    <li>Maron's wine (Od 9.196-)</li>
                    <li>Penelope's weaving (Od 2.93-)</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>the teacher
        <ul>
            <li>Chios
                <ul>
                    <li>Island near cyclops' land (Od 9.116-)</li>
                    <li>Straight to Euboia, or the long way below Chios (Od 3.170-)</li>
                    <li>Stay there until the wind is favourable (Od 9.138)</li>
                    <li>some 'bright-eyes' live where the sun goes up, some where it goes down (Od 1.23-4)</li>
                </ul>
            </li>
            <li>Homeridae
                <ul>
                    <li>who can string my bow and 'shoot through the iron' (Od 21.1-)</li>
                    <li>Hephaistos creating 20 golden 'tripods' (prizes) who would go to the meetings of the gods all by themselves (Il 18.372-). They are ready except 'the ears have to be fixed (!)'</li>
                    <li>Proteus' circle of seals (Od 4.404-)</li>
                </ul>
            </li>
            <li>writing
                <ul>
                    <li>Stretching a cowhide for leather-making (Il 17.389-)</li>
                    <li>Ink? (Od 1.262)</li>
                    <li>pen? (Od 9.325-8) ref. also blindness</li>
                    <li>ploughing - boustrophedon writing
                        <ul>
                            <li>πολύτροπος - 'of many turns' (Od 1.1)</li>
                            <li>ploughing a field - gold turning black (Il 18.541-50)</li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<br>
<p>
<div class="accheader">
    <button class="accordion">4.
        Both Homeric poems are very self-aware, the Odyssey even more than the Iliad.
    </button>
</div>
<div class="panel">
    <p>Never forget that these are not books, they are songs and they
        escaped the fence of the composer's teeth while he lived. While singing a direct
        speech by one of his characters, he virtually becomes that character.
        Homer shows himself very aware of this curious position. <br>
        The poetic centre of self-reflection is the lyre-playing god
        of prophecy, healing and poetry <a class="textlink" target="_self" title="apollo" href="apollo.php">Apollo</a>
        : 'the Destroyer', 'Silverbow', 'Far-shooter'. If the Iliad is a
        tour-de-force of poetry then, in some sense, the god of poetry must be
        acting through it. And it is a healing poem: it aims to heal not only
        'Achilles' but Ionian society in general which must have been under
        pressure in Homer's day. Also it is a prophecy in a political and
        ethical sense of the word.</p>
    <p>In these pages I am mainly concerned with pointing out some of
        the myriad examples so the reader can learn to recognize them where
        they occur. An example of almost-open self reference would be
        'Phoenix': I believe that the person Phoenix as occurring in Il 9 the
        Embassy to Achilles, is a late addition to the Iliad (from the time it
        was written down), representing the poet as an old man. His tale is
        strongly suggestive of autobiographical references, especially because
        of the 'exile' aspect. Also the phrase 'φοίνικος νέον&nbsp;ἔρνος'
        (a young shoot of the 'phoenix' or date-palm, Od 6.163) is one of the
        things which make me believe that the tradition that Homer had a
        daughter (ref. <a class="textlink" target="_self" title="women" href="women.php">women</a>) is
        based on something. If indeed the poet was concerned with writing
        and/or dictating the poems, it seems well possible that a nickname for
        him was Phoenix (letters were called Phoenician).</p>
    <p>Examples of reference to the poem itself are abundant from the
        first moment. The meal (dais) is a keyword, being a metaphor for life
        in general but also the setting for performances of the poem<a class="ptr">(2)</a>. In this light, the Iliad
        begins
        with a rather shocking reference to it being a 'feast for the dogs and
        birds' (Il 1.4-5)<a class="ptr">(3)</a>. This is how
        Homer sees it, I think. The poem <strong>is</strong> the
        'wrath of Achilles' and also the wrath of Apollo. Scores of people die
        in it and the listeners enjoy all this while listening to a bard at a
        public feast. And because it is about them, you could say they are
        'killed by Apollo' and his arrows. In the Odyssey's climactic and
        ironic slaughter, the poet does it all over again: he slaughters
        everyone at a feast. </p>
    <p>The poet rules the events in the poem just like Zeus rules the
        world. While he is performing it, he turns into all the heroes (even in
        direct speech), and e.g. lions, and forces of nature one by one just
        like Proteus (Od 4.384-).</p>
</div>
<br>

</p>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
