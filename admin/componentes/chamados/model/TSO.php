<?php                                                                                                      
class TSO{        

   private $con;                                                                      
   private $TSO_COD;
   private $TSO_NOME;
   private $TSO_STATUS;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getTSO_COD() {
      return $this->TSO_COD;
   }
 
   public function setTSO_COD($TSO_COD) {
      $this->TSO_COD = $TSO_COD;
   }
 
   public function getTSO_NOME() {
      return $this->TSO_NOME;
   }
 
   public function setTSO_NOME($TSO_NOME) {
      $this->TSO_NOME = $TSO_NOME;
   }
 
   public function getTSO_STATUS() {
      return $this->TSO_STATUS;
   }
 
   public function setTSO_STATUS($TSO_STATUS) {
      $this->TSO_STATUS = $TSO_STATUS;
   }
 
   public function listar_tipo_solicitacao_ativos() {
      $lista_setor = array(); 
      try{
         $sql = "SELECT * FROM TSO WHERE TSO_STATUS = 1 ORDER BY TSO_COD DESC";
         $rs = $this->con->prepare($sql);
         $rs->execute();

         $i = 0;
         while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $lista_setor[$i] = array(
               "TSO_COD" => $row->TSO_COD,
               "TSO_NOME" => utf8_encode($row->TSO_NOME)
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