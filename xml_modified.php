<?php
echo "List modified: " . gmdate("D, d M Y H:i", filemtime($_POST['data'])) . " GMT";
?>
