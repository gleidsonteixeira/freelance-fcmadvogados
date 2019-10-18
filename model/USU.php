<?php                                                                                                      
class USU{  

   private $con;                                                                                       
   private $USU_COD;
   private $USU_EMAIL;
   private $USU_SENHA;
   private $USU_STATUS;
   private $USU_TIPO;
   private $USU_DTCAD;
   private $USU_HRCAD;
   private $USU_USUCAD;
   private $USU_DTEDIT;
   private $USU_HREDIT;
   private $USU_USUEDIT;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getUSU_COD() {
      return $this->USU_COD;
   }
 
   public function setUSU_COD($USU_COD) {
      $this->USU_COD = $USU_COD;
   }
 
   public function getUSU_EMAIL() {
      return $this->USU_EMAIL;
   }
 
   public function setUSU_EMAIL($USU_EMAIL) {
      $this->USU_EMAIL = $USU_EMAIL;
   }
 
   public function getUSU_SENHA() {
      return $this->USU_SENHA;
   }
 
   public function setUSU_SENHA($USU_SENHA) {
      $this->USU_SENHA = $USU_SENHA;
   }
 
   public function getUSU_STATUS() {
      return $this->USU_STATUS;
   }
 
   public function setUSU_STATUS($USU_STATUS) {
      $this->USU_STATUS = $USU_STATUS;
   }
 
   public function getUSU_TIPO() {
      return $this->USU_TIPO;
   }
 
   public function setUSU_TIPO($USU_TIPO) {
      $this->USU_TIPO = $USU_TIPO;
   }
 
   public function getUSU_DTCAD() {
      return $this->USU_DTCAD;
   }
 
   public function setUSU_DTCAD($USU_DTCAD) {
      $this->USU_DTCAD = $USU_DTCAD;
   }
 
   public function getUSU_HRCAD() {
      return $this->USU_HRCAD;
   }
 
   public function setUSU_HRCAD($USU_HRCAD) {
      $this->USU_HRCAD = $USU_HRCAD;
   }
 
   public function getUSU_USUCAD() {
      return $this->USU_USUCAD;
   }
 
   public function setUSU_USUCAD($USU_USUCAD) {
      $this->USU_USUCAD = $USU_USUCAD;
   }
 
   public function getUSU_DTEDIT() {
      return $this->USU_DTEDIT;
   }
 
   public function setUSU_DTEDIT($USU_DTEDIT) {
      $this->USU_DTEDIT = $USU_DTEDIT;
   }
 
   public function getUSU_HREDIT() {
      return $this->USU_HREDIT;
   }
 
   public function setUSU_HREDIT($USU_HREDIT) {
      $this->USU_HREDIT = $USU_HREDIT;
   }
 
   public function getUSU_USUEDIT() {
      return $this->USU_USUEDIT;
   }
 
   public function setUSU_USUEDIT($USU_USUEDIT) {
      $this->USU_USUEDIT = $USU_USUEDIT;
   }
 
   public function login() {
      try{
         $sql = "SELECT USU.* FROM USU WHERE USU.USU_STATUS = :USU_STATUS AND USU.USU_EMAIL = :USU_EMAIL AND USU.USU_SENHA = :USU_SENHA;";
         $rs = $this->con->prepare($sql);
         $rs->bindParam("USU_STATUS"        , $this->USU_STATUS     , PDO::PARAM_STR);
         $rs->bindParam("USU_EMAIL"         , $this->USU_EMAIL      , PDO::PARAM_STR);
         $rs->bindParam("USU_SENHA"         , $this->USU_SENHA      , PDO::PARAM_STR);
         $rs->execute();

         if($rs->rowCount() > 0){
            $row = $rs->fetch(PDO::FETCH_OBJ);
            $redirect = "";
            if($row->USU_TIPO == "DEV"){
               $_SESSION['A_USU_COD'] = $row->USU_COD;
               $_SESSION['A_USU_TIPO'] = $row->USU_TIPO;
               $redirect = "admin/";
            }else if($row->USU_TIPO == "FUN" || $row->USU_TIPO == "ADM" || $row->USU_TIPO == "COR"){
               $sql = "SELECT SA1.SA1_EMP FROM SA1 WHERE SA1.SA1_USU = :SA1_USU AND SA1.SA1_STATUS = 1;";
               $rs = $this->con->prepare($sql);
               $rs->bindParam("SA1_USU"        , $row->USU_COD     , PDO::PARAM_STR);
               $rs->execute();
               $row_sa1 = $rs->fetch(PDO::FETCH_OBJ);

               $_SESSION['A_USU_COD'] = $row->USU_COD;
               $_SESSION['A_USU_TIPO'] = $row->USU_TIPO;
               $_SESSION['A_USU_EMP'] = $row_sa1->SA1_EMP;
               $redirect = "admin/";
            }else if($row->USU_TIPO == "CLI"){
               $sql = "SELECT SA1.SA1_EMP FROM SA1 WHERE SA1.SA1_USU = :SA1_USU AND SA1.SA1_STATUS = 1;";
               $rs = $this->con->prepare($sql);
               $rs->bindParam("SA1_USU"        , $row->USU_COD     , PDO::PARAM_STR);
               $rs->execute();
               $row_sa1 = $rs->fetch(PDO::FETCH_OBJ);

               $_SESSION['C_USU_COD'] = $row->USU_COD;
               $_SESSION['C_USU_TIPO'] = $row->USU_TIPO;
               $_SESSION['C_USU_EMP'] = $row_sa1->SA1_EMP;
               $redirect = "client/";
            }
            return array("status" => 0, "mensagem" => "Usuário logado com sucesso.", "redirect" => $redirect);
         }else{
            return array("status" => 1, "mensagem" => "Email ou Senha inválido.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro ao realizar Login.");
      }  
   }
}                                                                                                        
?>                                                                                                         