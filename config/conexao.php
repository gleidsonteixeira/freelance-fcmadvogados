<?php             
date_default_timezone_set('America/Sao_Paulo');                                                                                   
class Conexao {                                                                                            
	public function conectar() {                                                                            
		try {                                                                            //objetiveti2019                   
			//$conexao = new PDO("mysql:144.217.173.220;dbname=kebragal_pombocriativo", "kebragal_b_user", "a1s2d3A!S@D#");
			$conexao = new PDO("mysql:host=144.217.173.220;dbname=kebragal_pombocriativo", "kebragal_b_user", "a1s2d3A!S@D#");
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                              
		} catch (PDOException $e) {                                                                         
			echo "Erro: " . $e->getMessage();                                                               
		}                                                                                                   
		return $conexao;                                                                                    
	}                                                                                                       
}                                                                                                          
?>                                                                                 