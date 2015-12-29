<?php
header('Content-Type: text/xml');

echo '<root><user>' . $_SERVER['PHP_AUTH_USER'] . '</user><pass>' . $_SERVER['PHP_AUTH_PW'] . '</pass></root>';