<?php
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_NAME = "tp_candidature";

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charst=utf8", DB_USER, DB_PASSWORD);
