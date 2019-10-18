<?php                                                                                                      
class FAQ{                 

   private $con;                                                                       
   private $FAQ_COD;
   private $FAQ_PERGUNTA;
   private $FAQ_RESPOSTA;                                                                       
   private $FAQ_STATUS;
   private $FAQ_DTCAD;
   private $FAQ_HRCAD;
   private $FAQ_USUCAD;
   private $FAQ_UTIL;
   private $FAQ_INUTIL;
   private $FAQ_STO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getFAQ_COD() {
      return $this->FAQ_COD;
   }
 
   public function setFAQ_COD($FAQ_COD) {
      $this->FAQ_COD = $FAQ_COD;
   }
 
   public function getFAQ_PERGUNTA() {
      return $this->FAQ_PERGUNTA;
   }
 
   public function setFAQ_PERGUNTA($FAQ_PERGUNTA) {
      $this->FAQ_PERGUNTA = $FAQ_PERGUNTA;
   }
 
   public function getFAQ_RESPOSTA() {
      return $this->FAQ_RESPOSTA;
   }
 
   public function setFAQ_RESPOSTA($FAQ_RESPOSTA) {
      $this->FAQ_RESPOSTA = $FAQ_RESPOSTA;
   }
 
   public function getFAQ_STATUS() {
      return $this->FAQ_STATUS;
   }
 
   public function setFAQ_STATUS($FAQ_STATUS) {
      $this->FAQ_STATUS = $FAQ_STATUS;
   }
 
   public function getFAQ_DTCAD() {
      return $this->FAQ_DTCAD;
   }
 
   public function setFAQ_DTCAD($FAQ_DTCAD) {
      $this->FAQ_DTCAD = $FAQ_DTCAD;
   }
 
   public function getFAQ_HRCAD() {
      return $this->FAQ_HRCAD;
   }
 
   public function setFAQ_HRCAD($FAQ_HRCAD) {
      $this->FAQ_HRCAD = $FAQ_HRCAD;
   }
 
   public function getFAQ_USUCAD() {
      return $this->FAQ_USUCAD;
   }
 
   public function setFAQ_USUCAD($FAQ_USUCAD) {
      $this->FAQ_USUCAD = $FAQ_USUCAD;
   }
 
   public function getFAQ_UTIL() {
      return $this->FAQ_UTIL;
   }
 
   public function setFAQ_UTIL($FAQ_UTIL) {
      $this->FAQ_UTIL = $FAQ_UTIL;
   }
 
   public function getFAQ_INUTIL() {
      return $this->FAQ_INUTIL;
   }
 
   public function setFAQ_INUTIL($FAQ_INUTIL) {
      $this->FAQ_INUTIL = $FAQ_INUTIL;
   }
   
   public function getFAQ_STO() {
      return $this->FAQ_STO;
   }
 
   public function setFAQ_STO($FAQ_STO) {
      $this->FAQ_STO = $FAQ_STO;
   }  

   public function buscar_nome_setor($FAQ_STO) {
      $STO_NOME = ""; 
      try{
         $sql = "SELECT STO_NOME FROM STO WHERE STO_COD = $FAQ_STO";
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

   public function listar_faqs_ativos($LIMIT) {
      $lista_faqs = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_STATUS = 1 ORDER BY FAQ_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_faqs[$i] = array(
               "FAQ_COD" => $row->FAQ_COD,
               "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
               "FAQ_UTIL" => $row->FAQ_UTIL,
               "FAQ_INUTIL" => $row->FAQ_INUTIL,
               "FAQ_NSETOR" => $this->buscar_nome_setor($row->FAQ_STO),
               "FAQ_STO" => $row->FAQ_STO
            );
            $i++;
         }

         return $lista_faqs;
      } catch (PDOException $e){
         return $lista_faqs;
      }
   }

   public function listar_faq_pag_prox($LIMIT, $FAQ_COD) {
      $lista_faq = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_STATUS = 1 AND FAQ_COD < $FAQ_COD ORDER BY FAQ_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_faq[$i] = array(
               "FAQ_COD" => $row->FAQ_COD,
               "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
               "FAQ_UTIL" => $row->FAQ_UTIL,
               "FAQ_INUTIL" => $row->FAQ_INUTIL,
               "FAQ_NSETOR" => $this->buscar_nome_setor($row->FAQ_STO),
               "FAQ_STO" => $row->FAQ_STO
            );
            $i++;
         }

         return $lista_faq;
      } catch (PDOException $e){
         return $lista_faq;
      }
   }

   public function listar_faq_pag_ante($LIMIT, $FAQ_COD) {
      $lista_faq = array(); 
      $lista_faq_order = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_STATUS = 1 AND FAQ_COD > $FAQ_COD $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_faq[$i] = array(
               "FAQ_COD" => $row->FAQ_COD,
               "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
               "FAQ_UTIL" => $row->FAQ_UTIL,
               "FAQ_INUTIL" => $row->FAQ_INUTIL,
               "FAQ_NSETOR" => $this->buscar_nome_setor($row->FAQ_STO),
               "FAQ_STO" => $row->FAQ_STO
            );
            $i++;
         }
         

         $o = 0;
         $i--;
         while ($o < count($lista_faq)) {
            $lista_faq_order[$o] = array(
               "FAQ_COD" => $lista_faq[$i]['FAQ_COD'],
               "FAQ_PERGUNTA" => $lista_faq[$i]['FAQ_PERGUNTA'],
               "FAQ_UTIL" => $lista_faq[$i]['FAQ_UTIL'],
               "FAQ_INUTIL" => $lista_faq[$i]['FAQ_INUTIL'],
               "FAQ_NSETOR" => $lista_faq[$i]['FAQ_NSETOR'],
               "FAQ_STO" => $lista_faq[$i]['FAQ_STO']
            );
            $o++;
            $i--;
         }

         return $lista_faq_order;
      } catch (PDOException $e){
         return $lista_faq;
      }
   }

   public function listar_dados_faqs($FAQ_COD){
      $lista_faqs = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_COD = $FAQ_COD";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         $i = 0;
         $lista_faqs[$i] = array(
            "FAQ_COD" => $row->FAQ_COD,
            "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
            "FAQ_RESPOSTA" => utf8_encode($row->FAQ_RESPOSTA),
            "FAQ_NSETOR" => $this->buscar_nome_setor($row->FAQ_STO),
            "FAQ_STO" => $row->FAQ_STO
         );
         
         return $lista_faqs;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $lista_faqs;
      }
   }
   
   public function create() {
      try{
         $sql = "INSERT INTO `FAQ`(
               `FAQ_PERGUNTA` , `FAQ_RESPOSTA`, 
               `FAQ_STATUS`  , `FAQ_DTCAD`, 
               `FAQ_HRCAD` , `FAQ_USUCAD`, `FAQ_STO`
               ) VALUES (
               :FAQ_PERGUNTA  , :FAQ_RESPOSTA, 
               :FAQ_STATUS     , :FAQ_DTCAD, 
               :FAQ_HRCAD       , :FAQ_USUCAD, :FAQ_STO
               )";

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("FAQ_PERGUNTA"         , $this->FAQ_PERGUNTA      , PDO::PARAM_STR);
         $sql->bindParam("FAQ_RESPOSTA"        , $this->FAQ_RESPOSTA     , PDO::PARAM_STR);
         $sql->bindParam("FAQ_STATUS"            , $this->FAQ_STATUS         , PDO::PARAM_STR);
         $sql->bindParam("FAQ_DTCAD"              , $this->FAQ_DTCAD      , PDO::PARAM_STR);
         $sql->bindParam("FAQ_HRCAD"              , $this->FAQ_HRCAD           , PDO::PARAM_STR);
         $sql->bindParam("FAQ_USUCAD"              , $this->FAQ_USUCAD           , PDO::PARAM_STR);
         $sql->bindParam("FAQ_STO"              , $this->FAQ_STO           , PDO::PARAM_STR);
       

         if($sql->execute()){
            $this->FAQ_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Faq realizado com Sucesso. Código do Faq: ".$this->FAQ_COD, "codigo" => $this->FAQ_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Faq.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro Faq.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `FAQ` SET
               `FAQ_PERGUNTA` = :FAQ_PERGUNTA   , `FAQ_RESPOSTA` = :FAQ_RESPOSTA, `FAQ_STO` = :FAQ_STO
              
               WHERE `FAQ_COD` = :FAQ_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("FAQ_PERGUNTA"    , $this->FAQ_PERGUNTA , PDO::PARAM_STR);
         $sql->bindParam("FAQ_RESPOSTA"    , $this->FAQ_RESPOSTA , PDO::PARAM_STR);
         $sql->bindParam("FAQ_STO"         , $this->FAQ_STO      , PDO::PARAM_STR); 
         $sql->bindParam("FAQ_COD"         , $this->FAQ_COD      , PDO::PARAM_STR);        
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Edição do Faq realizado com Sucesso. Código do Faq: ".$this->FAQ_COD, "codigo" => $this->FAQ_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Faq.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no atualizar Faq.");
      }  
   }

   public function delete() {
      try{
         $sql = "UPDATE `FAQ` SET `FAQ_STATUS` = :FAQ_STATUS WHERE `FAQ_COD` = :FAQ_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("FAQ_STATUS"     , $this->FAQ_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("FAQ_COD"        , $this->FAQ_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Empresa: ".$this->FAQ_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar o Faq.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no deletar o Faq.");
      }  
   }

}                                                                                                        
?>                                                                                                         