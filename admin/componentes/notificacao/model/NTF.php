<?php                                                                                                      
class NTF{ 
   private $con;                                                                                    
   private $NTF_COD;
   private $NTF_TITULO;
   private $NTF_DESC;
   private $NTF_TIPO;
   private $NTF_STATUS;
   private $NTF_USU;
   private $NTF_DTCAD;
   private $NTF_HRCAD;
   private $NTF_USUCAD;
   private $NTF_STO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }


   public function getNTF_COD() {
      return $this->NTF_COD;
   }
 
   public function setNTF_COD($NTF_COD) {
      $this->NTF_COD = $NTF_COD;
   }
 
   public function getNTF_TITULO() {
      return $this->NTF_TITULO;
   }
 
   public function setNTF_TITULO($NTF_TITULO) {
      $this->NTF_TITULO = $NTF_TITULO;
   }
 
   public function getNTF_DESC() {
      return $this->NTF_DESC;
   }
 
   public function setNTF_DESC($NTF_DESC) {
      $this->NTF_DESC = $NTF_DESC;
   }
 
   public function getNTF_TIPO() {
      return $this->NTF_TIPO;
   }
 
   public function setNTF_TIPO($NTF_TIPO) {
      $this->NTF_TIPO = $NTF_TIPO;
   }
 
   public function getNTF_STATUS() {
      return $this->NTF_STATUS;
   }
 
   public function setNTF_STATUS($NTF_STATUS) {
      $this->NTF_STATUS = $NTF_STATUS;
   }
 
   public function getNTF_USU() {
      return $this->NTF_USU;
   }
 
   public function setNTF_USU($NTF_USU) {
      $this->NTF_USU = $NTF_USU;
   }
 
   public function getNTF_DTCAD() {
      return $this->NTF_DTCAD;
   }
 
   public function setNTF_DTCAD($NTF_DTCAD) {
      $this->NTF_DTCAD = $NTF_DTCAD;
   }
 
   public function getNTF_HRCAD() {
      return $this->NTF_HRCAD;
   }
 
   public function setNTF_HRCAD($NTF_HRCAD) {
      $this->NTF_HRCAD = $NTF_HRCAD;
   }
 
   public function getNTF_USUCAD() {
      return $this->NTF_USUCAD;
   }
 
   public function setNTF_USUCAD($NTF_USUCAD) {
      $this->NTF_USUCAD = $NTF_USUCAD;
   }
 
   public function getNTF_STO() {
      return $this->NTF_STO;
   }
 
   public function setNTF_STO($NTF_STO) {
      $this->NTF_STO = $NTF_STO;
   }
      public function buscar_nome_setor($NTF_STO) {
      $STO_NOME = ""; 
      try{
         $sql = "SELECT STO_NOME FROM STO WHERE STO_COD = $NTF_STO";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         if($rs->rowCount() > 0){
            $row = $rs->fetch(PDO::FETCH_OBJ);
            $STO_NOME = utf8_encode($row->STO_NOME);
         }

         return $STO_NOME;
      } catch (PDOException $e){
         return $STO_NOME;
      }
   }
 
   // NEXT_FUNCTION //
      public function listar_ntf_ativos($LIMIT) {
          $lista_ntf = array(); 
            try{
               $sql = "SELECT * FROM NTF WHERE NTF_STATUS = 1 ORDER BY NTF_COD DESC $LIMIT";
               $rs = $this->con->prepare($sql);
               $rs->execute();

               $i = 0;
               while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                  $lista_ntf[$i] = array(
                     "NTF_COD" => $row->NTF_COD,
                     "NTF_TITULO" => utf8_encode($row->NTF_TITULO),
                     "NTF_DESC" => utf8_encode($row->NTF_DESC)
                  );
                  $i++;
               }

               return $lista_ntf;
         } catch (PDOException $e){
           return $lista_ntf;
       }
   }
      public function listar_ntf_pag_prox($LIMIT, $NTF_COD){
         $lista_ntf = array(); 
         try{
            $sql = "SELECT * FROM NTF WHERE NTF_STATUS = 1 AND NTF_COD < $NTF_COD ORDER BY NTF_COD DESC $LIMIT";
            $rs = $this->con->prepare($sql);
            $rs->execute();

            $i = 0;
            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
               $lista_ntf[$i] = array(
                  "NTF_COD" => $row->NTF_COD,
                  "NTF_TITULO" => utf8_encode($row->NTF_TITULO),
                  "NTF_DESC" => $row->NTF_DESC
               );
                  $i++;
            }

            return $lista_ntf;
         } catch (PDOException $e){
            return $lista_ntf;
         }

      }

      public function listar_ntf_pag_ante($LIMIT, $NTF_COD){
         $lista_ntf = array(); 
         $lista_ntf_order = array(); 
         try{
            $sql = "SELECT * FROM NTF WHERE NTF_STATUS = 1 AND NTF_COD > $NTF_COD $LIMIT";
            $rs = $this->con->prepare($sql);
            $rs->execute();

            $i = 0;
            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
               $lista_ntf[$i] = array(
                  "NTF_COD" => $row->NTF_COD,
                  "NTF_TITULO" => utf8_encode($row->NTF_TITULO),
                  "NTF_DESC" => $row->NTF_DESC
               );
               $i++;
            }
            

            $o = 0;
            $i--;
            while ($o < count($lista_ntf)) {
               $lista_ntf_order[$o] = array(
                  "NTF_COD" => $lista_ntf[$i]['NTF_COD'],
                  "NTF_TITULO" => $lista_ntf[$i]['NTF_TITULO'],
                  "NTF_DESC" => $lista_ntf[$i]['NTF_DESC']
               );
               $o++;
               $i--;
            }

            return $lista_ntf_order;
         } catch (PDOException $e){
            return $lista_ntf;
         }

      }

      public function listar_dados_ntf($NTF_COD){
         $lista_ntf = array(); 
         try{
            $sql = "SELECT * FROM NTF WHERE NTF_COD = $NTF_COD";
            $rs = $this->con->prepare($sql);
            $rs->execute();

            $row = $rs->fetch(PDO::FETCH_OBJ);
            $i = 0;
            $lista_ntf[$i] = array(
               "NTF_COD" => $row->NTF_COD,
               "NTF_TITULO" => utf8_encode($row->NTF_TITULO),
               "NTF_DESC" => utf8_encode($row->NTF_DESC),
               "NTF_STO" => $row->NTF_STO,
               "NTF_NSTO" => $this->buscar_nome_setor($row->NTF_STO)
            );
            
            return $lista_ntf;
         } catch (PDOException $e){
            echo $e->getMessage();
            return $lista_ntf;
         }

      }

      public function create() {
      try{
        $sql = "INSERT INTO `NTF`( `NTF_TITULO` , `NTF_DESC`,  `NTF_TIPO`, `NTF_STATUS`, `NTF_DTCAD`, `NTF_HRCAD`, `NTF_USUCAD`, `NTF_STO` ) VALUES ( :NTF_TITULO , :NTF_DESC, :NTF_TIPO, :NTF_STATUS, :NTF_DTCAD, :NTF_HRCAD, :NTF_USUCAD, :NTF_STO )";
         

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("NTF_TITULO"      , $this->NTF_TITULO   , PDO::PARAM_STR);
         $sql->bindParam("NTF_DESC"        , $this->NTF_DESC     , PDO::PARAM_STR); 
         $sql->bindParam("NTF_TIPO"        , $this->NTF_TIPO     , PDO::PARAM_STR);
         $sql->bindParam("NTF_STATUS"      , $this->NTF_STATUS   , PDO::PARAM_STR);
         $sql->bindParam("NTF_DTCAD"       , $this->NTF_DTCAD    , PDO::PARAM_STR);
         $sql->bindParam("NTF_HRCAD"       , $this->NTF_HRCAD    , PDO::PARAM_STR);
         $sql->bindParam("NTF_USUCAD"      , $this->NTF_USUCAD   , PDO::PARAM_STR);
         $sql->bindParam("NTF_STO"         , $this->NTF_STO      , PDO::PARAM_STR);
       

         if($sql->execute()){
            $this->NTF_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de notificação realizado com Sucesso. Código da notificação: "
               .$this->NTF_COD, "codigo" => $this->NTF_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir notificação.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro da notificação.");
      }  
   }

     public function update() {
         try{
            $sql = "UPDATE `NTF` SET
                  `NTF_TITULO` = :NTF_TITULO   , `NTF_DESC` = :NTF_DESC, `NTF_STO` = :NTF_STO
                 
                  WHERE `NTF_COD` = :NTF_COD";

            $sql = $this->con->prepare($sql);
            $sql->bindParam("NTF_TITULO"    , $this->NTF_TITULO   , PDO::PARAM_STR);
            $sql->bindParam("NTF_DESC"      , $this->NTF_DESC     , PDO::PARAM_STR);
            $sql->bindParam("NTF_STO"       , $this->NTF_STO      , PDO::PARAM_STR); 
            $sql->bindParam("NTF_COD"       , $this->NTF_COD      , PDO::PARAM_STR);        
           
            if($sql->execute()){
               return array("status" => 0, "mensagem" => "Edição da notificação realizado com Sucesso. Código da Notificação: ".$this->NTF_COD, "codigo" => $this->NTF_COD);
            }else{
               return array("status" => 1, "mensagem" => "Erro ao atualizar notificação.");
            }
         } catch (PDOException $e){
            echo $e->getMessage();
            return array("status" => 2, "mensagem" => "Erro no atualizar notificação.");
         }  
   }    

   public function delete() {
      try{
         $sql = "UPDATE `NTF` SET `NTF_STATUS` = :NTF_STATUS WHERE `NTF_COD` = :NTF_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("NTF_STATUS"     , $this->NTF_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("NTF_COD"        , $this->NTF_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código da notificação: ".$this->NTF_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar o notificação..");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no deletar o notificação...");
      }  
   }



}
                                                                                             
?>                                                                                                         