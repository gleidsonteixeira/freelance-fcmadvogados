<?php                                                                                                      
class CHI{       

   private $con;                                                                                      
   private $CHI_COD;
   private $CHI_CHA;
   private $CHI_ATENDENTE;
   private $CHI_DTINIC;
   private $CHI_HRINIC;
   private $CHI_DTEDIT;
   private $CHI_HREDIT;
   private $CHI_STATUS;
   private $CHI_PROXATEN;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCHI_COD() {
      return $this->CHI_COD;
   }
 
   public function setCHI_COD($CHI_COD) {
      $this->CHI_COD = $CHI_COD;
   }
 
   public function getCHI_CHA() {
      return $this->CHI_CHA;
   }
 
   public function setCHI_CHA($CHI_CHA) {
      $this->CHI_CHA = $CHI_CHA;
   }
 
   public function getCHI_ATENDENTE() {
      return $this->CHI_ATENDENTE;
   }
 
   public function setCHI_ATENDENTE($CHI_ATENDENTE) {
      $this->CHI_ATENDENTE = $CHI_ATENDENTE;
   }
 
   public function getCHI_DTINIC() {
      return $this->CHI_DTINIC;
   }
 
   public function setCHI_DTINIC($CHI_DTINIC) {
      $this->CHI_DTINIC = $CHI_DTINIC;
   }
 
   public function getCHI_HRINIC() {
      return $this->CHI_HRINIC;
   }
 
   public function setCHI_HRINIC($CHI_HRINIC) {
      $this->CHI_HRINIC = $CHI_HRINIC;
   }
 
   public function getCHI_DTEDIT() {
      return $this->CHI_DTEDIT;
   }
 
   public function setCHI_DTEDIT($CHI_DTEDIT) {
      $this->CHI_DTEDIT = $CHI_DTEDIT;
   }
 
   public function getCHI_HREDIT() {
      return $this->CHI_HREDIT;
   }
 
   public function setCHI_HREDIT($CHI_HREDIT) {
      $this->CHI_HREDIT = $CHI_HREDIT;
   }
 
   public function getCHI_STATUS() {
      return $this->CHI_STATUS;
   }
 
   public function setCHI_STATUS($CHI_STATUS) {
      $this->CHI_STATUS = $CHI_STATUS;
   }
 
   public function getCHI_PROXATEN() {
      return $this->CHI_PROXATEN;
   }
 
   public function setCHI_PROXATEN($CHI_PROXATEN) {
      $this->CHI_PROXATEN = $CHI_PROXATEN;
   }
 
   public function create() {
      try{
         $sql = "SELECT * FROM CHI WHERE CHI_CHA = ".$this->CHI_CHA." AND CHI_ATENDENTE = ".$this->CHI_ATENDENTE." AND CHI_STATUS = 1";
         $rs = $this->con->prepare($sql);
         $rs->execute();
         if($rs->rowCount() == 0){

            $sql = "SELECT * FROM CHI WHERE CHI_CHA = ".$this->CHI_CHA." AND CHI_STATUS = 1";
            $rs = $this->con->prepare($sql);
            $rs->execute();
            if($rs->rowCount() > 0){
               $row = $rs->fetch(PDO::FETCH_OBJ);
               $sql = "UPDATE `CHI` SET
                     `CHI_PROXATEN` = :CHI_PROXATEN   , `CHI_STATUS` = :CHI_STATUS,
                     `CHI_DTEDIT` = :CHI_DTEDIT   , `CHI_HREDIT` = :CHI_HREDIT
                     WHERE `CHI_COD` = :CHI_COD";

               $status = 2;
               $sql = $this->con->prepare($sql);
               $sql->bindParam("CHI_PROXATEN"     , $this->CHI_ATENDENTE     , PDO::PARAM_STR);
               $sql->bindParam("CHI_STATUS"        , $status        , PDO::PARAM_STR);
               $sql->bindParam("CHI_DTEDIT"     , $this->CHI_DTINIC     , PDO::PARAM_STR);
               $sql->bindParam("CHI_HREDIT"        , $this->CHI_HRINIC        , PDO::PARAM_STR);
               $sql->bindParam("CHI_COD"           , $row->CHI_COD           , PDO::PARAM_STR);

               if(!$sql->execute()){
                  return array("status" => 1, "mensagem" => "Erro ao remover Atendente Anterior.");
               }

            }

            $sql = "INSERT INTO `CHI`(
                  `CHI_CHA`      , `CHI_ATENDENTE`, 
                  `CHI_DTINIC`   , `CHI_HRINIC`, 
                  `CHI_STATUS`       
                  ) VALUES (
                  :CHI_CHA       , :CHI_ATENDENTE, 
                  :CHI_DTINIC    , :CHI_HRINIC, 
                  :CHI_STATUS        )";

            $sql = $this->con->prepare($sql);
            $sql->bindParam("CHI_CHA"        , $this->CHI_CHA       , PDO::PARAM_STR);
            $sql->bindParam("CHI_ATENDENTE"  , $this->CHI_ATENDENTE          , PDO::PARAM_STR);
            $sql->bindParam("CHI_DTINIC"     , $this->CHI_DTINIC           , PDO::PARAM_STR);
            $sql->bindParam("CHI_HRINIC"     , $this->CHI_HRINIC   , PDO::PARAM_STR);
            $sql->bindParam("CHI_STATUS"     , $this->CHI_STATUS         , PDO::PARAM_STR);

            if($sql->execute()){
               $this->CHA_COD = $this->con->lastInsertId();
               return array("status" => 0, "mensagem" => "Cadastro de Atendente realizado com Sucesso. Código do ChamadoXAtendente: ".$this->CHI_COD, "codigo" => $this->CHI_COD);
            }else{
               return array("status" => 1, "mensagem" => "Erro ao inserir Atendente.");
            }
         }else{
            $row = $rs->fetch(PDO::FETCH_OBJ);
            $this->CHA_COD = $row->CHI_COD;
            return array("status" => 0, "mensagem" => "Cadastro de Atendente realizado com Sucesso. Código do ChamadoXAtendente: ".$this->CHI_COD, "codigo" => $this->CHI_COD);
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Atendente.");
      }  
   }

}                                                                                                        
?>                                                                                                         