<?php

require_once "config.php";
require_once "./produtos/Produto.php";
require_once "./fornecedores/Fornecedor.php";
require_once "./recursos/Recurso.php";
require_once "./usuarios/Usuario.php";

$usuarios = new Usuario();
$usuarios->check_login();

$produto = new Produto();
$fornecedor = new Fornecedor();
$recurso = new Recurso();





if (isset($_POST["nome_produto"])){
   $produto->cadastrar();
}

$fornecedores = $fornecedor->listarFornecedores();
$recursos = $recurso->pegarecursos();

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
    <link rel="stylesheet" href="./css/paginas.css">

    <title>Entrada</title>
    
</head>
<body>

    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>  


    <div class="fundo">           
            
            <div class="conta">
                <fieldset>
                    <legend> Cadastrar Produto </legend>
                    <form method="POST">
                        <div class="row">
                            <label>Nome Produto</label>
                            <input type="text" class="form-control" placeholder="Informe o nome do produto " name="nome_produto"/>

                            <label>Unidade </label>
                            <input type="text" class="form-control" placeholder="Informe a quantidade de unidades" name="unidade_medida" value="UN" disabled/>

                            <label>Data Validade</label>
                            <input type="date" class="form-control" placeholder="Informe a data de validade do produto" name="data_validade"/> 

                            <label>Número da Nota</label>
                            <input type="number" class="form-control" placeholder="Informe o número da nota" name="id_nota"/>
                            


                            <label>Fornecedor</label>
                            <select class="form-control" name="id_fornecedor"> 
                                <option value="">Selecione</option>
                                <?php foreach($fornecedores as $fornecedor):?>
                                    <option value="<?php echo $fornecedor['id_fornecedor'] ?>"><?php echo utf8_encode($fornecedor['nome_fornecedor']) ?></option>
                                <?php endforeach; ?>    
                            </select>


                         
                            <label>Recurso</label>
                            <select class="form-control" name="id_recurso"> 
                                <option value="">Selecione</option>
                                <?php foreach($recursos as $recurso):?>
                                    <option value="<?php echo $recurso['id_recurso'] ?>"><?php echo $recurso['nome_recurso'] ?></option>
                                <?php endforeach; ?>    
                            </select>



                            <button type="submit" class="btn btn-success">Cadastrar</button>

                            <a href="<?php echo $url ?>inicio.php"  class="btn btn-voltar btn-warning">Voltar</a>
                        </div>    
                    </form>
                </fieldset>
            </div> 

        </div>

        <footer class="menurp"><a href="" class="paragrafo">-->Desenvolvido pela Segunda Turma do Curso Técnico de Informática<--</a></footer>
    
</body>
</html>