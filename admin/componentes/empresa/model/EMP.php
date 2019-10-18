<?php                                                                                                      
class EMP{   

   private $con;                                                                                       
   private $EMP_COD;
   private $EMP_RZSOCIAL;
   private $EMP_NFANTASIA;
   private $EMP_EMAIL;
   private $EMP_TELEFONE;
   private $EMP_EST;
   private $EMP_CID;
   private $EMP_ENDERECO;
   private $EMP_CNPJ;
   private $EMP_EMAILRESP;
   private $EMP_STATUS;
   private $EMP_TIPO;
   private $EMP_DTCAD;
   private $EMP_HRCAD;
   private $EMP_USUCAD;
   private $EMP_DTEDIT;
   private $EMP_HREDIT;
   private $EMP_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getEMP_COD() {
      return $this->EMP_COD;
   }
 
   public function setEMP_COD($EMP_COD) {
      $this->EMP_COD = $EMP_COD;
   }
 
   public function getEMP_RZSOCIAL() {
      return $this->EMP_RZSOCIAL;
   }
 
   public function setEMP_RZSOCIAL($EMP_RZSOCIAL) {
      $this->EMP_RZSOCIAL = $EMP_RZSOCIAL;
   }
 
   public function getEMP_NFANTASIA() {
      return $this->EMP_NFANTASIA;
   }
 
   public function setEMP_NFANTASIA($EMP_NFANTASIA) {
      $this->EMP_NFANTASIA = $EMP_NFANTASIA;
   }
 
   public function getEMP_EMAIL() {
      return $this->EMP_EMAIL;
   }
 
   public function setEMP_EMAIL($EMP_EMAIL) {
      $this->EMP_EMAIL = $EMP_EMAIL;
   }
 
   public function getEMP_TELEFONE() {
      return $this->EMP_TELEFONE;
   }
 
   public function setEMP_TELEFONE($EMP_TELEFONE) {
      $this->EMP_TELEFONE = $EMP_TELEFONE;
   }
 
   public function getEMP_EST() {
      return $this->EMP_EST;
   }
 
   public function setEMP_EST($EMP_EST) {
      $this->EMP_EST = $EMP_EST;
   }
 
   public function getEMP_CID() {
      return $this->EMP_CID;
   }
 
   public function setEMP_CID($EMP_CID) {
      $this->EMP_CID = $EMP_CID;
   }
 
   public function getEMP_ENDERECO() {
      return $this->EMP_ENDERECO;
   }
 
   public function setEMP_ENDERECO($EMP_ENDERECO) {
      $this->EMP_ENDERECO = $EMP_ENDERECO;
   }
 
   public function getEMP_CNPJ() {
      return $this->EMP_CNPJ;
   }
 
   public function setEMP_CNPJ($EMP_CNPJ) {
      $this->EMP_CNPJ = $EMP_CNPJ;
   }
 
   public function getEMP_EMAILRESP() {
      return $this->EMP_EMAILRESP;
   }
 
   public function setEMP_EMAILRESP($EMP_EMAILRESP) {
      $this->EMP_EMAILRESP = $EMP_EMAILRESP;
   }
 
   public function getEMP_STATUS() {
      return $this->EMP_STATUS;
   }
 
   public function setEMP_STATUS($EMP_STATUS) {
      $this->EMP_STATUS = $EMP_STATUS;
   }
 
   public function getEMP_TIPO() {
      return $this->EMP_TIPO;
   }
 
   public function setEMP_TIPO($EMP_TIPO) {
      $this->EMP_TIPO = $EMP_TIPO;
   }

   public function getEMP_DTCAD() {
      return $this->EMP_DTCAD;
   }
 
   public function setEMP_DTCAD($EMP_DTCAD) {
      $this->EMP_DTCAD = $EMP_DTCAD;
   }
 
   public function getEMP_HRCAD() {
      return $this->EMP_HRCAD;
   }
 
   public function setEMP_HRCAD($EMP_HRCAD) {
      $this->EMP_HRCAD = $EMP_HRCAD;
   }
 
   public function getEMP_USUCAD() {
      return $this->EMP_USUCAD;
   }
 
   public function setEMP_USUCAD($EMP_USUCAD) {
      $this->EMP_USUCAD = $EMP_USUCAD;
   }
 
   public function getEMP_DTEDIT() {
      return $this->EMP_DTEDIT;
   }
 
   public function setEMP_DTEDIT($EMP_DTEDIT) {
      $this->EMP_DTEDIT = $EMP_DTEDIT;
   }
 
   public function getEMP_HREDIT() {
      return $this->EMP_HREDIT;
   }
 
   public function setEMP_HREDIT($EMP_HREDIT) {
      $this->EMP_HREDIT = $EMP_HREDIT;
   }
 
   public function getEMP_USUEDIT() {
      return $this->EMP_USUEDIT;
   }
 
   public function setEMP_USUEDIT($EMP_USUEDIT) {
      $this->EMP_USUEDIT = $EMP_USUEDIT;
   }

   public function listar_resumo() {
      $lista_resumo = array(); 
      try{
         $sql = "SELECT STO.STO_NOME, 
         (SELECT COUNT(STM.STM_COD) 
         FROM STM, EMP 
         WHERE STM.STM_STO = STO.STO_COD 
         AND STM.STM_EMP = EMP.EMP_COD
         AND EMP.EMP_STATUS = 1) AS QUANT_EMP 
         FROM `STO` 
         WHERE STO_STATUS = 1";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_resumo[$i] = array(
               "STO_NOME" => utf8_encode($row->STO_NOME),
               "QUANT_EMP" => $row->QUANT_EMP
            );
            $i++;
         }

         return $lista_resumo;
      } catch (PDOException $e){
         return $lista_resumo;
      }
   }

   public function listar_empresa_ativos($LIMIT) {
      $lista_empresa = array(); 
      try{
         $sql = "SELECT * FROM EMP WHERE EMP_STATUS = 1 ORDER BY EMP_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_empresa[$i] = array(
               "EMP_COD" => $row->EMP_COD,
               "EMP_NFANTASIA" => utf8_encode($row->EMP_NFANTASIA),
               "EMP_EMAIL" => utf8_encode($row->EMP_EMAIL),
               "EMP_TELEFONE" => $row->EMP_TELEFONE
            );
            $i++;
         }

         return $lista_empresa;
      } catch (PDOException $e){
         return $lista_empresa;
      }
   }

   public function buscar_empresa($BUSCA) {
      $lista_empresa = array(); 
      try{
         $sql = "SELECT * FROM EMP WHERE EMP_STATUS = 1 AND (EMP_COD like '%$BUSCA%' OR EMP_NFANTASIA like '%$BUSCA%' OR EMP_EMAIL like '%$BUSCA%' OR EMP_TELEFONE like '%$BUSCA%') ORDER BY EMP_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_empresa[$i] = array(
               "EMP_COD" => $row->EMP_COD,
               "EMP_NFANTASIA" => utf8_encode($row->EMP_NFANTASIA),
               "EMP_EMAIL" => utf8_encode($row->EMP_EMAIL),
               "EMP_TELEFONE" => $row->EMP_TELEFONE
            );
            $i++;
         }

         return $lista_empresa;
      } catch (PDOException $e){
         return $lista_empresa;
      }
   }

   public function listar_dados($EMP_COD) {
      $lista_empresa = array(); 
      $lista_setores = array(); 
      try{
         $sql = "SELECT * FROM EMP WHERE EMP_COD = $EMP_COD";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         
         $sql = "SELECT STO.STO_COD, STO.STO_NOME FROM STM, STO WHERE STM_EMP = $EMP_COD AND STM_STO = STO.STO_COD";
         $rs_sto = $this->con->prepare($sql);
         $rs_sto->execute();
         $o = 0;
         while ($row_sto = $rs_sto->fetch(PDO::FETCH_OBJ)) {
            $lista_setores[$o] = array('STO_COD' => $row_sto->STO_COD);
            $o++;
         }

         $i = 0;
         $lista_empresa[$i] = array(
            "EMP_COD" => $row->EMP_COD,
            "EMP_RZSOCIAL" => utf8_encode($row->EMP_RZSOCIAL),
            "EMP_NFANTASIA" => utf8_encode($row->EMP_NFANTASIA),
            "EMP_EMAIL" => utf8_encode($row->EMP_EMAIL),
            "EMP_EST" => $row->EMP_EST,
            "EMP_CID" => $row->EMP_CID,
            "EMP_CNPJ" => $row->EMP_CNPJ,
            "EMP_TELEFONE" => $row->EMP_TELEFONE,
            "EMP_ENDERECO" => $row->EMP_ENDERECO,
            "EMP_TIPO" => $row->EMP_TIPO,
            "EMP_EMAILRESP" => utf8_encode($row->EMP_EMAILRESP),
            "EMP_TIPO" => $row->EMP_TIPO,
            "EMP_STO" => $lista_setores
         );
         
         return $lista_empresa;
      } catch (PDOException $e){
         return $lista_empresa;
      }
   }

   public function listar_empresa_pag_prox($LIMIT, $EMP_COD) {
      $lista_empresa = array(); 
      try{
         $sql = "SELECT * FROM EMP WHERE EMP_STATUS = 1 AND EMP_COD < $EMP_COD ORDER BY EMP_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_empresa[$i] = array(
               "EMP_COD" => $row->EMP_COD,
               "EMP_NFANTASIA" => utf8_encode($row->EMP_NFANTASIA),
               "EMP_EMAIL" => utf8_encode($row->EMP_EMAIL),
               "EMP_TELEFONE" => $row->EMP_TELEFONE
            );
            $i++;
         }

         return $lista_empresa;
      } catch (PDOException $e){
         return $lista_empresa;
      }
   }

   public function listar_empresa_pag_ante($LIMIT, $EMP_COD) {
      $lista_empresa = array(); 
      $lista_empresa_order = array(); 
      try{
         $sql = "SELECT * FROM EMP WHERE EMP_STATUS = 1 AND EMP_COD > $EMP_COD $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_empresa[$i] = array(
               "EMP_COD" => $row->EMP_COD,
               "EMP_NFANTASIA" => utf8_encode($row->EMP_NFANTASIA),
               "EMP_EMAIL" => utf8_encode($row->EMP_EMAIL),
               "EMP_TELEFONE" => $row->EMP_TELEFONE
            );
            $i++;
         }

         $o = 0;
         $i--;
         while ($o < count($lista_empresa)) {
            $lista_empresa_order[$o] = array(
               "EMP_COD" => $lista_empresa[$i]['EMP_COD'],
               "EMP_NFANTASIA" => $lista_empresa[$i]['EMP_NFANTASIA'],
               "EMP_EMAIL" => $lista_empresa[$i]['EMP_EMAIL'],
               "EMP_TELEFONE" => $lista_empresa[$i]['EMP_TELEFONE']
            );
            $o++;
            $i--;
         }

         return $lista_empresa_order;
      } catch (PDOException $e){
         return $lista_empresa;
      }
   }
 
   public function create() {
      try{
         $sql = "INSERT INTO `EMP`(
               `EMP_RZSOCIAL` , `EMP_NFANTASIA`, 
               `EMP_EMAIL`    , `EMP_TELEFONE`, 
               `EMP_EST`      , `EMP_CID`, 
               `EMP_ENDERECO` , `EMP_CNPJ`, 
               `EMP_EMAILRESP`, `EMP_STATUS`, 
               `EMP_TIPO`     , `EMP_DTCAD`, 
               `EMP_HRCAD`    , `EMP_USUCAD`
               ) VALUES (
               :EMP_RZSOCIAL  , :EMP_NFANTASIA, 
               :EMP_EMAIL     , :EMP_TELEFONE, 
               :EMP_EST       , :EMP_CID, 
               :EMP_ENDERECO  , :EMP_CNPJ,
               :EMP_EMAILRESP , :EMP_STATUS,
               :EMP_TIPO      , :EMP_DTCAD, 
               :EMP_HRCAD     , :EMP_USUCAD)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("EMP_RZSOCIAL"         , $this->EMP_RZSOCIAL      , PDO::PARAM_STR);
         $sql->bindParam("EMP_NFANTASIA"        , $this->EMP_NFANTASIA     , PDO::PARAM_STR);
         $sql->bindParam("EMP_EMAIL"            , $this->EMP_EMAIL         , PDO::PARAM_STR);
         $sql->bindParam("EMP_TELEFONE"         , $this->EMP_TELEFONE      , PDO::PARAM_STR);
         $sql->bindParam("EMP_EST"              , $this->EMP_EST           , PDO::PARAM_STR);
         $sql->bindParam("EMP_CID"              , $this->EMP_CID           , PDO::PARAM_STR);
         $sql->bindParam("EMP_ENDERECO"         , $this->EMP_ENDERECO      , PDO::PARAM_STR);
         $sql->bindParam("EMP_CNPJ"             , $this->EMP_CNPJ          , PDO::PARAM_STR);
         $sql->bindParam("EMP_EMAILRESP"        , $this->EMP_EMAILRESP     , PDO::PARAM_STR);
         $sql->bindParam("EMP_STATUS"           , $this->EMP_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("EMP_TIPO"             , $this->EMP_TIPO          , PDO::PARAM_STR);
         $sql->bindParam("EMP_DTCAD"            , $this->EMP_DTCAD         , PDO::PARAM_STR);
         $sql->bindParam("EMP_HRCAD"            , $this->EMP_HRCAD         , PDO::PARAM_STR);
         $sql->bindParam("EMP_USUCAD"           , $this->EMP_USUCAD        , PDO::PARAM_STR);

         if($sql->execute()){
            $this->EMP_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro da Empresa realizado com Sucesso. Código da Empresa: ".$this->EMP_COD, "codigo" => $this->EMP_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Empresa.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Empresa.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `EMP` SET
               `EMP_RZSOCIAL` = :EMP_RZSOCIAL   , `EMP_NFANTASIA` = :EMP_NFANTASIA, 
               `EMP_EMAIL` = :EMP_EMAIL         , `EMP_TELEFONE` = :EMP_TELEFONE, 
               `EMP_EST` = :EMP_EST             , `EMP_CID` = :EMP_CID, 
               `EMP_ENDERECO` = :EMP_ENDERECO   , `EMP_CNPJ` = :EMP_CNPJ, 
               `EMP_EMAILRESP` = :EMP_EMAILRESP , `EMP_STATUS` = :EMP_STATUS, 
               `EMP_TIPO` = :EMP_TIPO           , `EMP_DTEDIT` = :EMP_DTEDIT, 
               `EMP_HREDIT` = :EMP_HREDIT       , `EMP_USUEDIT` = :EMP_USUEDIT
               WHERE `EMP_COD` = :EMP_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("EMP_RZSOCIAL"         , $this->EMP_RZSOCIAL      , PDO::PARAM_STR);
         $sql->bindParam("EMP_NFANTASIA"        , $this->EMP_NFANTASIA     , PDO::PARAM_STR);
         $sql->bindParam("EMP_EMAIL"            , $this->EMP_EMAIL         , PDO::PARAM_STR);
         $sql->bindParam("EMP_TELEFONE"         , $this->EMP_TELEFONE      , PDO::PARAM_STR);
         $sql->bindParam("EMP_EST"              , $this->EMP_EST           , PDO::PARAM_STR);
         $sql->bindParam("EMP_CID"              , $this->EMP_CID           , PDO::PARAM_STR);
         $sql->bindParam("EMP_ENDERECO"         , $this->EMP_ENDERECO      , PDO::PARAM_STR);
         $sql->bindParam("EMP_CNPJ"             , $this->EMP_CNPJ          , PDO::PARAM_STR);
         $sql->bindParam("EMP_EMAILRESP"        , $this->EMP_EMAILRESP     , PDO::PARAM_STR);
         $sql->bindParam("EMP_STATUS"           , $this->EMP_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("EMP_TIPO"             , $this->EMP_TIPO          , PDO::PARAM_STR);
         $sql->bindParam("EMP_DTEDIT"           , $this->EMP_DTEDIT        , PDO::PARAM_STR);
         $sql->bindParam("EMP_HREDIT"           , $this->EMP_HREDIT        , PDO::PARAM_STR);
         $sql->bindParam("EMP_USUEDIT"          , $this->EMP_USUEDIT       , PDO::PARAM_STR);
         $sql->bindParam("EMP_COD"              , $this->EMP_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Edição da Empresa realizado com Sucesso. Código da Empresa: ".$this->EMP_COD, "codigo" => $this->EMP_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Empresa.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no atualizar Empresa.");
      }  
   }

   public function delete() {
      try{
         $sql = "UPDATE `EMP` SET `EMP_STATUS` = :EMP_STATUS WHERE `EMP_COD` = :EMP_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("EMP_STATUS"     , $this->EMP_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("EMP_COD"        , $this->EMP_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Empresa: ".$this->EMP_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar a relação de Setor e Empresa.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no delete da relação de Setor e Empresa.");
      }  
   }

   public function createEMPSTO($STM_EMP, $STM_STO) {
      try{
         $sql = "INSERT INTO `STM`(
               `STM_EMP` , `STM_STO`
               ) VALUES (
               :STM_EMP  , :STM_STO);";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("STM_EMP"           , $STM_EMP      , PDO::PARAM_STR);
         $sql->bindParam("STM_STO"           , $STM_STO      , PDO::PARAM_STR);

         if($sql->execute()){
            return 0;
         }else{
            return 1;
         }
      } catch (PDOException $e){
         return 2;
      }  
   }

   public function deleteEMPSTO($STM_EMP) {
      try{
         $sql = "DELETE FROM `STM` WHERE STM_EMP = :STM_EMP;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("STM_EMP"        , $STM_EMP      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Empresa: ".$STM_EMP);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar a relação de Setor e Empresa.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no delete da relação de Setor e Empresa.");
      }  
   }

}                                                                                                        
?>                                                                                                         