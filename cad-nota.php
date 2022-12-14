<?php
require_once "config.php";
require_once "./nota/Nota.php";
require_once "./fornecedores/Fornecedor.php";
require_once "./produtos/Produto.php";
require_once "./recursos/Recurso.php";
require_once "./usuarios/Usuario.php";

$usuarios = new Usuario();
$usuarios->check_login();

$produto = new Produto();
$recurso = new Recurso();
$fornecedores = new Fornecedor();

$lista_fornecedores = $fornecedores->listarFornecedores();

$cad_nota = new Nota();

if(isset($_POST['id_fornecedor']) && ($_POST['id_fornecedor']) != "" && ($_POST['num_nota']) && ($_POST['num_nota']) != "" && ($_POST['total_nf']) && ($_POST['total_nf']) != ""){
    $cad_nota->cadastrar_nota();
}

$recursos = $recurso->pegarecursos();

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
    <script src="./js/jquery.js"></script>
    <script src="./js/mask.js"></script>
    <script src="./js/datatables.js"></script>
    <script src="./js/app.js"></script>
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/cad-nota.css">
    <title>Cadastrar Nota Fiscal</title>
</head>
<body>

    <div class="menu">
          
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo-cad-nota">
        <h1>Cadastrar Nota Fiscal</h1>
        <form class="container" method="POST">
            <label>Fornecedor:</label>
            <select class="form-control" name="id_fornecedor" required> 
                <option value="" disabled selected >Selecione um fornecedor</option>
                <?php foreach($lista_fornecedores as $fornecedor):?>

                    <option value="<?php echo utf8_encode($fornecedor['id_fornecedor']) ?>"><?php echo  utf8_encode($fornecedor['nome_fornecedor'])?></option>

                <?php endforeach; ?>    
            </select>
            <label>Número da Nota:</label>
            <input class="form-control" type="text" name="num_nota" required>
            <label>Recurso</label>
                            <select class="form-control" name="id_recurso"> 
                                <option value="">Selecione</option>
                                <?php foreach($recursos as $recurso):?>
                                    <option value="<?php echo $recurso['id_recurso'] ?>"><?php echo $recurso['nome_recurso'] ?></option>
                                <?php endforeach; ?>    
                            </select>
            <label>Valor total NF:</label>
            <input class="form-control dinheiro" type="text" name="total_nf" required>
                        
            <button class="btn btn-cadastrar btn-success" type="submit">Próxima etapa</button>
            
        </form>
            
    </div>

    <footer class="menurp"><a href="" class="paragrafo">-->Desenvolvido pela Segunda Turma do Curso Técnico de Informática<--</a></footer>

</body>
</html>