<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Disciplina</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../formulario.css">
</head>

<body>
  <header>
    <h1>Sistema Aluno</h1>
  </header>
  <main>
    <?php
    require_once('../conexao.php');

    $id = $_POST['id'];

    ##sql para selecionar apens um aluno
    $sql = "SELECT * FROM disciplina where id= :id";

    # junta o sql a conexao do banco
    $retorno = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    #executa a estrutura no banco
    $retorno->execute();

    #transforma o retorno em array
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
    $nomedisciplina = $array_retorno['nomedisciplina'];
    $ch = $array_retorno['ch'];
    $semestre = $array_retorno['semestre'];
    $idprofessor = $array_retorno['idprofessor'];
    $Nota1 = $array_retorno['Nota1'];
    $Nota2 = $array_retorno['Nota2'];


    ?>

    <form method="POST" action="cruddisciplina.php">
      <label for="nome">Materia:</label>
      <input type="text" name="nomedisciplina" value="<?php echo $nomedisciplina ?>" required>

      <label for="ch">CH: </label>
      <input type="text" name="ch" required value="<?php echo $ch ?>">

      <label for="semestre">Semestre: </label>
      <select name="semestre" id="" required>
        <option value="1">1º semestre</option>
        <option value="2">2º semestre</option>
        <option value="3">3º semestre</option>
        <option value="4">4º semestre</option>
        <option value="5">5º semestre</option>
        <option value="6">6º semestre</option>
      </select>

      <label for="professor">Professor: </label>
      <select name="professor" id="" required>
        <?php
        $retornoProfessor = $conexao->prepare('SELECT id, nome FROM professor');
        $retornoProfessor->execute();

        foreach ($retornoProfessor->fetchall() as $value) { ?>
          <option value="<?php echo $value['id'] ?>" <?php if ($value['id'] == $idprofessor) echo 'selected'; ?>> <?php echo $value['nome'] ?> </option>
        <?php  }  ?>
      </select>

      <label for="nota1">Nota1:</label>
      <input type="number" name="Nota1" id="Nota1" value="<?php echo $Nota1 ?>">

      <label for="nota2">Nota2:</label>
      <input type="number" name="Nota2" id="Nota2" value="<?php echo $Nota2; ?>">

      <input type="hidden" name="id" id="" value="<?php echo $id ?>">
      <br>
      <br>

      <div>
        <input type="submit" name="update" value="Alterar" class="btn">
      </div>

      <div>
        <button class="button"><a href="listadisciplina.php">voltar</a></button>
      </div>
    </form>
  </main>
  <footer>
    <p>Eduarda Muniz</p>
    <p>INSTITUTO FEDERAL BAIANO</p>
  </footer>
</body>

</html>