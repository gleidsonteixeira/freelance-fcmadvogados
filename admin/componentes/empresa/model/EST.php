<?php                                                                                                      
class EST{        

   private $con;                                                                                   
   private $EST_COD;
   private $EST_NOME;
   private $EST_UF;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getEST_COD() {
      return $this->EST_COD;
   }
 
   public function setEST_COD($EST_COD) {
      $this->EST_COD = $EST_COD;
   }
 
   public function getEST_NOME() {
      return $this->EST_NOME;
   }
 
   public function setEST_NOME($EST_NOME) {
      $this->EST_NOME = $EST_NOME;
   }
 
   public function getEST_UF() {
      return $this->EST_UF;
   }
 
   public function setEST_UF($EST_UF) {
      $this->EST_UF = $EST_UF;
   }
    
   public function listar() {
      try{
         $array = array(); 
         $lista = array(); 

         $sql = "SELECT * FROM EST ORDER BY EST_NOME ASC;";

         $sql = $this->con->prepare($sql);
         $sql->execute();

         $i = 0;
         while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $lista = array(
               'EST_NOME' => utf8_encode($row->EST_NOME),
               'EST_COD' => $row->EST_COD
            );

            $array[$i] = $lista;
            $i++;
         }
         return $array;
      } catch (PDOException $e){
         return null;
      }
   }

}                                                                                                        
?>                                                                                                         