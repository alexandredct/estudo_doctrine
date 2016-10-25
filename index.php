<?php
require_once 'controller/Categoria_controller.php';
require_once 'controller/Produto_controller.php';


//$controle = new Categoria_controller;
//$controle->adicionaCategoria("Categoria 4");
//echo "ID 2 é o " . $controle->buscaCategoriaByID(2)."<br/>";
//echo "O ID da categoria SOFTWARE é " . $controle->buscaCategoriaByNome("Software")."<br/>";
//$controle->editaCategoria('26', "Categoria Z");
//$controle->removeCategoria(28);

$controle = new Produto_controller;
$controle->apresentaProduto(1);
$controle->adicionaProduto("1", "Produto de teste");
 
?>