<?php
require_once "config.php";

?>


<div class="dropdown">
    <!-- BOTAO PRODUTOS-->
        <button class="btn btn-success btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produtos
        </button>
        <ul class="dropdown-menu">
            
            <li><a class="dropdown-item " href="<?php echo $url ?>cad-produtos.php" class="botao-menu">Cadastrar Produto</a></li>
            <li><a class="dropdown-item" href="<?php echo $url ?>listar-produtos.php" class="botao-menu">Listar Produtos</a></li>
            
        </ul>
<!-- FIM BOTAO PRODUTOS-->

</div>

<div class="dropdown">

<button class="btn btn-success btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fornecedores
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="<?php echo $url ?>fornecedor.php" class="botao-menu">Cadastrar</a></li>

            <li><a class="dropdown-item" href="<?php echo $url ?>lista-fornecedor.php" class="botao-menu">Lista</a></li>
        </ul>

</div>

<div class="dropdown">

<button class="btn btn-success btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Nota Fiscal
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="<?php echo $url ?>cad-nota.php" class="botao-menu">Cadastrar nota</a></li>
            <li><a class="dropdown-item " href="<?php echo $url ?>listar-nota.php" class="botao-menu">Listar nota</a></li>
        </ul>

</div>

<div class="dropdown">

<button class="btn btn-success btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cardápio
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="<?php echo $url ?>cardapio.php" class="botao-menu">Cadastrar Cardápio</a></li>

            <li><a class="dropdown-item" href="<?php echo $url ?>listar-cardapios.php" class="botao-menu">Lista</a></li>
        </ul>

</div>

<div class="dropdown">

<button class="btn btn-success btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Retirar Produtos
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="<?php echo $url ?>retirada-produtos.php" class="botao-menu"> Retirar</a></li>
        </ul>

</div>