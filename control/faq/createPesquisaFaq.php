<?php 
    include("../../config/conexao.php");
    include("../../model/PSQ.php");

    if (isset($_POST['ACAO'])) {
    	if (!empty($_POST['ACAO']) && $_POST['ACAO'] == "CREATE PESQUISA"){
    		$termo = utf8_decode($_POST['faqbusca']);
    		$tipo = utf8_decode($_POST['tipo']);
    		$pesquisa = new PSQ();
    		$pesquisa->setPSQ_TERMOS($termo);
    		$pesquisa->setPSQ_ORIGEM($tipo);
    		$pesquisa->setPSQ_DTEMISSAO(date("Y-m-d"));
            $pesquisa->setPSQ_HREMISSAO(date("H:i:s"));
    		$lista_pesquisa = $pesquisa->inserirPesquisa();


	    	$retorno = array("status" => 2, "mensagem" => "Cadastro efetuado com sucesso", "lista_pesquisa" => $lista_pesquisa );
	    	echo json_encode($retorno);

    		
    	}else{
	    	$retorno = array("status" => 2, "mensagem" => "Verifique os parametros enviados");
	    	echo json_encode($retorno);
    	}

    }else{
    	$retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
    	echo json_encode($retorno);
    }

 ?>