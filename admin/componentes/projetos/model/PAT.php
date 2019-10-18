<?php                                                                                                      
class PAT{                                                                                     
   private $PAT_COD;
   private $PAT_NOME;
   private $PAT_DESC;
   private $PAT_OBSERVACAO;
   private $PAT_STATUS;
   private $PAT_PJT;
   private $PAT_PET;
   private $PAT_PRI;
   private $PAT_ANALISTA;
   private $PAT_DTINIC;
   private $PAT_HRINIC;
   private $PAT_DTENCERRA;
   private $PAT_HRENCERRA;
   private $PAT_DTCAD;
   private $PAT_HRCAD;
   private $PAT_USUCAD;
   private $PAT_DTEDIT;
   private $PAT_HREDIT;
   private $PAT_USUEDIT;
   private $PAT_AVALIACAO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getPAT_COD() {
      return $this->PAT_COD;
   }
 
   public function setPAT_COD($PAT_COD) {
      $this->PAT_COD = $PAT_COD;
   }
 
   public function getPAT_NOME() {
      return $this->PAT_NOME;
   }
 
   public function setPAT_NOME($PAT_NOME) {
      $this->PAT_NOME = $PAT_NOME;
   }
 
   public function getPAT_DESC() {
      return $this->PAT_DESC;
   }
 
   public function setPAT_DESC($PAT_DESC) {
      $this->PAT_DESC = $PAT_DESC;
   }
 
   public function getPAT_OBSERVACAO() {
      return $this->PAT_OBSERVACAO;
   }
 
   public function setPAT_OBSERVACAO($PAT_OBSERVACAO) {
      $this->PAT_OBSERVACAO = $PAT_OBSERVACAO;
   }
 
   public function getPAT_STATUS() {
      return $this->PAT_STATUS;
   }
 
   public function setPAT_STATUS($PAT_STATUS) {
      $this->PAT_STATUS = $PAT_STATUS;
   }
 
   public function getPAT_PJT() {
      return $this->PAT_PJT;
   }
 
   public function setPAT_PJT($PAT_PJT) {
      $this->PAT_PJT = $PAT_PJT;
   }
 
   public function getPAT_PET() {
      return $this->PAT_PET;
   }
 
   public function setPAT_PET($PAT_PET) {
      $this->PAT_PET = $PAT_PET;
   }
 
   public function getPAT_PRI() {
      return $this->PAT_PRI;
   }
 
   public function setPAT_PRI($PAT_PRI) {
      $this->PAT_PRI = $PAT_PRI;
   }
 
   public function getPAT_ANALISTA() {
      return $this->PAT_ANALISTA;
   }
 
   public function setPAT_ANALISTA($PAT_ANALISTA) {
      $this->PAT_ANALISTA = $PAT_ANALISTA;
   }
 
   public function getPAT_DTINIC() {
      return $this->PAT_DTINIC;
   }
 
   public function setPAT_DTINIC($PAT_DTINIC) {
      $this->PAT_DTINIC = $PAT_DTINIC;
   }
 
   public function getPAT_HRINIC() {
      return $this->PAT_HRINIC;
   }
 
   public function setPAT_HRINIC($PAT_HRINIC) {
      $this->PAT_HRINIC = $PAT_HRINIC;
   }
 
   public function getPAT_DTENCERRA() {
      return $this->PAT_DTENCERRA;
   }
 
   public function setPAT_DTENCERRA($PAT_DTENCERRA) {
      $this->PAT_DTENCERRA = $PAT_DTENCERRA;
   }
 
   public function getPAT_HRENCERRA() {
      return $this->PAT_HRENCERRA;
   }
 
   public function setPAT_HRENCERRA($PAT_HRENCERRA) {
      $this->PAT_HRENCERRA = $PAT_HRENCERRA;
   }
 
   public function getPAT_DTCAD() {
      return $this->PAT_DTCAD;
   }
 
   public function setPAT_DTCAD($PAT_DTCAD) {
      $this->PAT_DTCAD = $PAT_DTCAD;
   }
 
   public function getPAT_HRCAD() {
      return $this->PAT_HRCAD;
   }
 
   public function setPAT_HRCAD($PAT_HRCAD) {
      $this->PAT_HRCAD = $PAT_HRCAD;
   }
 
   public function getPAT_USUCAD() {
      return $this->PAT_USUCAD;
   }
 
   public function setPAT_USUCAD($PAT_USUCAD) {
      $this->PAT_USUCAD = $PAT_USUCAD;
   }
 
   public function getPAT_DTEDIT() {
      return $this->PAT_DTEDIT;
   }
 
   public function setPAT_DTEDIT($PAT_DTEDIT) {
      $this->PAT_DTEDIT = $PAT_DTEDIT;
   }
 
   public function getPAT_HREDIT() {
      return $this->PAT_HREDIT;
   }
 
   public function setPAT_HREDIT($PAT_HREDIT) {
      $this->PAT_HREDIT = $PAT_HREDIT;
   }
 
   public function getPAT_USUEDIT() {
      return $this->PAT_USUEDIT;
   }
 
   public function setPAT_USUEDIT($PAT_USUEDIT) {
      $this->PAT_USUEDIT = $PAT_USUEDIT;
   }
 
   public function getPAT_AVALIACAO() {
      return $this->PAT_AVALIACAO;
   }
 
   public function setPAT_AVALIACAO($PAT_AVALIACAO) {
      $this->PAT_AVALIACAO = $PAT_AVALIACAO;
   }
 
   // NEXT_FUNCTION //

   public function listar_atividades_ativos($PJT_COD, $LIMIT) {
      $lista_etapas = array(); 
      try{
         $sql = "SELECT * FROM PAT WHERE PAT_STATUS = 1 AND PAT_PJT = $PJT_COD ORDER BY PAT_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_etapas[$i] = array(
               "PAT_COD" => $row->PAT_COD,
               "PAT_NOME" => utf8_encode($row->PAT_NOME),
               "PAT_DESC" => utf8_encode($row->PAT_DESC),
               "PAT_OBSERVACAO" => utf8_encode($row->PAT_OBSERVACAO),
               "PAT_STATUS" => $row->PAT_STATUS,
               "PAT_PET" => $row->PAT_PET,
               "PAT_PRI" => $row->PAT_PRI,
               "PAT_ANALISTA" => $row->PAT_ANALISTA,
               "PAT_DTINIC" => date("d/m/Y", strtotime($row->PAT_DTINIC)),
               "PAT_HRINIC" => $row->PAT_HRINIC,
               "PAT_AVALIACAO" => $row->PAT_AVALIACAO
            );
            $i++;
         }

         return $lista_etapas;
      } catch (PDOException $e){
         return $lista_etapas;
      }
   }

   public function listar_dados_atividade($PAT_COD){
      $lista_projeto = array(); 
      try{
            $sqlAt = "SELECT * FROM PAT WHERE PAT_STATUS = 1 AND PAT_COD = $PAT_COD";
            $rspat = $this->con->prepare($sqlAt);
            $rspat->execute();

            $f = 0;
            $lista_atividade = [];

            $rowpat = $rspat->fetch(PDO::FETCH_OBJ);
            
            $lista_atividade['PAT_COD'] = $rowpat->PAT_COD;
            $lista_atividade['PAT_NOME'] = utf8_encode($rowpat->PAT_NOME);
            $lista_atividade['PAT_DESC'] = utf8_encode($rowpat->PAT_DESC);
            $lista_atividade['PAT_OBSERVACAO'] = utf8_encode($rowpat->PAT_OBSERVACAO);
            $lista_atividade['PAT_STATUS'] = $rowpat->PAT_STATUS;
            $lista_atividade['PAT_PRI'] = $rowpat->PAT_PRI;
            $lista_atividade['PAT_ANALISTA'] = $rowpat->PAT_ANALISTA;
            $lista_atividade['PAT_DTINIC'] = date("d-m-Y" , strtotime($rowpat->PAT_DTINIC));
            $lista_atividade['PAT_HRINIC'] = $rowpat->PAT_HRINIC;
            if($rowpat->PAT_DTENCERRA == ''){
               $lista_atividade['PAT_DTENCERRA'] = '';
            }else{
               $lista_atividade['PAT_DTENCERRA'] = date("d-m-Y" , strtotime($rowpat->PAT_DTENCERRA));
            }
            $lista_atividade['PAT_AVALIACAO'] = $rowpat->PAT_AVALIACAO;

         return $lista_atividade;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $lista_atividade;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `PAT`(
               `PAT_NOME`, `PAT_DESC`,
               `PAT_STATUS`, `PAT_PJT`,
               `PAT_PET`, `PAT_PRI`,
               `PAT_ANALISTA`, `PAT_DTINIC`, `PAT_HRINIC`,
               `PAT_DTENCERRA`,
               `PAT_DTCAD`, `PAT_HRCAD` , `PAT_USUCAD`
               ) VALUES (
               :PAT_NOME, :PAT_DESC, 
               :PAT_STATUS,:PAT_PJT,
               :PAT_PET, :PAT_PRI,
               :PAT_ANALISTA, :PAT_DTINIC, :PAT_HRINIC,
               :PAT_DTENCERRA,
               :PAT_DTCAD, :PAT_HRCAD, :PAT_USUCAD
               )";

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("PAT_NOME"             , $this->PAT_NOME             , PDO::PARAM_STR);
         $sql->bindParam("PAT_DESC"             , $this->PAT_DESC             , PDO::PARAM_STR);
         $sql->bindParam("PAT_STATUS"           , $this->PAT_STATUS           , PDO::PARAM_STR);
         $sql->bindParam("PAT_PJT"              , $this->PAT_PJT              , PDO::PARAM_STR);
         $sql->bindParam("PAT_PET"              , $this->PAT_PET              , PDO::PARAM_STR);
         $sql->bindParam("PAT_PRI"              , $this->PAT_PRI              , PDO::PARAM_STR);
         $sql->bindParam("PAT_ANALISTA"         , $this->PAT_ANALISTA         , PDO::PARAM_STR);
         $sql->bindParam("PAT_DTINIC"           , $this->PAT_DTINIC           , PDO::PARAM_STR);
         $sql->bindParam("PAT_HRINIC"           , $this->PAT_HRINIC           , PDO::PARAM_STR);
         $sql->bindParam("PAT_DTENCERRA"        , $this->PAT_DTENCERRA        , PDO::PARAM_STR);
         $sql->bindParam("PAT_DTCAD"            , $this->PAT_DTCAD            , PDO::PARAM_STR);
         $sql->bindParam("PAT_HRCAD"            , $this->PAT_HRCAD            , PDO::PARAM_STR);
         $sql->bindParam("PAT_USUCAD"           , $this->PAT_USUCAD           , PDO::PARAM_STR);
       

         if($sql->execute()){
            $this->PAT_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de atividade realizado com Sucesso. Código da atividade: ".$this->PAT_COD, "codigo" => $this->PAT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir atividade.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro atividade.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `PAT` SET
               `PAT_NOME` = :PAT_NOME,
               `PAT_DESC` = :PAT_DESC,
               `PAT_STATUS` = :PAT_STATUS,
               `PAT_PRI` = :PAT_PRI,
               `PAT_ANALISTA` = :PAT_ANALISTA,
               `PAT_DTINIC` = :PAT_DTINIC,
               `PAT_HRINIC` = :PAT_HRINIC,
               `PAT_DTENCERRA` = :PAT_DTENCERRA,
               `PAT_USUCAD` = :PAT_USUCAD
               WHERE `PAT_COD` = :PAT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PAT_NOME"             , $this->PAT_NOME             , PDO::PARAM_STR);
         $sql->bindParam("PAT_DESC"             , $this->PAT_DESC             , PDO::PARAM_STR);
         $sql->bindParam("PAT_STATUS"           , $this->PAT_STATUS           , PDO::PARAM_STR);
         $sql->bindParam("PAT_PRI"              , $this->PAT_PRI              , PDO::PARAM_STR);
         $sql->bindParam("PAT_ANALISTA"         , $this->PAT_ANALISTA         , PDO::PARAM_STR);
         $sql->bindParam("PAT_DTINIC"           , $this->PAT_DTINIC           , PDO::PARAM_STR);
         $sql->bindParam("PAT_HRINIC"           , $this->PAT_HRINIC           , PDO::PARAM_STR);
         $sql->bindParam("PAT_DTENCERRA"        , $this->PAT_DTENCERRA        , PDO::PARAM_STR);
         $sql->bindParam("PAT_USUCAD"           , $this->PAT_USUCAD           , PDO::PARAM_STR);
         $sql->bindParam("PAT_COD"              , $this->PAT_COD              , PDO::PARAM_STR);
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Edição da atividade realizado com Sucesso. Código da atividade: ".$this->PAT_COD, "codigo" => $this->PAT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar atividade.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no atualizar atividade.");
      }  
   }
   public function updateObservacao() {
      try{
         $sql = "UPDATE `PAT` SET
               `PAT_OBSERVACAO` = :PAT_OBSERVACAO
               WHERE `PAT_COD` = :PAT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PAT_OBSERVACAO"       , $this->PAT_OBSERVACAO       , PDO::PARAM_STR);
         $sql->bindParam("PAT_COD"              , $this->PAT_COD              , PDO::PARAM_STR);
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Edição da observacao realizada com Sucesso. Código da observacao: ".$this->PAT_COD, "codigo" => $this->PAT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar observacao.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no atualizar observacao.");
      }  
   }

   public function delete() {
      try{
         $sql = "UPDATE `PAT` SET `PAT_STATUS` = :PAT_STATUS WHERE `PAT_COD` = :PAT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PAT_STATUS"     , $this->PAT_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("PAT_COD"        , $this->PAT_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código da atividade: ".$this->PAT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar a atividade.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no deletar a atividade.");
      }  
   }

}                                                                                                        
?>                                                                                                         