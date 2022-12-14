<?php
require_once "config.php";

require_once "./usuarios/Usuario.php";

require_once "./fornecedores/Fornecedor.php";
require_once "./usuarios/Usuario.php";
require_once "./fornecedores/Fornecedor.php";

$usuarios = new Usuario();
$usuarios->check_login();


$fornecedor = new Fornecedor();

$fornecedores = $fornecedor->listarFornecedores();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/datatables.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="./css/datatable.css">
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/fornecedor.css">
    <title>Lista de Fornecedores</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo-lista-forn">
    
        <h1>Lista de Fornecedores</h1>
        <table class="table fundo" id="myTable">
            <thead>
                <th>Fornecedor</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Contato</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Email</th>
                <th>Opções</th>
            </thead>
           
            <tbody>
            <?php foreach($fornecedores as $fornecedor): ?>
                <tr>
                    <td><?php echo utf8_encode($fornecedor['nome_fornecedor'])?></td>
                    <td><?php echo utf8_encode($fornecedor['cnpj'])?></td>
                    <td><?php echo utf8_encode($fornecedor['endereco_fornecedor'])?></td>
                    <td><?php echo utf8_encode($fornecedor['contato_fornecedor'])?></td>
                    <td><?php echo utf8_encode($fornecedor['telefone1'])?></td>
                    <td><?php echo utf8_encode($fornecedor['telefone2'])?></td>
                    <td><?php echo utf8_encode($fornecedor['e_mail'])?></td>
                    <td>
                    <a href="./fornecedores/editar.php?id_fornecedor=<?php echo $fornecedor['id_fornecedor']?>" class="btn btn-warning">Editar</a>
                    
                    <a href="./fornecedores/excluir.php?id_fornecedor=<?php echo $fornecedor['id_fornecedor']?>" onclick="return confirm('Deseja excluir o registro?')" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>            
        </table>
            <div class="row box">
                <div class="col-md-6">
                    <a href="./inicio.php"class="btn btn-voltar btn-warning">Voltar</a>
                </div>
            </div>
    </div>
</body>
</html>