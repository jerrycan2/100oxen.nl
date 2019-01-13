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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta name="Description" CONTENT="The role of Zeus and justice in ancient poetry and philosophy">
    <title>Zeus and Justice</title>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin">
<h1>Tractatus Theologico-Politicus</h1>
<h4>Zeus and Justice</h4>
<p>
    Plato was quite right: Homer is not a philosopher. He is a poet, an imitator of the world, and rhetoric and irony are nearer to him than objectivity and precise language.
    But he has a lot to say, to <em>show</em> rather, about
    a subject which is dear to Socrates' heart: justice. Homer argues about it, not from a philosopher's
    point of view but from a political one, in a world where Zeus could be used to make an argument
    undeniable. It is easy to be skeptical about people who do this, but we should show respect and
    accept that some people, when they claim to do something because "Zeus commanded it", actually
    are fully convinced of the truth of that statement. For some others of course it is merely
    a political trick. But
    One of the things Homer shows rather than tells, is the fact that Zeus never talks to people directly.
    If he has something to say, he will send Iris (or informally Hermes) to bring the message. The rule
    appears to be: every word from Zeus comes through Iris, but not every word from Iris is from Zeus. Iris is a very real god and we should listen to her, though not uncritically
    (see Il 18.170-186).
</p>
<p>
    In archaic society or today, if people claim that, for instance, conquering Troy or commencing
    some battle is a Zeus-given, it is futile or even dangerous simply to deny this.
    In a political discussion it is necessary to
    take a "yes, but..." approach and this is exactly what Homer is doing. He already goes very far in
    his criticism: see the intro to the second assembly (Il 2.1-40) where he calls the idea that we can
    conquer Troy "today", an Evil Dream.
</p>
<p>
    An often recurring statement is that Zeus has promised us Troy and we shall have it, but "not now". 
    So why has Troy not fallen yet? It is because Agamemnon has dishonored the great Achilles and he is not
    fighting for us. Actually it is because the local peoples are too strong and it is more likely that
    Smyrna<a class="ptr">(1)</a> or Milete will fall to the Lydians and Carians<a class="ptr">(1)</a>, than vice-versa.
    We sorely need a "hero of the counter-attack" like Achilles.
</p>
<p><br></p>
<figure> <img
        class="fitpage" alt="gnothi seauton" src="/images/gnoti.jpg">
    <figcaption>Know Thyself</figcaption> </figure>

<p>
    Zeus is not a god who takes revenge for us on all the wicked people. He does decide Fate: another way to say this, is that he holds the balance of justice between "not enough" and "too much" in all possible applications of that metaphor. As always
    <em>we</em> are the ones who actually do the choosing here. To "believe in Zeus", as we would say it, means that we accept (like Sokrates) that our fate, the quality of our life, depends on our justice. We must accept that Zeus is the highest god. The other gods, the other forces which drive us on, do not like this. The essence of a force is after all that it wants it all to go its way and Zeus says we cannot have that: we can only have what we pay for<a class="ptr">(1)</a>. But how shall we know we have it right?
</p>
<p>
    For a Diomedes, this is easy. He is after all the one who acquires a golden armor without paying the price for it (Il 6.236 χρύσεα χαλκείων, ἑκατόμβοι' ἐννεαβοίων. Gold for bronze, worth 100 oxen for 9). In 8th c. warrior terms, you have to be both a hero and a coward, you just need to know when to be each. Thanks to the goddess Athena who "lifts the mist from his eyes", he can recognize gods (Il 5.127) and act accordingly. This, for us, is where the "know thyself" comes in: know what drives us, our own reasons and desires. If we were able to do this, we would at least have a chance of getting it right.
</p>
<p>
    There is, however, more to it than that. The balance and the 'meden agan' works fine as a prediction of fate but as an analysis of what actually happens it falls short. If you go too far, you die: fine; but if you die, you must have gone too far: that is another thing. It leads to a tautology: if Zeus wills it, it happens. It happened, therefore Zeus willed it. From that point of view, whatever happens in the world is just so the word becomes meaningless.
</p>
<p>
    So, what about the Plan of Zeus? Is there something we could see as justice in that? <br>
    We have several parties here: Achilles, demanding justice; Agamemnon and the Achaeans, Hector, the gods: everyone of them convinced of their own justice and expecting Zeus to be with them.
</p>
<br>
<br>
<hr>
<ol id="footnotes">
    <li>The Lydians actually sacked Smyrna at the very end of the 7th century. The hill which they
        raised to get across the wall is still there and is the reason that parts of the ancient city
        are well preserved archaeologically. This sacking was the end of Smyrna's power, though the
        place remained inhabited by Greeks until Alexander established new Smyrna.
    </li>
    <li>The gods Lydos and Kar are brothers (Hdt 1.171). Is their cooperation behind the <em>two</em> armies
        that beleaguer the second city (Il 18.509-)?
        Also, In Achilles' aristeia, he is threatened by two rivers,
        Skamandros and Simoeis. Skam. calls the other "brother" (Il 21.308) in a significant speech.
    </li>
    <li>
        This is why Hesiod's Prometheus warns against taking gifts from Zeus: you <em>will</em> have to pay for them.
    </li>
</ol>

<br>
<br>
<br>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
