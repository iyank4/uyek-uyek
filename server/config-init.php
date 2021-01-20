<?php

require_once ('_inc.php');
echo '<!doctype html><html lang="id">';
echo '<head><title>Initialize database</title></head><body>';

// if (file_exists(DB_NAME)) {
//   echo 'DB udah ada: ' . DB_NAME;
//   echo '</body></html>';
//   return;
// }

// --- start ---

echo 'Create db: ' . DB_NAME . '<br>';
$db = new SQLite3(DB_NAME);

echo 'Create table if not exist: config_vars <br>';
$db->exec('CREATE TABLE IF NOT EXISTS config_vars('
  .'key TEXT PRIMARY KEY, '
  .'value TEXT DEFAULT NULL)'
);
echo 'Seed table: config_vars <br>';
// supress error pake a keong @
@$db->exec("INSERT INTO config_vars(key, value) VALUES('datapusherUrl', 'http://localhost:8800')");

// --- end ---
echo '</body></html>';
