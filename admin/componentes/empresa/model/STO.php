<?php                                                                                                      
class STO{        

   private $con;                                                                      
   private $STO_COD;
   private $STO_NOME;
   private $STO_STATUS;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getSTO_COD() {
      return $this->STO_COD;
   }
 
   public function setSTO_COD($STO_COD) {
      $this->STO_COD = $STO_COD;
   }
 
   public function getSTO_NOME() {
      return $this->STO_NOME;
   }
 
   public function setSTO_NOME($STO_NOME) {
      $this->STO_NOME = $STO_NOME;
   }
 
   public function getSTO_STATUS() {
      return $this->STO_STATUS;
   }
 
   public function setSTO_STATUS($STO_STATUS) {
      $this->STO_STATUS = $STO_STATUS;
   }
 
   public function listar_setor_ativos() {
      $lista_setor = array(); 
      try{
         $sql = "SELECT * FROM STO WHERE STO_STATUS = 1 ORDER BY STO_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_setor[$i] = array(
               "STO_COD" => $row->STO_COD,
               "STO_NOME" => utf8_encode($row->STO_NOME)
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