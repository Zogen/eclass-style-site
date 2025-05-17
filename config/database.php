<?php
require_once __DIR__ . '/config.local.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
