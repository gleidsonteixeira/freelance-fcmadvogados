<?php
	include("../config/conexao.php");
	include("../model/MNU.php");
	session_start();

	if(!isset($_SESSION["A_USU_COD"])){
		session_destroy();
		echo "<script>window.location.href='../login.php';</script>";
	}
	$conexao = new Conexao();
    $con = $conexao->conectar(); 

	$menu = new MNU();
    $mnu = $menu->listar_menu_admin($_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Objetive TI</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="expires" content="Tue, 01 Jan 2019 12:12:12 GMT">
    <meta http-equiv="cache-control" content="public" />
    <meta http-equiv="Pragma" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content="Gleidson Teixeira, g.teixeira@objetiveti.com.br"/>
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-br" />
    <meta name=theme-color content="#7b1fa2">
    <meta name=msapplication-navbutton-color content="#7b1fa2">
    <meta name=apple-mobile-web-app-status-bar-style content="#7b1fa2">

    <link rel="canonical" href="" />
    <link rel="shortlink" href="" />
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald:400,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/materialize.css" type="text/css"/>
	<link rel="stylesheet" href="../css/materialize.css" type="text/css"/>
	<link rel="stylesheet" href="../css/jquery-ui.css" type="text/css"/>
	<link rel="stylesheet" href="../css/admin-extras.css" type="text/css"/>
    <link rel="stylesheet" href="../css/default.css" type="text/css"/>
    <link rel="icon" href="../img/favicon.png" sizes="32x32" />
    <link rel="icon" href="../img/favicon.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="../img/favicon.png" />
</head>
<body>
	<div class="menu">
		<div class="logo">
			<!-- <img src="../img/logo-grande.png"> -->
			<img src="../img/iconograma.png">
			<h2 class="font">Objetive <sup>TI</sup></h2>
		</div>
		<ul class="nm">
			<?php 
				$menu_inicial = "";
				$menu_categoria = "";

				$i = 0;
				while (count($mnu["LISTA_CAT_MENU"]) > $i) {
					$row_ctm = $mnu["LISTA_CAT_MENU"][$i];
					if(is_dir($row_ctm["CTM_COMPONENTE"])){
						
						if (count($mnu["LISTA_MENU"]) > 0) {
							$o = 0;
							while (count($mnu["LISTA_MENU"]) > $o) {
								$row_mnu = $mnu["LISTA_MENU"][$o];
								if(is_dir($row_mnu["MNU_COMPONENTE"]) && $row_mnu["MNU_CTM"] == $row_ctm["CTM_COD"]){
									$menu_categoria = $mnu["LISTA_MENU"][$o]["MNU_COMPONENTE"];
									break;
								}
								$o++;
							}
							
							if($i == 0){$menu_inicial = $menu_categoria;}
						}else{
							if($i == 0){$menu_inicial = $row_ctm["CTM_COMPONENTE"];}
						}
			?>
						<li>
							<h6 class="mini-title upper click truncate" onClick='carregarConteudo("<?php echo $menu_categoria;?>")'><?php echo $row_ctm["CTM_NOME"]; ?></h6>
							<ul>
						<?php 
							$o = 0;
							while (count($mnu["LISTA_MENU"]) > $o) {
								$row_mnu = $mnu["LISTA_MENU"][$o];
								if(is_dir($row_mnu["MNU_COMPONENTE"]) && $row_mnu["MNU_CTM"] == $row_ctm["CTM_COD"]){
						?>
									<li>
										<h6 class="mini-title upper click truncate" onClick='carregarConteudo("<?php echo $row_mnu["MNU_COMPONENTE"];?>")'><?php echo $row_mnu["MNU_NOME"]; ?></h6>
									</li>
						<?php
								}
								$o++;
							}
						?>
							</ul>
						</li>
			<?php
					}
					$i++;
				}
			?>
			<input type="hidden" name="menu_inicial_load" id="menu_inicial_load" value="<?php echo $menu_inicial; ?>">
		</ul>
		<div class="sair mini-title upper click suave" onclick="deslogar();">sair <i class="fa fa-sign-out-alt right suave"></i></div>
	</div>

	<!-- CONTEUDO -->
	<header id="topo">
		<div class="opcoes">
			<i class="fa fa-bell click abrir-notificacoes"></i>
			<i class="fa fa-user click abrir-perfil"></i>
		</div>
	</header>

	<!-- CONTEUDO -->
	<main id="principal"></main>
	
	<!-- NOTIFICAÇÕES -->
	<div id="notificacoes" class="suave gaveta">
		<div class="fechar-gaveta"></div>
		<div class="content suave">
			<h5 class="suave condesed">Notificações <i class="material-icons right click suave">close</i></h5>
		</div>
	</div>

	<!-- PERFIL -->
	<div id="perfil" class="suave gaveta">
		<div class="fechar-gaveta"></div>
		<div class="content suave">
			<h5 class="suave condesed">Perfil <i class="material-icons right click suave">close</i></h5>
			<div class="form-content">
				<form>
					<h6 class="mini-title upper">nome</h6>
					<p>Gleidson Teixeira</p>
					<input class="edite-perfil" type="text" value="Gleidson Teixeira" required>
					<h6 class="mini-title upper">email</h6>
					<p>g.teixeira@objetiveti.com.br</p>
					<input class="edite-perfil" type="email" value="g.teixeira@objetiveti.com.br" required>
					<h6 class="mini-title upper">empresa</h6>
					<p>Objetive TI</p>
					<div class="edite-perfil">
						<h6 class="mini-title upper">senha</h6>
						<input type="password" value="0000000" required>
					</div>
					<div class="clear"></div>
					<div class="ativar-edicao mini-title upper white-text suave click cta">editar perfil</div>
					<button type="submit" class="mini-title upper white-text suave click cta right">confirmar</button>
				</form>
			</div>
		</div>
	</div>
	
	<!-- ALERTAS -->
	<div id="alerta" class="suave">
		<i class="fa fa-exclamation-circle icon suave"></i>
		<p class="white-text suave">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		<div class="opcoes right-align suave hide">
			<button class="mini-title upper green accent-3 white-text confirmar"><i class="fa fa-check"></i>sim</button>
			<button class="mini-title upper red white-text cancelar"><i class="fa fa-times"></i>não</button>
		</div>
    </div>

	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/jquery.mask.js"></script>
	<script src="../js/default.js"></script>
	<script src="../js/chart.js"></script>
	<?php
		$path = "componentes/";
		$diretorio = dir($path);
		
		while($pastas = $diretorio->read()){
			if($pastas != "." && $pastas != ".."){
				echo '<script src="'.$path.$pastas.'/js/component.js"></script>';
			}
		}

		$diretorio->close();
	?>
	<script>
		//var menu_inicial = $("#menu_inicial_load").val();
		menu_inicial = "componentes/projetos";
		
		//CARREGA O CONTEÚDO DO MENU INICIO
		$("#principal").load(menu_inicial + "/view/index.php", function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success"){
			
			}
			if(statusTxt == "error"){
				//criaAlerta("Erro: " + xhr.status + ": " + xhr.statusText);
			}
		});
		$(".abrir-notificacoes").click(function(){
			$("#notificacoes, #notificacoes .content").addClass("active");
		});
		$(".ativar-edicao").click(function(){
			$("#perfil .edite-perfil").toggle("fast");
		});
		$(".abrir-perfil").click(function(){
			$("#perfil, #perfil .content").addClass("active");
		});
		$(".gaveta h5 i, .fechar-gaveta").click(function(){
			$(".gaveta, .gaveta .content").removeClass("active");
		});
		
	</script>
</body>
</html>