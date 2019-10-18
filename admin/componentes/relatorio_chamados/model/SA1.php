<?php                                                                                                      
class SA1{                

   private $con;                                                                             
   private $SA1_COD;
   private $SA1_NOME;
   private $SA1_EMAIL;
   private $SA1_CPF;
   private $SA1_TELEFONE;
   private $SA1_EMP;
   private $SA1_USU;
   private $SA1_STATUS;
   private $SA1_TIPO;
   private $SA1_DTCAD;
   private $SA1_HRCAD;
   private $SA1_USUCAD;
   private $SA1_DTEDIT;
   private $SA1_HREDIT;
   private $SA1_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getSA1_COD() {
      return $this->SA1_COD;
   }
 
   public function setSA1_COD($SA1_COD) {
      $this->SA1_COD = $SA1_COD;
   }
 
   public function getSA1_NOME() {
      return $this->SA1_NOME;
   }
 
   public function setSA1_NOME($SA1_NOME) {
      $this->SA1_NOME = $SA1_NOME;
   }
 
   public function getSA1_EMAIL() {
      return $this->SA1_EMAIL;
   }
 
   public function setSA1_EMAIL($SA1_EMAIL) {
      $this->SA1_EMAIL = $SA1_EMAIL;
   }
 
   public function getSA1_CPF() {
      return $this->SA1_CPF;
   }
 
   public function setSA1_CPF($SA1_CPF) {
      $this->SA1_CPF = $SA1_CPF;
   }
 
   public function getSA1_TELEFONE() {
      return $this->SA1_TELEFONE;
   }
 
   public function setSA1_TELEFONE($SA1_TELEFONE) {
      $this->SA1_TELEFONE = $SA1_TELEFONE;
   }
 
   public function getSA1_EMP() {
      return $this->SA1_EMP;
   }
 
   public function setSA1_EMP($SA1_EMP) {
      $this->SA1_EMP = $SA1_EMP;
   }
 
   public function getSA1_USU() {
      return $this->SA1_USU;
   }
 
   public function setSA1_USU($SA1_USU) {
      $this->SA1_USU = $SA1_USU;
   }
 
   public function getSA1_STATUS() {
      return $this->SA1_STATUS;
   }
 
   public function setSA1_STATUS($SA1_STATUS) {
      $this->SA1_STATUS = $SA1_STATUS;
   }
 
   public function getSA1_TIPO() {
      return $this->SA1_TIPO;
   }
 
   public function setSA1_TIPO($SA1_TIPO) {
      $this->SA1_TIPO = $SA1_TIPO;
   }
 
   public function getSA1_DTCAD() {
      return $this->SA1_DTCAD;
   }
 
   public function setSA1_DTCAD($SA1_DTCAD) {
      $this->SA1_DTCAD = $SA1_DTCAD;
   }
 
   public function getSA1_HRCAD() {
      return $this->SA1_HRCAD;
   }
 
   public function setSA1_HRCAD($SA1_HRCAD) {
      $this->SA1_HRCAD = $SA1_HRCAD;
   }
 
   public function getSA1_USUCAD() {
      return $this->SA1_USUCAD;
   }
 
   public function setSA1_USUCAD($SA1_USUCAD) {
      $this->SA1_USUCAD = $SA1_USUCAD;
   }
 
   public function getSA1_DTEDIT() {
      return $this->SA1_DTEDIT;
   }
 
   public function setSA1_DTEDIT($SA1_DTEDIT) {
      $this->SA1_DTEDIT = $SA1_DTEDIT;
   }
 
   public function getSA1_HREDIT() {
      return $this->SA1_HREDIT;
   }
 
   public function setSA1_HREDIT($SA1_HREDIT) {
      $this->SA1_HREDIT = $SA1_HREDIT;
   }
 
   public function getSA1_USUEDIT() {
      return $this->SA1_USUEDIT;
   }
 
   public function setSA1_USUEDIT($SA1_USUEDIT) {
      $this->SA1_USUEDIT = $SA1_USUEDIT;
   }
    
   public function listar_usuario_empresa($COD_EMP) {
      $lista_usuario = array(); 
      try{
         $sql = "SELECT * FROM SA1 WHERE SA1_STATUS = 1 AND SA1_EMP = $COD_EMP ORDER BY SA1_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_usuario[$i] = array(
               "SA1_COD" => $row->SA1_COD,
               "SA1_USU" => $row->SA1_USU,
               "SA1_NOME" => utf8_encode($row->SA1_NOME),
               "SA1_EMAIL" => utf8_encode($row->SA1_EMAIL),
               "SA1_TELEFONE" => $row->SA1_TELEFONE
            );
            $i++;
         }

         return $lista_usuario;
      } catch (PDOException $e){
         return $lista_usuario;
      }
   }

   public function listar_atendentes_ativos() {
      $lista_usuario = array(); 
      try{
         $sql = "SELECT * FROM SA1 WHERE SA1_STATUS = 1 AND SA1_TIPO != 'CLI' AND SA1_TIPO != 'DEV' ORDER BY SA1_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_usuario[$i] = array(
               "SA1_COD" => $row->SA1_COD,
               "SA1_USU" => $row->SA1_USU,
               "SA1_NOME" => utf8_encode($row->SA1_NOME),
               "SA1_EMAIL" => utf8_encode($row->SA1_EMAIL),
               "SA1_TELEFONE" => $row->SA1_TELEFONE
            );
            $i++;
         }

         return $lista_usuario;
      } catch (PDOException $e){
         return $lista_usuario;
      }
   }
}                                                                                                        
?>                                                                                                         