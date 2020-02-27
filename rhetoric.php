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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="Homer employs rhetoric on two levels at once: by pathos and by allusion">
    <title>Homer's Rhetoric</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext"

          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1> Homer's Rhetoric </h1>
<p>
    If you show a commander making a dubious decision to start an offensive and then you show
    the offensive turning into a disaster: that is rhetoric. If you show, without comment, your own
    army committing misdeeds or thoroughly unheroic acts, that is rhetoric. If you show us an enemy
    soldier visiting his beloved wife and son, the ones he is fighting for, and you make clear the
    horrible fate that awaits them: that, too, is rhetoric. At least if the frame of reference
    of the Iliad is 'near', i.e. the contemporary situation in Ionia, and not something distant,
    a story from centuries ago, then these are furiously rhetorical statements. They fit the
    <a class="textlink" title="Apollo" href="apollo.php">wrath of Apollo</a>, the god of poetry,
    prophecy and healing.
</p> <br>
<h4>Context</h4>
<p>
    "Rhetoric" needs a) a speaker or author, b) at least one addressee and c) a context. When we know all three,
    it is relatively easy to understand the text. Unfortunately in this case, we have almost nothing
    except the text itself. So we have to build up a synchronic model of all three using the little information that we
    have, setting aside all we know from later dates or using this only to check if and how it might have developed from the original situation. <br>
    I have made a model of b and c, of what I suppose to be
    the historical and sociopolitical context of the poem<a class="ptr">(1)</a>. This is presented <a class="textlink" title="historical context" href="history.php">here</a>. In short: the 'Trojan war' which Homer
    describes as a thing of the past, is a kind of allegory for a similar war which goes on in his own day:
    an attempt by the Greeks to conquer the two great flood plains in western Anatolia, 'Troy' being
    Sardis, the centre of what was later to become Lydia. The myth of Helen of Troy was the charter
    myth for this enterprise. This was the 'Ionian migration',
    a movement of people organized from Athens by a Noble House from Pylos called the Neleids.
    The Iliad must date from the
    time when it became clear that this was not going to succeed and that it was the Greeks, above all
    Smyrna and Milete, who were under threat instead of Sardis.
</p>
<p>
    All scenes in the Iliad will have to be tested against this model. In these pages I will treat
    only the most important ones and a few problemata. I leave it to the reader to do the testing
    during a (re-)reading of the Iliad.
</p><br>
<h4>The Addressee</h4>
<p>From the skilful way Homer uses rhetoric in the Iliad, one must conclude that he
    had a lot of experience in it. The characters use it all the time, this is
    well-recognized by scholars. But I would like to emphasize how the poet aims his
    rhetoric at us, the listeners. The model is explained in the second
    assembly where Odysseus uses short speeches to calm the people after
    Agamemnon's deceptive call 'let us go home'.</p>
<br>
<div class="indent"><h5>Odysseus' two speeches </h5>
    <p>
        Β188 ὅν τινα μὲν βασιλῆα καὶ ἔξοχον ἄνδρα κιχείη<br>
        Β189 τὸν δ᾽ ἀγανοῖς ἐπέεσσιν ἐρητύσασκε παραστάς:<br>
        Β190 δαιμόνι᾽ οὔ σε ἔοικε κακὸν ὣς δειδίσσεσθαι,<br>
        Β191 ἀλλ᾽ αὐτός τε κάθησο καὶ ἄλλους ἵδρυε λαούς:<br>
        Β192 οὐ γάρ πω σάφα οἶσθ᾽ οἷος νόος Ἀτρεΐωνος:<br>
        Β193 νῦν μὲν πειρᾶται, τάχα δ᾽ ἴψεται υἷας Ἀχαιῶν.<br>
        Β194 ἐν βουλῇ δ᾽ οὐ πάντες ἀκούσαμεν οἷον ἔειπε.<br>
        Β195 μή τι χολωσάμενος ῥέξῃ κακὸν υἷας Ἀχαιῶν:<br>
        Β196 θυμὸς δὲ μέγας ἐστὶ διοτρεφέων βασιλήων,<br>
        Β197 τιμὴ δ᾽ ἐκ Διός ἐστι, φιλεῖ δέ ἑ μητίετα Ζεύς.<br>
        Β198 ὃν δ᾽ αὖ δήμου τ᾽ ἄνδρα ἴδοι βοόωντά τ᾽ ἐφεύροι,<br>
        Β199 τὸν σκήπτρῳ ἐλάσασκεν ὁμοκλήσασκέ τε μύθῳ:<br>
        Β200 δαιμόνι᾽ ἀτρέμας ἧσο καὶ ἄλλων μῦθον ἄκουε,<br>
        Β201 οἳ σέο φέρτεροί εἰσι, σὺ δ᾽ ἀπτόλεμος καὶ ἄναλκις<br>
        Β202 οὔτέ ποτ᾽ ἐν πολέμῳ ἐναρίθμιος οὔτ᾽ ἐνὶ βουλῇ:<br>
        Β203 οὐ μέν πως πάντες βασιλεύσομεν ἐνθάδ᾽ Ἀχαιοί:<br>
        Β204 οὐκ ἀγαθὸν πολυκοιρανίη: εἷς κοίρανος ἔστω,<br>
        Β205 εἷς βασιλεύς, ᾧ δῶκε Κρόνου πάϊς ἀγκυλομήτεω<br>
        Β206 σκῆπτρόν τ᾽ ἠδὲ θέμιστας, ἵνά σφισι βουλεύῃσι.<br>
        Β207 ὣς ὅ γε κοιρανέων δίεπε στρατόν...<br>
    </p>
</div>
<br>
<div class="indent">
    <p>
        2.188 When he came upon a king or a prominent man, he would stand next to him and say:<br>
        'My Lord! It does not suit you to be scared like a common coward! But sit down yourself and
        settle down the others. You do not know what Atreus has in mind: now he is testing,
        soon he will punish the Achaeans. Not all of us heard what he said in the council.
        Do not let him get angry and do us harm!
        A great pride he has, a heaven-fed king, his honor is from Zeus and Zeus the all-wise loves him.'
        <br><br>
        2.198 But when he met with a commoner who was shouting, he struck him with the sceptre and commanded:<br>
        'Good sir! Sit still and listen to others, who are better men than you!
        You know nothing of war and courage and count for nothing in battle or council. We cannot
        all be kings of the Achaeans here - one king to whom Zeus son of Kronos of the Wicked Tricks
        gave sceptre and law to rule.<br>
        Thus he showed leadership among the host...<br>
    </p>
</div>
<br>
<p>
    Note how he reasons with the leaders and scares the commoners. First, let me describe what I mean
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
<hr>
<ol id="footnotes">
    <li>
        I have also an author-model, which is less important an no doubt more controversial. It is
        developed <a class="textlink" title="reflections" href="proteus.php">here</a>.
    </li>
</ol>
<br>
<br>
<br>
<br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nicescroll.min.js"></script>
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
<script>
    $(document).ready(function () {
        $("html").niceScroll({
            cursorcolor: "#888",
            cursorwidth: "7px",
            background: "rgba(0,0,0,0.1)",
            cursoropacitymin: 0.2,
            hidecursordelay: 0,
            zindex: 2,
            horizrailenabled: true
        });
    });
</script>
</body>
</html>
