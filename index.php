<?php

require 'usuarios.php';

$usuarios = new Usuarios();


$usuarios->atualizar("Fulano de Tal das Trevas", "fulano@gmail.com", "a1b2", 3);



?>