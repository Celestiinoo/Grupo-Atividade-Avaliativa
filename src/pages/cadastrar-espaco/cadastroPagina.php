<?php 
    session_start();
    if (!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] !=1){
        header("location: ../home/index.php");
        exit();
    }

    include __DIR__ . "/../../../backend/controller/userController.php";
    $controller = new userController();
    
   
    $espacos = $controller->listarEspacoCadastrado();


if (isset($_GET['erroNomeIgual'])){
    echo "<script>alert('Erro nome igual a outro espaço')</script>";
}
else if (isset($_GET['deuCerto'])){
    echo "<script>alert('Espaço cadastrado')</script>";
}
else if (isset($_GET['erroSemNome'])){
    echo "<script>alert('Erro nome vazio')</script>";
}
else if (isset($_GET['erroCapacidadeNula'])){
    echo "<script>alert('Erro capacidade não inserida')</script>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Lista de Usuários</title>
</head>
<body>
    <header>
        <div class="H-esquerdo">
        <h2 style="cursor: pointer;"><a href="../home/index.php" style="text-decoration: none; color: white;">Início</a></h2>
            <h2><a style="text-decoration: none;  color:white;" href="../perfil/perfil.php">Perfil</a></h2>
        <h2><a style="text-decoration: none;  color:white;" href="../lista-usuarios/index.php">Lista</a></h2>
        <h2><a style="text-decoration: none;  color:white;" href="../editarEspaco/editarEspaco.php">Editar</a></h2>
        </div>
        <h2><a style="text-decoration: none; color: white;" href="../perfil/logout.php">Logout</a></h2>  
    </header>    

    <div  style="display: flex; justify-content: center; align-items: center; " class="cadastroEspaco">

        <form action="../../../backend/router/reservaRouter.php?action=cadastrarEspaco" method="POST">
            <p><h3>Cadastrar novo espaço:</h3></p>
            <p><input class="btn" type="text" name="nome_espaco" placeholder="Nome:" id=""></p>
            <p><input class="btn" type="text" name="capacidade" placeholder="Capacidade:" id=""></p>
            <p><input  class="btn"type="text" name="descricao" placeholder="Descrição:" id=""></p>
            <p><button class="btn" type="submit">Enviar</button></p>
        </form>

    </div>

    <div class="tabela">
        <table >
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Capacidade</td>
                    <td>Descrição</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($espacos as $item){
                
                    echo "
                    <tr>
                        
                        <td>{$item['id']}</td>
                        <td>{$item['nome']}</td>
                        <td>{$item['capacidade']}</td>
                        <td>{$item['descricao']}</td>
                    </tr>";
                }
                ?>

            </tbody>




        </table>
        


    </div>



 

    <footer>
        <h3>Equipe BF</h3>
        <img src="../../../public/icons/logo.svg" alt="">
    </footer>

</body>
</html>