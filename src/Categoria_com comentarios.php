<?php
/**
 *
 * @Entity
 * @Table(name="categoria")
 */

/**
 * Linha 3: Annotation que define a classe como uma Entidade.
 * Linha 4: Onde você define o nome da tabela a ser mapeada.
 */

class Categoria {
// Linha 6: Nome da classe. Para o autoload, é obrigatório o nome do arquivo ser IGUAL ao nome da classe, caso contrário o carregamento automático não funciona!    
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="idCategoria")
     */
    protected $id;
/*
 * Linha 16: Annotation @Id, obrigatório para chave primária da tabela.
 * Linha 17: Annotation @GeneratedValue, identifica o método de geração do Id, e aqui temos um auto incremento, portanto, define-se como “AUTO”.
 * Linha 18: Annotation @Column, define-se aqui vários parâmetros da coluna. No caso, definimos apenas o tipo e o nome da coluna.
 */    
     
    /**
     * @Column(type="string", name="nomeCategoria")
     */
    protected $nome;
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getNome()
    {
        return $this->nome;
    }
 
    public function setNome($nome)
    {
        $this->nome = $nome;
    } 
}
?>