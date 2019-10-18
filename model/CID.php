<?php                                                                                                      
class CID{                                                                                     
   private $CID_COD;
   private $CID_NOME;
   private $CID_EST;

   public function getCID_COD() {
      return $this->CID_COD;
   }
 
   public function setCID_COD($CID_COD) {
      $this->CID_COD = $CID_COD;
   }
 
   public function getCID_NOME() {
      return $this->CID_NOME;
   }
 
   public function setCID_NOME($CID_NOME) {
      $this->CID_NOME = $CID_NOME;
   }
 
   public function getCID_EST() {
      return $this->CID_EST;
   }
 
   public function setCID_EST($CID_EST) {
      $this->CID_EST = $CID_EST;
   }
 
   public function listar($CID_EST) {
      try{

         $conexao = new Conexao();
         $con = $conexao->conectar(); 

         $array = array(); 
         $lista = array(); 

         $sql = "SELECT * FROM CID WHERE CID_EST = :CID_EST ORDER BY CID_NOME ASC;";

         $sql = $con->prepare($sql);
         $sql->bindParam("CID_EST"   , $CID_EST      , PDO::PARAM_STR);
         $sql->execute();

         $i = 0;
         while ($row = $sql->fetch(PDO::FETCH_OBJ)) {

            $lista = array(
               'CID_NOME' => utf8_encode($row->CID_NOME),
               'CID_COD' => $row->CID_COD
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