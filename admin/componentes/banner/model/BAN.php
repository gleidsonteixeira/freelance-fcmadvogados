<?php                                                                                                      
class BAN{       

   private $con;                                                                        
   private $BAN_ID;
   private $BAN_TITULO;
   private $BAN_SUB_TITULO;
   private $BAN_CTA;
   private $BAN_CTA_STATUS;
   private $BAN_DATA;
   private $BAN_STATUS;
   private $BAN_VISIBILIT;
   private $BAN_IMAGEM;
   private $BAN_URL;
   private $BAN_CLICKS;
   private $BAN_ALINHAMENTO;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getBAN_ID() {
      return $this->BAN_ID;
   }
 
   public function setBAN_ID($BAN_ID) {
      $this->BAN_ID = $BAN_ID;
   }
 
   public function getBAN_TITULO() {
      return $this->BAN_TITULO;
   }
 
   public function setBAN_TITULO($BAN_TITULO) {
      $this->BAN_TITULO = $BAN_TITULO;
   }
 
   public function getBAN_SUB_TITULO() {
      return $this->BAN_SUB_TITULO;
   }
 
   public function setBAN_SUB_TITULO($BAN_SUB_TITULO) {
      $this->BAN_SUB_TITULO = $BAN_SUB_TITULO;
   }
 
   public function getBAN_CTA() {
      return $this->BAN_CTA;
   }
 
   public function setBAN_CTA($BAN_CTA) {
      $this->BAN_CTA = $BAN_CTA;
   }
 
   public function getBAN_CTA_STATUS() {
      return $this->BAN_CTA_STATUS;
   }
 
   public function setBAN_CTA_STATUS($BAN_CTA_STATUS) {
      $this->BAN_CTA_STATUS = $BAN_CTA_STATUS;
   }
 
   public function getBAN_DATA() {
      return $this->BAN_DATA;
   }
 
   public function setBAN_DATA($BAN_DATA) {
      $this->BAN_DATA = $BAN_DATA;
   }
 
   public function getBAN_STATUS() {
      return $this->BAN_STATUS;
   }
 
   public function setBAN_STATUS($BAN_STATUS) {
      $this->BAN_STATUS = $BAN_STATUS;
   }
 
   public function getBAN_VISIBILIT() {
      return $this->BAN_VISIBILIT;
   }
 
   public function setBAN_VISIBILIT($BAN_VISIBILIT) {
      $this->BAN_VISIBILIT = $BAN_VISIBILIT;
   }
 
   public function getBAN_IMAGEM() {
      return $this->BAN_IMAGEM;
   }
 
   public function setBAN_IMAGEM($BAN_IMAGEM) {
      $this->BAN_IMAGEM = $BAN_IMAGEM;
   }
 
   public function getBAN_URL() {
      return $this->BAN_URL;
   }
 
   public function setBAN_URL($BAN_URL) {
      $this->BAN_URL = $BAN_URL;
   }
 
   public function getBAN_CLICKS() {
      return $this->BAN_CLICKS;
   }
 
   public function setBAN_CLICKS($BAN_CLICKS) {
      $this->BAN_CLICKS = $BAN_CLICKS;
   }
 
   public function getBAN_ALINHAMENTO() {
      return $this->BAN_ALINHAMENTO;
   }
 
   public function setBAN_ALINHAMENTO($BAN_ALINHAMENTO) {
      $this->BAN_ALINHAMENTO = $BAN_ALINHAMENTO;
   }
 
   public function listar_banner_ativos($LIMIT) {
      $lista_banner = array(); 
      try{
         $sql = "SELECT * FROM BAN WHERE BAN_STATUS = 1 ORDER BY BAN_ID DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_banner[$i] = array(
               "BAN_ID" => $row->BAN_ID,
               "BAN_TITULO" => $row->BAN_TITULO,
               "BAN_DATA" => date("d/m/Y",strtotime($row->BAN_DATA)),
               "BAN_VISIBILIT" => $row->BAN_VISIBILIT,
               "BAN_CLICKS" => $row->BAN_CLICKS
            );
            $i++;
         }
         return $lista_banner;
      } catch (PDOException $e){
         return $lista_banner;
      }
   }

   public function listar_banner_por_id($BAN_ID) {
      $lista_banner; 
      try{
         $sql = "SELECT * FROM BAN WHERE BAN_ID = $BAN_ID";
         $rs = $this->con->query($sql);
         $row = $rs->fetch(PDO::FETCH_OBJ);
         $lista_banner = array(
            "BAN_ID" => $row->BAN_ID,
            "BAN_TITULO" => $row->BAN_TITULO,
            "BAN_SUB_TITULO" => $row->BAN_SUB_TITULO,
            "BAN_CTA" => $row->BAN_CTA,
            "BAN_CTA_STATUS" => $row->BAN_CTA_STATUS,
            "BAN_DATA" => date('d/m/Y', strtotime($row->BAN_DATA)),
            "BAN_IMAGEM" => $row->BAN_IMAGEM,
            "BAN_VISIBILIT" => $row->BAN_VISIBILIT,
            "BAN_URL" => $row->BAN_URL,
            "BAN_CLICKS" => $row->BAN_CLICKS,
            "BAN_ALINHAMENTO" => $row->BAN_ALINHAMENTO
         );
         return $lista_banner;
      } catch (PDOException $e){
         return $lista_banner;
      }
   }

   public function listar_clicks_banner_por_id($BAN_ID) {
      $clicks_banner = array(); 
      try{
         $i = 0;
         for($i = 0; $i < 7; $i++){
            $j = 0;
            $sql = "SELECT CLI_DAYCLICK FROM CLI WHERE CLI_BAN = $BAN_ID AND CLI_DAYCLICK = $i";
            $rs = $this->con->query($sql);
            $clicks_banner[$i] = 0;
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
               $clicks_banner[$i] = $j + 1;
               $j++;
            }
         }
         return $clicks_banner;
      } catch (PDOException $e){
         return $clicks_banner;
      }
   }

   public function conta_banner() { 
      $conta_banner = 0;
      $total_clicks = 0;
      $quant_banner;
      try{
         $sql = "SELECT BAN_CLICKS FROM BAN";
         $rs = $this->con->query($sql);
         while($row = $rs->fetch(PDO::FETCH_OBJ)){
            $conta_banner = $conta_banner + 1;
            $total_clicks = $total_clicks + $row->BAN_CLICKS;
         }
         $quant_banner = array(
            "qnt" => $conta_banner,
            "qnt_click" => $total_clicks
         );
         return $quant_banner;
      } catch (PDOException $e){
         return $quant_banner;
      }
   }

   // public function conta_clicks() {
   //    $clicks_banner = array();
   //    try{
   //       $sql = "SELECT COUNT(CLI_BAN) AS QNT FROM CLI WHERE CLI_TIPO = 'BAN'";
            
   //          $rs = $this->con->query($sql);
   //          $clicks_banner[date('d/m/Y', strtotime($data))] = 0;
   //          while($row = $rs->fetch(PDO::FETCH_OBJ)){
   //             $clicks_banner[$i] = array(
   //                "data" => date('d/m/Y', strtotime($data)),
   //                "valor" => $row->QNT
   //             ); 
   //             $j++;
   //          }
   //       }
   //       return $clicks_banner;
   //    } catch (PDOException $e){
   //       return $clicks_banner;
   //    }
   // }

   public function listar_clicks_mes_banner_por_id($BAN_ID) {
      $clicks_banner = array();
      $dias = date('t');
      $mesAno = date('Y-m-');
      try{
         $i = 1;
         for($i = 1; $i <= $dias; $i++){
            $j = 1;
            if($i < 10){
               $data = $mesAno.'0'.$i;
               $sql = "SELECT COUNT(CLI_BAN) AS QNT FROM CLI WHERE CLI_BAN = $BAN_ID AND CLI_DTCLICK = '$data'";
            }else{
               $data = $mesAno.$i;
               $sql = "SELECT COUNT(CLI_BAN) AS QNT FROM CLI WHERE CLI_BAN = $BAN_ID AND CLI_DTCLICK = '$data'";
            }
            $rs = $this->con->query($sql);
            $clicks_banner[date('d/m/Y', strtotime($data))] = 0;
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
               $clicks_banner[$i] = array(
                  "data" => date('d/m/Y', strtotime($data)),
                  "valor" => $row->QNT
               ); 
               $j++;
            }
         }
         return $clicks_banner;
      } catch (PDOException $e){
         return $clicks_banner;
      }
   }

   public function listar_banner_pag_prox($LIMIT, $BAN_ID) {
      $lista_banner = array(); 
      try{
         $sql = "SELECT * FROM BAN WHERE BAN_STATUS = 1 AND BAN_ID < $BAN_ID ORDER BY BAN_ID DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_banner[$i] = array(
               "BAN_ID" => $row->BAN_ID,
               "BAN_TITULO" => $row->BAN_TITULO,
               "BAN_DATA" => date("d/m/Y",strtotime($row->BAN_DATA)),
               "BAN_VISIBILIT" => $row->BAN_VISIBILIT,
               "BAN_CLICKS" => $row->BAN_CLICKS
            );
            $i++;
         }

         return $lista_banner;
      } catch (PDOException $e){
         return $lista_banner;
      }
   }

   public function listar_banner_pag_ante($LIMIT, $BAN_ID) {
      $lista_banner = array(); 
      $lista_banner_order = array(); 
      try{
         $sql = "SELECT * FROM BAN WHERE BAN_STATUS = 1 AND BAN_ID > $BAN_ID $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_banner[$i] = array(
               "BAN_ID" => $row->BAN_ID,
               "BAN_TITULO" => $row->BAN_TITULO,
               "BAN_DATA" => date("d/m/Y",strtotime($row->BAN_DATA)),
               "BAN_VISIBILIT" => $row->BAN_VISIBILIT,
               "BAN_CLICKS" => $row->BAN_CLICKS
            );
            $i++;
         }

         $o = 0;
         $i--;
         while ($o < count($lista_banner)) {
            $lista_banner_order[$o] = array(
               "BAN_ID" => $lista_banner[$i]['BAN_ID'],
               "BAN_TITULO" => $lista_banner[$i]['BAN_TITULO'],
               "BAN_DATA" => date("d/m/Y",strtotime($lista_banner[$i]['BAN_DATA'])),
               "BAN_VISIBILIT" => $lista_banner[$i]['BAN_VISIBILIT'],
               "BAN_CLICKS" => $lista_banner[$i]['BAN_CLICKS']
            );
            $o++;
            $i--;
         }

         return $lista_banner_order;
      } catch (PDOException $e){
         return $lista_banner;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `BAN`(
               `BAN_TITULO`   ,`BAN_SUB_TITULO`, 
               `BAN_CTA`      , `BAN_CTA_STATUS`, 
               `BAN_DATA`     , `BAN_STATUS`, 
               `BAN_VISIBILIT`, `BAN_IMAGEM`, 
               `BAN_URL`      , `BAN_CLICKS`,
               `BAN_ALINHAMENTO`
               ) VALUES (
               :BAN_TITULO    , :BAN_SUB_TITULO, 
               :BAN_CTA       , :BAN_CTA_STATUS, 
               :BAN_DATA      , :BAN_STATUS, 
               :BAN_VISIBILIT , :BAN_IMAGEM,
               :BAN_URL       , :BAN_CLICKS,
               :BAN_ALINHAMENTO)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BAN_TITULO"        , $this->BAN_TITULO      , PDO::PARAM_STR);
         $sql->bindParam("BAN_SUB_TITULO"    , $this->BAN_SUB_TITULO  , PDO::PARAM_STR);
         $sql->bindParam("BAN_CTA"           , $this->BAN_CTA         , PDO::PARAM_STR);
         $sql->bindParam("BAN_CTA_STATUS"    , $this->BAN_CTA_STATUS  , PDO::PARAM_STR);
         $sql->bindParam("BAN_DATA"          , $this->BAN_DATA        , PDO::PARAM_STR);
         $sql->bindParam("BAN_STATUS"        , $this->BAN_STATUS      , PDO::PARAM_STR);
         $sql->bindParam("BAN_VISIBILIT"     , $this->BAN_VISIBILIT   , PDO::PARAM_STR);
         $sql->bindParam("BAN_IMAGEM"        , $this->BAN_IMAGEM      , PDO::PARAM_STR);
         $sql->bindParam("BAN_URL"           , $this->BAN_URL         , PDO::PARAM_STR);
         $sql->bindParam("BAN_CLICKS"        , $this->BAN_CLICKS      , PDO::PARAM_STR);
         $sql->bindParam("BAN_ALINHAMENTO"   , $this->BAN_ALINHAMENTO , PDO::PARAM_STR);

         if($sql->execute()){
            $this->BAN_ID = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro do Banner realizado com Sucesso. Código do Banner: ".$this->BAN_ID, "codigo" => $this->BAN_ID);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Banner.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no cadastro Banner.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `BAN` SET 
               `BAN_TITULO`      =  :BAN_TITULO,
               `BAN_SUB_TITULO`  =  :BAN_SUB_TITULO,
               `BAN_CTA`         =  :BAN_CTA,
               `BAN_CTA_STATUS`  =  :BAN_CTA_STATUS,
               `BAN_DATA`        =  :BAN_DATA,
               `BAN_STATUS`      =  :BAN_STATUS,
               `BAN_VISIBILIT`   =  :BAN_VISIBILIT,
               ";
               if(!is_null($this->BAN_IMAGEM)){
                  $sql .= "`BAN_IMAGEM`      =  :BAN_IMAGEM,";
               }
         $sql .= "`BAN_URL`      =  :BAN_URL,
               `BAN_ALINHAMENTO` =  :BAN_ALINHAMENTO
                WHERE BAN_ID = :BAN_ID;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BAN_ID"            , $this->BAN_ID          , PDO::PARAM_STR);
         $sql->bindParam("BAN_TITULO"        , $this->BAN_TITULO      , PDO::PARAM_STR);
         $sql->bindParam("BAN_SUB_TITULO"    , $this->BAN_SUB_TITULO  , PDO::PARAM_STR);
         $sql->bindParam("BAN_CTA"           , $this->BAN_CTA         , PDO::PARAM_STR);
         $sql->bindParam("BAN_CTA_STATUS"    , $this->BAN_CTA_STATUS  , PDO::PARAM_STR);
         $sql->bindParam("BAN_DATA"          , $this->BAN_DATA        , PDO::PARAM_STR);
         $sql->bindParam("BAN_STATUS"        , $this->BAN_STATUS      , PDO::PARAM_STR);
         $sql->bindParam("BAN_VISIBILIT"     , $this->BAN_VISIBILIT   , PDO::PARAM_STR);
         if(!is_null($this->BAN_IMAGEM)){
            $sql->bindParam("BAN_IMAGEM"        , $this->BAN_IMAGEM      , PDO::PARAM_STR);
         }
         $sql->bindParam("BAN_URL"           , $this->BAN_URL         , PDO::PARAM_STR);
         $sql->bindParam("BAN_ALINHAMENTO"   , $this->BAN_ALINHAMENTO , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Banner atualizado com Sucesso. Código do Banner: ".$this->BAN_ID, "codigo" => $this->BAN_ID);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Banner.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no atualizar Banner.");
      }  
   }

   public function delete() {
      try{
         $sql = "DELETE FROM `BAN` WHERE BAN_ID = :BAN_ID;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BAN_ID"        , $this->BAN_ID      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Banner: ".$this->BAN_ID);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Banner.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar Banner.");
      }  
   }

   public function moverArquivo($name,$file, $caminho){
      if (!empty($file) && !empty($caminho)){
          // var_dump($file["$nome"]);
          $nome = $file["$name"][ 'name' ];
          $arquivo_tmp = $file["$name"][ 'tmp_name' ];

          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
          $extensao = strtolower ( $extensao );

          if (strstr ( '.jpg;.jpeg;.gif;.png;.pdf', $extensao )) {

              $novoNome = uniqid ( time () ) . '.' . $extensao;

              $destino = $caminho;

              if (@move_uploaded_file( $arquivo_tmp, $destino )) {
                  return $novoNome;
              }else{
                  return $retorno = array("status" => 5, "mensagem" => "Formato da imagem Inválido.");;
              }
          }else{
              return null;
          }
      }else{
          return null;
      }
  }
}                                                                                                        
?>                                                                                                         