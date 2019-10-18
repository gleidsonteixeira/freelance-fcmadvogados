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

   public function listar_faqs() {
      $lista_faqs = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_STATUS = 1 ORDER BY FAQ_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_faqs[$i] = array(
               "FAQ_COD" => $row->FAQ_COD,
               "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
               "FAQ_RESPOSTA" => utf8_encode($row->FAQ_RESPOSTA),
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

   public function listar_faq_sto($sto_cod) {
      $lista_faqs = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_STATUS = 1 AND FAQ_STO = :FAQ_STO ORDER BY FAQ_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->bindParam("FAQ_STO"              , $sto_cod          , PDO::PARAM_STR);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_faqs[$i] = array(
               "FAQ_COD" => $row->FAQ_COD,
               "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
               "FAQ_RESPOSTA" => utf8_encode($row->FAQ_RESPOSTA),
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

   public function contar_util($faq_sto){
      try{
         $sql = "UPDATE `FAQ` SET
               `FAQ_UTIL` = FAQ_UTIL + 1
               WHERE `FAQ_COD` = :FAQ_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("FAQ_COD"         , $faq_sto     , PDO::PARAM_STR);        
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Avaliação realizada com sucesso!");
         }else{
            return array("status" => 1, "mensagem" => "Erro ao avaliar.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no avaliar Faq.");
      }  
   }

   public function contar_inutil($faq_sto){
      try{
         $sql = "UPDATE `FAQ` SET
               `FAQ_INUTIL` = FAQ_INUTIL + 1
               WHERE `FAQ_COD` = :FAQ_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("FAQ_COD"         , $faq_sto     , PDO::PARAM_STR);        
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Avaliação realizada com sucesso!");
         }else{
            return array("status" => 1, "mensagem" => "Erro ao avaliar.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no avaliar Faq.");
      }  
   }

   public function buscar_faqs($TEXTO){
       $lista_busca = array(); 
      try{
         $sql = "SELECT * FROM FAQ WHERE FAQ_STATUS = 1 AND (FAQ_PERGUNTA LIKE '%$TEXTO%' OR FAQ_RESPOSTA LIKE '%$TEXTO%' ) ORDER BY FAQ_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_busca[$i] = array(
               "FAQ_COD" => $row->FAQ_COD,
               "FAQ_PERGUNTA" => utf8_encode($row->FAQ_PERGUNTA),
               "FAQ_RESPOSTA" => utf8_encode($row->FAQ_RESPOSTA),
               "FAQ_NSETOR" => $this->buscar_nome_setor($row->FAQ_STO),
               "FAQ_STO" => $row->FAQ_STO
            );
            $i++;
         }

         return $lista_busca;

      }catch(PDOException $e){
         echo $e->getMessage();
         return $lista_busca;
         
      }
   }




}


                                                                                                         
?>                                                                                                         