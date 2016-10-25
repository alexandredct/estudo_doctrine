<?php

class Categoria_controller {
    public function adicionaCategoria($nome){
        require 'bootstrap.php';
        $categoria = new Categoria; //instanciando a entidade Categoria
        $categoria->setNome($nome); 
        $entityManager->persist($categoria); //A função persist do EM aguarda por um objeto para colocá-lo na fila de instruções a ser executada sobre o banco de dados
        $entityManager->flush(); //A função flush, do EM, é reponsável por executar as instruções preparadas pelo persist.
    }
    
    
    public function buscaCategoriaByID($id){
        require 'bootstrap.php';
        /**         * 
         * Aqui não há a necessidade de instanciar a Entidade Categoria diretamente.
         * No método find, disposto pelo Entity Manager, passamos dois parâmetros:
         * O primeiro é o nome da Entidade, o segundo é o ID que buscamos.
         */
        $categoria = $entityManager->find('Categoria', $id);
        
        /**         * 
         * Neste momento, já temos dentro da variável $categoria
         * toda a linha referente ao ID = 2 da tabela Categoria.
         * Utilizamos agora os gets para obter cada coluna em específico.
         * 
         * A instrução abaixo vai nos imprimir o nome da Categoria em questão.
         */
        return $categoria->getNome();
    }
    
    public function buscaCategoriaByNome($nome){        
        require 'bootstrap.php';
         /**
          * Agora vamos buscar uma categoria por nome, mas de um jeito um pouco diferente. Pegamos toda a Entidade Categoria e após isso buscamos apenas UM registro.
          * Para retornar todos os registros encontrados com os parâmetros passados,altere a função findOneBy por findBy (esta última retorna um Array de Objetos)
          * 
          * Dentro do array, você pode passar quantos parâmetros for necessário para sua pesquisa.
          */
        $categoria = $entityManager->getRepository('Categoria')->findOneBy(array('nome' => $nome));
         /**
          * Aqui vamos simplesmente imprimir na tela o ID da categoria encontrada.
          */         
        return $categoria->getId();
    }
    
    public function editaCategoria($id, $nome){
        require 'bootstrap.php';
        $registro = $entityManager->find('Categoria', $id);
        $registro->setNome($nome);
        $entityManager-> persist($registro);
        $entityManager->
                flush();
    }
    
    public function removeCategoria($id){
        // removerCategoria.php
        // você já sabe o motivo deste require
        require 'bootstrap.php';

        /**
         * 
         * A essa altura você já sabe o que essa linha faz
         */
        $excluir = $entityManager->find('Categoria', $id);

        /**
         * 
         * Função nova. ao invés de persist, agora utilizamos o remove,
         * passando nela o objeto à ser excluido.
         * 
         * Abaixo, o flush para concretizar a operação
         */
        $entityManager->remove($excluir);
        $entityManager->flush();
    }  
    
}