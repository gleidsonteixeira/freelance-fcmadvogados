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
    
   public function listar_usuario_ativos($LIMIT, $USU_EMP, $USU_COD) {
      $lista_usuario = array(); 
      try{
         $sql = "SELECT * FROM SA1 WHERE SA1_STATUS = 1 AND SA1_EMP = $USU_EMP AND SA1_USU != $USU_COD ORDER BY SA1_COD DESC $LIMIT";
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

   public function listar_dados($SA1_COD) {
      $lista_usuarios = array(); 
      $lista_menu = array(); 
      try{
         $sql = "SELECT SA1.*, USU.USU_SENHA, EMP.EMP_RZSOCIAL FROM SA1, USU, EMP WHERE SA1_COD = $SA1_COD AND SA1_USU = USU_COD AND SA1_EMP = EMP_COD;";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         
         $sql = "SELECT MNU.MNU_COD, MNU.MNU_NOME FROM MUS, MNU WHERE MUS.MUS_MNU = MNU.MNU_COD AND MUS.MUS_USU = $row->SA1_USU;";
         $rs_mnu = $this->con->prepare($sql);
         $rs_mnu->execute();
         $o = 0;
         while ($row_mnu = $rs_mnu->fetch(PDO::FETCH_OBJ)) {
            $lista_menu[$o] = array('MNU_COD' => $row_mnu->MNU_COD);
            $o++;
         }

         $i = 0;
         $lista_usuarios[$i] = array(
            "SA1_COD" => $row->SA1_COD,
            "SA1_NOME" => utf8_encode($row->SA1_NOME),
            "SA1_EMAIL" => utf8_encode($row->SA1_EMAIL),
            "SA1_CPF" => utf8_encode($row->SA1_CPF),
            "SA1_SENHA" => utf8_encode($row->USU_SENHA),
            "SA1_TELEFONE" => $row->SA1_TELEFONE,
            "SA1_EMP" => $row->SA1_EMP,
            "EMP_RZSOCIAL" => utf8_encode($row->EMP_RZSOCIAL),
            "SA1_USU" => $row->SA1_USU,
            "SA1_STATUS" => $row->SA1_STATUS,
            "SA1_TIPO" => $row->SA1_TIPO,
            "SA1_MNU" => $lista_menu
         );
         
         return $lista_usuarios;
      } catch (PDOException $e){
         return $lista_usuarios;
      }
   }

   public function listar_usuario_pag_prox($LIMIT, $SA1_COD, $USU_EMP, $USU_COD) {
      $lista_usuario = array(); 
      try{
         $sql = "SELECT * FROM SA1 WHERE SA1_STATUS = 1 AND SA1_EMP = $USU_EMP AND SA1_USU != $USU_COD AND SA1_COD < $SA1_COD ORDER BY SA1_COD DESC $LIMIT";
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

   public function listar_usuario_pag_ante($LIMIT, $SA1_COD, $USU_EMP, $USU_COD) {
      $lista_usuario = array(); 
      $lista_usuario_order = array(); 
      try{
         $sql = "SELECT * FROM SA1 WHERE SA1_STATUS = 1 AND SA1_EMP = $USU_EMP AND SA1_USU != $USU_COD AND SA1_COD > $SA1_COD $LIMIT";
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

         $o = 0;
         $i--;
         while ($o < count($lista_usuario)) {
            $lista_usuario_order[$o] = array(
               "SA1_COD" => $lista_usuario[$i]['SA1_COD'],
               "SA1_USU" => $lista_usuario[$i]['SA1_USU'],
               "SA1_NOME" => $lista_usuario[$i]['SA1_NOME'],
               "SA1_EMAIL" => $lista_usuario[$i]['SA1_EMAIL'],
               "SA1_TELEFONE" => $lista_usuario[$i]['SA1_TELEFONE']
            );
            $o++;
            $i--;
         }

         return $lista_usuario_order;
      } catch (PDOException $e){
         return $lista_usuario;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `SA1`(
               `SA1_NOME`        , `SA1_EMAIL`     , 
               `SA1_CPF`         , `SA1_TELEFONE`  , 
               `SA1_EMP`         , `SA1_USU`       , 
               `SA1_STATUS`      , `SA1_TIPO`      , 
               `SA1_DTCAD`       , `SA1_HRCAD`     , 
               `SA1_USUCAD`
               ) VALUES (
               :SA1_NOME         , :SA1_EMAIL      , 
               :SA1_CPF          , :SA1_TELEFONE   , 
               :SA1_EMP          , :SA1_USU        , 
               :SA1_STATUS       , :SA1_TIPO       , 
               :SA1_DTCAD        , :SA1_HRCAD      , 
               :SA1_USUCAD)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("SA1_NOME"          , $this->SA1_NOME       , PDO::PARAM_STR);
         $sql->bindParam("SA1_EMAIL"         , $this->SA1_EMAIL      , PDO::PARAM_STR);
         $sql->bindParam("SA1_CPF"           , $this->SA1_CPF        , PDO::PARAM_STR);
         $sql->bindParam("SA1_TELEFONE"      , $this->SA1_TELEFONE   , PDO::PARAM_STR);
         $sql->bindParam("SA1_EMP"           , $this->SA1_EMP        , PDO::PARAM_STR);
         $sql->bindParam("SA1_USU"           , $this->SA1_USU        , PDO::PARAM_STR);
         $sql->bindParam("SA1_STATUS"        , $this->SA1_STATUS     , PDO::PARAM_STR);
         $sql->bindParam("SA1_TIPO"          , $this->SA1_TIPO       , PDO::PARAM_STR);
         $sql->bindParam("SA1_DTCAD"         , $this->SA1_DTCAD      , PDO::PARAM_STR);
         $sql->bindParam("SA1_HRCAD"         , $this->SA1_HRCAD      , PDO::PARAM_STR);
         $sql->bindParam("SA1_USUCAD"        , $this->SA1_USUCAD     , PDO::PARAM_STR);

         if($sql->execute()){
            $this->SA1_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro de Usuário realizado com Sucesso. Código do Usuário: ".$this->SA1_COD, "codigo" => $this->SA1_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Usuário.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro de Usuário.");
      }  
   }
   
   public function update() {
      try{
         $sql = "UPDATE `SA1` SET
               `SA1_NOME` = :SA1_NOME        , `SA1_EMAIL` = :SA1_EMAIL , 
               `SA1_CPF` = :SA1_CPF          , `SA1_TELEFONE` = :SA1_TELEFONE  , 
               `SA1_EMP` = :SA1_EMP          , `SA1_TIPO` = :SA1_TIPO ,  
               `SA1_DTEDIT` = :SA1_DTEDIT    , `SA1_HREDIT` = :SA1_HREDIT , 
               `SA1_USUEDIT` = :SA1_USUEDIT
               WHERE SA1_COD = :SA1_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("SA1_NOME"       , $this->SA1_NOME      , PDO::PARAM_STR);
         $sql->bindParam("SA1_EMAIL"      , $this->SA1_EMAIL      , PDO::PARAM_STR);
         $sql->bindParam("SA1_CPF"        , $this->SA1_CPF     , PDO::PARAM_STR);
         $sql->bindParam("SA1_TELEFONE"   , $this->SA1_TELEFONE       , PDO::PARAM_STR);
         $sql->bindParam("SA1_EMP"        , $this->SA1_EMP      , PDO::PARAM_STR);
         $sql->bindParam("SA1_TIPO"       , $this->SA1_TIPO      , PDO::PARAM_STR);
         $sql->bindParam("SA1_DTEDIT"     , $this->SA1_DTEDIT     , PDO::PARAM_STR);
         $sql->bindParam("SA1_HREDIT"     , $this->SA1_HREDIT     , PDO::PARAM_STR);
         $sql->bindParam("SA1_USUEDIT"    , $this->SA1_USUEDIT     , PDO::PARAM_STR);
         $sql->bindParam("SA1_COD"        , $this->SA1_COD     , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Alteração de Usuário realizado com Sucesso. Código do Usuário: ".$this->SA1_COD, "codigo" => $this->SA1_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Alterar.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no alterar do Usuário.");
      }  
   }
   
   public function delete() {
      try{
         $sql = "UPDATE `SA1` SET `SA1_STATUS` = :SA1_STATUS WHERE `SA1_COD` = :SA1_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("SA1_STATUS"     , $this->SA1_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("SA1_COD"        , $this->SA1_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Usuário: ".$this->SA1_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Usuário.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no delete de Usuário.");
      }  
   }

   public function delete_rollback() {
      try{
         $sql = "DELETE FROM `SA1` WHERE SA1_COD = :SA1_COD;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("SA1_COD"        , $this->SA1_COD      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Usuário: ".$this->SA1_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Usuário.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar Usuário.");
      }  
   }

   public function enviar_email_cad_usuario($SA1_COD){
      try {
         $retorno = $this->listar_dados($SA1_COD);
         $html = '<!DOCTYPE html>
                     <html lang="en">
                     <head>
                         <meta charset="UTF-8">
                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
                         <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Raleway&display=swap" rel="stylesheet">
                         <title>Criar Chamado</title>
                     </head>
                     <body style="background-color: #efefef;padding: 0;margin: 0;">
                         <div style="background-color: #a933cb;height: 150px;">
                         </div>
                         <div style="width: 470px;margin: 0 auto;position: relative;background-color: white;border-radius: 30px;margin-top: -75px;padding: 16px 36px;">
                             <img src="https://www.objetiveti.com.br/sistema/img/logo-grande.png" style="width: 130px;display: block;margin: 0 auto;">
                             <h5 style="font-family: \'Oswald\', sans-serif;font-size: 22px;color: #a933cb;margin-bottom: 16px;">Seja bem vindo <span>'.$retorno[0]["SA1_NOME"].'</span></h5>
                             <p style="font-family: \'Open Sans\', sans-serif;color:#666;font-size: 16px;margin-top: 0;">
                                 Informamos que agora você é um usuário da empresa <span style="color: #a933cb;font-weight:bold;">'.$retorno[0]["EMP_RZSOCIAL"].'</span>, através do link abaixo você poderá fazer login e começar a atender os clientes de sua empresa.
                             </p>
                             <div style="border: 2px dashed #999;padding: 20px;margin: 40px 0;">
                                 <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Usuário:</span> <b>'.$retorno[0]["SA1_EMAIL"].'</b></p>
                                 <p style="margin:0;font-family: \'Open Sans\', sans-serif;color:#666;"><span style="color: #a933cb;">Senha:</span> <b>'.$retorno[0]["SA1_SENHA"].'</b></p>
                             </div>

                             <a href="link" style="line-height: 50px;border-radius: 5px;background-color: #a933cb;padding: 0 26px;font-size: 12px;text-transform: uppercase;font-weight: bold;letter-spacing: 1px;color: white;display: block;text-decoration: none;margin: 0 auto;min-width: 150px;text-align: center;font-family: Arial, Helvetica, sans-serif;">acessar</a>

                             <a href="http://objetiveti.com.br/" target="_blank" style="font-family: \'Oswald\', sans-serif;text-decoration: none;font-size: 16px;color: #999;margin-top: 36px;margin-bottom:16px;display: block;text-align: center;">www.objetiveti.com.br</a>
                         </div>

                         <img src="https://www.objetiveti.com.br/sistema/img/logo-cinza.png" style="width: 120px;display:block;margin: 0 auto;margin-top:50px;">
                         <h5 style="font-family: \'Open Sans\', sans-serif;font-size: 16px;color: #808080;text-align: center;margin-top:10px;">Tire suas dúvidas pelo: (85) 3047-7001</h5>
                     </body>
                     </html>';

         $email_remetente = "suporte@objetiveti.com.br";
         $email_destinatario = trim ($retorno[0]["SA1_EMAIL"]);


         $headers = "MIME-Version: 1.1\n";
         $headers .= "Content-type: text/html; charset=utf-8\n";
         $headers .= "From: $email_remetente\n";
         $headers .= "Return-Path: Objetive TI $email_remetente\n";
         $headers .= "Reply-To: $email_destinatario\n";
         $headers .= "X-Priority: 1\n";
         $envio = mail($email_destinatario, "Cadastro de Usuário", $html, $headers, "-r$email_remetente");

         if($envio){
            return 0;
         }else{
            $headers .= "Return-Path: Objetive TI " . $email_remetente . "\n";
            if(mail($email_destinatario, "Cadastro de Usuário", $html, $headers )){
               return 0;
            }else{

               return 1;
            }
         }
      } catch (phpmailerException $e) {
         echo $e->getMessage();
         return 4;
      }
   }
}                                                                                                        
?>                                                                                                         