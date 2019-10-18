<?php                                                                                                      
class USU{  

   private $con;                                                                                       
   private $USU_COD;
   private $USU_EMAIL;
   private $USU_SENHA;
   private $USU_STATUS;
   private $USU_TIPO;
   private $USU_DTCAD;
   private $USU_HRCAD;
   private $USU_USUCAD;
   private $USU_DTEDIT;
   private $USU_HREDIT;
   private $USU_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getUSU_COD() {
      return $this->USU_COD;
   }
 
   public function setUSU_COD($USU_COD) {
      $this->USU_COD = $USU_COD;
   }
 
   public function getUSU_EMAIL() {
      return $this->USU_EMAIL;
   }
 
   public function setUSU_EMAIL($USU_EMAIL) {
      $this->USU_EMAIL = $USU_EMAIL;
   }
 
   public function getUSU_SENHA() {
      return $this->USU_SENHA;
   }
 
   public function setUSU_SENHA($USU_SENHA) {
      $this->USU_SENHA = $USU_SENHA;
   }
 
   public function getUSU_STATUS() {
      return $this->USU_STATUS;
   }
 
   public function setUSU_STATUS($USU_STATUS) {
      $this->USU_STATUS = $USU_STATUS;
   }
 
   public function getUSU_TIPO() {
      return $this->USU_TIPO;
   }
 
   public function setUSU_TIPO($USU_TIPO) {
      $this->USU_TIPO = $USU_TIPO;
   }
 
   public function getUSU_DTCAD() {
      return $this->USU_DTCAD;
   }
 
   public function setUSU_DTCAD($USU_DTCAD) {
      $this->USU_DTCAD = $USU_DTCAD;
   }
 
   public function getUSU_HRCAD() {
      return $this->USU_HRCAD;
   }
 
   public function setUSU_HRCAD($USU_HRCAD) {
      $this->USU_HRCAD = $USU_HRCAD;
   }
 
   public function getUSU_USUCAD() {
      return $this->USU_USUCAD;
   }
 
   public function setUSU_USUCAD($USU_USUCAD) {
      $this->USU_USUCAD = $USU_USUCAD;
   }
 
   public function getUSU_DTEDIT() {
      return $this->USU_DTEDIT;
   }
 
   public function setUSU_DTEDIT($USU_DTEDIT) {
      $this->USU_DTEDIT = $USU_DTEDIT;
   }
 
   public function getUSU_HREDIT() {
      return $this->USU_HREDIT;
   }
 
   public function setUSU_HREDIT($USU_HREDIT) {
      $this->USU_HREDIT = $USU_HREDIT;
   }
 
   public function getUSU_USUEDIT() {
      return $this->USU_USUEDIT;
   }
 
   public function setUSU_USUEDIT($USU_USUEDIT) {
      $this->USU_USUEDIT = $USU_USUEDIT;
   }
 
   public function create() {
      try{
         $retorno = $this->exist($this->USU_EMAIL);
         if($retorno['status'] == 0){
            $sql = "INSERT INTO `USU`(
                  `USU_EMAIL`       , `USU_SENHA`  , 
                  `USU_STATUS`      , `USU_TIPO`   , 
                  `USU_DTCAD`       , `USU_HRCAD`  , 
                  `USU_USUCAD`
                  ) VALUES (
                  :USU_EMAIL        , :USU_SENHA   , 
                  :USU_STATUS       , :USU_TIPO    , 
                  :USU_DTCAD        , :USU_HRCAD   , 
                  :USU_USUCAD)";

            $sql = $this->con->prepare($sql);
            $sql->bindParam("USU_EMAIL"         , $this->USU_EMAIL      , PDO::PARAM_STR);
            $sql->bindParam("USU_SENHA"         , $this->USU_SENHA      , PDO::PARAM_STR);
            $sql->bindParam("USU_STATUS"        , $this->USU_STATUS     , PDO::PARAM_STR);
            $sql->bindParam("USU_TIPO"          , $this->USU_TIPO       , PDO::PARAM_STR);
            $sql->bindParam("USU_DTCAD"         , $this->USU_DTCAD      , PDO::PARAM_STR);
            $sql->bindParam("USU_HRCAD"         , $this->USU_HRCAD      , PDO::PARAM_STR);
            $sql->bindParam("USU_USUCAD"        , $this->USU_USUCAD     , PDO::PARAM_STR);

            if($sql->execute()){
               $this->USU_COD = $this->con->lastInsertId();
               return array("status" => 0, "mensagem" => "Cadastro de Usuário realizado com Sucesso. Código do Usuário: ".$this->USU_COD, "codigo" => $this->USU_COD);
            }else{
               return array("status" => 1, "mensagem" => "Erro ao inserir Usuário.");
            }
         }else{
            return $retorno;
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Usuário.");
      }  
   }

   public function update() {
      try{
         $retorno = $this->exist_update($this->USU_EMAIL, $this->USU_COD);
         if($retorno['status'] == 0){
            $sql = "UPDATE `USU` SET
                  `USU_EMAIL` = :USU_EMAIL         , `USU_SENHA` = :USU_SENHA , 
                  `USU_TIPO` = :USU_TIPO  ,        `USU_DTEDIT` = :USU_DTEDIT , 
                  `USU_HREDIT` = :USU_HREDIT , `USU_USUEDIT` = :USU_USUEDIT
                  WHERE USU_COD = :USU_COD";

            $sql = $this->con->prepare($sql);
            $sql->bindParam("USU_EMAIL"         , $this->USU_EMAIL      , PDO::PARAM_STR);
            $sql->bindParam("USU_SENHA"         , $this->USU_SENHA      , PDO::PARAM_STR);
            $sql->bindParam("USU_TIPO"          , $this->USU_TIPO       , PDO::PARAM_STR);
            $sql->bindParam("USU_DTEDIT"        , $this->USU_DTEDIT      , PDO::PARAM_STR);
            $sql->bindParam("USU_HREDIT"        , $this->USU_HREDIT      , PDO::PARAM_STR);
            $sql->bindParam("USU_USUEDIT"       , $this->USU_USUEDIT     , PDO::PARAM_STR);
            $sql->bindParam("USU_COD"           , $this->USU_COD     , PDO::PARAM_STR);

            if($sql->execute()){
               return array("status" => 0, "mensagem" => "Alteração de Usuário realizado com Sucesso. Código do Usuário: ".$this->USU_COD, "codigo" => $this->USU_COD);
            }else{
               return array("status" => 1, "mensagem" => "Erro ao inserir Alterar.");
            }
         }else{
            return $retorno;
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no alterar do Usuário.");
      }  
   }
   
   public function delete() {
      try{
         $sql = "UPDATE `USU` SET `USU_STATUS` = :USU_STATUS WHERE `USU_COD` = :USU_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("USU_STATUS"     , $this->USU_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("USU_COD"        , $this->USU_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Usuário: ".$this->USU_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Usuário.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no delete de Usuário.");
      }  
   }

   public function delete_rollback() {
      try{
         $sql = "DELETE FROM `USU` WHERE USU_COD = :USU_COD;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("USU_COD"        , $this->USU_COD      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Usuário: ".$this->USU_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Usuário.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar Usuário.");
      }  
   }

   public function exist($USU_EMAIL) {
      try{
         $sql = "SELECT USU_COD FROM USU WHERE USU_STATUS = 1 AND USU_EMAIL = :USU_EMAIL";
         $rs = $this->con->prepare($sql);
         $rs->bindParam("USU_EMAIL"         , $USU_EMAIL      , PDO::PARAM_STR);
         $rs->execute();

         if($rs->rowCount() > 0){
            return array("status" => 1, "mensagem" => "Este Email já possuí uma conta de Usuário.");
         }else{
            return array("status" => 0, "mensagem" => "Nenhum usuário Cadastrado");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no verificar Usuário.");
      }  
   }

   public function exist_update($USU_EMAIL, $USU_COD) {
      try{
         $sql = "SELECT USU_COD FROM USU WHERE USU_STATUS = 1 AND USU_EMAIL = :USU_EMAIL AND USU_COD != :USU_COD";
         $rs = $this->con->prepare($sql);
         $rs->bindParam("USU_EMAIL"         , $USU_EMAIL      , PDO::PARAM_STR);
         $rs->bindParam("USU_COD"         , $USU_COD      , PDO::PARAM_STR);
         $rs->execute();

         if($rs->rowCount() > 0){
            return array("status" => 1, "mensagem" => "Este Email já possuí uma conta de Usuário.");
         }else{
            return array("status" => 0, "mensagem" => "Nenhum usuário Cadastrado");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no verificar Usuário.");
      }  
   }

   public function createMNUUSU($MUS_CTM, $MUS_MNU, $MUS_USU) {
      try{
         $sql = "INSERT INTO `MUS`(
               `MUS_CTM`, `MUS_MNU`, `MUS_USU`
               ) VALUES (
               :MUS_CTM, :MUS_MNU, :MUS_USU);";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("MUS_CTM"           , $MUS_CTM      , PDO::PARAM_STR);
         $sql->bindParam("MUS_MNU"           , $MUS_MNU      , PDO::PARAM_STR);
         $sql->bindParam("MUS_USU"           , $MUS_USU      , PDO::PARAM_STR);

         if($sql->execute()){
            return 0;
         }else{
            return 1;
         }
      } catch (PDOException $e){
         return 2;
      }  
   }

   public function deleteMNUUSU() {
      try{
         $sql = "DELETE FROM `MUS` WHERE MUS_USU = :MUS_USU;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("MUS_USU"        , $this->USU_COD      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Usuário: ".$this->USU_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar menu de Usuário.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar menu de Usuário.");
      }  
   }

   public function buscar_cod($SA1_COD) {
      try{
         $sql = "SELECT SA1_USU FROM SA1 WHERE SA1_COD = $SA1_COD";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         if($rs->rowCount() > 0){
            $row = $rs->fetch(PDO::FETCH_OBJ);
            return $row->SA1_USU;
         }

         return 0;
      } catch (PDOException $e){
         return 0;
      }
   }

}                                                                                                        
?>                                                                                                         