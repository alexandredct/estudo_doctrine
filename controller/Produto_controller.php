<?php

class Produto_controller{
    public function apresentaProduto($id){
        require 'bootstrap.php';
        $produto = $entityManager->find("Produto", $id);        
        //$categoria = $produto->getCategoria()->getNome();
        echo $produto->getNome();
        //echo $categoria;
    }
    
    public function adicionaProduto($idCategoria, $nome){
        require 'bootstrap.php';
        /**
        * 
        * No primeiro momento, antes de adicionar o produto, devemos recuperar 
        * a categoria à qual este produto pertence
        */
        $categoria = $entityManager->find('Categoria', $idCategoria);
        $produto = new Produto;
        $produto->setNome($nome);
        /**
        * Aqui acontece uma mágica. Já recuperamos o objeto da categoria que desejamos,
        * basta adicioná-lo agora ao produto, através do método setCategoria
        */
        $produto->setCategoria($categoria);
        $entityManager->persist($produto);
        $entityManager->flush();
    }
}