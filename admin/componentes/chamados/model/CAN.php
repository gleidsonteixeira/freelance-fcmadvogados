<?php                                                                                                      
class CAN{                        

   private $con;                                                                 
   private $CAN_COD;
   private $CAN_ANEXO;
   private $CAN_CHA;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCAN_COD() {
      return $this->CAN_COD;
   }
 
   public function setCAN_COD($CAN_COD) {
      $this->CAN_COD = $CAN_COD;
   }
 
   public function getCAN_ANEXO() {
      return $this->CAN_ANEXO;
   }
 
   public function setCAN_ANEXO($CAN_ANEXO) {
      $this->CAN_ANEXO = $CAN_ANEXO;
   }
 
   public function getCAN_CHA() {
      return $this->CAN_CHA;
   }
 
   public function setCAN_CHA($CAN_CHA) {
      $this->CAN_CHA = $CAN_CHA;
   }

   public function create() {
      try{
         $sql = "INSERT INTO `CAN`(`CAN_ANEXO`, `CAN_CHA`) VALUES (:CAN_ANEXO, :CAN_CHA)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CAN_ANEXO"       , $this->CAN_ANEXO       , PDO::PARAM_STR);
         $sql->bindParam("CAN_CHA"       , $this->CAN_CHA       , PDO::PARAM_STR);

         if($sql->execute()){
            $this->CAN_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Anexo realizado com Sucesso. Código do Anexo: ".$this->CAN_COD, "codigo" => $this->CAN_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Anexo.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Anexo.");
      }  
   }
}                                                                                                        
?>                                                                                                         