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

   public function listar_chamados_quantidade($A_USU_TIPO, $A_USU_COD, $PERIODODE, $PERIODOATE) {
      $lista_relatorio_chamados = array(); 
      try{
         $sql_tipo = "";
         $sql_periodo = "";
         if($A_USU_TIPO == "FUN"){
            $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
         }
         $sql = "SELECT 
         (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_STATUS = 4 $sql_tipo AND CHA_DTFINAL BETWEEN '$PERIODODE' AND '$PERIODOATE') AS CHA_FINALIZADO, 
         (SELECT COUNT(`SA1_COD`) FROM `SA1` WHERE 0 < (SELECT COUNT(CHA_COD) FROM CHA WHERE SA1.SA1_USU = CHA.CHA_ATENDENTE $sql_tipo AND CHA_DTFINAL BETWEEN '$PERIODODE' AND '$PERIODOATE')) AS CHA_ATENDENTESS,
         (SELECT COUNT(`CMS_COD`) FROM CMS, CHA WHERE `CMS_TIPOUSU` = 'ATN' AND CMS.CMS_CHA = CHA.CHA_COD AND CHA.CHA_STATUS = 4 $sql_tipo AND CHA_DTFINAL BETWEEN '$PERIODODE' AND '$PERIODOATE')/(SELECT COUNT(`CHA_COD`) FROM CHA WHERE CHA_STATUS = 4 $sql_tipo AND CHA_DTFINAL BETWEEN '$PERIODODE' AND '$PERIODOATE') AS CHA_MCI;";

         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         $lista_relatorio_chamados = array(
            "CHA_FINALIZADO" => $row->CHA_FINALIZADO,
            "CHA_ATENDENTESS" => $row->CHA_ATENDENTESS,
            "CHA_MCI" => ceil($row->CHA_MCI)
         );

         return $lista_relatorio_chamados;
      } catch (PDOException $e){
         return $lista_relatorio_chamados;
      }
   }

   public function listar_chamados_grafico_mes($A_USU_TIPO, $A_USU_COD, $DIADE, $DIAATE, $MES, $ANO) {
      $listar_chamados_abertos_grafico = array();       
      $listar_chamados_encerrados_grafico = array();     
      $listar_chamados_data_grafico = array();
      $listar_chamados = array();
      try{
         $sql_tipo = "";
         if($A_USU_TIPO == "FUN"){
            $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
         }

         for($i = $DIADE; $i <= $DIAATE; $i++){
            $data = $ANO."-".$MES."-";
            if($i < 10){
               $data = $data.'0'.$i;
            }else{
               $data = $data.$i;
            }

            $sql = "SELECT 
            (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_DTEMISSAO = '$data' $sql_tipo) AS CHA_ABERTO,
            (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_DTFINAL = '$data' $sql_tipo) AS CHA_FINALIZADO;";
            $rs = $this->con->query($sql);
            $row = $rs->fetch(PDO::FETCH_OBJ);

            $listar_chamados_abertos_grafico[$i-1] = $row->CHA_ABERTO;
            $listar_chamados_encerrados_grafico[$i-1] = $row->CHA_FINALIZADO;
            $listar_chamados_data_grafico[$i-1] = date('d/m/Y', strtotime($data));
         }

         $listar_chamados = array(
            "CHA_ABERTO" => $listar_chamados_abertos_grafico,
            "CHA_FINALIZADO" => $listar_chamados_encerrados_grafico,
            "CHA_DATA" => $listar_chamados_data_grafico
         );
         return $listar_chamados;
      } catch (PDOException $e){
         return $listar_chamados;
      }
   }

   public function listar_chamados_grafico_periodo($A_USU_TIPO, $A_USU_COD, $PERIODODE, $PERIODOATE) {
      $listar_chamados_abertos_grafico = array();       
      $listar_chamados_encerrados_grafico = array();     
      $listar_chamados_data_grafico = array();
      $listar_chamados = array();
      try{

         $sql_tipo = "";
         if($A_USU_TIPO == "FUN"){
            $sql_tipo = "AND CHA_ATENDENTE = $A_USU_COD";
         }

         $array_de = explode("-", $PERIODODE);
         $dia_de = $array_de[2];
         $mes_de = $array_de[1];
         $ano_de = $array_de[0];

         $array_ate = explode("-", $PERIODOATE);
         $dia_ate = $array_ate[2];
         $mes_ate = $array_ate[1];
         $ano_ate = $array_ate[0];
         
         $diferenca = strtotime($PERIODOATE) - strtotime($PERIODODE);
         $dias_total = floor($diferenca / (60 * 60 * 24))+1;

         for($i = 1; $i <= $dias_total; $i++){
            if($dia_de == $dia_ate && $mes_de == $mes_ate && $ano_de == $ano_ate){
               $data = $ano_de."-".$mes_de."-".$dia_de;

               $sql = "SELECT 
               (SELECT COUNT(CHA_COD) FROM CHA WHERE (CHA_STATUS = 1 OR CHA_STATUS = 2 OR CHA_STATUS = 3) $sql_tipo AND CHA_DTEMISSAO = '$data') AS CHA_ABERTO,
               (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_STATUS = 4 $sql_tipo AND CHA_DTFINAL = '$data') AS CHA_FINALIZADO;";
               $rs = $this->con->query($sql);
               $row = $rs->fetch(PDO::FETCH_OBJ);

               $listar_chamados_abertos_grafico[$i-1] = $row->CHA_ABERTO;
               $listar_chamados_encerrados_grafico[$i-1] = $row->CHA_FINALIZADO;
               $listar_chamados_data_grafico[$i-1] = date('d/m/Y', strtotime($data));
            }else{
               $data = $ano_de."-".$mes_de."-".$dia_de;

               $sql = "SELECT 
               (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_DTEMISSAO = '$data' $sql_tipo) AS CHA_ABERTO,
               (SELECT COUNT(CHA_COD) FROM CHA WHERE CHA_DTFINAL = '$data' $sql_tipo) AS CHA_FINALIZADO;";
               $rs = $this->con->query($sql);
               $row = $rs->fetch(PDO::FETCH_OBJ);
               
               $listar_chamados_abertos_grafico[$i-1] = $row->CHA_ABERTO;
               $listar_chamados_encerrados_grafico[$i-1] = $row->CHA_FINALIZADO;
               $listar_chamados_data_grafico[$i-1] = date('d/m/Y', strtotime($data));

               $diaFinalDoMes = cal_days_in_month(CAL_GREGORIAN, $mes_de , $ano_de);
               if($diaFinalDoMes == $dia_de){
                  $dia_de = 1;
                  if($mes_de == 12){
                     $mes_de = 1;
                     $ano_de++;
                  }else{
                     $mes_de++;
                  }
               }else{
                  $dia_de++;
               }
            }
            // echo $sql." / <br> / ";
         }

         $listar_chamados = array(
            "CHA_ABERTO" => $listar_chamados_abertos_grafico,
            "CHA_FINALIZADO" => $listar_chamados_encerrados_grafico,
            "CHA_DATA" => $listar_chamados_data_grafico
         );
         return $listar_chamados;
      } catch (PDOException $e){
         return $listar_chamados;
      }
   }

   public function listar_chamados_ativos($LIMIT, $A_USU_TIPO, $A_USU_COD, $fDataDe, $fDataAte, $setor, $atendente, $prioridade, $status, $empresa) {
      $lista_chamados = array(); 
      try{
         $sql_tipo = "";
         $sql_complementar = "";
         $teste_where = false;
         if($A_USU_TIPO == "FUN"){
            $sql_tipo = " WHERE CHA_ATENDENTE = $A_USU_COD ";
            $teste_where = true;
         }else{
            if(!empty($atendente)){
               if($teste_where){
                  $sql_complementar .= " AND CHA_ATENDENTE = $atendente ";
               }else{
                  $sql_complementar .= " WHERE CHA_ATENDENTE = $atendente ";
                  $teste_where = true;
               }            
            }
         }

         if(!empty($fDataDe)){
            if($teste_where){
               $sql_complementar .= " AND CHA_DTEMISSAO >= '$fDataDe' ";
            }else{
               $sql_complementar .= " WHERE CHA_DTEMISSAO >= '$fDataDe' ";
               $teste_where = true;
            }            
         }
         if(!empty($fDataAte)){
            if($teste_where){
               $sql_complementar .= " AND CHA_DTEMISSAO <= '$fDataAte' ";
            }else{
               $sql_complementar .= " WHERE CHA_DTEMISSAO <= '$fDataAte' ";
               $teste_where = true;
            }            
         }
         if(!empty($setor)){
            if($teste_where){
               $sql_complementar .= " AND CHA_STO = $setor ";
            }else{
               $sql_complementar .= " WHERE CHA_STO = $setor ";
               $teste_where = true;
            }            
         }
         if(!empty($prioridade)){
            if($teste_where){
               $sql_complementar .= " AND CHA_PRI = $prioridade ";
            }else{
               $sql_complementar .= " WHERE CHA_PRI = $prioridade ";
               $teste_where = true;
            }            
         }
         if(!empty($status)){
            if($teste_where){
               if($status == 1){
                  $sql_complementar .= " AND (CHA_STATUS = 1 OR CHA_STATUS = 2 OR CHA_STATUS = 3)";
               }else if($status == 4){
                  $sql_complementar .= " AND CHA_STATUS = 4";
               }else{
                  $sql_complementar .= " AND CHA_STATUS = $status ";
               }
            }else{
               if($status == 1){
                  $sql_complementar .= " WHERE (CHA_STATUS = 1 OR CHA_STATUS = 2 OR CHA_STATUS = 3)";
               }else if($status == 4){
                  $sql_complementar .= " WHERE CHA_STATUS = 4";
               }else{
                  $sql_complementar .= " WHERE CHA_STATUS = $status ";
               }
               $teste_where = true;
            }            
         }
         if(!empty($empresa)){
            if($teste_where){
               $sql_complementar .= " AND CHA_EMP = $empresa ";
            }else{
               $sql_complementar .= " WHERE CHA_EMP = $empresa ";
               $teste_where = true;
            }            
         }

         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA $sql_tipo $sql_complementar ORDER BY CHA_COD DESC $LIMIT";
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
               "CHA_ATENDENTE" => $row->CHA_ATENDENTE,
               "CHA_STATUS" => $row->CHA_STATUS
            );
            $i++;
         }
         return $lista_chamados;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

   public function listar_chamados_pag_prox($LIMIT, $CHA_COD, $A_USU_TIPO, $A_USU_COD, $fDataDe, $fDataAte, $setor, $atendente, $prioridade, $status, $empresa) {
      $lista_chamados = array(); 
      try{
         $sql_tipo = "";
         $sql_complementar = "";

         if($A_USU_TIPO == "FUN"){
            $sql_tipo = " WHERE CHA_ATENDENTE = $A_USU_COD ";
            $teste_where = true;
         }else{
            if(!empty($atendente)){
               $sql_complementar .= " AND CHA_ATENDENTE = $atendente ";
            }
         }

         if(!empty($fDataDe)){
            $sql_complementar .= " AND CHA_DTEMISSAO >= '$fDataDe' ";
         }
         if(!empty($fDataAte)){
            $sql_complementar .= " AND CHA_DTEMISSAO <= '$fDataAte' ";         
         }
         if(!empty($setor)){
            $sql_complementar .= " AND CHA_STO = $setor ";          
         }
         if(!empty($prioridade)){
            $sql_complementar .= " AND CHA_PRI = $prioridade ";          
         }
         if(!empty($status)){
            if($status == 1){
               $sql_complementar .= " AND (CHA_STATUS = 1 OR CHA_STATUS = 2 OR CHA_STATUS = 3)";
            }else if($status == 4){
               $sql_complementar .= " AND CHA_STATUS = 4";
            }else{
               $sql_complementar .= " AND CHA_STATUS = $status ";
            }
         }
         if(!empty($empresa)){
            $sql_complementar .= " AND CHA_EMP = $empresa ";     
         }

         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA WHERE CHA_COD < $CHA_COD $sql_tipo $sql_complementar ORDER BY CHA_COD DESC $LIMIT";
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
               "CHA_ATENDENTE" => $row->CHA_ATENDENTE,
               "CHA_STATUS" => $row->CHA_STATUS
            );
            $i++;
         }

         return $lista_chamados;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

   public function listar_chamados_pag_ante($LIMIT, $CHA_COD, $A_USU_TIPO, $A_USU_COD, $fDataDe, $fDataAte, $setor, $atendente, $prioridade, $status, $empresa) {
      $lista_chamados = array(); 
      $lista_chamados_order = array(); 
      try{
         $sql_tipo = "";
         $sql_complementar = "";

         if($A_USU_TIPO == "FUN"){
            $sql_tipo = " WHERE CHA_ATENDENTE = $A_USU_COD ";
            $teste_where = true;
         }else{
            if(!empty($atendente)){
               $sql_complementar .= " AND CHA_ATENDENTE = $atendente ";
            }
         }

         if(!empty($fDataDe)){
            $sql_complementar .= " AND CHA_DTEMISSAO >= '$fDataDe' ";
         }
         if(!empty($fDataAte)){
            $sql_complementar .= " AND CHA_DTEMISSAO <= '$fDataAte' ";         
         }
         if(!empty($setor)){
            $sql_complementar .= " AND CHA_STO = $setor ";          
         }
         if(!empty($prioridade)){
            $sql_complementar .= " AND CHA_PRI = $prioridade ";          
         }
         if(!empty($status)){
            if($status == 1){
               $sql_complementar .= " AND (CHA_STATUS = 1 OR CHA_STATUS = 2 OR CHA_STATUS = 3)";
            }else if($status == 4){
               $sql_complementar .= " AND CHA_STATUS = 4";
            }else{
               $sql_complementar .= " AND CHA_STATUS = $status ";
            }
         }
         if(!empty($empresa)){
            $sql_complementar .= " AND CHA_EMP = $empresa ";     
         }

         $sql = "SELECT CHA.*, 
         (SELECT STO.STO_NOME FROM STO WHERE STO.STO_COD = CHA.CHA_STO) AS CHA_NSTO, 
         (SELECT EMP.EMP_NFANTASIA FROM EMP WHERE EMP.EMP_COD = CHA.CHA_EMP) AS CHA_NEMP,
         (SELECT PRI.PRI_NOME FROM PRI WHERE PRI.PRI_COD = CHA.CHA_PRI) AS CHA_NPRI
         FROM CHA WHERE CHA_COD > $CHA_COD $sql_tipo $sql_complementar $LIMIT";
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
               "CHA_ATENDENTE" => $row->CHA_ATENDENTE,
               "CHA_STATUS" => $row->CHA_STATUS
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
               "CHA_ATENDENTE" => $lista_chamados[$i]['CHA_ATENDENTE'],
               "CHA_STATUS" => $lista_chamados[$i]['CHA_STATUS']
            );
            $o++;
            $i--;
         }

         return $lista_chamados_order;
      } catch (PDOException $e){
         return $lista_chamados;
      }
   }

}                                                                                                        
?>                                                                                                         