<?php
    $name = $_GET["file"];
    if( !empty($name)) {
        $file = $name . '.html';
        echo $name . '.' . filemtime($file) . '.html';
    }
?>
