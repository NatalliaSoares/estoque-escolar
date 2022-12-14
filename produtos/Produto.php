<?php
class Produto{
    public function cadastrar(){
        $nome_produto = $_POST['nome_produto'];
        $data_validade = $_POST['data_validade'];
        $id_fornecedor = $_POST['id_fornecedor'];
        $id_recurso = $_POST['id_recurso'];

        global $db;

        $sql = "INSERT INTO produtos SET nome_produto = :nome_produto,
        data_validade = :data_validade, id_fornecedor = :id_fornecedor, id_recurso = :id_recurso";
        $sql = $db->prepare($sql);
        $sql->bindValue(":nome_produto", $nome_produto);
        $sql->bindValue(":data_validade", $data_validade);
        $sql->bindValue(":id_fornecedor", $id_fornecedor);
        $sql->bindValue(":id_recurso", $id_recurso);
        $sql->execute();
        //print_r($sql->errorInfo()); exit;
        if($sql) {
            header("Location:listar-produtos.php");
        }
    }
    
    public function listar(){
        
        global $db;

        $produtos = array();
        
        $sql = "SELECT produtos.id_produto, produtos.nome_produto, produtos.unidade_medida, produtos.data_validade, produtos.id_nota, 
        produtos.id_fornecedor, produtos.id_recurso, fornecedor.nome_fornecedor, recurso.nome_recurso FROM produtos 
        INNER JOIN fornecedor ON produtos.id_fornecedor = fornecedor.id_fornecedor
        INNER JOIN recurso ON produtos.id_recurso = recurso.id_recurso";
        $sql = $db->prepare($sql);
        $sql->execute();
        $produtos = $sql->fetchALL();
        return $produtos;
    }


    public function info_produto($id_produto){
        global $db;

        $id_produto = $_GET['id'];
        $produto = array();

        $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
        $produto = $sql->fetch();
        return $produto;

    //   echo "<pre>"; print_r($sql->errorInfo()); exit;
        }

    public function editar(){
        global $db;
        $produto = array();

        $id_produto=$_GET['id'];
        
        $id_produto = $_POST['id_produto'];
        $nome_produto = $_POST['nome_produto'];
        $unidade_medida = $_POST['unidade_medida'];
        $data_validade = $_POST['data_validade'];
        $id_fornecedor = $_POST['id_fornecedor'];
        $id_recurso = $_POST['id_recurso'];


        $sql = "UPDATE produtos SET  nome_produto = :nome_produto,  
        unidade_medida = :unidade_medida, data_validade = :data_validade,
        id_fornecedor = :id_fornecedor, id_recurso = :id_recurso WHERE id_produto = :id_produto";
        // echo $sql; exit;
        // echo $id_produto; exit;
        $sql = $db->prepare($sql);
        $sql->bindValue(":nome_produto", $nome_produto );
        $sql->bindValue(":unidade_medida", $unidade_medida);
        $sql->bindValue(":data_validade", $data_validade);
        $sql->bindValue(":id_fornecedor", $id_fornecedor);
        $sql->bindValue(":id_recurso", $id_recurso);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();
    
        header("Location: listar-produtos.php");

        // echo "<pre>"; print_r($sql->errorInfo()); exit;

    }


    public function pesquisar_prod($texto){

        global $db;

        $produtos = array();

        $sql = "SELECT * FROM produtos WHERE nome_produto LIKE :nome_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":nome_produto", $texto."%");
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $produtos = $sql->fetchAll();
        }
        return $produtos;
        
    }

    public function select_prod($prod){
        global $db;

        $produto_info = array();

        $sql = "SELECT * FROM produtos WHERE id_produto = :id_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $prod);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $produto_info = $sql->fetch();
        }
        return $produto_info;
    }

    private function pode_excluir($id_produto){
        global $db;

        $produto = array();

        $sql = "SELECT * FROM info_produtos_entrada WHERE id_produto = :id_produto";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->execute();

        if($sql->rowCount()>0){
            return false;
        }else{
            return true;
        }

    //   echo "<pre>"; print_r($sql->errorInfo()); exit;
        }

    public function excluir(){

    global $db;
    $id_produto=$_GET['id'];
    if($this->pode_excluir($id_produto)){
        $sql = "DELETE FROM produtos WHERE id_produto = :id";
        $sql = $db->prepare($sql);
        $sql->bindValue(":id", $id_produto);
        $sql->execute();
        $dados = $sql->fetchALL();
    }
    header("Location:listar-produtos.php");

    }
}
?>