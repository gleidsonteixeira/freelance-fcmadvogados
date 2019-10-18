<?php                                                                                                      
class CMA{             

   private $con;                                                                               
   private $CMA_COD;
   private $CMA_CHA;
   private $CMA_USU;
   private $CMA_CMS;
   private $CMA_ANEXO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCMA_COD() {
      return $this->CMA_COD;
   }
 
   public function setCMA_COD($CMA_COD) {
      $this->CMA_COD = $CMA_COD;
   }
 
   public function getCMA_CHA() {
      return $this->CMA_CHA;
   }
 
   public function setCMA_CHA($CMA_CHA) {
      $this->CMA_CHA = $CMA_CHA;
   }
 
   public function getCMA_USU() {
      return $this->CMA_USU;
   }
 
   public function setCMA_USU($CMA_USU) {
      $this->CMA_USU = $CMA_USU;
   }
 
   public function getCMA_CMS() {
      return $this->CMA_CMS;
   }
 
   public function setCMA_CMS($CMA_CMS) {
      $this->CMA_CMS = $CMA_CMS;
   }
 
   public function getCMA_ANEXO() {
      return $this->CMA_ANEXO;
   }
 
   public function setCMA_ANEXO($CMA_ANEXO) {
      $this->CMA_ANEXO = $CMA_ANEXO;
   }
 
   public function create() {
      try{
         $sql = "INSERT INTO `CMA`(
            `CMA_ANEXO`, `CMA_CHA`, `CMA_CMS`, `CMA_USU`
         ) VALUES (
            :CMA_ANEXO, :CMA_CHA, :CMA_CMS, :CMA_USU
         )";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CMA_ANEXO"       , $this->CMA_ANEXO       , PDO::PARAM_STR);
         $sql->bindParam("CMA_CHA"       , $this->CMA_CHA       , PDO::PARAM_STR);
         $sql->bindParam("CMA_CMS"       , $this->CMA_CMS       , PDO::PARAM_STR);
         $sql->bindParam("CMA_USU"       , $this->CMA_USU       , PDO::PARAM_STR);

         if($sql->execute()){
            $this->CMA_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Anexo realizado com Sucesso. Código do Anexo: ".$this->CMA_COD, "codigo" => $this->CMA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Anexo.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Anexo.");
      }  
   }
}                                                                                                        
?>                                                                                                         