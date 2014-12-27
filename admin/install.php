<?php

?>
<!DOCTYPE html>
<html lang="pt-BR" class="no-js">
	<head>
		<meta charset="utf-8">
		
		<!-- Tag de Verificação do Google Webmaster Tools -->
		<meta name="google-site-verification" content="ZEseyYmdWk9ZgV5UfshjMEVBj8QxjC_teMEc8V2SR9A" />

		<meta name="description" content="Instalação do IS Simple">
		<meta name="generator" content="Ignus Studios">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<title>Instalação do IS Simple</title>
		
		<!-- Fontes -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:700,400,400italic,700italic' rel='stylesheet' type='text/css'>

		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/grid.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/admin.css">

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/grid.js"></script>
        <script type="text/javascript" src="js/modernizr.js"></script>
		<script type="text/javascript" src="js/geral.js"></script>
	
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="img/icons/favicon.ico">
		<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
	</head>
	<body>
		<div id="grid" style="display: none;"><div class="conteiner"></div></div>
		<header id="header">
            <section id="header-conteiner" class="conteiner">
				<div class="linha">
					
					<div id="masthead-conteiner" class="col_12">
						<div id="logo-header" class="alignleft">
							<img src="img/is_logo.png" alt="IS Simple" />
						</div> <!-- #logo_header -->
						
						<hgroup id="masthead">
							<h1 id="site-title">Instalação do IS Simple</h1>
							<h2 id="site-description" class="sub-title">Preencha o seguinte formulário para completar a instalação do framework corretamente.</h2>
						</hgroup> <!-- #masthead -->
					</div>
					
				</div>
			</section> <!-- #header-conteiner -->
		</header> <!-- #header -->
		<main id="main">
			<article>
		        <div class="content-site conteiner">
		            <div class="inner">
		                <header class="header">
		                    <h3>Configurações do site</h3>
		                </header>
		                <div class="content">
		                	<p>Diversas funcionalidades do <b>Is Simple</b> dependem de algumas pequenas configurações. Para que o seu site funcione corretamente, preparamos esse pequeno formulário para facilitar a instalação do framework.<br />
		                		Preencha atentamente cada um dos campos do formulário a baixo:</p>
							<form id="install-form" action="" method="post">
								<table>
									<tbody>
										<tr>
											<td><label for="site-name">Nome do site:</label></td>
											<td><input type="text" name="site_name" id="site-name" placeholder="MeuSite.com" pattern="[a-zA-Z0-9]{3,}" required="required"/></td>
											<td><span class="form-desc">O nome do seu site.</span></td>
										</tr>
										<tr>
											<td><label for="site-desc">Descrição do site:</label></td>
											<td><textarea name="site_desc" id="site-desc" placeholder="Breve descrição do site..." required="required"></textarea></td>
											<td><span class="form-desc">Uma breve descrição do seu site. Descreva em poucas palavras suas funções e objetivos.</span></td>
										</tr>
										<tr>
											<td><label for="admin-name">Administrador:</label></td>
											<td><input type="text" name="admin_name" id="admin-name" placeholder="admin" pattern=" pattern="[a-zA-Z0-9]{3,}" required="required" /></td>
											<td><span class="form-desc">O nome do usuário quem vai ser o administrador do site.</span></td>
										</tr>
										<tr>
											<td><label for="admin-mail">Admin email:</label></td>
											<td><input type="email" name="admin_mail" id="admin-mail" placeholder="admin@email.com" required="required" /></td>
											<td><span class="form-desc">O email de quem vai ser o administrador do site.</span></td>
										</tr>
										<tr>
											<td><label for="admin-pass">Senha:</label></td>
											<td><input type="password" name="admin_pass" id="admin-pass" placeholder="suasenha12345" pattern="[a-zA-Z0-9]{6,}" required="required" /></td>
											<td><span class="form-desc">A senha de acesso ao administrador do site.</span></td>
										</tr>
										<tr>
											<td><label for="admin-pass-2">Repita a senha:</label></td>
											<td><input type="password" name="admin_pass_2" id="admin-pass-2" placeholder="repita a senha anterior" pattern="[a-zA-Z0-9]{6,}" required="required" /></td>
											<td><span class="form-desc">Digite novamente a senha de acesso ao administrador do site.</span></td>
										</tr>
										<tr>
											<td></td>
											<td colspan="2"><input type="submit" name="submit-form" value="Enviar" id="submit-form"/></td>
										</tr>
									</tbody>
								</table>
							</form>
		                </div> <!-- /content -->
		            </div>
		        </div>
		    </article>
		</main>
		<footer id="footer">
			<div id="footer-inner" class="conteiner">
				<div class="inner">
					<div id="footer-text">
						<p>&copy; 2013-<?php echo date( 'Y' ); ?> | <a href="http://ignusstudios.com/" >Ignus Studios</a>. Todos os direitos reservados.</p>
					</div>
					<a id="footer-logo" href="http://ignusstudios.com/"><img src="img/footer_logo.png" alt="Ignus Studios" /></a>
				</div>
		</footer> <!-- #footer -->
	</body>
</html>