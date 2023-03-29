<?php

require_once "Rectangle.php";

$rec1 = new Rectangle(2, 5);
$aire = $rec1->calculAire();

$rec1->setLargeur(-1);
echo $rec1->calculAire();