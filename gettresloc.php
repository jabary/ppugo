<?php
require 'MyDb.php';

$db = new MyDb();

$locations= $db->getTresLocations();

echo json_encode($locations);

?>