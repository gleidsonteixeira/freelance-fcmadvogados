<?php                                                                                                      
class BLO{       

   private $con;
   private $BLO_COD;
   private $BLO_TITULO;  
   private $BLO_CATEGORIA;
   private $BLO_AUTOR;
   private $BLO_DATA;
   private $BLO_P_TEXTO;
   private $BLO_SEO;
   private $BLO_FRASE_CHAVE;
   private $BLO_META_DESC;
   private $BLO_TEXTO;
   private $BLO_VISIBILIT;
   private $BLO_CLICKS;
   private $BLO_VIEWS;
   private $BLO_AVALIACOES;
   private $BLO_IMAGEM;
   private $BLO_STATUS;


   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getBLO_COD(){
      return $this->BLO_COD;
   }

   public function setBLO_COD($BLO_COD){
      $this->BLO_COD = $BLO_COD;
   }

   public function getBLO_TITULO(){
      return $this->BLO_TITULO;
   }

   public function setBLO_TITULO($BLO_TITULO){
      $this->BLO_TITULO = $BLO_TITULO;
   }

   public function getBLO_CATEGORIA(){
      return $this->BLO_CATEGORIA;
   }

   public function setBLO_CATEGORIA($BLO_CATEGORIA){
      $this->BLO_CATEGORIA = $BLO_CATEGORIA;
   }

   public function getBLO_AUTOR(){
      return $this->BLO_AUTOR;
   }

   public function setBLO_AUTOR($BLO_AUTOR){
      $this->BLO_AUTOR = $BLO_AUTOR;
   }

   public function getBLO_DATA(){
      return $this->BLO_DATA;
   }

   public function setBLO_DATA($BLO_DATA){
      $this->BLO_DATA = $BLO_DATA;
   }

   public function getBLO_P_TEXTO(){
      return $this->BLO_P_TEXTO;
   }

   public function setBLO_P_TEXTO($BLO_P_TEXTO){
      $this->BLO_P_TEXTO = $BLO_P_TEXTO;
   }

   public function getBLO_TEXTO(){
      return $this->BLO_TEXTO;
   }

   public function setBLO_TEXTO($BLO_TEXTO){
      $this->BLO_TEXTO = $BLO_TEXTO;
   }

   public function getBLO_VISIBILIT(){
      return $this->BLO_VISIBILIT;
   }

   public function setBLO_VISIBILIT($BLO_VISIBILIT){
      $this->BLO_VISIBILIT = $BLO_VISIBILIT;
   }

   public function getBLO_CLICKS(){
      return $this->BLO_CLICKS;
   }

   public function setBLO_CLICKS($BLO_CLICKS){
      $this->BLO_CLICKS = $BLO_CLICKS;
   }

   public function getBLO_VIEWS(){
      return $this->BLO_VIEWS;
   }

   public function setBLO_VIEWS($BLO_VIEWS){
      $this->BLO_VIEWS = $BLO_VIEWS;
   }

   public function getBLO_AVALIACOES(){
      return $this->BLO_AVALIACOES;
   }

   public function setBLO_AVALIACOES($BLO_AVALIACOES){
      $this->BLO_AVALIACOES = $BLO_AVALIACOES;
   }

   public function getBLO_IMAGEM(){
      return $this->BLO_IMAGEM;
   }

   public function setBLO_IMAGEM($BLO_IMAGEM){
      $this->BLO_IMAGEM = $BLO_IMAGEM;
   }

   public function getBLO_STATUS(){
      return $this->$BLO_STATUS;
   }

   public function setBLO_STATUS($BLO_STATUS){
      $this->BLO_STATUS = $BLO_STATUS;

   }

   public function listar_posts_ativos($LIMIT) {
      $lista_posts = array(); 
      try{
         $sql = "SELECT * FROM BLO WHERE BLO_STATUS = 1 AND BLO_VISIBILIT = 1 ORDER BY BLO_COD DESC $LIMIT;";
         $rs = $this->con->query($sql);
         
         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_posts[$i] = array(
               "BLO_COD" => $row->BLO_COD,
               "BLO_TITULO" => utf8_encode($row->BLO_TITULO),
               "BLO_AUTOR" => utf8_encode($row->BLO_AUTOR),
               "BLO_P_TEXTO" => utf8_encode($row->BLO_P_TEXTO),
               "BLO_SEO" => utf8_encode($row->BLO_SEO),
               "BLO_META_DESC" => utf8_encode($row->BLO_META_DESC),
               "BLO_FRASE_CHAVE" => utf8_encode($row->BLO_FRASE_CHAVE),
               "BLO_CATEGORIA" => utf8_encode($row->BLO_CATEGORIA),
               "BLO_IMAGEM" => $row->BLO_IMAGEM,
               "BLO_DATA" => date("d/m/Y",strtotime($row->BLO_DATA)),
               "BLO_VISIBILIT" => $row->BLO_VISIBILIT,
               "BLO_CLICKS" => $row->BLO_CLICKS
            );
            $i++;
         }
        return $lista_posts;
      } catch (PDOException $e){
         echo $e->getMessage();
         // return $lista_posts;
      }
   }

   public function buscar_dados_post($BLO_COD) {
      $lista_post; 
      try{
         $sql = "SELECT * FROM BLO WHERE BLO_COD = ".$BLO_COD;
         $rs = $this->con->query($sql);
         $row = $rs->fetch(PDO::FETCH_OBJ);
         $lista_post = array(
            "BLO_COD" => $row->BLO_COD,
            "BLO_TITULO" => utf8_encode($row->BLO_TITULO),
            "BLO_TEXTO" => utf8_encode($row->BLO_TEXTO),
            "BLO_AUTOR" => utf8_encode($row->BLO_AUTOR),
            "BLO_P_TEXTO" => utf8_encode($row->BLO_P_TEXTO),
            "BLO_SEO" => utf8_encode($row->BLO_SEO),
            "BLO_META_DESC" => utf8_encode($row->BLO_META_DESC),
            "BLO_FRASE_CHAVE" => utf8_encode($row->BLO_FRASE_CHAVE),
            "BLO_STATUS" => $row->BLO_STATUS,
            "BLO_CATEGORIA" => utf8_encode($row->BLO_CATEGORIA),
            "BLO_DATA" => date('d/m/Y', strtotime($row->BLO_DATA)),
            "BLO_IMAGEM" =>  utf8_encode($row->BLO_IMAGEM),
            "BLO_VISIBILIT" => $row->BLO_VISIBILIT,
            "BLO_CLICKS" => $row->BLO_CLICKS,
         );
        
         return $lista_post;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $lista_post;
      }
   }

   public function listar_clicks_post_por_id($BLO_COD) {
      $clicks_post = array(); 
      try{
         $i = 0;
         for($i = 0; $i < 7; $i++){
            $j = 0;
            $sql = "SELECT CLI_DAYCLICK FROM CLI WHERE CLI_BAN = $BLO_COD AND CLI_DAYCLICK = $i";
            $rs = $this->con->query($sql);
            $clicks_post[$i] = 0;
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
               $clicks_post[$i] = $j + 1;
               $j++;
            }
         }
         return $clicks_post;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $clicks_post;
      }
   }

   public function conta_posts() { 
      $conta_posts = 0;
      $total_posts = 0;
      $quant_posts;
      try{
         $sql = "SELECT BLO_CLICKS FROM BLO";
         $rs = $this->con->query($sql);
         while($row = $rs->fetch(PDO::FETCH_OBJ)){
            $conta_posts = $conta_posts + 1;
            $total_posts = $total_posts + $row->BLO_CLICKS;
         }
         $quant_posts = array(
            "qnt" => $conta_posts,
            "qnt_click" => $total_posts
         );
         return $quant_posts;
      } catch (PDOException $e){
         return $quant_posts;
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

   public function listar_clicks_mes_post_por_id($BLO_ID) {
      $clicks_post = array();
      $dias = date('t');
      $mesAno = date('Y-m-');
      try{
         $i = 1;
         for($i = 1; $i <= $dias; $i++){
            $j = 1;
            if($i < 10){
               $data = $mesAno.'0'.$i;
               $sql = "SELECT COUNT(CLI_COD) AS QNT FROM CLI WHERE CLI_CTA = $BLO_ID AND CLI_DTCLICK = '$data' AND CLI_TIPO = 'PST'";
            }else{
               $data = $mesAno.$i;
               $sql = "SELECT COUNT(CLI_COD) AS QNT FROM CLI WHERE CLI_CTA = $BLO_ID AND CLI_DTCLICK = '$data' AND CLI_TIPO = 'PST'";
            }
            $rs = $this->con->query($sql);
            $clicks_post[date('d/m/Y', strtotime($data))] = 0;
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
               $clicks_post[$i] = array(
                  "data" => date('d/m/Y', strtotime($data)),
                  "valor" => $row->QNT
               ); 
               $j++;
            }
         }
         return $clicks_post;
      } catch (PDOException $e){
         return $clicks_post;
      }
   }

   public function listar_posts_pag_prox($LIMIT, $BLO_ID) {
      $lista_post = array(); 
      try{
         $sql = "SELECT * FROM BLO WHERE BLO_STATUS = 1 AND BLO_COD < $BLO_ID ORDER BY BLO_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_post[$i] = array(
               "BLO_COD" => $row->BLO_COD,
               "BLO_TITULO" => utf8_encode($row->BLO_TITULO),
               "BLO_DATA" => date('d/m/Y', strtotime($row->BLO_DATA)),
               "BLO_VISIBILIT" => $row->BLO_VISIBILIT,
               "BLO_CLICKS" => $row->BLO_CLICKS,
            );
            $i++;
         }

         return $lista_post;
      } catch (PDOException $e){
         $e->getMessage();
         return $lista_post;
      }
   }

   public function listar_posts_pag_ante($LIMIT, $BLO_ID) {
      $lista_posts = array(); 
      $lista_posts_order = array(); 
      try{
         $sql = "SELECT * FROM BLO WHERE BLO_STATUS = 1 AND BLO_COD > $BLO_ID $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_posts[$i] = array(
               "BLO_COD" => $row->BLO_COD,
               "BLO_TITULO" => $row->BLO_TITULO,
               "BLO_DATA" => date("d/m/Y",strtotime($row->BLO_DATA)),
               "BLO_VISIBILIT" => $row->BLO_VISIBILIT,
               "BLO_CLICKS" => $row->BLO_CLICKS
            );
            $i++;
         }

         $o = 0;
         $i--;

         while ($o < count($lista_posts)) {
            $lista_posts_order[$o] = array(
               "BLO_COD" => $lista_posts[$i]['BLO_COD'],
               "BLO_TITULO" => $lista_posts[$i]['BLO_TITULO'],
               "BLO_DATA" => date("d/m/Y",strtotime($lista_posts[$i]['BLO_DATA'])),
               "BLO_VISIBILIT" => $lista_posts[$i]['BLO_VISIBILIT'],
               "BLO_CLICKS" => $lista_posts[$i]['BLO_CLICKS']
            );
            $o++;
            $i--;
         }

         return $lista_posts_order;
      } catch (PDOException $e){
         return $lista_posts;
      }
   }

   public function create() {
      try{
         $sql = "INSERT INTO `BLO`(`BLO_TITULO`, `BLO_CATEGORIA`, `BLO_AUTOR`, `BLO_DATA`, `BLO_P_TEXTO`, `BLO_TEXTO`, `BLO_VISIBILIT`, `BLO_CLICKS`, `BLO_IMAGEM`, `BLO_STATUS`)
          VALUES (:BLO_TITULO, :BLO_CATEGORIA, :BLO_AUTOR, :BLO_DATA, :BLO_P_TEXTO, :BLO_TEXTO, :BLO_VISIBILIT, :BLO_CLICKS, :BLO_IMAGEM, :BLO_STATUS)";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BLO_TITULO"       , $this->BLO_TITULO      , PDO::PARAM_STR);
         $sql->bindParam("BLO_CATEGORIA"    , $this->BLO_CATEGORIA   , PDO::PARAM_STR);
         $sql->bindParam("BLO_AUTOR"        , $this->BLO_AUTOR       , PDO::PARAM_STR);
         $sql->bindParam("BLO_DATA"         , $this->BLO_DATA        , PDO::PARAM_STR);
         $sql->bindParam("BLO_P_TEXTO"      , $this->BLO_P_TEXTO     , PDO::PARAM_STR);
         $sql->bindParam("BLO_TEXTO"        , $this->BLO_TEXTO       , PDO::PARAM_STR);
         $sql->bindParam("BLO_VISIBILIT"    , $this->BLO_VISIBILIT   , PDO::PARAM_STR);
         $sql->bindParam("BLO_CLICKS"       , $this->BLO_CLICKS      , PDO::PARAM_STR);
         $sql->bindParam("BLO_IMAGEM"       , $this->BLO_IMAGEM      , PDO::PARAM_STR);
         $sql->bindParam("BLO_STATUS"       , $this->BLO_STATUS      , PDO::PARAM_STR);

         if($sql->execute()){
            $this->BLO_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro do post realizado com Sucesso. Código do post: ".$this->BLO_COD, "codigo" => $this->BLO_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir Post.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro Post.");
      }  
   }

   public function update() {
      try{
         $sql = "UPDATE `BLO` SET 
         `BLO_TITULO`= :BLO_TITULO,`BLO_CATEGORIA`= :BLO_CATEGORIA,`BLO_AUTOR`= :BLO_AUTOR,`BLO_DATA`= :BLO_DATA,`BLO_P_TEXTO`=:BLO_P_TEXTO,`BLO_TEXTO`= :BLO_TEXTO,
         `BLO_VISIBILIT`= :BLO_VISIBILIT,`BLO_CLICKS`= :BLO_CLICKS,`BLO_VIEWS`= :BLO_VIEWS,`BLO_AVALIACOES`= :BLO_AVALIACOES, ";
               if(!is_null($this->BLO_IMAGEM)){
                  $sql .= "`BLO_IMAGEM` =  :BLO_IMAGEM,";
               }
         $sql .= "`BLO_STATUS`= :BLO_STATUS
                   WHERE BLO_COD = :BLO_COD;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BLO_TITULO"           , $this->BLO_TITULO           , PDO::PARAM_STR);
         $sql->bindParam("BLO_CATEGORIA"        , $this->BLO_CATEGORIA        , PDO::PARAM_STR);
         $sql->bindParam("BLO_AUTOR"            , $this->BLO_AUTOR            , PDO::PARAM_STR);
         $sql->bindParam("BLO_DATA"             , $this->BLO_DATA             , PDO::PARAM_STR);
         $sql->bindParam("BLO_P_TEXTO"          , $this->BLO_P_TEXTO          , PDO::PARAM_STR);
         $sql->bindParam("BLO_TEXTO"            , $this->BLO_TEXTO            , PDO::PARAM_STR);
         $sql->bindParam("BLO_VISIBILIT"        , $this->BLO_VISIBILIT        , PDO::PARAM_STR);
         $sql->bindParam("BLO_CLICKS"           , $this->BLO_CLICKS           , PDO::PARAM_STR);
         $sql->bindParam("BLO_VIEWS"            , $this->BLO_VIEWS            , PDO::PARAM_STR);
         $sql->bindParam("BLO_AVALIACOES"       , $this->BLO_AVALIACOES       , PDO::PARAM_STR);
         $sql->bindParam("BLO_STATUS"           , $this->BLO_STATUS           , PDO::PARAM_STR);
         $sql->bindParam("BLO_COD"              , $this->BLO_COD              , PDO::PARAM_STR);
         if(!is_null($this->BLO_IMAGEM)){
         $sql->bindParam("BLO_IMAGEM"           , $this->BLO_IMAGEM           , PDO::PARAM_STR);
         }
   

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Post atualizado com Sucesso. Código do Post: ".$this->BLO_COD, "codigo" => $this->BLO_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Post.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         echo $e->getLine();
         echo $e->getFile();
         return array("status" => 2, "mensagem" => "Erro no atualizar Post.");
      }  
   }

   public function delete() {
      try{
         $sql = "DELETE FROM `BLO` WHERE BLO_COD = :BLO_COD;";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BLO_COD"        , $this->BLO_COD      , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código do Post: ".$this->BLO_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar Post.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no deletar Post.");
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


   public function deletarPost() {
      try{
         $sql = "UPDATE `BLO` SET BLO_STATUS = :BLO_STATUS WHERE BLO_COD = :BLO_COD ";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("BLO_STATUS"        , $this->BLO_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("BLO_COD"           , $this->BLO_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Post deletado com Sucesso.", "codigo" => $this->BLO_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar Chamado.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no atualizar Chamado.");
      }  
   }

   public function buscar_posts($TEXTO){
      $lista_busca = array(); 
     try{
        $sql = "SELECT * FROM BLO WHERE BLO_STATUS = 1 AND (BLO_TITULO LIKE '%$TEXTO%' OR BLO_TEXTO LIKE '%$TEXTO%' ) ORDER BY BLO_COD DESC";
        $rs = $this->con->prepare($sql);
        $rs->execute();

        $i = 0;
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
           $lista_busca[$i] = array(
            "BLO_COD" => $row->BLO_COD,
            "BLO_TITULO" => utf8_encode($row->BLO_TITULO),
            "BLO_AUTOR" => utf8_encode($row->BLO_AUTOR),
            "BLO_P_TEXTO" => utf8_encode($row->BLO_P_TEXTO),
            "BLO_CATEGORIA" => utf8_encode($row->BLO_CATEGORIA),
            "BLO_IMAGEM" => $row->BLO_IMAGEM,
            "BLO_DATA" => date("d/m/Y",strtotime($row->BLO_DATA))
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