<?php
$sale = '$%&27Thequickbrownfoxjumpsoverthelazydog)(UII.';
$token = sha1(mt_rand(1, 1000000) . $sale);
$_SESSION['token'] = $token;

