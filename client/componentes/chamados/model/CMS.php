<?php                                                                                                      
class CMS{             

   private $con;                                                                               
   private $CMS_COD;
   private $CMS_CHA;
   private $CMS_USU;
   private $CMS_DESC;
   private $CMS_TIPOUSU;
   private $CMS_HRGASTA;
   private $CMS_DTEMISSAO;
   private $CMS_HREMISSAO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCMS_COD() {
      return $this->CMS_COD;
   }
 
   public function setCMS_COD($CMS_COD) {
      $this->CMS_COD = $CMS_COD;
   }
 
   public function getCMS_CHA() {
      return $this->CMS_CHA;
   }
 
   public function setCMS_CHA($CMS_CHA) {
      $this->CMS_CHA = $CMS_CHA;
   }
 
   public function getCMS_USU() {
      return $this->CMS_USU;
   }
 
   public function setCMS_USU($CMS_USU) {
      $this->CMS_USU = $CMS_USU;
   }
 
   public function getCMS_DESC() {
      return $this->CMS_DESC;
   }
 
   public function setCMS_DESC($CMS_DESC) {
      $this->CMS_DESC = $CMS_DESC;
   }
 
   public function getCMS_TIPOUSU() {
      return $this->CMS_TIPOUSU;
   }
 
   public function setCMS_TIPOUSU($CMS_TIPOUSU) {
      $this->CMS_TIPOUSU = $CMS_TIPOUSU;
   }

   public function getCMS_HRGASTA() {
      return $this->CMS_HRGASTA;
   }
 
   public function setCMS_HRGASTA($CMS_HRGASTA) {
      $this->CMS_HRGASTA = $CMS_HRGASTA;
   }
 
   public function getCMS_DTEMISSAO() {
      return $this->CMS_DTEMISSAO;
   }
 
   public function setCMS_DTEMISSAO($CMS_DTEMISSAO) {
      $this->CMS_DTEMISSAO = $CMS_DTEMISSAO;
   }
 
   public function getCMS_HREMISSAO() {
      return $this->CMS_HREMISSAO;
   }
 
   public function setCMS_HREMISSAO($CMS_HREMISSAO) {
      $this->CMS_HREMISSAO = $CMS_HREMISSAO;
   }
 
   public function create() {
      try{
         $sql = "INSERT INTO `CMS`(
               `CMS_CHA`         ,`CMS_USU`, 
               `CMS_DESC`        , `CMS_TIPOUSU`, 
               `CMS_DTEMISSAO`   , `CMS_HREMISSAO`
               ) VALUES (
               :CMS_CHA          , :CMS_USU, 
               :CMS_DESC         , :CMS_TIPOUSU, 
               :CMS_DTEMISSAO    , :CMS_HREMISSAO)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CMS_CHA"        , $this->CMS_CHA        , PDO::PARAM_STR);
         $sql->bindParam("CMS_USU"        , $this->CMS_USU        , PDO::PARAM_STR);
         $sql->bindParam("CMS_DESC"       , $this->CMS_DESC       , PDO::PARAM_STR);
         $sql->bindParam("CMS_TIPOUSU"    , $this->CMS_TIPOUSU    , PDO::PARAM_STR);
         $sql->bindParam("CMS_DTEMISSAO"  , $this->CMS_DTEMISSAO  , PDO::PARAM_STR);
         $sql->bindParam("CMS_HREMISSAO"  , $this->CMS_HREMISSAO  , PDO::PARAM_STR);

         if($sql->execute()){
            $this->CMS_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Mensagem enviada com Sucesso. Código da Mensagem: ".$this->CMS_COD, "codigo" => $this->CMS_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Mensagem.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Mensagem.");
      }  
   }

   public function lista_respostas($CHA_COD, $COD_ULTIMO_CMS) {
      $lista_respostas = array(); 
       
      try{
         $sql = "SELECT CMS.*, SA1_NOME FROM CMS, SA1 WHERE CMS_CHA = $CHA_COD AND CMS_COD > $COD_ULTIMO_CMS AND CMS_USU = SA1_USU ORDER BY CMS_COD;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_anexos = array();
            
            $sql_anexos = "SELECT * FROM CMA WHERE CMA_CMS = ".$row->CMS_COD.";";
            $rs_anexos = $this->con->prepare($sql_anexos);
            $rs_anexos->execute();

            $o = 0;
            while ($row_anexos = $rs_anexos->fetch(PDO::FETCH_OBJ)) {
               $CMA_EXTENSAO = explode(".", $row_anexos->CMA_ANEXO);
               $lista_anexos[$o] = array(
                  "CMA_ANEXO" => $row_anexos->CMA_ANEXO,
                  "CMA_EXTENSAO" => $CMA_EXTENSAO[1]
               );
               $o++;
            }

            $lista_respostas[$i] = array(
               "CMS_COD" => $row->CMS_COD,
               "CMS_DESC" => $row->CMS_DESC,
               "CMS_TIPOUSU" => $row->CMS_TIPOUSU,
               "SA1_NOME" => utf8_encode($row->SA1_NOME),
               "CMS_USU" => $row->CMS_USU,
               "CMS_DTEMISSAO" => date("d/m/Y",strtotime($row->CMS_DTEMISSAO)),
               "CMS_HREMISSAO" => date("H:i:s",strtotime($row->CMS_HREMISSAO)),
               "CMS_ANEXOS" => $lista_anexos
            );
            $i++;
         }
         return $lista_respostas;
      } catch (PDOException $e){
         return $lista_respostas;
      }
   }

}                                                                                                        
?>                                                                                                         