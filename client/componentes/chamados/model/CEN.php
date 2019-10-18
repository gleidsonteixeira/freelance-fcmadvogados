<?php                                                                                                      
class CEN{                          

   private $con;                                                                                   
   private $CEN_COD;
   private $CEN_TIPO;
   private $CEN_DTCAD;
   private $CEN_HRCAD;
   private $CEN_CHA;
   private $CEN_ATENDENTE;
   private $CEN_SOLICITANTE;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCEN_COD() {
      return $this->CEN_COD;
   }
 
   public function setCEN_COD($CEN_COD) {
      $this->CEN_COD = $CEN_COD;
   }
 
   public function getCEN_TIPO() {
      return $this->CEN_TIPO;
   }
 
   public function setCEN_TIPO($CEN_TIPO) {
      $this->CEN_TIPO = $CEN_TIPO;
   }
 
   public function getCEN_DTCAD() {
      return $this->CEN_DTCAD;
   }
 
   public function setCEN_DTCAD($CEN_DTCAD) {
      $this->CEN_DTCAD = $CEN_DTCAD;
   }
 
   public function getCEN_HRCAD() {
      return $this->CEN_HRCAD;
   }
 
   public function setCEN_HRCAD($CEN_HRCAD) {
      $this->CEN_HRCAD = $CEN_HRCAD;
   }
 
   public function getCEN_CHA() {
      return $this->CEN_CHA;
   }
 
   public function setCEN_CHA($CEN_CHA) {
      $this->CEN_CHA = $CEN_CHA;
   }
 
   public function getCEN_ATENDENTE() {
      return $this->CEN_ATENDENTE;
   }
 
   public function setCEN_ATENDENTE($CEN_ATENDENTE) {
      $this->CEN_ATENDENTE = $CEN_ATENDENTE;
   }
 
   public function getCEN_SOLICITANTE() {
      return $this->CEN_SOLICITANTE;
   }
 
   public function setCEN_SOLICITANTE($CEN_SOLICITANTE) {
      $this->CEN_SOLICITANTE = $CEN_SOLICITANTE;
   }
 
   public function create() {
      try{
         $sql = "INSERT INTO `CEN`(
               `CEN_TIPO`, `CEN_DTCAD`, `CEN_HRCAD`, `CEN_CHA`, `CEN_ATENDENTE`, `CEN_SOLICITANTE`
            ) VALUES (
               :CEN_TIPO, :CEN_DTCAD, :CEN_HRCAD, :CEN_CHA, :CEN_ATENDENTE, :CEN_SOLICITANTE
            )";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CEN_TIPO"          , $this->CEN_TIPO          , PDO::PARAM_STR);
         $sql->bindParam("CEN_DTCAD"         , $this->CEN_DTCAD         , PDO::PARAM_STR);
         $sql->bindParam("CEN_HRCAD"         , $this->CEN_HRCAD         , PDO::PARAM_STR);
         $sql->bindParam("CEN_CHA"           , $this->CEN_CHA           , PDO::PARAM_STR);
         $sql->bindParam("CEN_ATENDENTE"     , $this->CEN_ATENDENTE     , PDO::PARAM_STR);
         $sql->bindParam("CEN_SOLICITANTE"   , $this->CEN_SOLICITANTE   , PDO::PARAM_STR);

         if($sql->execute()){
            $this->CEN_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Histórico de aceite de Finalização realizado com Sucesso. Código: ".$this->CEN_COD, "codigo" => $this->CEN_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir #CEN01.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro #CEN02.");
      }  
   }
}                                                                                                        
?>                                                                                                         