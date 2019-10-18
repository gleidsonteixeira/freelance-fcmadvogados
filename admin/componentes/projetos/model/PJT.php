<?php                                                                                                      
class PJT{                                                                                     
   private $PJT_COD;
   private $PJT_NOME;
   private $PJT_DTINIC;
   private $PJT_DTENCERRA;
   private $PJT_STATUS;
   private $PJT_EMP;
   private $PJT_EMP_NOME;
   private $PJT_DTCAD;
   private $PJT_HRCAD;
   private $PJT_USUCAD;
   private $PJT_DTEDIT;
   private $PJT_HREDIT;
   private $PJT_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getPJT_COD() {
      return $this->PJT_COD;
   }
 
   public function setPJT_COD($PJT_COD) {
      $this->PJT_COD = $PJT_COD;
   }
 
   public function getPJT_NOME() {
      return $this->PJT_NOME;
   }
 
   public function setPJT_NOME($PJT_NOME) {
      $this->PJT_NOME = $PJT_NOME;
   }
 
   public function getPJT_DTINIC() {
      return $this->PJT_DTINIC;
   }
 
   public function setPJT_DTINIC($PJT_DTINIC) {
      $this->PJT_DTINIC = $PJT_DTINIC;
   }
 
   public function getPJT_DTENCERRA() {
      return $this->PJT_DTENCERRA;
   }
 
   public function setPJT_DTENCERRA($PJT_DTENCERRA) {
      $this->PJT_DTENCERRA = $PJT_DTENCERRA;
   }
 
   public function getPJT_STATUS() {
      return $this->PJT_STATUS;
   }
 
   public function setPJT_STATUS($PJT_STATUS) {
      $this->PJT_STATUS = $PJT_STATUS;
   }
 
   public function getPJT_EMP() {
      return $this->PJT_EMP;
   }
 
   public function setPJT_EMP($PJT_EMP) {
      $this->PJT_EMP = $PJT_EMP;
   }

   public function getPJT_EMP_NOME() {
      return $this->PJT_EMP_NOME;
   }
 
   public function setPJT_EMP_NOME($PJT_EMP_NOME) {
      $this->PJT_EMP_NOME = $PJT_EMP_NOME;
   }
 
   public function getPJT_DTCAD() {
      return $this->PJT_DTCAD;
   }
 
   public function setPJT_DTCAD($PJT_DTCAD) {
      $this->PJT_DTCAD = $PJT_DTCAD;
   }
 
   public function getPJT_HRCAD() {
      return $this->PJT_HRCAD;
   }
 
   public function setPJT_HRCAD($PJT_HRCAD) {
      $this->PJT_HRCAD = $PJT_HRCAD;
   }
 
   public function getPJT_USUCAD() {
      return $this->PJT_USUCAD;
   }
 
   public function setPJT_USUCAD($PJT_USUCAD) {
      $this->PJT_USUCAD = $PJT_USUCAD;
   }
 
   public function getPJT_DTEDIT() {
      return $this->PJT_DTEDIT;
   }
 
   public function setPJT_DTEDIT($PJT_DTEDIT) {
      $this->PJT_DTEDIT = $PJT_DTEDIT;
   }
 
   public function getPJT_HREDIT() {
      return $this->PJT_HREDIT;
   }
 
   public function setPJT_HREDIT($PJT_HREDIT) {
      $this->PJT_HREDIT = $PJT_HREDIT;
   }
 
   public function getPJT_USUEDIT() {
      return $this->PJT_USUEDIT;
   }
 
   public function setPJT_USUEDIT($PJT_USUEDIT) {
      $this->PJT_USUEDIT = $PJT_USUEDIT;
   }
 
   // NEXT_FUNCTION //

   public function listar_projetos_ativos($LIMIT) {
      $lista_projeto = array(); 
      try{
         $sql = "SELECT * FROM PJT WHERE PJT_STATUS = 1 ORDER BY PJT_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_projeto[$i] = array(
               "PJT_COD" => $row->PJT_COD,
               "PJT_NOME" => utf8_encode($row->PJT_NOME),
               "PJT_EMP_NOME" => utf8_encode($row->PJT_EMP_NOME),
               "PJT_DTINIC" => date("d/m/Y", strtotime($row->PJT_DTINIC))
            );
            $i++;
         }

         return $lista_projeto;
      } catch (PDOException $e){
         return $lista_projeto;
      }
   }

   public function listar_dados_projeto($PJT_COD){
      $lista_projeto = array(); 
      try{
         $sql = "SELECT * FROM PJT WHERE PJT_COD = $PJT_COD";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         $i = 0;
         $lista_projeto[$i] = array(
            "PJT_COD" => $row->PJT_COD,
            "PJT_NOME" => utf8_encode($row->PJT_NOME),
            "PJT_DTINIC" => date("d/m/Y" , strtotime($row->PJT_DTINIC)),
            "PJT_EMP" => $row->PJT_EMP,
            "PJT_EMP_NOME" => utf8_encode($row->PJT_EMP_NOME)
         );

         $sqlEt = "SELECT * FROM PET WHERE PET_STATUS = 1 AND PET_PJT = $PJT_COD";
         $rspet = $this->con->prepare($sqlEt);
         $rspet->execute();

         $j = 0;
         $lista_etapas = [];

         while($rowpet = $rspet->fetch(PDO::FETCH_OBJ)){
            $lista_etapas[$j] = array(
               "PET_COD" => $rowpet->PET_COD,
               "PET_NOME" => utf8_encode($rowpet->PET_NOME),
               "PET_STATUS" => $rowpet->PET_STATUS,
            );
            
            $sqlAt = "SELECT PAT.*, SA1.SA1_NOME FROM PAT, SA1 WHERE PAT.PAT_STATUS = 1 AND PAT.PAT_PET = $rowpet->PET_COD AND PAT.PAT_ANALISTA = SA1.SA1_USU";
            $rspat = $this->con->prepare($sqlAt);
            $rspat->execute();

            $f = 0;
            $lista_atividade = [];

            while($rowpat = $rspat->fetch(PDO::FETCH_OBJ)){
               $lista_atividade[$f]['PAT_COD'] = $rowpat->PAT_COD;
               $lista_atividade[$f]['PAT_NOME'] = utf8_encode($rowpat->PAT_NOME);
               $lista_atividade[$f]['PAT_DESC'] = utf8_encode($rowpat->PAT_DESC);
               $lista_atividade[$f]['PAT_OBSERVACAO'] = $rowpat->PAT_OBSERVACAO;
               $lista_atividade[$f]['PAT_STATUS'] = $rowpat->PAT_STATUS;
               $lista_atividade[$f]['PAT_PRI'] = $rowpat->PAT_PRI;
               $lista_atividade[$f]['PAT_ANALISTA'] = utf8_encode($rowpat->SA1_NOME);
               $lista_atividade[$f]['PAT_DTINIC'] = date("d/m/Y" , strtotime($rowpat->PAT_DTINIC));
               $lista_atividade[$f]['PAT_HRINIC'] = $rowpat->PAT_HRINIC;
               if($rowpat->PAT_DTENCERRA == ''){
                  $lista_atividade[$f]['PAT_DTENCERRA'] = '';
               }else{
                  $lista_atividade[$f]['PAT_DTENCERRA'] = date("d/m/Y" , strtotime($rowpat->PAT_DTENCERRA));
               }
               $lista_atividade[$f]['PAT_HRENCERRA'] = $rowpat->PAT_HRENCERRA;
               $lista_atividade[$f]['PAT_AVALIACAO'] = $rowpat->PAT_AVALIACAO;
               $lista_etapas[$j]['atividades'][$f] = $lista_atividade[$f];
               $f++;
            }
            
            $j++;
         }
         $lista_projeto[$i]['etapas'] = $lista_etapas;
         return $lista_projeto;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $lista_projeto;
      }
   }

   public function listar_projeto_pag_prox($LIMIT, $PJT_COD) {
      $lista_projeto = array(); 
      try{
         $sql = "SELECT * FROM PJT WHERE PJT_STATUS = 1 AND PJT_COD < $PJT_COD ORDER BY PJT_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_projeto[$i] = array(
               "PJT_COD" => $row->PJT_COD,
               "PJT_NOME" => utf8_encode($row->PJT_NOME),
               "PJT_DTINIC" => date("d/m/Y", strtotime($row->PJT_DTINIC)),
               "PJT_EMP_NOME" => $row->PJT_EMP_NOME
            );
            $i++;
         }

         return $lista_projeto;
      } catch (PDOException $e){
         return $lista_projeto;
      }
   }

   public function listar_projeto_pag_ante($LIMIT, $PJT_COD) {
      $lista_projeto = array(); 
      $lista_projeto_order = array(); 
      try{
         $sql = "SELECT * FROM PJT WHERE PJT_STATUS = 1 AND PJT_COD > $PJT_COD $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_projeto[$i] = array(
               "PJT_COD" => $row->PJT_COD,
               "PJT_NOME" => utf8_encode($row->PJT_NOME),
               "PJT_DTINIC" => date("d/m/Y", strtotime($row->PJT_DTINIC)),
               "PJT_EMP_NOME" => $row->PJT_EMP_NOME
            );
            $i++;
         }
         

         $o = 0;
         $i--;
         while ($o < count($lista_projeto)) {
            $lista_projeto_order[$o] = array(
               "PJT_COD" => $lista_projeto[$i]['PJT_COD'],
               "PJT_NOME" => $lista_projeto[$i]['PJT_NOME'],
               "PJT_DTINIC" => $lista_projeto[$i]['PJT_DTINIC'],
               "PJT_EMP_NOME" => $lista_projeto[$i]['PJT_EMP_NOME']
            );
            $o++;
            $i--;
         }

         return $lista_projeto_order;
      } catch (PDOException $e){
         return $lista_projeto;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `PJT`(
               `PJT_NOME` , `PJT_DTINIC`, 
               `PJT_STATUS`  , `PJT_EMP`,
               `PJT_EMP_NOME`, `PJT_DTCAD`, 
               `PJT_HRCAD` , `PJT_USUCAD`
               ) VALUES (
               :PJT_NOME  , :PJT_DTINIC, 
               :PJT_STATUS  , :PJT_EMP,
               :PJT_EMP_NOME, :PJT_DTCAD, 
               :PJT_HRCAD       , :PJT_USUCAD
               )";

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("PJT_NOME"         , $this->PJT_NOME      , PDO::PARAM_STR);
         $sql->bindParam("PJT_DTINIC"        , $this->PJT_DTINIC     , PDO::PARAM_STR);
         $sql->bindParam("PJT_STATUS"            , $this->PJT_STATUS         , PDO::PARAM_STR);
         $sql->bindParam("PJT_EMP"              , $this->PJT_EMP           , PDO::PARAM_STR);
         $sql->bindParam("PJT_EMP_NOME"              , $this->PJT_EMP_NOME           , PDO::PARAM_STR);
         $sql->bindParam("PJT_DTCAD"              , $this->PJT_DTCAD      , PDO::PARAM_STR);
         $sql->bindParam("PJT_HRCAD"              , $this->PJT_HRCAD           , PDO::PARAM_STR);
         $sql->bindParam("PJT_USUCAD"              , $this->PJT_USUCAD           , PDO::PARAM_STR);
       

         if($sql->execute()){
            $this->PJT_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Projeto realizado com Sucesso. Código do Projeto: ".$this->PJT_COD, "codigo" => $this->PJT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Projeto.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro Projeto.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `PJT` SET
               `PJT_NOME` = :PJT_NOME ,
               `PJT_DTINIC` = :PJT_DTINIC,
               `PJT_EMP` = :PJT_EMP,
               `PJT_EMP_NOME` = :PJT_EMP_NOME
              
               WHERE `PJT_COD` = :PJT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PJT_NOME"    , $this->PJT_NOME , PDO::PARAM_STR);
         $sql->bindParam("PJT_DTINIC"    , $this->PJT_DTINIC , PDO::PARAM_STR);
         $sql->bindParam("PJT_EMP"         , $this->PJT_EMP      , PDO::PARAM_STR); 
         $sql->bindParam("PJT_EMP_NOME"         , $this->PJT_EMP_NOME      , PDO::PARAM_STR);        
         $sql->bindParam("PJT_COD"         , $this->PJT_COD      , PDO::PARAM_STR);        
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Edição do Projeto realizado com Sucesso. Código do Projeto: ".$this->PJT_COD, "codigo" => $this->PJT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Projeto.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no atualizar Projeto.");
      }  
   }

   public function delete() {
      try{
         $sql = "UPDATE `PJT` SET `PJT_STATUS` = :PJT_STATUS WHERE `PJT_COD` = :PJT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("PJT_STATUS"     , $this->PJT_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("PJT_COD"        , $this->PJT_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Projeto: ".$this->PJT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar o Projeto.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no deletar o Projeto.");
      }  
   }
}                                                                                                        
?>                                                                                                         