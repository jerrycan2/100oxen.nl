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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>the Iliad: Structure and interpretation</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"

          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= autoversion('/css/common.css');?>">
    <link rel="stylesheet" href="<?= autoversion('/css/start.css');?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alpheios-embedded/dist/style/style.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alpheios-embedded/dist/style/style-embedded.min.css"/>
</head>
<body id="mainbody" class="latin">
<nav id="switchColumns">
    <ul>
        <li class="switch">
            <ul>
                <li>Tree</li>
                <li id="pageitems" title="click for site map">Pages</li>
            </ul>
        </li>
        <li class="switch">
            <ul>
                <li>IL</li>
                <li>OD</li>
                <li>THEO</li>
                <li>W+D</li>
            </ul>
        </li>
        <li class="switch">
            <ul>
                <li>greek</li>
                <li>⇔</li>
                <li>trans</li>
            </ul>
        </li>
        <li class="switch">
            <ul id="col4">
                <li>explanation</li>
                <li>help</li>
            </ul>
        </li>
    </ul>
</nav>
<nav id="bm_nav">
    <ul>
        <li class="switch">
            <select id="BMselector" title="select bookmark">
            </select>
        </li>
        <li class="switch" id="bmprev" title="previous bookmark">&lt;</li>
        <li class="switch" id="bmnext" title="next bookmark">&gt;</li>
        <li class="switch" id="empty" title="clear bookmarks for this text only">
            ∅
        </li>
        <li class="switch" id="goback" title="go back to previous greek line"> ⇔</li>
        <li class="switch" id="to_pad" title="save bookmarks into notepad">⇑</li>
        <li class="switch" id="from_pad" title="fetch bookmarks from notepad">⇓</li>
    </ul>
</nav>
<header class="bgtop" id="topdiv">
    <div class="lrpic"><img src="images/chim_L.png" alt="chimaera" title="chimaera"></div>
    <nav id="menu1">
        <ul>
            <li class="btn1" id="showcolnav"><img id="columns" src="images/columns.png"

                                                  alt="columns" title="configure columns"></li>
            <li>
                <div id="inputfield"><input class="input" id="textinput" placeholder="search"

                                            title="user input: greek/english word or bookmark for searching or word study"

                                            type="search">
                    <div id="inputicon"><img id="betaswitch" src="images/beta.png" title="convert to/from betacode"

                                             alt="convert to/from betacode"></div>
                </div>
            </li>
            <li class="btn1" id="selectbtn" title="choose what to do with input. No menu: no action possible"><img

                    id="select" src="images/lookup.gif" alt="select" title="select search or lookup action"></li>
            <li class="btn1" id="showbmnav"><img id="bookmarks" src="images/books.png"

                                                 alt="bookmark" title="bookmarks"></li>
            <li class="btn1" id="toolbtn"><img id="tools" src="images/tools.png" alt="toolbox"

                                               title="tools">
                <ul class="drop">
                    <li id="setlevel">
                        <table>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                    <li>
                        <div class="inl"><input id="setfontsize" min="8" max="28" value="16"

                                                type="number"></div>
                        <div class="inl">fontsize</div>
                        <div class="inl"><input id="keepfs" checked="checked" type="checkbox">auto</div>
                    </li>
                    <li id="del_all_bm">delete all bookmarks</li>
                    <li id="selonly">show only selection</li>
                    <li id="shownotes">show notes</li>
                    <li id="showalf">show alfabet</li>
                    <li id="savestate">save page state</li>
                    <li id="loadstate">load page state</li>
                    <li id="reset">reset all</li>
                    <li id="who">whodunnit</li>
                    <li id="contact">contact</li>
                    <li id="editor">editor</li>
                </ul>
            </li>
        </ul>
        <div id="counter">
            <div>found:</div>
            <div>0</div>
        </div>
    </nav>
    <div id="hdpic1"><img id="iliad" src="images/homer1.png" alt="Homer's Iliad"

                          title="Homer's Iliad"></div>
    <div id="hdpic2"><img id="arktos" src="images/arktos.png" alt="arktos, ursa major"

                          title="arktos, ursa major"></div>
    <div class="lrpic" id="chim1"><a class="piclink" href="images/apollo.jpg"

                                     target="_blank"><img src="images/apollo_tn.png" alt="Apollo with his bow"

                                                          title="Apollo"></a></div>
</header>
<div id="splash">
    <div class="floatleft">(click and this goes away). Stays away if you check
        this: <input id="nosplash" type="checkbox"></div>
    <section>
        <p>This website-under-construction offers several features:<br>
        </p>
        <ol>
            <li> an <span class="underline">overview</span> of the Iliad in the
                form of a collapsible list. It is meant to bring out a pattern of
                large- and small scale thematic symmetries encompassing the whole
                poem, presented as a hierarchical tree-structure i.e. an expandable
                list. More about this here.
            </li>
            <li> The <span class="underline">Greek text plus a translation</span>
                of Homer's Iliad, Odyssey plus Hesiod's Theogony and Works &amp;
                Days. Greek text and translation are linked to each other by
                clicking on the line numbers.
            </li>
            <li>a <span class="underline">search engine and study tool</span>
                which can select words or lines containing a given word from the
                Greek text or the translation and bookmark them, or perform an
                instant lookup in the Perseus database for meaning or grammatical
                form.
            </li>
            <li>small extra's such as a load/saveable notepad with a
                betacode-converter.<br>
            </li>
        </ol>
    </section>
    <hr>
    <aside>
        <p> Click or tap on the Greek columns in the header to bring down the
            columns-menu. Buttons in there switch in/out the corresponding columns
            with the tree-structure, Greek/English texts, commentary or extra
            pages. The detailed expandable list is under the 'List' button, and
            can be expanded/collapsed by clicking on its + or -, by pressing keys
            '1'-'8', or by the menu under tools. Links to Iliad lines are
            provided.<br>
            For more how-to details, see the Helpfile
            on the right. </p>
        <i>NB:<br>
            - Sorry if it's not quite mobile-friendly. Working on it...<br>
            - Be patient with these pages, esp. if you have a slow computer or
            internet connection. The files are large and the demand on the browser
            resources is considerable. Also it only works well in up-to-date
            browsers. Windows XP or older ipads/iphones, for instance, cannot do it.<br>
        </i></aside>
    <div class="floatright"></div>
</div>
<!--end of splash-->
<div id="hiddendiv">
    <h4>Doubleclick word to lookup in Alpheios</h4>
    <div id="alphtext" class="alpheios-enabled" lang="grc"></div>
</div>
<div id="colwrap" class="bgbot" style="top: 6rem">
    <div id="treeframe" name="treeframe" class="viewport">
        <div id="messages">
            <label>
                <button>↑</button>
            </label>
            <span>New &amp; updated 23 dec 2018</span>
            <p>1: new Iliad Greek text with extra lines & different linenumbers (no more letters).
                It should load automatically. If not, please click 'Reset All'</p>
            <p>2: updating Agamemnon's Aristeia</p>
        </div>
        <div class="contents" id="list">
            <ol></ol>
        </div>
    </div>
    <iframe id="pageframe" name="pageframe" class="viewport"></iframe>
    <iframe id="greekframe" name="greekframe" class="viewport"></iframe>
    <iframe id="butlerframe" name="butlerframe" class="viewport"></iframe>
    <iframe id="textframe" name="textframe" class="viewport"></iframe>
</div>
<div id="coverall"></div>
<div id="msgbox">
    <h5>&nbsp;</h5>
    <div id="ok">OK</div>
    <div id="cancel">NOT</div>
</div>
<div id="notediv">
    <div class="divhdr">Click to close</div>
    <div class="divhdr2 dragme">&nbsp;≡&nbsp;</div>
    <div id="toolbar"><span id="clrpad">clear</span><span id="beta">beta</span><span

            id="goto">goto</span><span id="send">send</span><span id="loadsavebtn">load/save</span>
    </div>
    <textarea class="input" id="notes">Store notes here</textarea>
    <div id="loadsave">
        <table>
            <tbody>
            <tr>
                <td>Save As:</td>
                <td><input id="inputFileNameToSaveAs"></td>
                <td>
                    <button id="savefile">Save</button>
                </td>
            </tr>
            <tr>
                <td>Load:</td>
                <td><input id="fileToLoad" type="file"></td>
                <td>
                    <button id="loadfile">Load</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div id="dunnit">
    <p>Greek texts and their translations provided by Perseus Digital Library,
        with funding from The Annenberg CPB/Project. Original version available
        for viewing and download at <a href="http://www.perseus.tufts.edu/hopper/">Perseus</a>.
    </p>
    <p>
        Greek word lookup provided by the <a href="https://alpheios.net/">Alpheios Project</a>
        with help from their Embedded Library.
    </p>
    <p>All other texts, unless otherwise indicated:</p>
    <img src="images/sign.png" alt="my signature">
    <p>For comments or questions, <a href="mailto:jeroen@100oxen.nl">e-mail
        me</a>.</p>
</div>
<div id="filesmenu" title="pick a file for the left column" style="left: -542.567px; opacity: 0;">
    <ul>
    </ul>
</div>
<div id="alfabetdiv">
    <div class="divhdr">Click to close</div>
    <div class="divhdr2 dragme">&nbsp;≡&nbsp;</div>
    <table>
        <tbody>
        <tr id="tr1">
            <td>α</td>
            <td>β</td>
            <td>γ</td>
            <td>δ</td>
            <td>ε</td>
            <td>ζ</td>
            <td>η</td>
            <td>θ</td>
            <td>ι</td>
            <td>κ</td>
            <td>λ</td>
            <td>μ</td>
            <td>ν</td>
            <td>ξ</td>
            <td>ο</td>
            <td>π</td>
            <td>ρ</td>
            <td>σ</td>
            <td>τ</td>
            <td>υ</td>
            <td>φ</td>
            <td>χ</td>
            <td>ψ</td>
            <td>ω</td>
            <td class="td2">&lt;click</td>
        </tr>
        <tr id="tr2">
            <td>a</td>
            <td>b</td>
            <td>g</td>
            <td>d</td>
            <td>e</td>
            <td>z</td>
            <td>h</td>
            <td>q</td>
            <td>i</td>
            <td>k</td>
            <td>l</td>
            <td>m</td>
            <td>n</td>
            <td>c</td>
            <td>o</td>
            <td>p</td>
            <td>r</td>
            <td>s</td>
            <td>t</td>
            <td>u</td>
            <td>f</td>
            <td>x</td>
            <td>y</td>
            <td>w</td>
            <td class="td2">&lt;press</td>
        </tr>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="/scripts/jquery.nicescroll.min.js"></script>
<script src="/scripts/jquery.mobile.custom.min.js"></script>
<script src="<?php echo autoversion('/scripts/start.js');?>" type="module"></script>
<script src="<?php echo autoversion('/scripts/myUtils.js');?>" type="module"></script>
<script src="/scripts/beta.js" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/alpheios-embedded/dist/alpheios-embedded.min.js"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        new Alpheios.Embedded({
            clientId:"100oxen.nl",
            eventTriggers:"dblclick,tap",
            triggerPreCallback: function () {
                console.log("was here");
                return true;
            }
        }).activate();
    });
</script>
</body>
</html>
