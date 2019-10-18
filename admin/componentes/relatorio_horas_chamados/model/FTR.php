<?php                                                                                                      
class FTR{          

   private $con;                                                                                 
   private $FTR_COD;
   private $FTR_USU;
   private $FTR_ORIGEM;
   private $FTR_SITUACAO;
   private $FTR_DATADE;
   private $FTR_DATAATE;
   private $FTR_ATENDENTE;
   private $FTR_PRIORIDADE;
   private $FTR_CHASTATUS;
   private $FTR_EMPSOLICITANTE;
   private $FTR_SETOR;
   private $FTR_DTCAD;
   private $FTR_HRCAD;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getFTR_COD() {
      return $this->FTR_COD;
   }
 
   public function setFTR_COD($FTR_COD) {
      $this->FTR_COD = $FTR_COD;
   }
 
   public function getFTR_USU() {
      return $this->FTR_USU;
   }
 
   public function setFTR_USU($FTR_USU) {
      $this->FTR_USU = $FTR_USU;
   }
 
   public function getFTR_ORIGEM() {
      return $this->FTR_ORIGEM;
   }
 
   public function setFTR_ORIGEM($FTR_ORIGEM) {
      $this->FTR_ORIGEM = $FTR_ORIGEM;
   }
 
   public function getFTR_SITUACAO() {
      return $this->FTR_SITUACAO;
   }
 
   public function setFTR_SITUACAO($FTR_SITUACAO) {
      $this->FTR_SITUACAO = $FTR_SITUACAO;
   }
 
   public function getFTR_DATADE() {
      return $this->FTR_DATADE;
   }
 
   public function setFTR_DATADE($FTR_DATADE) {
      $this->FTR_DATADE = $FTR_DATADE;
   }
 
   public function getFTR_DATAATE() {
      return $this->FTR_DATAATE;
   }
 
   public function setFTR_DATAATE($FTR_DATAATE) {
      $this->FTR_DATAATE = $FTR_DATAATE;
   }
 
   public function getFTR_ATENDENTE() {
      return $this->FTR_ATENDENTE;
   }
 
   public function setFTR_ATENDENTE($FTR_ATENDENTE) {
      $this->FTR_ATENDENTE = $FTR_ATENDENTE;
   }
 
   public function getFTR_PRIORIDADE() {
      return $this->FTR_PRIORIDADE;
   }
 
   public function setFTR_PRIORIDADE($FTR_PRIORIDADE) {
      $this->FTR_PRIORIDADE = $FTR_PRIORIDADE;
   }
 
   public function getFTR_CHASTATUS() {
      return $this->FTR_CHASTATUS;
   }
 
   public function setFTR_CHASTATUS($FTR_CHASTATUS) {
      $this->FTR_CHASTATUS = $FTR_CHASTATUS;
   }
 
   public function getFTR_EMPSOLICITANTE() {
      return $this->FTR_EMPSOLICITANTE;
   }
 
   public function setFTR_EMPSOLICITANTE($FTR_EMPSOLICITANTE) {
      $this->FTR_EMPSOLICITANTE = $FTR_EMPSOLICITANTE;
   }
 
   public function getFTR_SETOR() {
      return $this->FTR_SETOR;
   }
 
   public function setFTR_SETOR($FTR_SETOR) {
      $this->FTR_SETOR = $FTR_SETOR;
   }
 
   public function getFTR_DTCAD() {
      return $this->FTR_DTCAD;
   }
 
   public function setFTR_DTCAD($FTR_DTCAD) {
      $this->FTR_DTCAD = $FTR_DTCAD;
   }
 
   public function getFTR_HRCAD() {
      return $this->FTR_HRCAD;
   }
 
   public function setFTR_HRCAD($FTR_HRCAD) {
      $this->FTR_HRCAD = $FTR_HRCAD;
   }
 
   public function listar_filtro_ativo($A_USU_COD, $ORIGEM) {
      $lista_filtro_relatorio_chamados = array(); 
      try{

         $sql = "SELECT * FROM FTR WHERE FTR_SITUACAO = 1 AND FTR_USU = $A_USU_COD AND FTR_ORIGEM = '$ORIGEM';";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $datade = "";
            $dataate = "";
            $status = 0;
            $empresa = 0;

            if(!empty($row->FTR_DATADE)){ $datade = date("d-m-Y",strtotime($row->FTR_DATADE)); }
            if(!empty($row->FTR_DATAATE)){ $dataate = date("d-m-Y",strtotime($row->FTR_DATAATE)); }
            if(!empty($row->FTR_CHASTATUS)){ $status = $row->FTR_CHASTATUS; }
            if(!empty($row->FTR_EMPSOLICITANTE)){ $empresa = $row->FTR_EMPSOLICITANTE; }

            $lista_filtro_relatorio_chamados[$i] = array(
               "FTR_COD" => $row->FTR_COD,
               "FTR_USU" => $row->FTR_USU,
               "FTR_DATADE" => $datade,
               "FTR_DATAATE" => $dataate,
               "FTR_CHASTATUS" => $status,
               "FTR_EMPSOLICITANTE" => $empresa
            );
            $i++;
         }
         return $lista_filtro_relatorio_chamados;
      } catch (PDOException $e){
         return $lista_filtro_relatorio_chamados;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `FTR`(
               `FTR_USU`, `FTR_ORIGEM`, 
               `FTR_SITUACAO`, `FTR_DATADE`, 
               `FTR_DATAATE`, `FTR_CHASTATUS`, 
               `FTR_EMPSOLICITANTE`, 
               `FTR_DTCAD`, `FTR_HRCAD`
            ) VALUES (
               :FTR_USU, :FTR_ORIGEM, 
               :FTR_SITUACAO, :FTR_DATADE, 
               :FTR_DATAATE, :FTR_CHASTATUS, 
               :FTR_EMPSOLICITANTE, 
               :FTR_DTCAD, :FTR_HRCAD
            )";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("FTR_USU"          , $this->FTR_USU          , PDO::PARAM_STR);
         $sql->bindParam("FTR_ORIGEM"         , $this->FTR_ORIGEM         , PDO::PARAM_STR);
         $sql->bindParam("FTR_SITUACAO"         , $this->FTR_SITUACAO         , PDO::PARAM_STR);
         $sql->bindParam("FTR_DATADE"           , $this->FTR_DATADE           , PDO::PARAM_STR);
         $sql->bindParam("FTR_DATAATE"     , $this->FTR_DATAATE     , PDO::PARAM_STR);
         $sql->bindParam("FTR_CHASTATUS"         , $this->FTR_CHASTATUS         , PDO::PARAM_STR);
         $sql->bindParam("FTR_EMPSOLICITANTE"           , $this->FTR_EMPSOLICITANTE           , PDO::PARAM_STR);
         $sql->bindParam("FTR_DTCAD"   , $this->FTR_DTCAD   , PDO::PARAM_STR);
         $sql->bindParam("FTR_HRCAD"   , $this->FTR_HRCAD   , PDO::PARAM_STR);

         if($sql->execute()){
            $this->FTR_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Filtro salvo com sucesso.", "codigo" => $this->FTR_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir #FTR01.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro #FTR02.");
      }  
   }

   public function update_situacao($situacao_anterior, $situacao_proxima, $ORIGEM, $FTR_USU){
      try{
         $sql = "UPDATE `FTR` SET
               `FTR_SITUACAO` = :FTR_SITUACAO
               WHERE `FTR_SITUACAO` = :FTR_SITUACAO_ANT AND FTR_ORIGEM = :FTR_ORIGEM AND FTR_USU = :FTR_USU";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("FTR_SITUACAO"     , $situacao_proxima     , PDO::PARAM_STR);
         $sql->bindParam("FTR_SITUACAO_ANT"  , $situacao_anterior           , PDO::PARAM_STR);
         $sql->bindParam("FTR_ORIGEM"  , $ORIGEM           , PDO::PARAM_STR);
         $sql->bindParam("FTR_USU"  , $FTR_USU           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Atualizado com sucesso.");
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Filtro.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro ao atualizar Filtro.");
      }  
   }

}                                                                                                        
?>                                                                                                         