<?php

require_once "config.php";
require_once "./produtos/Produto.php";
require_once "./usuarios/Usuario.php";

$usuarios = new Usuario();
$usuarios->check_login();

$produto = new Produto();

$produtos = $produto->listar();


?>


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
    <link rel="stylesheet" href="./css/estiloproduto.css">
    <script src="js/jquery.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="./css/datatable.css">

    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="./css/paginas.css">
</head>
<body>
    
    <div class="menu">
     
        <?php require_once "./menu.php";?>
    </div> 
     
    <div class="tabela">
      
        <fieldset class="fundo">
            <legend>Lista de Produtos</legend>
            <table id="myTable" class="table table-striped" >
                <thead>
                    <tr>
                        <th> Produto</th>
                        <th> U. M.</th>
                        <th> Fornecedor</th>
                        <th> Recurso</th>
                        <th> Opções</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach($produtos as $produto): ?>
                        <tr>
                            <td style="width:40%"><?php echo $produto['nome_produto']?></td>
                            <td style="width:5%"><?php echo $produto['unidade_medida']?></td>
                            <td style="width:30%"><?php echo utf8_encode($produto['nome_fornecedor'])?></td>                                        
                            <td style="width:5%"><?php echo $produto['nome_recurso']?></td>
                            <td style="width:20%">
                                <a href="excluir-produtos.php?id=<?php echo $produto['id_produto'] ?>" class="btn btn-danger"> Excluir </a>
                                <a href="editar-produtos.php?id=<?php echo $produto['id_produto'] ?>" class="btn btn-warning"> Editar </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="row box">
                <div class="col-md-6">
                    <a href="./inicio.php"class="btn btn-warning">Voltar</a>
                </div>
            </div>

        </fieldset>
    </div>
    <footer class="menurp"><a href="" class="paragrafo">-->Desenvolvido pela Segunda Turma do Curso Técnico de Informática<--</a></footer>
</body>
</html>