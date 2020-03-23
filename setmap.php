<?php
$xml=simplexml_load_file("sitemap.xml"); /*sitemap for use by google*/
$alt=simplexml_load_file("altmap.xml"); /*altmap for dates on sitemap.php (diff date format)*/
foreach ($xml->url as $url) {
    $fname = pathinfo($url->loc, PATHINFO_BASENAME);
    $mtime = filemtime($fname);
    $date = date('Y-m-d', $mtime);
    if (isset($url->lastmod)){
        $url->lastmod = $date;
    } else {
        $url->addchild('lastmod', $date);
    }
    echo $fname . ';' . $date, PHP_EOL;
}
$xml->asXML('sitemap.xml');
foreach ($alt->url as $url) {
    $fname = pathinfo($url->loc, PATHINFO_BASENAME);
    $mtime = filemtime($fname);
    $date = date('D d M Y', $mtime);
    if (isset($url->lastmod)){
        $url->lastmod = $date;
    } else {
        $url->addchild('lastmod', $date);
    }
    echo $date;
}
$alt->asXML('altmap.xml');
?>
