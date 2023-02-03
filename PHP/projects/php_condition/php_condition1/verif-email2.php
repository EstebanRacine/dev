<?php

$email = readline("Quel est le mail ?");

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "L'adresse e-mail est valide";
  }else{
    echo "L'adresse e-mail n'est pas valide";
  }

  