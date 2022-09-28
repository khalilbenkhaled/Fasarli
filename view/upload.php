<?php


$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);