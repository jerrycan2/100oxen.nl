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
    <meta name="Description" CONTENT="Links to all pages on 100oxen.nl">
    <title>sitemap</title>
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/sitemap.css');?>">
</head>
<body class="latin contents">
<h1>Sitemap</h1>
<h5>all pages are provisional</h5>
<div class="map">
    <span class="emph2">Site</span>
    <ul>
        <li id="firstli"><span class="emph2">Introduction, axioms</span>
            <ul>
                <li>1. intro, axioms ⇨ <a class="textlink" title="100 oxen" target="_self" href="<?php echo autoversion('/100oxen.php');?>">One hundred oxen</a></li>
                <li><a class="textlink" target="_self" title="explanation of themata" href="<?php echo autoversion('/textframe.php');?>">2. Explanation page</a>
                </li>
                <li> <a class="textlink" title="helppage" target="_self" href="<?php echo autoversion('/help.php');?>">3. Help page</a></li>
            </ul>
        </li>
        <li><span class="emph2">Where &amp; when (historical)</span>
            <ul>
                <li>the Ionian migration
                    <ul>
                        <li><!--a class="textlink" target="_self" title="Charter Myth" href="charter.php"></a-->Charter
                            myth
                        </li>
                        <li><a class="textlink" title="Poseidon" target="_self" href="<?php echo autoversion('/poseidon.php');?>">Poseidon</a></li>
                    </ul>
                <li><a class="textlink" title="Smyrna and Lydia" target="_self" href="<?php echo autoversion('/smyrna.php');?>">Smyrna and Lydia</a></li>
            </ul>
        </li>
        <li><span class="emph2">How (poetical)</span>
            <ul>
                <li>The Song
                    <ul>
                        <li> the language
                            <ul>
                                <li>
                                    <!--a class="textlink" title="basics of interpretation" href="basics.php">basics</a-->
                                    basics
                                </li>
                                <li><a class="textlink" title="Likeness" target="_self" href="<?php echo autoversion('/likenesses.php');?>">Likenesses</a></li>
                                <li>type, character and 'position'</li>
                            </ul>
                        </li>
                        <li> Structures
                            <ul>
                                <li><a class="textlink" title="a proportional view" target="_self" href="<?php echo autoversion('/blocks.php');?>">A proportional view of the summary</a></li>
                                <li>Geometrics: <a class="textlink" title="about the structure" target="_self" href="<?php echo autoversion('/themata.php');?>">the Thematic Structure, ring composition</a>.
                                </li>
                                <li><a class="textlink" title="other kinds of structure" target="_self" href="<?php echo autoversion('/days.php');?>">other structures</a>: time, pathos, characters.
                                </li>
                                <li><a class="textlink" title="stitched verse" target="_self" href="<?php echo autoversion('/stitches.php');?>">Stitched verse - alterations? </a></li>
                                <li><a class="textlink" title="Agamemnon's council" target="_self" href="<?php echo autoversion('/council.php');?>">Agamemnon's council</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>The Singer
                    <ul>
                        <li> Apollo and the Art of Archery
                            <ul>
                                <li><a class="textlink" title="Poetry, Prophecy, Healing" target="_self" href="<?php echo autoversion('/apollo.php');?>">Poetry, Prophecy, Healing</a></li>
                            </ul>
                        </li>
                        <li><a class="textlink" title="Persuasive rhetoric" target="_self" href="<?php echo autoversion('/rhetoric.php');?>">persuasive rhetoric</a></li>
                    </ul>
                </li>
            </ul>
        <li><span class="emph2">What (thematic)</span>
            <ul>
                <li> The Hero (the Chimaera model)
                    <ul>
                        <li>1. the Immortal Hero</li>
                        <li>2. the Plan of Zeus</li>
                        <li>3. <a class="textlink" title="the Mortal Hero" target="_self" href="<?php echo autoversion('/achilles.php');?>">the Mortal Hero</a></li>
                    </ul>
                </li>
                <li> the Gods
                    <ul>
                        <li><a class="textlink" title="What we obey: the gods" target="_self" href="<?php echo autoversion('/thegods.php');?>">'What we obey'</a></li>
                        <li><a class="textlink" title="Zeus and Justice" target="_self" href="<?php echo autoversion('/justice.php');?>">Zeus and Justice</a></li>
                        <li><a class="textlink" title="Kronos" target="_self" href="<?php echo autoversion('/kronos.php');?>">Kronos</a></li>
                        <li><a class="textlink" title="the Good, the True and the Beautiful" target="_self" href="<?php echo autoversion('/gtb.php');?>">the Good, the True and the Beautiful</a></li>
                    </ul>
                </li>
                <li> the Polis
                    <ul>
                        <li><a class="textlink" title="Homer's Politeia" target="_self" href="<?php echo autoversion('/politeia.php');?>">Homer's Politeia </a></li>
                        <li><a class="textlink" title="Plato's Politeia" target="_self" href="<?php echo autoversion('/plato.php');?>">Plato's Politeia</a>
                            <ul>
                                <li><a class="textlink" title="Plato's gods" target="_self" href="<?php echo autoversion('/plato_gods.php');?>">Plato's god(s)</a>.</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>The Odyssey
                    <ul>
                        <li>Homecoming</li>
                        <li>Prophecy</li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><span class="emph2">Who (reflexive)</span>
            <ul>
                <li><a class="textlink" title="self-reflection" target="_self" href="<?php echo autoversion('/self.php');?>">Self-reflection in Iliad and Odyssey
                    (overview)</a>
                    <ul>
                        <li>The Odyssey's discussion of the Iliad</li>
                        <li>What the singer does: Proteus</li>
                        <li>'I am Odysseus', 'My name is Nobody' - exile</li>
                        <li>Iliad: Fantasy &amp; Reality, Odyssey: Lie &amp; Truth</li>
                    </ul>
                </li>
                <li><a class="textlink" title="the women" target="_self" href="<?php echo autoversion('/women.php');?>">The Women</a></li>
                <li>A hypothetical <a class="textlink" title="Life of Homer" target="_self" href="<?php echo autoversion('/life.php');?>">Life of Homer</a>.</li>
                <li>Chios, Phoenix, Nausikaa</li>
            </ul>
        </li>
        <li>
            <span class="emph2">Target (did he hit it?)</span>
            <ul>
                <li> Was Achilles stronger than Homer?</li>
            </ul>
        </li>
    </ul>
</div>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?><br></div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="scripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?= autoversion('/scripts/iframes.js');?>"></script>
<script>
    $.ajax({ //creates new sitemap.xml
        type: "GET",
        datatype: "text",
        url: "setmap.php"
    });
</script>
</body>
</html>
