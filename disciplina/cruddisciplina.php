<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Professor</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
        <h1>Sistema Disciplina</h1>
    </header>
    <main>
    <div class="box">
        <article>
        <?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nomedisciplina = $_GET["nomedisciplina"];
        $ch = $_GET["ch"];
        $semestre = $_GET["semestre"];
        $idprofessor = $_GET["professor"];
        $Nota1 = $_GET["Nota1"];
        $Nota2 = $_GET["Nota2"];

        // Calcular a média
        $Media = ($Nota1 + $Nota2) / 2;

        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, semestre, idprofessor, Nota1, Nota2, Media) 
                VALUES('$nomedisciplina', '$ch', '$semestre', '$idprofessor', '$Nota1', '$Nota2', '$Media')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> a disciplina
                $nomedisciplina foi Incluido com sucesso!!!"; 
                echo " <button class='button-voltar'><a href='../index.html'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["professor"];
    $id = $_POST["id"];
    $Nota1 = $_POST["Nota1"];
    $Nota2 = $_POST["Nota2"];
   
    // Calcular a média
    $Media = ($Nota1 + $Nota2) / 2;

    // Atualizar os dados no banco usando PDO
    $sql = "UPDATE disciplina SET nomedisciplina=:nomedisciplina, ch=:ch, semestre=:semestre, 
            idprofessor=:idprofessor, Nota1=:Nota1, Nota2=:Nota2, Media=:Media WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina);
    $stmt->bindParam(':ch', $ch);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':idprofessor', $idprofessor);
    $stmt->bindParam(':Nota1', $Nota1);
    $stmt->bindParam(':Nota2', $Nota2);
    $stmt->bindParam(':Media', $Media);
    $stmt->bindParam(':id', $id);
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> a disciplina
             $nomedisciplina foi Alterada com sucesso!!!"; 

            echo " <button class='button-voltar'><a href='listadisciplina.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> a disciplina
             $id foi excluido!!!"; 

            echo " <button class='button-voltar'><a href='listadisciplina.php'>voltar</a></button>";
        }

}

        
?>
        </article>
    </div>
  </main>
  <footer>
  <p>Eduarda Muniz</p>
        <p>INSTITUTO FEDERAL BAIANO</p>
  </footer>
    </main>
</body>
</html>
