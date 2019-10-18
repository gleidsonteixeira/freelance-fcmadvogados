<?php                                                                                                      
class EMP{   

   private $con;                                                                                       
   private $EMP_COD;
   private $EMP_RZSOCIAL;
   private $EMP_NFANTASIA;
   private $EMP_EMAIL;
   private $EMP_TELEFONE;
   private $EMP_EST;
   private $EMP_CID;
   private $EMP_ENDERECO;
   private $EMP_CNPJ;
   private $EMP_EMAILRESP;
   private $EMP_STATUS;
   private $EMP_TIPO;
   private $EMP_DTCAD;
   private $EMP_HRCAD;
   private $EMP_USUCAD;
   private $EMP_DTEDIT;
   private $EMP_HREDIT;
   private $EMP_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getEMP_COD() {
      return $this->EMP_COD;
   }
 
   public function setEMP_COD($EMP_COD) {
      $this->EMP_COD = $EMP_COD;
   }
 
   public function getEMP_RZSOCIAL() {
      return $this->EMP_RZSOCIAL;
   }
 
   public function setEMP_RZSOCIAL($EMP_RZSOCIAL) {
      $this->EMP_RZSOCIAL = $EMP_RZSOCIAL;
   }
 
   public function getEMP_NFANTASIA() {
      return $this->EMP_NFANTASIA;
   }
 
   public function setEMP_NFANTASIA($EMP_NFANTASIA) {
      $this->EMP_NFANTASIA = $EMP_NFANTASIA;
   }
 
   public function getEMP_EMAIL() {
      return $this->EMP_EMAIL;
   }
 
   public function setEMP_EMAIL($EMP_EMAIL) {
      $this->EMP_EMAIL = $EMP_EMAIL;
   }
 
   public function getEMP_TELEFONE() {
      return $this->EMP_TELEFONE;
   }
 
   public function setEMP_TELEFONE($EMP_TELEFONE) {
      $this->EMP_TELEFONE = $EMP_TELEFONE;
   }
 
   public function getEMP_EST() {
      return $this->EMP_EST;
   }
 
   public function setEMP_EST($EMP_EST) {
      $this->EMP_EST = $EMP_EST;
   }
 
   public function getEMP_CID() {
      return $this->EMP_CID;
   }
 
   public function setEMP_CID($EMP_CID) {
      $this->EMP_CID = $EMP_CID;
   }
 
   public function getEMP_ENDERECO() {
      return $this->EMP_ENDERECO;
   }
 
   public function setEMP_ENDERECO($EMP_ENDERECO) {
      $this->EMP_ENDERECO = $EMP_ENDERECO;
   }
 
   public function getEMP_CNPJ() {
      return $this->EMP_CNPJ;
   }
 
   public function setEMP_CNPJ($EMP_CNPJ) {
      $this->EMP_CNPJ = $EMP_CNPJ;
   }
 
   public function getEMP_EMAILRESP() {
      return $this->EMP_EMAILRESP;
   }
 
   public function setEMP_EMAILRESP($EMP_EMAILRESP) {
      $this->EMP_EMAILRESP = $EMP_EMAILRESP;
   }
 
   public function getEMP_STATUS() {
      return $this->EMP_STATUS;
   }
 
   public function setEMP_STATUS($EMP_STATUS) {
      $this->EMP_STATUS = $EMP_STATUS;
   }
 
   public function getEMP_TIPO() {
      return $this->EMP_TIPO;
   }
 
   public function setEMP_TIPO($EMP_TIPO) {
      $this->EMP_TIPO = $EMP_TIPO;
   }

   public function getEMP_DTCAD() {
      return $this->EMP_DTCAD;
   }
 
   public function setEMP_DTCAD($EMP_DTCAD) {
      $this->EMP_DTCAD = $EMP_DTCAD;
   }
 
   public function getEMP_HRCAD() {
      return $this->EMP_HRCAD;
   }
 
   public function setEMP_HRCAD($EMP_HRCAD) {
      $this->EMP_HRCAD = $EMP_HRCAD;
   }
 
   public function getEMP_USUCAD() {
      return $this->EMP_USUCAD;
   }
 
   public function setEMP_USUCAD($EMP_USUCAD) {
      $this->EMP_USUCAD = $EMP_USUCAD;
   }
 
   public function getEMP_DTEDIT() {
      return $this->EMP_DTEDIT;
   }
 
   public function setEMP_DTEDIT($EMP_DTEDIT) {
      $this->EMP_DTEDIT = $EMP_DTEDIT;
   }
 
   public function getEMP_HREDIT() {
      return $this->EMP_HREDIT;
   }
 
   public function setEMP_HREDIT($EMP_HREDIT) {
      $this->EMP_HREDIT = $EMP_HREDIT;
   }
 
   public function getEMP_USUEDIT() {
      return $this->EMP_USUEDIT;
   }
 
   public function setEMP_USUEDIT($EMP_USUEDIT) {
      $this->EMP_USUEDIT = $EMP_USUEDIT;
   }

   public function listar_empresa_ativos($LIMIT) {
      $lista_empresa = array(); 
      try{
         $sql = "SELECT * FROM EMP WHERE EMP_STATUS = 1 AND EMP_TIPO = 'CLI' ORDER BY EMP_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_empresa[$i] = array(
               "EMP_COD" => $row->EMP_COD,
               "EMP_NFANTASIA" => utf8_encode($row->EMP_NFANTASIA),
               "EMP_EMAIL" => utf8_encode($row->EMP_EMAIL),
               "EMP_TELEFONE" => $row->EMP_TELEFONE
            );
            $i++;
         }

         return $lista_empresa;
      } catch (PDOException $e){
         return $lista_empresa;
      }
   }
}                                                                                                        
?>                                                                                                         