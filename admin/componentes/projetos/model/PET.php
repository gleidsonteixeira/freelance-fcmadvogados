<?php                                                                                                      
class PET{                                                                                     
   private $PET_COD;
   private $PET_NOME;
   private $PET_STATUS;
   private $PET_PJT;
   private $PET_ORDEM;
   private $PET_DTCAD;
   private $PET_HRCAD;
   private $PET_USUCAD;
   private $PET_DTEDIT;
   private $PET_HREDIT;
   private $PET_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getPET_COD() {
      return $this->PET_COD;
   }
 
   public function setPET_COD($PET_COD) {
      $this->PET_COD = $PET_COD;
   }
 
   public function getPET_NOME() {
      return $this->PET_NOME;
   }
 
   public function setPET_NOME($PET_NOME) {
      $this->PET_NOME = $PET_NOME;
   }
 
   public function getPET_STATUS() {
      return $this->PET_STATUS;
   }
 
   public function setPET_STATUS($PET_STATUS) {
      $this->PET_STATUS = $PET_STATUS;
   }
 
   public function getPET_PJT() {
      return $this->PET_PJT;
   }
 
   public function setPET_PJT($PET_PJT) {
      $this->PET_PJT = $PET_PJT;
   }
 
   public function getPET_ORDEM() {
      return $this->PET_ORDEM;
   }
 
   public function setPET_ORDEM($PET_ORDEM) {
      $this->PET_ORDEM = $PET_ORDEM;
   }
 
   public function getPET_DTCAD() {
      return $this->PET_DTCAD;
   }
 
   public function setPET_DTCAD($PET_DTCAD) {
      $this->PET_DTCAD = $PET_DTCAD;
   }
 
   public function getPET_HRCAD() {
      return $this->PET_HRCAD;
   }
 
   public function setPET_HRCAD($PET_HRCAD) {
      $this->PET_HRCAD = $PET_HRCAD;
   }
 
   public function getPET_USUCAD() {
      return $this->PET_USUCAD;
   }
 
   public function setPET_USUCAD($PET_USUCAD) {
      $this->PET_USUCAD = $PET_USUCAD;
   }
 
   public function getPET_DTEDIT() {
      return $this->PET_DTEDIT;
   }
 
   public function setPET_DTEDIT($PET_DTEDIT) {
      $this->PET_DTEDIT = $PET_DTEDIT;
   }
 
   public function getPET_HREDIT() {
      return $this->PET_HREDIT;
   }
 
   public function setPET_HREDIT($PET_HREDIT) {
      $this->PET_HREDIT = $PET_HREDIT;
   }
 
   public function getPET_USUEDIT() {
      return $this->PET_USUEDIT;
   }
 
   public function setPET_USUEDIT($PET_USUEDIT) {
      $this->PET_USUEDIT = $PET_USUEDIT;
   }
 
   // NEXT_FUNCTION //

   public function listar_etapas_ativos($PJT_COD, $LIMIT) {
      $lista_etapas = array(); 
      try{
         $sql = "SELECT * FROM PET WHERE PET_STATUS = 1 AND PET_PJT = $PJT_COD ORDER BY PET_ORDEM DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_etapas[$i] = array(
               "PET_COD" => $row->PET_COD,
               "PET_NOME" => utf8_encode($row->PET_NOME),
               "PET_STATUS" => $row->PET_STATUS,
            );
            $i++;
         }

         return $lista_etapas;
      } catch (PDOException $e){
         return $lista_etapas;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `PET`(
               `PET_NOME` , `PET_STATUS`  ,
               `PET_PJT`, `PET_ORDEM`,
               `PET_DTCAD`, `PET_HRCAD` , `PET_USUCAD`
               ) VALUES (
               :PET_NOME, :PET_STATUS,
               :PET_PJT, :PET_ORDEM,
               :PET_DTCAD, :PET_HRCAD, :PET_USUCAD
               )";

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("PET_NOME"             , $this->PET_NOME             , PDO::PARAM_STR);
         $sql->bindParam("PET_STATUS"           , $this->PET_STATUS           , PDO::PARAM_STR);
         $sql->bindParam("PET_PJT"              , $this->PET_PJT              , PDO::PARAM_STR);
         $sql->bindParam("PET_ORDEM"            , $this->PET_ORDEM            , PDO::PARAM_STR);
         $sql->bindParam("PET_DTCAD"            , $this->PET_DTCAD            , PDO::PARAM_STR);
         $sql->bindParam("PET_HRCAD"            , $this->PET_HRCAD            , PDO::PARAM_STR);
         $sql->bindParam("PET_USUCAD"           , $this->PET_USUCAD           , PDO::PARAM_STR);
       

         if($sql->execute()){
            $this->PET_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de etapa realizado com Sucesso. Código da etapa: ".$this->PET_COD, "codigo" => $this->PET_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir etapa.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro etapa.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `PET` SET
               `PET_NOME` = :PET_NOME
               WHERE `PET_COD` = :PET_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PET_NOME"    , $this->PET_NOME , PDO::PARAM_STR);
         $sql->bindParam("PET_COD"    , $this->PET_COD , PDO::PARAM_STR);
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Edição da etapa realizado com Sucesso. Código da etapa: ".$this->PET_COD, "codigo" => $this->PET_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar etapa.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no atualizar etapa.");
      }  
   }

   public function delete() {
      try{
         $sql = "UPDATE `PET` SET `PET_STATUS` = :PET_STATUS WHERE `PET_COD` = :PET_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PET_STATUS"     , $this->PET_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("PET_COD"        , $this->PET_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código da etapa: ".$this->PET_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar a etapa.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no deletar a etapa.");
      }  
   }


}                                                                                                        
?>                                                                                                         