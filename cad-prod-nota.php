<?php
require_once "config.php";
require_once "nota/Nota.php";

$nota = new Nota;

if(isset($_GET['id']) && $_GET['id'] != ""){
    $id = $_GET['id'];
}else{
    header ("Location: cad-nota.php");
    exit;
}
 
if(isset($_POST['id_nota'])){
    $id_nota = addslashes($_POST['id_nota']);
    $nota->finalizarNota($id_nota);
} 

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
    <script src="./js/pesquisa_prod.js"></script>
    <link rel="stylesheet" href="./css/paginas.css">
    <link rel="stylesheet" href="./css/cad-nota.css">
    <title>Cadastrar Produtos NF</title>
</head>
<body>
    <div class="menu">  
        <?php require_once "./menu.php";?>
    </div>
    <div class="fundo-cad-prod-nota container">
        <div class="form-prod-nota">
            <h1>Cadastrar Produtos da Nota Fiscal</h1>
            <div class="row ">
                <form method="POST">
                    <div class="row campo_pesquisa">
                        <div class="col-md-12">
                            <input id="pesquisar_prod" class="form-control form-prod" placeholder="Pesquise um produto para incluir" type="text">
                        </div>
                        <div class="col-md-12">
                                <div class="resultado">
                                
                                </div>
                        </div>
                    </div>         
                </form>
            </div>
            <div class="row info-prod">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="prod_nome" disabled>
                        <input type="hidden" id="prod_id" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Quantidade:</label>
                        <input type="text" class="form-control" id="prod_qtd">
                    </div>
                    <div class="col-md-6">
                        <label>Valor(UN):</label>
                        <input type="text" class="form-control dinheiro" id="prod_valor">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-cad-prod" id="salvar_prod">Salvar</button>
                    </div>
                </div>
            </div>
        </div>        
        <div class="form-prod-nota2">
            <div class="caixa-table">
                <table class="table table-striped">
                    <thead>
                        <th>Produtos</th>
                        <th>Quantidade</th>
                        <th>Valor(UN)</th> 
                        <th>Total</th>    
                    </thead>
                    <tbody id="produtos_cad">
                        <div></div>
                    </tbody>
                </table>
            </div>
            <form method="POST">
                <input type="hidden" id="id_nota" name="id_nota" value="<?php echo $id ?>" >
                <button type="submit" class="btn btn-success btn-cad-prod">Finalizar Cadastro</button>
            </form>
        </div>
    </div>
</body>
</html>