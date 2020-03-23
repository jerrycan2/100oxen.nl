<?php
/*  lookup filename(s) (from send.html) in altmap.xml to current date
    and save the file
*/
    $allnames = explode(";", $_GET["text"]);
    $alt=simplexml_load_file("altmap.xml");
    $xml=simplexml_load_file("sitemap.xml");
    foreach($allnames as $name)
    {
        foreach ($alt->url as $url) {
            if($name == pathinfo($url->loc, PATHINFO_BASENAME)){
                $url->lastmod = date('D d M Y');
            }
        }

    /*  do the same in sitemap.xml, only different date format
    */
        foreach ($xml->url as $url) {
            if($name == pathinfo($url->loc, PATHINFO_BASENAME)){
                $url->lastmod = date('Y-m-d');
            }
        }
        echo $name . ";";
    }
    $alt->asXML('altmap.xml');
    $xml->asXML('sitemap.xml');
?>
