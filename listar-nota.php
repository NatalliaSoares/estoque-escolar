<!-- <?php

require_once "config.php";
require_once "./nota/Nota.php";
require_once "./usuarios/Usuario.php";

$usuarios = new Usuario();
$usuarios->check_login();

$nota = new Nota();

$notas = $nota->listando_nota();


?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/estiloproduto.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/datatables.js"></script>
    <script src="./js/mask.js"></script>
    <script src="./js/app.js"></script>
    <link rel="stylesheet" href="./css/datatable.css">

    <title>LISTA DE NOTAS</title>
</head>
<body>

    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>  

    <div class="tabela">
        <fieldset>
            <legend>Lista de Notas</legend>
            <table id="myTable" class="table" >
                <thead>
                    <tr>
                        <th> #</th>
                        <th> Nome Fornecedor</th>
                        <th> Numero Nota</th>
                        <th> Data Entrada</th>
                        <th> valor</th>
                        <th> Opções</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach($notas as $nota): ?>
                        <tr>
                            <td><?php echo $nota['id_nota']?></td>
                            <td><?php echo $nota['nome_fornecedor']?></td>
                            <td><?php echo str_pad($nota['numero_nota'], 10, "0", STR_PAD_LEFT)?></td>
                            <td><?php echo date('d/m/Y',strtotime($nota['data_entrada']))?></td>                                        
                            <td><span>R$ <span class="dinheiro"><?php echo $nota['total_nota']?></span></span></td>

                            <td>
                                <a href="excluir-.php?id=<?php echo $nota[''] ?>" class="btn btn-danger"> Excluir </a>
                                <a href="./nota/editar-nota.php?id=<?php echo $nota['id_nota'] ?>" class="btn btn-warning"> Editar </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </fieldset>
    </div>
</body>
</html>