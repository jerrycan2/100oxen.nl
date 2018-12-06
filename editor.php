<!DOCTYPE html>
<?php
$lastModified=filemtime(__FILE__);
header('Etag: '.'"'.$lastModified.'"');
header('Cache-Control: public');
function autoversion($file)
{
  if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
    return $file;

  $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}
?>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>XML editing test</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&amp;subset=latin,greek,greek-ext"
          rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/huebee.css">
    <link rel="stylesheet" href="<?= autoversion('/css/editor.css');?>">
</head>
<body>
<header>
    <h5>Structure &amp; Edit</h5>
    <div id="hdrbtns"><span>expand level:</span>
        <button class="lvlbutt" id="b1">1</button>
        <button class="lvlbutt" id="b2">2</button>
        <button class="lvlbutt" id="b3">3</button>
        <button class="lvlbutt" id="b4">4</button>
        <button class="lvlbutt" id="b5">5</button>
        <button class="lvlbutt" id="b6">6</button>
        <button class="lvlbutt" id="b7">7</button>
        <button class="lvlbutt" id="b8">8</button>
        <button class="lvlbutt" id="b9">9</button>
        <form id="showtext">
            <label><input id="b_en" value="en" checked="checked" type="checkbox">english</label>
            <label><input id="b_gr" value="gr" type="checkbox">greek</label>
            <label><input id="b_ed" value="ed" type="checkbox">edit</label>
        </form>
        <button id="b_clr">clear</button>
    </div>
</header>
<div id="wrapper">
    <div id="helptext">
    </div>
    <div id="result"></div>
    <div id="sender"></div>
    <div id="struct" class="tree"></div>
    <div id="edit" class="tree"></div>
    <div id="pick">
        <form id="direct"><label><input name="direction" value="up" type="radio">up</label>
            <label><input name="direction" value="down" type="radio">down</label>
            <label><input name="direction" value="left" type="radio">left</label>
            <label><input name="direction" value="right" checked="checked" type="radio">right</label>
            <label><input name="direction" value="none" type="radio">none</label>
        </form>
        <form id="doturn"><label><input id="turning" type="checkbox">turn</label>
        </form>
        <button id="transparent">transparent</button>
    </div>
    <div id="colors" class="color-input"></div>
</div>
<div id="sidebar">
    <button id="help">Help</button>
    <button id="switch">switch</button>
    <button id="showGreek">Hide Greek</button>
    <button id="insertnode">Insert</button>
    <button id="delnodes">Delete</button>
    <button id="split">Split</button>
    <button id="merge">Merge</button>
    <button id="pushtree">Push</button>
    <button id="poptree">Pop</button>
    <select id="undoArray" title="select stored tree">
        <option value="" disabled="disabled" selected="selected" style="display:none;">0
            items
        </option>
    </select>
    <button id="commit">Commit</button>
    <button id="openhueb">hide colors</button>
    <div id="savem"><label>Save As:<input id="inputFileNameToSaveAs"></label>
        <button id="savefile">Save Edit</button>
    </div>
    <div id="loadem"><label>Load:<input id="fileToLoad" type="file"></label>
        <button id="loadfile">Load Edit</button>
    </div>
    <div id="bmdiv">
        <table id="bookmarx">
            <thead>
            <tr>
                <td>
                    <button>bookmarx:</button>&nbsp;click to del
                </td>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <button id="checks">checks</button>
    <button id="sendtree">send edit</button>
    <button id="test">test</button>
</div>
<div id="coverall"></div>
<div id="msgbox">
    <h5>&nbsp;</h5>
    <div id="ok">OK</div>
    <div id="cancel">Cancel</div>
</div>
<div class="mtime"><?="Last-Modified: ".gmdate("D, d M Y H:i", $lastModified)." GMT";?></div>

<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="scripts/huebee.pkgd.js"></script>
<script src="<?= autoversion('/scripts/editor.js');?>"></script>
<script src="/scripts/myUtils.js" type="module"></script>
</body>
</html>