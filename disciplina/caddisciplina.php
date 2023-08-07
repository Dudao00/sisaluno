<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplina</title>
    <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../formulario.css">
</head>
<body>
  <header>
    <h1>Sistema Aluno</h1>
  </header>
  <main>
  <?php
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');

$retorno = $conexao->prepare('SELECT * FROM professor');
$retorno->execute();

?>
    <form method="GET" action="cruddisciplina.php">
      <label for="nome">Materia: </label>
      <input type="text" name="nome" required>
  
      <label for="ch">CH: </label>
      <input type="text" name="ch" required>
  
      <label for="semestre">Semestre: </label>
      <select name="semestre" id="" require>
        <option value="1">1º semestre</option>
        <option value="2">2º semestre</option>
        <option value="3">3º semestre</option>
        <option value="4">4º semestre</option>
        <option value="5">5º semestre</option>
        <option value="6">6º semestre</option>
      </select>
  
      <label for="professor">Professor: </label>
      <select name="professor" id="" required>
        <?php foreach ($retorno->fetchall() as $value) { ?>
        <option value="<?php echo $value['id'] ?>"> <?php echo $value['nome'] ?> </option>
        <?php  }  ?>
      </select>

      <div>
        <input type="submit" name="cadastrar" value="Cadastrar" class="btn">
      </div>

      <div>
        <button class="button"><a href="../index.html">voltar</a></button>
      </div>
    </form>
  </main>
  <footer>
  <p>Eduarda Muniz</p>
        <p>INSTITUTO FEDERAL BAIANO</p>
  </footer>
</body>
</html>