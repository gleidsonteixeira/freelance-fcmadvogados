<?php                                                                                                      
class CTA{                                                                                     
   private $CTA_COD;
   private $CTA_NOME;
   private $CTA_QNTCLICK;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCTA_COD() {
      return $this->CTA_COD;
   }
 
   public function setCTA_COD($CTA_COD) {
      $this->CTA_COD = $CTA_COD;
   }
 
   public function getCTA_NOME() {
      return $this->CTA_NOME;
   }
 
   public function setCTA_NOME($CTA_NOME) {
      $this->CTA_NOME = $CTA_NOME;
   }
 
   public function getCTA_QNTCLICK() {
      return $this->CTA_QNTCLICK;
   }
 
   public function setCTA_QNTCLICK($CTA_QNTCLICK) {
      $this->CTA_QNTCLICK = $CTA_QNTCLICK;
   }
 
   // NEXT_FUNCTION //

   public function listar_ctas() {
      $lista_cta = array(); 
      try{
         $sql = "SELECT * FROM CTA ORDER BY CTA_COD ASC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_cta[$i] = array(
               "CTA_COD" => $row->CTA_COD,
               "CTA_NOME" => $row->CTA_NOME,
               "CTA_QNTCLICK" => $row->CTA_QNTCLICK
            );
            $i++;
         }
         return $lista_cta;
      } catch (PDOException $e){
         return $lista_cta;
      }
   }

   public function conta_ctas() { 
      $conta_cta = 0;
      $total_clicks = 0;
      $quant_cta;
      try{
         $sql = "SELECT CTA_QNTCLICK FROM CTA";
         $rs = $this->con->query($sql);
         while($row = $rs->fetch(PDO::FETCH_OBJ)){
            $conta_cta = $conta_cta + 1;
            $total_clicks = $total_clicks + $row->CTA_QNTCLICK;
         }
         $quant_cta = array(
            "qnt" => $conta_cta,
            "qnt_click" => $total_clicks
         );
         return $quant_cta;
      } catch (PDOException $e){
         return $quant_cta;
      }
   }
   public function conta_avaliacoes() { 
      $total_clicks = 0;
      $quant_cta;
      try{
         $sql = "SELECT CTA_QNTCLICK FROM CTA LIMIT 5";
         $rs = $this->con->query($sql);
         while($row = $rs->fetch(PDO::FETCH_OBJ)){
            $total_clicks = $total_clicks + $row->CTA_QNTCLICK;
         }
         $quant_cta = array(
            "qnt_click" => $total_clicks
         );
         return $quant_cta;
      } catch (PDOException $e){
         return $quant_cta;
      }
   }

   
   public function listar_clicks_ctas() {
      $clicks_ctas = array();
      $dias = date('t');
      $mesAno = date('Y-m-');
      $data = "";

      $DATA = array();
      $COD6 = array();
      $COD7 = array();
      $COD8 = array();
      $COD9 = array();
      $COD10 = array();
      $COD11 = array();
      try{
         for($j = 1; $j <= $dias; $j++){
            if($j < 10){
               $data = $mesAno.'0'.$j;
            }else{
               $data = $mesAno.$j;
            }

            $sql = "SELECT 
               (SELECT COUNT(CLI_CTA) FROM CLI WHERE CLI_CTA = 6 AND CLI_DTCLICK = '$data') AS COD6,
               (SELECT COUNT(CLI_CTA) FROM CLI WHERE CLI_CTA = 7 AND CLI_DTCLICK = '$data') AS COD7,
               (SELECT COUNT(CLI_CTA) FROM CLI WHERE CLI_CTA = 8 AND CLI_DTCLICK = '$data') AS COD8,
               (SELECT COUNT(CLI_CTA) FROM CLI WHERE CLI_CTA = 9 AND CLI_DTCLICK = '$data') AS COD9,
               (SELECT COUNT(CLI_CTA) FROM CLI WHERE CLI_CTA = 10 AND CLI_DTCLICK = '$data') AS COD10,
               (SELECT COUNT(CLI_CTA) FROM CLI WHERE CLI_CTA = 11 AND CLI_DTCLICK = '$data') AS COD11
               ";
            $rs = $this->con->query($sql);

            $row = $rs->fetch(PDO::FETCH_OBJ);
            $COD6[$j-1] = $row->COD6;
            $COD7[$j-1] = $row->COD7;
            $COD8[$j-1] = $row->COD8;
            $COD9[$j-1] = $row->COD9;
            $COD10[$j-1] = $row->COD10;
            $COD11[$j-1] = $row->COD11;
            $DATA[$j-1] = date('d/m/Y', strtotime($data));
         }
         
         $clicks_ctas = array(
            "data" => $DATA,
            "cod6" => $COD6,
            "cod7" => $COD7,
            "cod8" => $COD8,
            "cod9" => $COD9,
            "cod10" => $COD10,
            "cod11" => $COD11
         );
         return $clicks_ctas;
      } catch (PDOException $e){
         return $clicks_ctas;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `CTA`(
               `CTA_NOME`
               ) VALUES (
               :CTA_NOME)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CTA_NOME"          , $this->CTA_NOME      , PDO::PARAM_STR);

         if($sql->execute()){
            $this->CTA_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro do CTA realizado com Sucesso. Código do CTA: ".$this->CTA_COD, "codigo" => $this->CTA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir CTA.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro CTA.");
      }  
   }

   public function delete() {
      try{
         $sql = "DELETE FROM `CTA` WHERE CTA_COD = :CTA_COD;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CTA_COD"        , $this->CTA_COD      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do CTA: ".$this->CTA_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar CTA.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar CTA.");
      }  
   }
}                                                                                                        
?>                                                                                                         