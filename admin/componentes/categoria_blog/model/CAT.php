<?php                                                                                                      
class CAT{                 
   private $con;
   private $CAT_COD ; 
   private $CAT_NOME;
   private $CAT_POSTS;
   private $CAT_STATUS;


   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getCAT_COD(){
      return $this->CAT_COD;
   }

   public function setCAT_COD($CAT_COD){
      $this->CAT_COD = $CAT_COD;
   }

   public function getCAT_NOME(){
      return $this->CAT_NOME;
   }

   public function setCAT_NOME($CAT_NOME){
      $this->CAT_NOME = $CAT_NOME;
   }

   public function getCAT_POSTS(){
      return $this->CAT_POSTS;
   }

   public function setCAT_POSTS($CAT_POSTS){
      $this->CAT_POSTS = $CAT_POSTS;
   }
   public function getCAT_STATUS(){
      return $this->$CAT_STATUS;
   }
   public function setCAT_STATUS($CAT_STATUS){
      $this->CAT_STATUS = $CAT_STATUS;

   }
   public function listar_cat_ativos($limit) {
      $lista_cat = array(); 
      try{
         $sql = "SELECT * FROM CAT WHERE CAT_STATUS = 1 ORDER BY CAT_COD DESC $limit";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_cat[$i] = array(
               "CAT_COD" => $row->CAT_COD,
               "CAT_NOME" => utf8_encode($row->CAT_NOME),
               "CAT_POSTS" => $row->CAT_POSTS
      
            );
            $i++;
         }

         return $lista_cat;
      } catch (PDOException $e){
         return $lista_cat;
      }
   }

   public function listar_categoria_pag_prox($LIMIT, $CAT_COD) {
      $lista_cat = array(); 
      try{
         $sql = "SELECT * FROM CAT WHERE CAT_STATUS = 1 AND CAT_COD < $CAT_COD ORDER BY CAT_COD DESC $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_cat[$i] = array(
               "CAT_COD" => $row->CAT_COD,
               "CAT_NOME" => utf8_encode($row->CAT_NOME),
               "CAT_POSTS" => $row->CAT_POSTS
            );
            $i++;
         }

         return $lista_cat;
      } catch (PDOException $e){
         return $lista_cat;
      }
   }

   public function listar_categoria_pag_ante($LIMIT, $CAT_COD) {
      $lista_cat = array(); 
      $lista_cat_order = array(); 
      try{
         $sql = "SELECT * FROM CAT WHERE CAT_STATUS = 1 AND CAT_COD > $CAT_COD $LIMIT";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_cat[$i] = array(
               "CAT_COD" => $row->CAT_COD,
               "CAT_NOME" => utf8_encode($row->CAT_NOME),
               "CAT_POSTS" => $row->CAT_POSTS
            );
            $i++;
         }
         

         $o = 0;
         $i--;
         while ($o < count($lista_cat)) {
            $lista_cat_order[$o] = array(
               "CAT_COD" => $lista_cat[$i]['CAT_COD'],
               "CAT_NOME" => $lista_cat[$i]['CAT_NOME'],
               "CAT_POSTS" => $lista_cat[$i]['CAT_POSTS']
            );
            $o++;
            $i--;
         }

         return $lista_cat_order;
      } catch (PDOException $e){
         return $lista_cat;
      }
   }

   public function listar_dados_categoria($CAT_COD){
      $lista_cat = array(); 
      try{
         $sql = "SELECT * FROM CAT WHERE CAT_COD = $CAT_COD";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $row = $rs->fetch(PDO::FETCH_OBJ);
         $i = 0;
         $lista_cat[$i] = array(
            "CAT_COD" => $row->CAT_COD,
            "CAT_NOME" => utf8_encode($row->CAT_NOME)
         );
         
         return $lista_cat;
      } catch (PDOException $e){
         echo $e->getMessage();
         return $lista_cat;
      }
   }
   
   public function createCAT() {
      try{
         $sql = "INSERT INTO `CAT`(`CAT_NOME`, `CAT_STATUS`)
                           VALUES (:CAT_NOME, :CAT_STATUS)";

         $sql = $this->con->prepare($sql);   
         $sql->bindParam("CAT_NOME"         , $this->CAT_NOME      , PDO::PARAM_STR);
         $sql->bindParam("CAT_STATUS"         , $this->CAT_STATUS      , PDO::PARAM_STR);
       

         if($sql->execute()){
            $this->FAQ_COD = $this->con->lastInsertId();
            return array("status" => 0, "mensagem" => "Cadastro da categoria realizado com Sucesso. Código do Faq: ".$this->FAQ_COD, "codigo" => $this->FAQ_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao inserir categoria.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no cadastro da categoria .");
      }  
   }

   public function updateCAT() {
      try{
         $sql = "UPDATE `CAT` SET `CAT_NOME` = :CAT_NOME WHERE `CAT_COD` = :CAT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CAT_NOME"   , $this->CAT_NOME , PDO::PARAM_STR);
         $sql->bindParam("CAT_COD"    , $this->CAT_COD , PDO::PARAM_STR);       
        
         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Atualização da categoria realizado com Sucesso. Código da Categoria: ".$this->CAT_COD, "codigo" => $this->CAT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao atualizar categoria.");
         }
      } catch (PDOException $e){
         echo $e->getMessage();
         return array("status" => 2, "mensagem" => "Erro no atualizar categoria.");
      }  
   }

   public function deleteCategoria() {
      try{
         $sql = "UPDATE `CAT` SET `CAT_STATUS` = :CAT_STATUS WHERE `CAT_COD` = :CAT_COD";

         $sql = $this->con->prepare($sql);
         $sql->bindParam("CAT_STATUS"     , $this->CAT_STATUS        , PDO::PARAM_STR);
         $sql->bindParam("CAT_COD"        , $this->CAT_COD           , PDO::PARAM_STR);

         if($sql->execute()){
            return array("status" => 0, "mensagem" => "Deletado com Sucesso. Código da Categoria: ".$this->CAT_COD);
         }else{
            return array("status" => 1, "mensagem" => "Erro ao deletar o Categoria.");
         }
      } catch (PDOException $e){
         return array("status" => 2, "mensagem" => "Erro no deletar o Categoria.");
      }  
   }

   public function deletarPostsCategoria($CAT_COD){
      try {
         $sql = "UPDATE `BLO` SET `BLO_STATUS` = 2 WHERE `BLO_CATEGORIA` = $CAT_COD";
         $rs = $this->con->prepare($sql);
         $rs->execute();
         return array("status" => 0, "mensagem" => "Posts deletado com sucesso");
      } catch (PDOException $e) {
         echo "Error".$e->getMessage();
      }
   }

 }                                                                                                        
?>                                                                                                         