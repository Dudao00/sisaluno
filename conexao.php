<?php 
define('HOST', 'ceteia.guanambi.ifbaiano.edu.br:13306');
define('USUARIO', 'sisaluno');
define('SENHA', 'sisaluno2023');
define('DBNAME', 'sisaluno');

try {

    $conexao = new pdo('mysql:host=' . HOST . ';dbname=' .
                                     DBNAME, USUARIO, SENHA);
} catch (PDOException $e) {
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso.
     Erro gerado " . $e->getMessage();
}

?>
