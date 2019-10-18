<?php                                                                                                      
class PRI{        

   private $con;                                                                      
   private $PRI_COD;
   private $PRI_NOME;
   private $PRI_STATUS;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getPRI_COD() {
      return $this->PRI_COD;
   }
 
   public function setPRI_COD($PRI_COD) {
      $this->PRI_COD = $PRI_COD;
   }
 
   public function getPRI_NOME() {
      return $this->PRI_NOME;
   }
 
   public function setPRI_NOME($PRI_NOME) {
      $this->PRI_NOME = $PRI_NOME;
   }
 
   public function getPRI_STATUS() {
      return $this->PRI_STATUS;
   }
 
   public function setPRI_STATUS($PRI_STATUS) {
      $this->PRI_STATUS = $PRI_STATUS;
   }
 
   public function listar_prioridade_ativos() {
      $lista_setor = array(); 
      try{
         $sql = "SELECT * FROM PRI WHERE PRI_STATUS = 1 ORDER BY PRI_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_setor[$i] = array(
               "PRI_COD" => $row->PRI_COD,
               "PRI_NOME" => utf8_encode($row->PRI_NOME)
            );
            $i++;
         }

         return $lista_setor;
      } catch (PDOException $e){
         return $lista_setor;
      }
   }
}                                                                                                        
?>                                                                                                         