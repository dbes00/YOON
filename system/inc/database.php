<?php

@$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($db -> connect_errno) {

  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();

}
