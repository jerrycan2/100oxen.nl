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
}
$xml->asXML('sitemap.xml');
?>
