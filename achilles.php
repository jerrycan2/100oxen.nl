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
    <meta name="Description" CONTENT="Achilles, the mortal hero, performing a Paris-judgement">
    <title>Achilles, the Mortal Hero</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>The Mortal Hero</h1>
<div class="indent">
    <h5>What is best, mr. Homer?</h5><br>
    <p>
        (from: The contest of Homer and Hesiod)<br><br>
        Ὑιὲ Μέλητος, Ὅμηρε, θεῶν ἄπο μήδεα εἰδώς,<br>
        εἴπ᾽ ἄγε μοι πάμπρωτα, τί φέρτατόν ἐστι βροτοΐσιν;<br>
        <br>
        Ἀρχὴν μὲν μὴ φῦναι ἐπιχθονίοισιν ἄριστον,<br>
        φύντα δ᾽ ὅπως ὤκιστα πύλας Ἀίδαο περῆσαι.<br>
    </p><br>
    <p>
        Homer, son of Meles, knowing the gods' counsels,<br>
        tell me first, what is <em>best</em> for mortal men?<br>
        <br>
        First of all, not to be born is best.<br>
        Being born, to die as soon as possible.<br>
    </p>
    <br>
</div>
<p>
    This is the kind of black irony that is characteristic of Homer. It is unknown if the actual Homer had anything to do with this anecdote but it surely fits. Achilles says this: "I wish Peleus had taken a mortal wife" (Il 18.87), "Let me die now" (Il 18.97), speaking to his mother after Patroclus' death. They are the climax of Achilles' learning-by-pathos experience. It brings to mind a famous line by the Spartan poet Tyrtaios (fr. 8):
</p>
<div class="indent">
    <p>
        ἰθὺς δ᾽ ἐς προμάχους ἀσπίδ᾽ ἀνὴρ ἐχέτω,<br>
        ἐχθρὰν μὲν ψυχὴν θέμενος, θανάτου δὲ μελαίνας<br>
        κῆρας ὁμῶς αὐγαῖς ἠελίοιο φίλας.<br>
    </p>
    <br>
    <p>
        Let a man hold straight his shield, fighting in front,<br>
        thinking life hateful and loving black death <br>
        as much as the light of the sun<a class="ptr">(1)</a>.<br>
    </p>
    <br>
</div>
<p>
    Commentators find this line rather shocking and unimaginable. Fortunaltely Homer is able to explain it to us: it is <em>shame</em> (aidos) that brings us in this position. The ancient Greeks had a word 'philozoos' meaning 'loving life' but it also means 'cowardly': be an Achilles or nothing. In our world, shame is out of fashion but for them, aidos was a force stronger than the will to live and it had to be because from Sparta to Athens, their whole city-state constitution was based on it. A polis is basically a 'seated' army and it must be a functioning army to survive. Not force or patronage or wealth to buy mercenaries but shame made the polis and freedom under the <a class="textlink" title="Homer's politeia: the rule of Zeus" target="_self" href="<?php echo autoversion('/politeia.php');?>">rule of Zeus</a> possible.
</p>
<p>
Homer puts it in yet another ironical way: the shield. Normally, armor is designed to be impressive and to scare the opponent. The horsehair plume is an example of that, or the monsters like snakes or Gorgon's heads depicted on other shields. Achilles' shield thus has the most scary thing of all: the whole world and life itself in its many forms. No wonder A. is the only one who dares to look at it (Il 19.14) and it drives him to even greater fury. 
</p>
<a id="wrath">&nbsp;</a>
<h4>Achilles' wrath</h4>

<p>
</p>
<hr>
<ol id="footnotes">
    <li>Imagine yourself in a hoplite falanx in a battle: you stand there, shoulder to shoulder, spears forward. Opposite is the enemy falanx, their spears pointed at you. Then you march forward and start pushing spears. You may see an enemy spear coming slowly right at you (perhaps coming through the body of the comrade in front of you) but you cannot move left or right, let alone backward. You have to push forward towards that spear or lose the battle. It takes something to be able to do that!
    </li>
</ol>
<br>
<br>

<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
