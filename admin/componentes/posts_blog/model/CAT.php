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

   public function listar_categorias_ativas() {
      $lista_cat = array(); 
      try{
         $sql = "SELECT * FROM CAT WHERE CAT_STATUS = 1 ORDER BY CAT_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_cat[$i] = array(
               "CAT_COD" => $row->CAT_COD,
               "CAT_NOME" => utf8_encode($row->CAT_NOME)
      
               );
               $i++;
            }

         return $lista_cat;
         } catch (PDOException $e){
            $e->getMessage();
            return $lista_cat;
         }
      }

}

 ?>