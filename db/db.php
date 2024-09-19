<?php
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'ddsecurity';

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);


if (!$conn) {
  die('Connecction Failed !');
}
