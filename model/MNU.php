<?php                                                                                                      
class MNU{   

   private $con;                                                                            
   private $MNU_COD;
   private $MNU_NOME;
   private $MNU_COMPONENTE;
   private $MNU_STATUS;
   private $MNU_TIPO;
   private $MNU_DTCAD;
   private $MNU_HRCAD;
   private $MNU_USUCAD;
   private $MNU_DTEDIT;
   private $MNU_HREDIT;
   private $MNU_USUEDIT;
   private $MNU_CTM;
   private $MNU_ORDER;

   function __construct(){
      $conexao = new Conexao();
      $this->con = $conexao->conectar();
   }

   public function getMNU_COD() {
      return $this->MNU_COD;
   }
 
   public function setMNU_COD($MNU_COD) {
      $this->MNU_COD = $MNU_COD;
   }
 
   public function getMNU_NOME() {
      return $this->MNU_NOME;
   }
 
   public function setMNU_NOME($MNU_NOME) {
      $this->MNU_NOME = $MNU_NOME;
   }
 
   public function getMNU_COMPONENTE() {
      return $this->MNU_COMPONENTE;
   }
 
   public function setMNU_COMPONENTE($MNU_COMPONENTE) {
      $this->MNU_COMPONENTE = $MNU_COMPONENTE;
   }
 
   public function getMNU_STATUS() {
      return $this->MNU_STATUS;
   }
 
   public function setMNU_STATUS($MNU_STATUS) {
      $this->MNU_STATUS = $MNU_STATUS;
   }
 
   public function getMNU_TIPO() {
      return $this->MNU_TIPO;
   }
 
   public function setMNU_TIPO($MNU_TIPO) {
      $this->MNU_TIPO = $MNU_TIPO;
   }
 
   public function getMNU_DTCAD() {
      return $this->MNU_DTCAD;
   }
 
   public function setMNU_DTCAD($MNU_DTCAD) {
      $this->MNU_DTCAD = $MNU_DTCAD;
   }
 
   public function getMNU_HRCAD() {
      return $this->MNU_HRCAD;
   }
 
   public function setMNU_HRCAD($MNU_HRCAD) {
      $this->MNU_HRCAD = $MNU_HRCAD;
   }
 
   public function getMNU_USUCAD() {
      return $this->MNU_USUCAD;
   }
 
   public function setMNU_USUCAD($MNU_USUCAD) {
      $this->MNU_USUCAD = $MNU_USUCAD;
   }
 
   public function getMNU_DTEDIT() {
      return $this->MNU_DTEDIT;
   }
 
   public function setMNU_DTEDIT($MNU_DTEDIT) {
      $this->MNU_DTEDIT = $MNU_DTEDIT;
   }
 
   public function getMNU_HREDIT() {
      return $this->MNU_HREDIT;
   }
 
   public function setMNU_HREDIT($MNU_HREDIT) {
      $this->MNU_HREDIT = $MNU_HREDIT;
   }
 
   public function getMNU_USUEDIT() {
      return $this->MNU_USUEDIT;
   }
 
   public function setMNU_USUEDIT($MNU_USUEDIT) {
      $this->MNU_USUEDIT = $MNU_USUEDIT;
   }
 
   public function getMNU_CTM() {
      return $this->MNU_CTM;
   }
 
   public function setMNU_CTM($MNU_CTM) {
      $this->MNU_CTM = $MNU_CTM;
   }
 
   public function getMNU_ORDER() {
      return $this->MNU_ORDER;
   }
 
   public function setMNU_ORDER($MNU_ORDER) {
      $this->MNU_ORDER = $MNU_ORDER;
   }
 
   public function listar_menu_admin($TIPO_USUARIO, $COD_USUARIO) {
      $array = array(); 
      $lista_cat_menu = array(); 
      $lista_menu = array(); 
      try{
         $path = "componentes/";
         
         if ($TIPO_USUARIO == "DEV") {
            $sql = "SELECT * FROM CTM WHERE CTM_STATUS = 1 AND CTM_TIPO = 'ADM' ORDER BY CTM_ORDER;";
            $rs_ctm = $this->con->prepare($sql);
            $rs_ctm->execute();

            $i = 0;
            while ($row_ctm = $rs_ctm->fetch(PDO::FETCH_OBJ)) {
               $lista_cat_menu[$i] = array(
                  "CTM_COD" => $row_ctm->CTM_COD,
                  "CTM_NOME" => utf8_encode($row_ctm->CTM_NOME),
                  "CTM_COMPONENTE" => $path.utf8_encode($row_ctm->CTM_COMPONENTE)
               );
               $i++;
            }

            $sql = "SELECT * FROM MNU WHERE MNU_STATUS = 1 AND MNU_TIPO = 'ADM' ORDER BY MNU_CTM, MNU_ORDER;";
            $rs_mnu = $this->con->prepare($sql);
            $rs_mnu->execute();

            $o = 0;
            while ($row_mnu = $rs_mnu->fetch(PDO::FETCH_OBJ)) {
               $lista_menu[$o] = array(
                  "MNU_COD" => $row_mnu->MNU_COD,
                  "MNU_CTM" => $row_mnu->MNU_CTM,
                  "MNU_NOME" => utf8_encode($row_mnu->MNU_NOME),
                  "MNU_COMPONENTE" => $path.utf8_encode($row_mnu->MNU_COMPONENTE)
               );

               $o++;
            }

            $array = array("LISTA_CAT_MENU" => $lista_cat_menu, "LISTA_MENU" => $lista_menu);
         }else if ($TIPO_USUARIO == "FUN" || $TIPO_USUARIO == "ADM" || $TIPO_USUARIO == "COR") {
            $sql = "SELECT CTM.* FROM MUS, CTM WHERE MUS.MUS_USU = $COD_USUARIO AND MUS.MUS_CTM = CTM.CTM_COD AND CTM.CTM_TIPO = 'ADM' GROUP BY MUS.MUS_CTM ORDER BY CTM_ORDER;";
            $rs_mus = $this->con->prepare($sql);
            $rs_mus->execute();

            $i = 0;
            while ($row_mus = $rs_mus->fetch(PDO::FETCH_OBJ)) {
               $lista_cat_menu[$i] = array(
                  "CTM_COD" => $row_mus->CTM_COD,
                  "CTM_NOME" => utf8_encode($row_mus->CTM_NOME),
                  "CTM_COMPONENTE" => $path.utf8_encode($row_mus->CTM_COMPONENTE)
               );
               $i++;
            }

            $sql = "SELECT MNU.* FROM MUS, MNU WHERE MUS.MUS_MNU = MNU.MNU_COD AND MNU.MNU_STATUS = 1 AND MUS.MUS_USU = $COD_USUARIO ORDER BY MNU_CTM, MNU_ORDER;";
            $rs_mnu = $this->con->prepare($sql);
            $rs_mnu->execute();

            $o = 0;
            while ($row_mnu = $rs_mnu->fetch(PDO::FETCH_OBJ)) {
               $lista_menu[$o] = array(
                  "MNU_COD" => $row_mnu->MNU_COD,
                  "MNU_CTM" => $row_mnu->MNU_CTM,
                  "MNU_NOME" => utf8_encode($row_mnu->MNU_NOME),
                  "MNU_COMPONENTE" => $path.utf8_encode($row_mnu->MNU_COMPONENTE)
               );

               $o++;
            }

            $array = array("LISTA_CAT_MENU" => $lista_cat_menu, "LISTA_MENU" => $lista_menu);
         }else if ($TIPO_USUARIO == "CLI") {
            $sql = "SELECT CTM.* FROM MUS, CTM WHERE MUS.MUS_USU = $COD_USUARIO AND MUS.MUS_CTM = CTM.CTM_COD GROUP BY MUS.MUS_CTM ORDER BY CTM_ORDER;";
            $rs_mus = $this->con->prepare($sql);
            $rs_mus->execute();

            $i = 0;
            while ($row_mus = $rs_mus->fetch(PDO::FETCH_OBJ)) {
               $lista_cat_menu[$i] = array(
                  "CTM_COD" => $row_mus->CTM_COD,
                  "CTM_NOME" => utf8_encode($row_mus->CTM_NOME),
                  "CTM_COMPONENTE" => $path.utf8_encode($row_mus->CTM_COMPONENTE)
               );
               $i++;
            }

            $sql = "SELECT MNU.* FROM MUS, MNU WHERE MUS.MUS_MNU = MNU.MNU_COD AND MNU.MNU_STATUS = 1 AND MUS.MUS_USU = $COD_USUARIO ORDER BY MNU_CTM, MNU_ORDER;";
            $rs_mnu = $this->con->prepare($sql);
            $rs_mnu->execute();

            $o = 0;
            while ($row_mnu = $rs_mnu->fetch(PDO::FETCH_OBJ)) {
               $lista_menu[$o] = array(
                  "MNU_COD" => $row_mnu->MNU_COD,
                  "MNU_CTM" => $row_mnu->MNU_CTM,
                  "MNU_NOME" => utf8_encode($row_mnu->MNU_NOME),
                  "MNU_COMPONENTE" => $path.utf8_encode($row_mnu->MNU_COMPONENTE)
               );

               $o++;
            }

            $array = array("LISTA_CAT_MENU" => $lista_cat_menu, "LISTA_MENU" => $lista_menu);
         }

         return $array;
      } catch (PDOException $e){
         return $array;
      }
   }
}                                                                                                        
?>                                                                                                         