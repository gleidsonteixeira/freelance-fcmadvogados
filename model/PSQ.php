<?php 
class PSQ{
	private $con;
    private $PSQ_COD;
    private $PSQ_TERMOS;
    private $PSQ_ORIGEM;
    private $PSQ_DTEMISSAO;
    private $PSQ_HREMISSAO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }



    public function getPSQ_COD(){
		return $this->PSQ_COD;
	}

	public function setPSQ_COD($PSQ_COD){
		$this->PSQ_COD = $PSQ_COD;
	}

	public function getPSQ_TERMOS(){
		return $this->PSQ_TERMOS;
	}

	public function setPSQ_TERMOS($PSQ_TERMOS){
		$this->PSQ_TERMOS = $PSQ_TERMOS;
	}

	public function getPSQ_ORIGEM(){
		return $this->PSQ_ORIGEM;
	}

	public function setPSQ_ORIGEM($PSQ_ORIGEM){
		$this->PSQ_ORIGEM = $PSQ_ORIGEM;
	}

	public function getPSQ_DTEMISSAO(){
		return $this->PSQ_DTEMISSAO;
	}

	public function setPSQ_DTEMISSAO($PSQ_DTEMISSAO){
		$this->PSQ_DTEMISSAO = $PSQ_DTEMISSAO;
	}

	public function getPSQ_HREMISSAO(){
		return $this->PSQ_HREMISSAO;
	}

	public function setPSQ_HREMISSAO($PSQ_HREMISSAO){
		$this->PSQ_HREMISSAO = $PSQ_HREMISSAO;
	}


	   public function inserirPesquisa() {
      try{
         $sql = "INSERT INTO `PSQ`(`PSQ_TERMOS`,`PSQ_ORIGEM`, `PSQ_DTEMISSAO`, `PSQ_HREMISSAO`)
         		           VALUES (:PSQ_TERMOS , :PSQ_ORIGEM ,:PSQ_DTEMISSAO, :PSQ_HREMISSAO)";

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("PSQ_TERMOS"      , $this->PSQ_TERMOS      , PDO::PARAM_STR);
         $sql->bindParam("PSQ_ORIGEM"       , $this->PSQ_ORIGEM     , PDO::PARAM_STR);
         $sql->bindParam("PSQ_DTEMISSAO"    , $this->PSQ_DTEMISSAO  , PDO::PARAM_STR);
         $sql->bindParam("PSQ_HREMISSAO"    , $this->PSQ_HREMISSAO  , PDO::PARAM_STR);
       

       

         if($sql->execute()){
            $this->PSQ_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro da pesquisa realizado com Sucesso. Código do pesquisa: ".$this->PSQ_COD, "codigo" => $this->PSQ_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir pesquisa.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro pesquisa.");
      }  
   }







}


 ?>