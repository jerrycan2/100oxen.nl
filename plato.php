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
    <meta name="Description" CONTENT="A comparison of Homer's and Plato's politics">
    <title>Plato's politeia</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
</head>
<body class="latin contents">
<h1>Plato's new polis</h1>
<p>
    Plato wrote when Athens was defeated, democracy was in disrepute (to some). But the Greeks
    had also shown that they were capable of defeating a huge empire, the Persians. To follow up
    on that, there would have to be changes to the loose collection of states that was Greece.
</p><br>
<div class="indent">
    <h5>Plato, the Republic 331D, Socrates' first question about justice:</h5>
    <p> “...εἴ τις λάβοι παρὰ φίλου ἀνδρὸς σωφρονοῦντος ὅπλα, εἰ μανεὶς ἀπαιτοῖ, ὅτι οὔτε χρὴ τὰ τοιαῦτα ἀποδιδόναι, οὔτε δίκαιος ἂν εἴη ὁ ἀποδιδούς, οὐδ᾽ αὖ πρὸς τὸν οὕτως ἔχοντα πάντα ἐθέλων τἀληθῆ λέγειν.”</p>
    <br>
    <p> “...if one took over weapons from a friend when he was sane and when mad, he demanded them back: then we ought not to return them; he who did return them would not be acting justly, nor would he choose to tell the whole truth to such a person.”</p>
    <br>
</div>
<p>
    This was in answer to Cephalus' statement that justice is "paying your debts". The context is
    that Athens had built itself a large fleet and the crew of the ships was mainly made up of
    lower-class citizens, those who would in the past not have been eligible to be in the army, not
    having the wealth to buy themselves a suit of armour. For many of the elite, this was one
    step too far. Participation in the army also brought political power.
</p><br>
<h5>the open polis</h5>
<p>
    The defining characteristic of the city-state model that was born roundabout Homer's time:
    the polis does not <em>have</em> an army, it <em>is</em> an army. Not a collection of private armies
    but a unity, consisting of all able men who can afford a set of armour. The model is flexible enough
    to vary from place to place but its basic features are the same everywhere. A man's honour is
    dependent on being a part of this and he, even if he is Achilles, has to obey the appointed commander
    no matter how arrogant or incompetent he thinks this commander is. Honour and shame are the two
    complementary forces that make this system possible and they come from the fellow citizens<a class="ptr">(0)</a>. This is the
    <a class="textlink" title="Homer's politeia" target="_self" href="<?php echo autoversion('/politeia.php');?>">city-state model</a>, it goes with the Olympian religion and it maintains an <em>open society<a class="ptr">(1)</a></em>.
</p>
<br>
<h5>the closed polis</h5>
<p>
    The "kingdom" model is very different: a king <em>has</em> an army like a shepherd has dogs. The purpose of his dogs is to defend his sheep against predators but also, importantly, to control the sheep. Well trained, fierce but obedient and sheep-friendly dogs are essential for maintaining a good herd. All this is worked out in Plato's scary masterpiece. We would be very wrong however if we took his "republic" as a straightforward model of Utopia. First of all: our translation of the title is wrong. It is not about a republic with Socrates as president, it discusses the model of a kingdom and the problems of that model. It would go much too far to discuss all this book has to say (or even to claim that I understood all it has to say) but the basics are clear enough. Plato wants to <em>close</em> society again. He wants to give the weapons (the army) back to the ruling class. The city will be the army no longer - which is indeed what happens not very long after his death. The citation at the top of the page must represent Plato's life experience and the "Republic" his discussion of what it would take to avoid the errors of the Thirty. For this purpose, not only the city but the very gods have to be purified so the Good can rule. A new city where, and this is the unstated but unavoidable conclusion<a class="ptr">(2)</a>, not only the poet but also the philosopher will be unwelcome...
</p>
<br>
<h5>the philosopher-king</h5>
<p>
    ...except as king of course. This is partly his boast of what philosophy can do, partly his ironical
    way of warning us that the king of this polis will have to be like a certain philosopher in his
    unselfish devotion to the common good. But any absolute ruler, once he rules, is by definition a (or
    rather <em>the</em>) philosopher: he knows what is good and just for us. A Socrates who questions
    any of this is even more unwelcome than a big mouth poet.
</p>
<br>
<h5>Justice</h5>
<p>
    “τὸ τὰ αὑτοῦ πράττειν” - irreverently translated as "mind your own business" - is the foundation
    of Plato's Kallipolis. Only the King can mind everybody's business. One might object that this
    is "good" rather than "just". But for a clear view, let me quote Leo Strauss:
</p>
<div class="indent">
    <p>The artisan in the strict sense is infallible, i.e. does his job well, and he is only concerned with the
        well-being of others. This however means that art strictly understood is justice - justice in deed and not merely
        justice in intention as law-abidingness is. “Art is justice” - this proposition reflects the Socratic assertion
        that virtue is knowledge. The suggestion emerging from Socrates’ discussion with Thrasymachus leads to the
        conclusion that the just city will be an association in which everyone is an artisan in the strict sense, a city
        of craftsmen or artificers, of men (and women) each of whom has a single job which he does well and with full
        dedication, i.e. without minding his own advantage, only for the good of others or for the common good. This
        conclusion pervades the whole teaching of the Republic.
        The city constructed therein as a model is based on the principle “one man one job” or “each should mind his own business.”</p> “”
<p>
    <i>from Leo Strauss: The City and Man - on Plato's Republic pg 79</i>
</p>
</div>
<p>
    We should not underestimate
    the force of this model. Every larger, hierarchical organization (e.g. a major company, a
    government department) in the modern world builds
    on it. Everybody does their job and does not interfere, neither upward in the hierarchy nor
    left and right. Downward interference, of course, <em>is</em> our business. Inside the organization
    there should be no question what is <em>good</em>: it is the good of the whole. NB: not society
    or the world as a whole, only the "cosmos" which is this organization. Also: "what happens here,
    stays here".
    The good, the true, the beautiful and most of all justice are defined only <em>within</em> the
    boundaries of the system. It is essential that these "gods" are obeyed for the organization
    will perish if they are not. The above-mentioned organizations obey the higher law,
    the law of the state or of God, only by compulsion from outside.
    They do not naturally do so.<br>
    Clearly, this is the justice of the gang of bandits (Rep. 351c). Law inside, no law outside.
    Plato knows that there is more to
    it than that, so he invents a reward-and-punishment-after-death kind of justice. "You cannot
    have it here but, believe me, the crooks will be punished in the hereafter". <br>
    This model is also the foundation of our nation-state. The justice inside we manage to maintain
    reasonably well so far, our foreign policy is still based on self-interest only: the world is a
    community of gangs of bandits. The ancient Greek attempt to make the city-states live together
    under the reign of Zeus, failed. We will have to try again, or wait until some power conquers us
    all.<br>
</p>
<br>
<br><br>
<hr>
<ol id="footnotes">
    <li>Therefore Achilles' statement that Zeus' honour is enough for him (Il 9.607-8)
    is out of bounds.</li>
    <li>deliberate reference to Karl Popper here.</li>
    <li>Plato is so much like Homer in presenting it this way</li>
</ol>
<br>
<br>

<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php echo autoversion('/scripts/iframes.js');?>"></script>

</body>
</html>
