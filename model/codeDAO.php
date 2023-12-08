<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME','overdrive');


class codeDAO{
    private $banco;

    public function __construct(){
        $this->banco = new PDO('mysql:host='.HOST.'; dbname='.DB_NAME,USER,PASSWORD);
    }


    public function cadastraUsuario($usuario){
        
        $query = "INSERT INTO usuario (nome, cpf, cnh, telefone, endereco, carro, empresa, senha, acesso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
     
        
        $dados = array(
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getCnh(),
            $usuario->getTelefone(),
            $usuario->getEndereco(),
            $usuario->getCarro(),
            $usuario->getEmpresa(),
            $usuario->getSenha(),
            $usuario->getAcesso()
        );

        $query_run = $this->banco->prepare($query);        
        if ($query_run->execute($dados)) {
            return true;
        }else{
            return false;
        }
    }


    public function cadastraEmpresa($empresa)
    {
        $query = "INSERT INTO empresa (cnpj,nome,nome_fantasia,endereco,telefone,responsavel) VALUES (?,?,?,?,?,?) ";

        $dados = array(
        $empresa->getCnpj(),
        $empresa->getNome(),
        $empresa->getNome_fantasia(),
        $empresa->getEndereco(),
        $empresa->getTelefone(),
        $empresa->getResponsavel());

        $query_run = $this->banco->prepare($query);
        
        if($query_run->execute($dados)){
            return true;
        }else{
            return false;
        } 
    }


    public function editaUsuario($usuario,$usuario_id)
    {
        $query = "UPDATE usuario SET nome = ?, cpf = ?, cnh = ? , telefone = ? , endereco= ? , carro = ?, empresa = ?, senha = ? , acesso = ? WHERE u_id = ?";
        
        $query_run = $this->banco->prepare($query);
    

        $dados=array(
            $usuario->getNome(),
            $usuario->getCpf(),
            $usuario->getCnh(),
            $usuario->getTelefone(),
            $usuario->getEndereco(),
            $usuario->getCarro(),
            $usuario->getEmpresa(),
            $usuario->getSenha(),
            $usuario->getAcesso(),
            $usuario_id
        );

        if($query_run->execute($dados)){
            return true;
        }else{
            return false;
        }
    }



    public function editaEmpresa($empresa,$empresa_id)
    {
        $query = "UPDATE empresa SET cnpj = ?, nome = ?, nome_fantasia = ?,  endereco = ?, telefone = ?, responsavel= ? WHERE e_id = ?";
        
        $query_run = $this->banco->prepare($query);
    

        $dados=array(
            $empresa->getCnpj(),
            $empresa->getNome(),
            $empresa->getNome_fantasia(),
            $empresa->getEndereco(),
            $empresa->getTelefone(),
            $empresa->getResponsavel(),
            $empresa_id
        );

        if($query_run->execute($dados)){
            return true;
        }else{
            return false;
        }
    }


    public function editaSenha($usuario,$usuario_id)
    {
        $query = "UPDATE usuario SET senha = ? WHERE u_id = ?";
        
        $query_run = $this->banco->prepare($query);
    

        $dados=array(            
            $usuario->getSenha(),
            $usuario_id
        );

        if($query_run->execute($dados)){
            return true;
        }else{
            return false;
        }
    }



    public function infoUsuario($usuario_id)
    {
        $query = "SELECT * FROM usuario WHERE u_id = :id";

        $query_run = $this->banco->prepare($query);
        $query_run->bindParam(':id',$usuario_id);
        $query_run->execute();

        $dados=$query_run->fetchAll(PDO::FETCH_ASSOC);
        
        if($dados){
            return array(
            'u_id' => $dados[0]['u_id'],
            'nome' => $dados[0]['nome'],
            'cpf' => $dados[0]['cpf'],
            'cnh' => $dados[0]['cnh'],
            'telefone' => $dados[0]['telefone'],
            'endereco' => $dados[0]['endereco'],
            'carro' => $dados[0]['carro'],
            'empresa' => $dados[0]['empresa'],
            'senha' => $dados[0]['senha'],
            'acesso' => $dados[0]['acesso']
        );

        } else{
            exit();
        }
    }


    public function deletaUsuario($u_id)
    {
        $query = "DELETE FROM usuario WHERE u_id = ?";
        $dados = array($u_id);
        $query_run = $this->banco->prepare($query);
        if($query_run->execute($dados)){
            return true;
        }else{
            return false;
        }
    }

    public function deletaEmpresa($e_id)
    {
        $query = "DELETE FROM empresa WHERE e_id = ?";
        $dados = array($e_id);
        $query_run = $this->banco->prepare($query);
        if($query_run->execute($dados)){
            return true;
        }else{
            return false;
        }
    }


    public function consultaEmpresa($e_id)
    {
        $query = "SELECT COUNT(*) FROM usuario WHERE empresa = ?";
        $dados = array($e_id);
        $query_run = $this->banco->prepare($query);
        $query_run->execute($dados);
        $resultado = $query_run->fetchColumn();
        if($resultado > 0){
            return true;
        }else{
            return false;
        }
    }


    public function visualizarEmpresas(){
        if(isset($_GET['busca'])){
    
            $pesquisa = '%'. $_GET['busca'].'%';
            $query = "SELECT * FROM empresa WHERE nome LIKE :pesquisa OR nome_fantasia LIKE :pesquisa OR cnpj LIKE :pesquisa OR responsavel LIKE :pesquisa ORDER BY e_id";
    
            $query_run = $this->banco->prepare($query);
            $query_run->bindParam(':pesquisa',$pesquisa,PDO::PARAM_STR);
    
            $query_run->execute();
    
            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $query="SELECT * FROM empresa";
            $query_run = $this->banco->prepare($query);
            $query_run->execute();
    
            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function visualizarUsuarios(){
        if(isset($_GET['busca'])){

            $pesquisa = '%'. $_GET['busca'].'%';
            $query = "SELECT u.u_id, u.nome, u.cpf, u.cnh, u.telefone, u.endereco, u.carro, e.nome_fantasia as empresa from usuario as u join empresa as e on u.empresa = e.e_id WHERE u.cpf LIKE :pesquisa OR u.nome LIKE :pesquisa ORDER BY u.u_id";

            $query_run = $this->banco->prepare($query);
            $query_run->bindParam(':pesquisa',$pesquisa,PDO::PARAM_STR);

            $query_run->execute();

            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $query="SELECT u.u_id, u.nome, u.cpf, u.cnh, u.telefone, u.endereco, u.carro, e.nome_fantasia as empresa from usuario as u join empresa as e on u.empresa = e.e_id ORDER BY u.u_id";
            $query_run = $this->banco->prepare($query);
            $query_run->execute();
    
            return $query_run->fetchAll(PDO::FETCH_ASSOC);
        }
    }



    public function selectEmpresa(){
        $query = "SELECT * FROM empresa";
        $query_run = $this->banco->prepare($query);
        $query_run->execute();
        return $query_run->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>