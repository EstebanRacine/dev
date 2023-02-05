<?php
include "src/utils/requetes.php";
include "src/utils/date.php";
include "src/utils/fonctions.php";
$arrayStudents = getAllStudents();
$student = getStudentByID(1);
displayStudent($arrayStudents);
