<?php                                                                                                      
class CHA{         

   private $con;                                                                                    
   private $CHA_COD;
   private $CHA_ASSUNTO;
   private $CHA_DESC;
   private $CHA_EMP;
   private $CHA_SOLICITANTE;
   private $CHA_COPIA;
   private $CHA_STO;
   private $CHA_TIPO;
   private $CHA_PRI;
   private $CHA_DTEMISSAO;
   private $CHA_HREMISSAO;
   private $CHA_DTFINAL;
   private $CHA_HRFINAL;
   private $CHA_STATUS;
   private $CHA_ATENDENTE;
   private $CHA_AVALIACAO;
   private $CHA_DTAVALIACAO;
   private $CHA_HRAVALIACAO;
   private $CHA_AVALIAOPINIAO;
   private $CHA_AGFINAL;
   private $CHA_DTAGFINAL;
   private $CHA_HRAGFINAL;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCHA_COD() {
      return $this->CHA_COD;
   }
 
   public function setCHA_COD($CHA_COD) {
      $this->CHA_COD = $CHA_COD;
   }
 
   public function getCHA_ASSUNTO() {
      return $this->CHA_ASSUNTO;
   }
 
   public function setCHA_ASSUNTO($CHA_ASSUNTO) {
      $this->CHA_ASSUNTO = $CHA_ASSUNTO;
   }
 
   public function getCHA_DESC() {
      return $this->CHA_DESC;
   }
 
   public function setCHA_DESC($CHA_DESC) {
      $this->CHA_DESC = $CHA_DESC;
   }
 
   public function getCHA_EMP() {
      return $this->CHA_EMP;
   }
 
   public function setCHA_EMP($CHA_EMP) {
      $this->CHA_EMP = $CHA_EMP;
   }
 
   public function getCHA_SOLICITANTE() {
      return $this->CHA_SOLICITANTE;
   }
 
   public function setCHA_SOLICITANTE($CHA_SOLICITANTE) {
      $this->CHA_SOLICITANTE = $CHA_SOLICITANTE;
   }
 
   public function getCHA_COPIA() {
      return $this->CHA_COPIA;
   }
 
   public function setCHA_COPIA($CHA_COPIA) {
      $this->CHA_COPIA = $CHA_COPIA;
   }
 
   public function getCHA_STO() {
      return $this->CHA_STO;
   }
 
   public function setCHA_STO($CHA_STO) {
      $this->CHA_STO = $CHA_STO;
   }
 
   public function getCHA_TIPO() {
      return $this->CHA_TIPO;
   }
 
   public function setCHA_TIPO($CHA_TIPO) {
      $this->CHA_TIPO = $CHA_TIPO;
   }
 
   public function getCHA_PRI() {
      return $this->CHA_PRI;
   }
 
   public function setCHA_PRI($CHA_PRI) {
      $this->CHA_PRI = $CHA_PRI;
   }
 
   public function getCHA_DTEMISSAO() {
      return $this->CHA_DTEMISSAO;
   }
 
   public function setCHA_DTEMISSAO($CHA_DTEMISSAO) {
      $this->CHA_DTEMISSAO = $CHA_DTEMISSAO;
   }
 
   public function getCHA_HREMISSAO() {
      return $this->CHA_HREMISSAO;
   }
 
   public function setCHA_HREMISSAO($CHA_HREMISSAO) {
      $this->CHA_HREMISSAO = $CHA_HREMISSAO;
   }
 
   public function getCHA_DTFINAL() {
      return $this->CHA_DTFINAL;
   }
 
   public function setCHA_DTFINAL($CHA_DTFINAL) {
      $this->CHA_DTFINAL = $CHA_DTFINAL;
   }
 
   public function getCHA_HRFINAL() {
      return $this->CHA_HRFINAL;
   }
 
   public function setCHA_HRFINAL($CHA_HRFINAL) {
      $this->CHA_HRFINAL = $CHA_HRFINAL;
   }
 
   public function getCHA_STATUS() {
      return $this->CHA_STATUS;
   }
 
   public function setCHA_STATUS($CHA_STATUS) {
      $this->CHA_STATUS = $CHA_STATUS;
   }
 
   public function getCHA_ATENDENTE() {
      return $this->CHA_ATENDENTE;
   }
 
   public function setCHA_ATENDENTE($CHA_ATENDENTE) {
      $this->CHA_ATENDENTE = $CHA_ATENDENTE;
   }
 
   public function getCHA_AVALIACAO() {
      return $this->CHA_AVALIACAO;
   }
 
   public function setCHA_AVALIACAO($CHA_AVALIACAO) {
      $this->CHA_AVALIACAO = $CHA_AVALIACAO;
   }

   public function getCHA_DTAVALIACAO() {
      return $this->CHA_DTAVALIACAO;
   }
 
   public function setCHA_DTAVALIACAO($CHA_DTAVALIACAO) {
      $this->CHA_DTAVALIACAO = $CHA_DTAVALIACAO;
   }

   public function getCHA_HRAVALIACAO() {
      return $this->CHA_HRAVALIACAO;
   }
 
   public function setCHA_HRAVALIACAO($CHA_HRAVALIACAO) {
      $this->CHA_HRAVALIACAO = $CHA_HRAVALIACAO;
   }

   public function getCHA_AVALIAOPINIAO() {
      return $this->CHA_AVALIAOPINIAO;
   }
 
   public function setCHA_AVALIAOPINIAO($CHA_AVALIAOPINIAO) {
      $this->CHA_AVALIAOPINIAO = $CHA_AVALIAOPINIAO;
   }

   public function getCHA_AGFINAL() {
      return $this->CHA_AGFINAL;
   }
 
   public function setCHA_AGFINAL($CHA_AGFINAL) {
      $this->CHA_AGFINAL = $CHA_AGFINAL;
   }

   public function getCHA_DTAGFINAL() {
      return $this->CHA_DTAGFINAL;
   }
 
   public function setCHA_DTAGFINAL($CHA_DTAGFINAL) {
      $this->CHA_DTAGFINAL = $CHA_DTAGFINAL;
   }

   public function getCHA_HRAGFINAL() {
      return $this->CHA_HRAGFINAL;
   }
 
   public function setCHA_HRAGFINAL($CHA_HRAGFINAL) {
      $this->CHA_HRAGFINAL = $CHA_HRAGFINAL;
   }

   public function buscar_dados($CHA_COD) {
      $lista_chamados = array(); 
      $lista_anexos = array(); 
      try{
         $sql = "SELECT * FROM CAN WHERE CAN_CHA = $CHA_COD;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $CAN_EXTENSAO = explode(".", $row->CAN_ANEXO);
            $lista_anexos[$i] = array(
               "CAN_ANEXO" => $row->CAN_ANEXO,
               "CAN_EXTENSAO" => $CAN_EXTENSAO[1]
            );
            $i++;
         }
         
         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT SA1.SA1_NOME FROM SA1 WHERE SA1.SA1_USU = CHA.CHA_SOLICITANTE) AS CHA_NSOLICITANTE,
         (SELECT SA1.SA1_EMAIL FROM SA1 WHERE SA1.SA1_USU = CHA.CHA_SOLICITANTE) AS SA1_EMAIL,
         (SELECT SA1.SA1_EMAIL FROM SA1 WHERE SA1.SA1_USU = CHA.CHA_ATENDENTE) AS SA1_EMAILATENDENTE,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA WHERE CHA_COD = $CHA_COD;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         $lista_chamados = array(
            "CHA_COD" => $row->CHA_COD,
            "CHA_ASSUNTO" => $row->CHA_ASSUNTO,
            "CHA_DESC" => $row->CHA_DESC,
            "CHA_STATUS" => $row->CHA_STATUS,
            "CHA_COPIA" => $row->CHA_COPIA,
            "CHA_DTEMISSAO" => date("d/m/Y",strtotime($row->CHA_DTEMISSAO)),
            "CHA_HREMISSAO" => date("H:i:s",strtotime($row->CHA_HREMISSAO)),
            "CHA_STO" => $row->CHA_STO,
            "CHA_EMP" => $row->CHA_EMP,
            "CHA_PRI" => $row->CHA_PRI,
            "CHA_AGFINAL" => $row->CHA_AGFINAL,
            "CHA_NSTO" => utf8_encode($row->CHA_NSTO),
            "CHA_NEMP" => utf8_encode($row->CHA_NEMP),
            "CHA_NPRI" => utf8_encode($row->CHA_NPRI),
            "CHA_SOLICITANTE" => utf8_encode($row->CHA_SOLICITANTE),
            "CHA_NSOLICITANTE" => utf8_encode($row->CHA_NSOLICITANTE),
            "CHA_SA1_EMAIL" => $row->SA1_EMAIL,
            "CHA_SA1_EMAILATENDENTE" => $row->SA1_EMAILATENDENTE,
            "CHA_ATENDENTE" => $row->CHA_ATENDENTE,
            "lista_anexos" => $lista_anexos
         );

         return $lista_chamados;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $lista_chamados;
      }
   }

   public function listar_chamados_quantidade($A_USU_TIPO, $A_USU_COD) {
      $lista_chamados = array(); 
      try{
         $sql_tipo = "";
         if($A_USU_TIPO == "FUN"){
            $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
         }
         $sql = "SELECT 
         (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_STATUS = 1) AS CHA_ABERTO, 
         (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_STATUS = 2 $sql_tipo) AS CHA_AGATEND,
         (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_STATUS = 3 $sql_tipo) AS CHA_AGCLIENT,
         (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_STATUS = 4 $sql_tipo) AS CHA_FINALIZADO;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_chamados[$i] = array(
               "CHA_ABERTO" => $row->CHA_ABERTO,
               "CHA_AGATEND" => $row->CHA_AGATEND,
               "CHA_AGCLIENT" => $row->CHA_AGCLIENT,
               "CHA_FINALIZADO" => $row->CHA_FINALIZADO
            );
            $i++;
         }
         return $lista_chamados;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

   public function listar_chamados_ativos($LIMIT, $STATUS, $A_USU_TIPO, $A_USU_COD) {
      $lista_chamados = array(); 
      try{
         $sql_tipo = "";
         if($A_USU_TIPO == "FUN"){
            if($STATUS == 2 || $STATUS == 3 || $STATUS == 4){
               $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
            }
         }
         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA WHERE CHA_STATUS = $STATUS $sql_tipo ORDER BY CHA_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_chamados[$i] = array(
               "CHA_COD" => $row->CHA_COD,
               "CHA_ASSUNTO" => ($row->CHA_ASSUNTO),
               "CHA_DTEMISSAO" => date("d/m/Y",strtotime($row->CHA_DTEMISSAO)),
               "CHA_HREMISSAO" => date("H:i:s",strtotime($row->CHA_HREMISSAO)),
               "CHA_STO" => $row->CHA_STO,
               "CHA_EMP" => $row->CHA_EMP,
               "CHA_PRI" => $row->CHA_PRI,
               "CHA_NSTO" => utf8_encode($row->CHA_NSTO),
               "CHA_NEMP" => utf8_encode($row->CHA_NEMP),
               "CHA_NPRI" => utf8_encode($row->CHA_NPRI),
               "CHA_ATENDENTE" => $row->CHA_ATENDENTE
            );
            $i++;
         }
         return $lista_chamados;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

   public function listar_chamados_pag_prox($LIMIT, $CHA_COD, $STATUS, $A_USU_TIPO, $A_USU_COD) {
      $lista_chamados = array(); 
      try{
         $sql_tipo = "";
         if($A_USU_TIPO == "FUN"){
            if($STATUS == 2 || $STATUS == 3 || $STATUS == 4){
               $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
            }
         }
         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA WHERE CHA_STATUS = $STATUS $sql_tipo AND CHA_COD < $CHA_COD ORDER BY CHA_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_chamados[$i] = array(
               "CHA_COD" => $row->CHA_COD,
               "CHA_ASSUNTO" => ($row->CHA_ASSUNTO),
               "CHA_DTEMISSAO" => date("d/m/Y",strtotime($row->CHA_DTEMISSAO)),
               "CHA_HREMISSAO" => date("H:i:s",strtotime($row->CHA_HREMISSAO)),
               "CHA_STO" => $row->CHA_STO,
               "CHA_EMP" => $row->CHA_EMP,
               "CHA_PRI" => $row->CHA_PRI,
               "CHA_NSTO" => utf8_encode($row->CHA_NSTO),
               "CHA_NEMP" => utf8_encode($row->CHA_NEMP),
               "CHA_NPRI" => utf8_encode($row->CHA_NPRI),
               "CHA_ATENDENTE" => $row->CHA_ATENDENTE
            );
            $i++;
         }

         return $lista_chamados;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

   public function listar_chamados_pag_ante($LIMIT, $CHA_COD, $STATUS, $A_USU_TIPO, $A_USU_COD) {
      $lista_chamados = array(); 
      $lista_chamados_order = array(); 
      try{
         $sql_tipo = "";
         if($A_USU_TIPO == "FUN"){
            if($STATUS == 2 || $STATUS == 3 || $STATUS == 4){
               $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
            }
         }
         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA WHERE CHA_STATUS = $STATUS $sql_tipo AND CHA_COD > $CHA_COD $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_chamados[$i] = array(
               "CHA_COD" => $row->CHA_COD,
               "CHA_ASSUNTO" => ($row->CHA_ASSUNTO),
               "CHA_DTEMISSAO" => date("d/m/Y",strtotime($row->CHA_DTEMISSAO)),
               "CHA_HREMISSAO" => date("H:i:s",strtotime($row->CHA_HREMISSAO)),
               "CHA_STO" => $row->CHA_STO,
               "CHA_EMP" => $row->CHA_EMP,
               "CHA_PRI" => $row->CHA_PRI,
               "CHA_NSTO" => utf8_encode($row->CHA_NSTO),
               "CHA_NEMP" => utf8_encode($row->CHA_NEMP),
               "CHA_NPRI" => utf8_encode($row->CHA_NPRI),
               "CHA_ATENDENTE" => $row->CHA_ATENDENTE
            );
            $i++;
         }

         $o = 0;
         $i--;
         while ($o < count($lista_chamados)) {
            $lista_chamados_order[$o] = array(
               "CHA_COD" => $lista_chamados[$i]['CHA_COD'],
               "CHA_ASSUNTO" => $lista_chamados[$i]['CHA_ASSUNTO'],
               "CHA_DTEMISSAO" => $lista_chamados[$i]['CHA_DTEMISSAO'],
               "CHA_HREMISSAO" => $lista_chamados[$i]['CHA_HREMISSAO'],
               "CHA_STO" => $lista_chamados[$i]['CHA_STO'],
               "CHA_EMP" => $lista_chamados[$i]['CHA_EMP'],
               "CHA_PRI" => $lista_chamados[$i]['CHA_PRI'],
               "CHA_NSTO" => $lista_chamados[$i]['CHA_NSTO'],
               "CHA_NEMP" => $lista_chamados[$i]['CHA_NEMP'],
               "CHA_NPRI" => $lista_chamados[$i]['CHA_NPRI'],
               "CHA_ATENDENTE" => $lista_chamados[$i]['CHA_ATENDENTE']
            );
            $o++;
            $i--;
         }

         return $lista_chamados_order;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

   public function create() {
      try{
         $cod_atendente = "";
         $sql_tipo_into = "";
         $sql_tipo_values = "";
         if($_SESSION['A_USU_TIPO'] == "FUN"){
            $sql_tipo_into = ", `CHA_ATENDENTE`";
            $sql_tipo_values = ", :CHA_ATENDENTE";
            $this->CHA_STATUS = 2;
         }

         $sql = "INSERT INTO `CHA`(
               `CHA_ASSUNTO`     ,`CHA_DESC`, 
               `CHA_EMP`         , `CHA_SOLICITANTE`, 
               `CHA_COPIA`       , `CHA_STO`, 
               `CHA_TIPO`        , `CHA_PRI`, 
               `CHA_DTEMISSAO`   , `CHA_HREMISSAO`,
               `CHA_STATUS`      $sql_tipo_into
               ) VALUES (
               :CHA_ASSUNTO      , :CHA_DESC, 
               :CHA_EMP          , :CHA_SOLICITANTE, 
               :CHA_COPIA        , :CHA_STO, 
               :CHA_TIPO         , :CHA_PRI,
               :CHA_DTEMISSAO    , :CHA_HREMISSAO,
               :CHA_STATUS       $sql_tipo_values)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CHA_ASSUNTO"       , $this->CHA_ASSUNTO       , PDO::PARAM_STR);
         $sql->bindParam("CHA_DESC"          , $this->CHA_DESC          , PDO::PARAM_STR);
         $sql->bindParam("CHA_EMP"           , $this->CHA_EMP           , PDO::PARAM_STR);
         $sql->bindParam("CHA_SOLICITANTE"   , $this->CHA_SOLICITANTE   , PDO::PARAM_STR);
         $sql->bindParam("CHA_COPIA"         , $this->CHA_COPIA         , PDO::PARAM_STR);
         $sql->bindParam("CHA_STO"           , $this->CHA_STO           , PDO::PARAM_STR);
         $sql->bindParam("CHA_TIPO"          , $this->CHA_TIPO          , PDO::PARAM_STR);
         $sql->bindParam("CHA_PRI"           , $this->CHA_PRI           , PDO::PARAM_STR);
         $sql->bindParam("CHA_DTEMISSAO"     , $this->CHA_DTEMISSAO     , PDO::PARAM_STR);
         $sql->bindParam("CHA_HREMISSAO"     , $this->CHA_HREMISSAO     , PDO::PARAM_STR);
         $sql->bindParam("CHA_STATUS"        , $this->CHA_STATUS        , PDO::PARAM_STR);

         if($_SESSION['A_USU_TIPO'] == "FUN"){
            $cod_atendente = $_SESSION['A_USU_COD'];
            $sql->bindParam("CHA_ATENDENTE"        , $_SESSION['A_USU_COD']        , PDO::PARAM_STR);
         }

         if($sql->execute()){
            $this->CHA_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Chamado realizado com Sucesso. Código do Chamado: ".$this->CHA_COD, "codigo" => $this->CHA_COD, "cod_atendente" => $cod_atendente);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Chamado.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro Chamado.");
      }  
   }

   public function update_atendente() {
      try{
         $sql = "UPDATE `CHA` SET
               `CHA_ATENDENTE` = :CHA_ATENDENTE   , `CHA_STATUS` = :CHA_STATUS
               WHERE `CHA_COD` = :CHA_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CHA_ATENDENTE"     , $this->CHA_ATENDENTE     , PDO::PARAM_STR);
         $sql->bindParam("CHA_STATUS"        , $this->CHA_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("CHA_COD"           , $this->CHA_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Atendente adicionado com Sucesso.", "codigo" => $this->CHA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Chamado.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no atualizar Chamado.");
      }  
   }

   public function update_prioridade() {
      try{
         $sql = "UPDATE `CHA` SET
               `CHA_PRI` = :CHA_PRI 
               WHERE `CHA_COD` = :CHA_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CHA_PRI"     , $this->CHA_PRI     , PDO::PARAM_STR);
         $sql->bindParam("CHA_COD"           , $this->CHA_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Prioridade adicionado com Sucesso.", "codigo" => $this->CHA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Chamado.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no atualizar Chamado.");
      }  
   }

   public function update_finalizacao(){
      try{
         $sql = "UPDATE `CHA` SET
               `CHA_AGFINAL` = :CHA_AGFINAL,  CHA_DTAGFINAL = :CHA_DTAGFINAL, CHA_HRAGFINAL = :CHA_HRAGFINAL
               WHERE `CHA_COD` = :CHA_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CHA_AGFINAL"     , $this->CHA_AGFINAL     , PDO::PARAM_STR);
         $sql->bindParam("CHA_DTAGFINAL"     , $this->CHA_DTAGFINAL     , PDO::PARAM_STR);
         $sql->bindParam("CHA_HRAGFINAL"     , $this->CHA_HRAGFINAL     , PDO::PARAM_STR);
         $sql->bindParam("CHA_COD"           , $this->CHA_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            $retorno = $this->buscar_dados($this->CHA_COD);
            return array("status" => 0, "mensagem" => "Solicitação de Finalização feita com sucesso.", "codigo" => $this->CHA_COD, "CHA_SOLICITANTE" => $retorno["CHA_SOLICITANTE"]);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao solicitar finalização Chamado.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro ao solicitar finalização Chamado.");
      }  
   }

   public function delete() {
      try{
         $sql = "DELETE FROM `CHA` WHERE CHA_COD = :CHA_COD;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CHA_COD"        , $this->CHA_COD      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Chamado: ".$this->CHA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Chamado.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar Banner.");
      }  
   }
   
   public function mudar_status(){
      try{
         $sql = "UPDATE `CHA` SET
               `CHA_STATUS` = :CHA_STATUS
               WHERE `CHA_COD` = :CHA_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CHA_STATUS"     , $this->CHA_STATUS     , PDO::PARAM_STR);
         $sql->bindParam("CHA_COD"           , $this->CHA_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Mudança de status realizado com sucesso.", "codigo" => $this->CHA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao solicitar finalizar.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro ao solicitar finalizar.");
      }  
   }

   public function enviar_email_interacao($CHA_COD){
      try {
         $retorno = $this->buscar_dados($CHA_COD);
         $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway&display=swap" rel="stylesheet">
                <title>Criar Chamado</title>
            </head>
            <body style="background-color: #efefef;padding: 0;margin: 0;">
                <div style="background-color: #a933cb;height: 150px;">
                </div>
                <div style="width: 500px;margin: 0 auto;position: relative;background-color: white;border-radius: 30px;margin-top: -75px;padding: 16px 36px;">
                    <img src="https://www.objetiveti.com.br/sistema/img/logo-grande.png" style="width: 130px;display: block;margin: 0 auto;">
                    <h5 style="font-family: \'Oswald\', sans-serif;font-size: 22px;color: #a933cb;margin-bottom: 16px;">Olá <span>'.$retorno["CHA_NSOLICITANTE"].'</span></h5>
                    <p style="font-family: \'Open Sans\', sans-serif;color:#666;font-size: 16px;margin-top: 0;">
                        Informamos que o seu chamado foi respondido por um de nossos agentes
                    </p>
                    <div style="border: 2px dashed #999;padding: 20px;margin: 40px 0;">
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Código:</span> <b>#'.$retorno["CHA_COD"].'</b></p>
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Assunto:</span> <b>'.$retorno["CHA_ASSUNTO"].'</b></p>
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Aberto em:</span> <b>'.$retorno["CHA_DTEMISSAO"].' às '.$retorno["CHA_HREMISSAO"].'</b></p>
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Descrição:</span><br><b>'.$retorno["CHA_DESC"].'</b></p>

                        <ul style="list-style:none;padding:0;margin:0;overflow: hidden;">';

         $sql = "SELECT CMS.*, SA1_NOME FROM CMS, SA1 WHERE CMS_CHA = $CHA_COD AND CMS_USU = SA1_USU ORDER BY CMS_COD DESC;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            if($row->CMS_TIPOUSU == "ATN"){
               $html .= '<li style="background-color: #dedede;float:left;padding:10px;border-radius: 5px 5px 5px 0;min-width: 75%;margin: 10px 0;">
                                <h6 style="font-family:Arial, Helvetica, sans-serif;font-size:12px;text-transform: uppercase;line-height: 20px;margin:0;color:#222;">'.utf8_encode($row->SA1_NOME).'</h6>
                                <p style="font-family:Arial, Helvetica, sans-serif;font-size:14px;margin: 0;color:#222;">'.utf8_encode($row->CMS_DESC).'</p>
                            </li>';
            }else{
               $html .= '<li style="background-color: #a933cb;padding:10px;border-radius: 5px 5px 0 5px;min-width: 75%;margin: 10px 0;float: right;text-align: right;">
                                <h6 style="font-family:Arial, Helvetica, sans-serif;font-size:12px;text-transform: uppercase;line-height: 20px;margin:0;color:white;">'.utf8_encode($row->SA1_NOME).'</h6>
                                <p style="font-family:Arial, Helvetica, sans-serif;font-size:14px;margin: 0;color:white;">'.utf8_encode($row->CMS_DESC).'</p>
                            </li>';
            }
         }

         $html .= '</ul>
                     </div>
                        <a href="https://www.objetiveti.com.br/login.php" style="line-height: 50px;border-radius: 5px;background-color: #a933cb;padding: 0 26px;font-size: 12px;text-transform: uppercase;font-weight: bold;letter-spacing: 1px;color: white;display: block;text-decoration: none;margin: 0 auto;min-width: 150px;text-align: center;font-family: Arial, Helvetica, sans-serif;">continuar conversa</a>

                        <a href="https://www.objetiveti.com.br/" target="_blank" style="font-family: \'Oswald\', sans-serif;text-decoration: none;font-size: 16px;color: #999;margin-top: 36px;margin-bottom:16px;display: block;text-align: center;">www.objetiveti.com.br</a>
                     </div>

                     <img src="https://www.objetiveti.com.br/sistema/img/logo-cinza.png" style="width: 120px;display:block;margin: 0 auto;margin-top:50px;">
                     <h5 style="font-family: \'Open Sans\', sans-serif;font-size: 16px;color: #808080;text-align: center;margin-top:10px;">Tire suas dúvidas pelo: (85) 3047-7001</h5>
                  </body>
               </html>';

         $email_remetente = "suporte@objetiveti.com.br";
         $email_destinatario = trim ($retorno['CHA_SA1_EMAIL']).';'.trim ($retorno['CHA_COPIA']);

         $headers = "MIME-Version: 1.1\n";
         $headers .= "Content-type: text/html; charset=utf-8\n";
         $headers .= "From: $email_remetente\n";
         $headers .= "Return-Path: Objetive TI $email_remetente\n";
         $headers .= "Reply-To: $email_destinatario\n";
         $headers .= "X-Priority: 1\n";
         $envio = mail($email_destinatario, "Respostas do Chamado: #".$retorno["CHA_COD"], $html, $headers, "-r$email_remetente");

         if($envio){
            return 0;
         }else{
            $headers .= "Return-Path: Objetive TI " . $email_remetente . "\n";
            if(mail($email_destinatario, "Respostas do Chamado: #".$retorno["CHA_COD"], $html, $headers )){
               return 0;
            }else{

               return 1;
            }
         }
      } catch (phpmailerException $e) {
         return 4;
      }
   }

   public function enviar_email_finalizacao($CHA_COD){
      try {
         $retorno = $this->buscar_dados($CHA_COD);
         $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway&display=swap">
                <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                <title>Criar Chamado</title>
            </head>
            <body style="background-color: #efefef;padding: 0;margin: 0;">
                <div style="background-color: #a933cb;height: 150px;">
                </div>
                <div style="width: 500px;margin: 0 auto;position: relative;background-color: white;border-radius: 30px;margin-top: -75px;padding: 16px 36px;">
                    <img src="https://www.objetiveti.com.br/sistema/img/logo-grande.png" style="width: 130px;display: block;margin: 0 auto;">
                    <h5 style="font-family: \'Oswald\', sans-serif;font-size: 22px;color: #a933cb;margin-bottom: 16px;">Olá <span>'.$retorno["CHA_NSOLICITANTE"].'</span></h5>
                    <p style="font-family: \'Open Sans\', sans-serif;color:#666;font-size: 16px;margin-top: 0;">
                        Informamos que um de seus chamados foi respondido
                    </p>
                    <div style="border: 2px dashed #999;padding: 20px;margin: 40px 0;">
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Código:</span> <b>#'.$retorno["CHA_COD"].'</b></p>
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Assunto:</span> <b>'.$retorno["CHA_ASSUNTO"].'</b></p>
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Aberto em:</span> <b>'.$retorno["CHA_DTEMISSAO"].' às '.$retorno["CHA_HREMISSAO"].'</b></p>
                        <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Descrição:</span><br><b>'.$retorno["CHA_DESC"].'</b></p>

                        <ul style="list-style:none;padding:0;margin:0;overflow: hidden;">';

         $sql = "SELECT CMS.*, SA1_NOME FROM CMS, SA1 WHERE CMS_CHA = $CHA_COD AND CMS_USU = SA1_USU ORDER BY CMS_COD DESC;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            if($row->CMS_TIPOUSU == "CLI"){
               $html .= '<li style="background-color: #dedede;float:left;padding:10px;border-radius: 5px 5px 5px 0;min-width: 75%;margin: 10px 0;">
                                <h6 style="font-family:Arial, Helvetica, sans-serif;font-size:12px;text-transform: uppercase;line-height: 20px;margin:0;color:#222;">'.utf8_encode($row->SA1_NOME).'</h6>
                                <p style="font-family:Arial, Helvetica, sans-serif;font-size:14px;margin: 0;color:#222;">'.utf8_encode($row->CMS_DESC).'</p>
                            </li>';
            }else{
               $html .= '<li style="background-color: #a933cb;padding:10px;border-radius: 5px 5px 0 5px;min-width: 75%;margin: 10px 0;float: right;text-align: right;">
                                <h6 style="font-family:Arial, Helvetica, sans-serif;font-size:12px;text-transform: uppercase;line-height: 20px;margin:0;color:white;">'.utf8_encode($row->SA1_NOME).'</h6>
                                <p style="font-family:Arial, Helvetica, sans-serif;font-size:14px;margin: 0;color:white;">'.utf8_encode($row->CMS_DESC).'</p>
                            </li>';
            }
         }

         $html .= '</ul>
                     <p style="font-family: \'Open Sans\', sans-serif;color:#666;font-size: 16px;margin-top: 0;">
                        Este chamado ticket foi marcado como encerrado pelo atendimento:
                     </p>
                     <div style="overflow: hidden;margin-bottom: 26px;">
                        <a href="https://www.objetiveti.com.br/login.php" style="width:calc(50% - 8px);line-height: 50px;border-radius: 5px;background-color: #dedede;padding: 0 10px;box-sizing:border-box;font-size: 12px;text-transform: uppercase;font-weight: bold;letter-spacing: 1px;color: #666;display: block;text-decoration: none;margin: 0 auto;text-align: center;font-family: Arial, Helvetica, sans-serif;float: left;">continuar conversa</a>
                        <a href="https://www.objetiveti.com.br/login.php" style="width:calc(50% - 8px);line-height: 50px;border-radius: 5px;background-color: #a933cb;padding: 0 10px;box-sizing:border-box;font-size: 12px;text-transform: uppercase;font-weight: bold;letter-spacing: 1px;color: white;display: block;text-decoration: none;margin: 0 auto;text-align: center;font-family: Arial, Helvetica, sans-serif;float: right">confirmo encerramento</a>
                     </div>
                     <a href="https://www.objetiveti.com.br/" target="_blank" style="font-family: \'Oswald\', sans-serif;text-decoration: none;font-size: 16px;color: #999;margin-top: 36px;margin-bottom:16px;display: block;text-align: center;">www.objetiveti.com.br</a>
                     </div>

                     <img src="https://www.objetiveti.com.br/sistema/img/logo-cinza.png" style="width: 120px;display:block;margin: 0 auto;margin-top:50px;">
                     <h5 style="font-family: \'Open Sans\', sans-serif;font-size: 16px;color: #808080;text-align: center;margin-top:10px;">Tire suas dúvidas pelo: (85) 3047-7001</h5>
                  </body>
               </html>';

         $email_remetente = "suporte@objetiveti.com.br";
         $email_destinatario = trim ($retorno['CHA_SA1_EMAIL']).';'.trim ($retorno['CHA_COPIA']);

         $headers = "MIME-Version: 1.1\n";
         $headers .= "Content-type: text/html; charset=utf-8\n";
         $headers .= "From: $email_remetente\n";
         $headers .= "Return-Path: Objetive TI $email_remetente\n";
         $headers .= "Reply-To: $email_destinatario\n";
         $headers .= "X-Priority: 1\n";
         $envio = mail($email_destinatario, "Respostas do Chamado: #".$retorno["CHA_COD"], $html, $headers, "-r$email_remetente");

         if($envio){
            return 0;
         }else{
            $headers .= "Return-Path: Objetive TI " . $email_remetente . "\n";
            if(mail($email_destinatario, "Respostas do Chamado: #".$retorno["CHA_COD"], $html, $headers )){
               return 0;
            }else{

               return 1;
            }
         }
      } catch (phpmailerException $e) {
         return 4;
      }
   }

   public function enviar_email_cadchamados($CHA_COD, $CHA_ATENDENTE){
      try {
         $retorno = $this->buscar_dados($CHA_COD);
         $html = '<!DOCTYPE html>
                     <html lang="en">
                     <head>
                         <meta charset="UTF-8">
                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
                         <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway&display=swap" rel="stylesheet">
                         <title>Criar Chamado</title>
                     </head>
                     <body style="background-color: #efefef;padding: 0;margin: 0;">
                         <div style="background-color: #a933cb;height: 150px;">
                         </div>
                         <div style="width: 470px;margin: 0 auto;position: relative;background-color: white;border-radius: 30px;margin-top: -75px;padding: 16px 36px;">
                             <img src="https://www.objetiveti.com.br/sistema/img/logo-grande.png" style="width: 130px;display: block;margin: 0 auto;">
                             <h5 style="font-family: \'Oswald\', sans-serif;font-size: 22px;color: #a933cb;margin-bottom: 16px;">Olá </h5>
                             <p style="font-family: \'Open Sans\', sans-serif;color:#666;font-size: 16px;margin-top: 0;">
                                 Informamos que o Chamado foi criado com sucesso em nossa base de atendimentos.
                             </p>
                             <div style="border: 2px dashed #999;padding: 20px;margin: 40px 0;">
                                 <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Código:</span> <b>#'.$retorno["CHA_COD"].'</b></p>
                                 <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Assunto:</span> <b>'.$retorno["CHA_ASSUNTO"].'</b></p>
                                 <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Aberto em:</span> <b>'.$retorno["CHA_DTEMISSAO"].' às '.$retorno["CHA_HREMISSAO"].'</b></p>
                             </div>
                             <p style="font-family: \'Open Sans\', sans-serif;color:#666;font-size: 16px;margin-top: 0;">
                                 Em instantes um de nossos Suporte Técnico entrará em contato.
                             </p>

                             <a href="http://objetiveti.com.br/" target="_blank" style="font-family: \'Oswald\', sans-serif;text-decoration: none;font-size: 16px;color: #999;margin-top: 36px;margin-bottom:16px;display: block;text-align: center;">www.objetiveti.com.br</a>
                         </div>

                         <img src="https://www.objetiveti.com.br/sistema/img/logo-cinza.png" style="width: 120px;display:block;margin: 0 auto;margin-top:50px;">
                         <h5 style="font-family: \'Open Sans\', sans-serif;font-size: 16px;color: #808080;text-align: center;margin-top:10px;">Tire suas dúvidas pelo: (85) 3047-7001</h5>
                     </body>
                     </html>';

         $email_remetente = "suporte@objetiveti.com.br";
         $email_destinatario = trim ($retorno['CHA_SA1_EMAIL']).';'.trim ($retorno['CHA_COPIA']);

         if(!empty($CHA_ATENDENTE)){
            $email_destinatario .= ';'.trim ($retorno['CHA_SA1_EMAILATENDENTE']);
         }else{
            $email_destinatario .= ';'.$email_remetente;
         }

         $headers = "MIME-Version: 1.1\n";
         $headers .= "Content-type: text/html; charset=utf-8\n";
         $headers .= "From: $email_remetente\n";
         $headers .= "Return-Path: Objetive TI $email_remetente\n";
         $headers .= "Reply-To: $email_destinatario\n";
         $headers .= "X-Priority: 1\n";
         $envio = mail($email_destinatario, "Abertura de Chamado", $html, $headers, "-r$email_remetente");

         if($envio){
            return 0;
         }else{
            $headers .= "Return-Path: Objetive TI " . $email_remetente . "\n";
            if(mail($email_destinatario, "Abertura de Chamado", $html, $headers )){
               return 0;
            }else{

               return 1;
            }
         }
      } catch (phpmailerException $e) {
         return 4;
      }
   }
}                                                                                                        
?>                                                                                                         