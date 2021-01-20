<?php

require_once ('_inc.php');

$db = new SQLite3(DB_NAME);

$res = $db->query('SELECT * FROM config_vars');
$configs = [];

while ($row = $res->fetchArray(true)) {
  $configs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($configs);
