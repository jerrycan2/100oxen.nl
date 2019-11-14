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
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="Description" CONTENT="Links to all pages on 100oxen.nl">
    <title>sitemap</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/sitemap.css');?>">
</head>
<body class="latin contents">
<h1>What was, what is and what will be</h1>
<h4>Sitemap</h4>
<div class="map">
    <span class="emph2">Site</span>
    <ul>
        <li id="firstli"><span class="emph2">Introduction, axioms</span>
            <ul>
                <li>intro, axioms ⇨ <a class="textlink" href="100oxen.php">
                    One hundred oxen</a></li>
                <li><a class="textlink" target="_self" title="explanation" href="textframe.php">Explanation page</a>
                </li>
            </ul>
        </li>
        <li><span class="emph2">Where &amp; when (historical)</span>
            <ul>
                <li>the Ionian migration
                    <ul>
                        <li><!--a class="textlink" target="_self" title="Charter Myth" href="charter.php"></a-->Charter myth
                        </li>
                        <li><a class="textlink" target="_self" title="Poseidon" href="poseidon.php">Poseidon</a></li>
                    </ul>
                <li><a class="textlink" href="smyrna.php">Smyrna and Lydia</a></li>
            </ul>
        </li>
        <li><span class="emph2">How (poetical)</span>
            <ul>
                <li>The Song
                    <ul>
                        <li> the language
                            <ul>
                                <li><a class="textlink" title="basics of interpretation" href="basics.php">basics</a></li>
                                <li><a class="textlink" target="_self" title="likenesses"
                                       href="likenesses.php">Likenesses</a></li>
                                <li>type, character and 'position'</li>
                            </ul>
                        </li>
                        <li> Structures
                            <ul>
                                <li><a class="textlink" target="_self" title="proportional view"
                                       href="blocks.php">A proportional view of the summary</a></li>
                                <li>Geometrics: <a class="textlink" href="ring.php">ring composition,
                                    catalogues</a></li>
                                <li><a class="textlink" target="_self" title="Stitched verse"
                                       href="stitches.php">Stitched verse - alterations? </a></li>
                                <li><a class="textlink" title="" href="council.php">Agamemnon's council</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>The Singer
                    <ul>
                        <li> Apollo and the Art of Archery
                            <ul>
                                <li><a class="textlink" target="_self" title=" Poetry, Prophecy, Healing"
                                       href="apollo.php"> Poetry, Prophecy, Healing</a></li>
                                <li><a class="textlink" title="" href="wrath.php">the Wrath of Apollo</a></li>
                            </ul>
                        </li>
                        <li><a class="textlink" target="_self" title="Persuasive rhetoric"
                               href="rhetoric.php">persuasive rhetoric</a></li>
                    </ul>
                </li>
            </ul>
        <li><span class="emph2">What (thematic)</span>
            <ul>
                <li> The Hero (the Chimaera model)
                    <ul>
                        <li>1. the Immortal Hero</li>
                        <li>2. the Plan of Zeus</li>
                        <li>3. <a class="textlink" target="_self" title="the mortal hero" href="achilles.php">the Mortal
                            Hero</a></li>
                    </ul>
                </li>
                <li> the Gods
                    <ul>
                        <li><a class="textlink" title="What we obey" href="thegods.php">'What we obey'</a></li>
                        <li><a class="textlink" title="Zeus and Justice" href="justice.php">Zeus and Justice</a></li>
                        <li><a class="textlink" title="Kronos" href="kronos.php">Kronos</a></li>
                        <li><a class="textlink" title="" href="gtb.php">the Good, the True and the Beautiful</a></li>
                    </ul>
                </li>
                <li> the Polis
                    <ul>
                        <li><a class="textlink" target="_self"
                               title="Homer's Politeia" href="politeia.php">Homer's Politeia </a></li>
                        <li><a class="textlink" href="plato.php">Plato's Politeia</a></li>
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
                <li> <a class="textlink" title="self-reflection" href="self.php">Self-reflection in Iliad and Odyssey (overview)</a>
                    <ul>
                        <li>The Odyssey's discussion of the Iliad</li>
                        <li>What the singer does: Proteus</li>
                        <li>'I am Odysseus', 'My name is Nobody' - exile</li>
                        <li>Iliad: Fantasy &amp; Reality, Odyssey: Lie &amp; Truth</li>
                    </ul>
                </li>
                <li><a class="textlink" title="Women" href="women.php"> Women</a></li>
                <li>Melesigenes, Pylos, 2 brothers - theme</li>
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
    function read_altmap(xml) {
        const $pages = $(".textlink");
        let txt;
        $pages.each(function () {
            txt = $(this).attr("href");
            let a = `loc:contains('${txt}')`;
            let pg = $(xml).find(a);
            let date = pg.siblings("lastmod").text();
            $(this).next('span').remove();
            $(this).after(`<span> (update ${date})</span>`);
        });
    }

    let altmap = sessionStorage.getItem('altmap');
    if (!altmap) {
        $.ajax({
            type: "GET",
            datatype: "xml",
            cache: false,
            url: "altmap.xml"
        }).done(function (xml) {
            let serial = new XMLSerializer();
            sessionStorage.setItem("altmap", serial.serializeToString(xml));
            read_altmap(xml);
        });
    } else {
        read_altmap($.parseXML(altmap));
        console.log("xml from sessionstorage");
    }

</script>
</body>
</html>
