<?php
// bootstrap.php
 
//vamos configurar a chamada ao Entity Manager, o mais importante do Doctrine

// o Doctrine utiliza namespaces em sua estrutura, por isto estes uses
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//BLOCO 1
// o Autoload é responsável por carregar as classes, usando o autoload do Composer, sem necessidade de incluí-las previamente
require_once "vendor/autoload.php";

//BLOCO 2 - Instanciamento do objeto ORM Configuration
//onde irão ficar as entidades do projeto? Defina o caminho aqui
$entidades = array("src/");
$isDevMode = true;

//setando as configurações definidas anteriormente. Irá ser utilizado o mapeamento dos Metadados nas Annotations
$config = Setup::createAnnotationMetadataConfiguration($entidades, $isDevMode);
// é possível usar também o yaml ou o XML:
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

//BLOCO 3 - Configurações da conexão com o banco de dados
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrinedb'
);

//criando o Entity Manager com base nas configurações de dev e banco de dados
$entityManager = EntityManager::create($dbParams, $config);
?>