<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="{{ asset('js/index.js' )}}"></script>
		<title>Tabex</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul id="sidebar_menu" class="sidebar-nav">
					<li class="sidebar-brand"><a id="menu_toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
				</ul>

				<ul class="sidebar-nav" id="sidebar" style="display:none;">
					<li><a>Home</a></li>
					<li><a>Finanças</a></li>
					<li><a>Embarcações</a></li>
					<li><a>Configurações</a></li>
					<li><a>Usuários</a></li>
					<li><a>Gps</a></li>
					<li><a>Arquivos</a></li>
					<li><a>link2</a></li>
					<li><a>Contas</a></li>
					<li><a>Relatórios</a></li>
					<li><a>Terefas</a></li>
					<li><a>Database</a></li>
					<li><a>Código</a></li>
					<li><a>Transporte</a></li>
					<li><a>Grupos</a></li>
					<li><a>Download</a></li>
					<li><a>Custom</a></li>
					<li><a>Lock</a></li>
				</ul>

				<ul class="sidebar-nav" id="ulToggleDisabled">
					<li><a><span class="fas fa-home"></span></a></li>
					<li><a><span class="fas fa-chart-line"></span></a></li>
					<li><a><span class="fas fa-ship"></span></a></li>
					<li><a><span class="fas fa-cog"></span></a></li>
					<li><a><span class="fas fa-user-check"></span></a></li>
					<li><a><span class="fas fa-crosshairs"></span></a></li>
					<li><a><span class="fas fa-archive"></span></a></li>
					<li><a><span class="fas fa-dollar-sign"></span></a></li>
					<li><a><span class="fas fa-file-invoice-dollar"></span></a></li>
					<li><a><span class="fas fa-tasks"></span></a></li>
					<li><a><span class="fas fa-database"></span></a></li>
					<li><a><span class="fas fa-code"></span></a></li>
					<li><a><span class="fas fa-truck"></span></a></li>
					<li><a><span class="fas fa-chart-area"></span></a></li>
					<li><a><span class="fas fa-truck"></span></a></li>
					<li><a><span class="fas fa-users"></span></a></li>
					<li><a><span class="fas fa-cloud-download-alt"></span></a></li>
					<li><a><span class="fas fa-grin-beam-sweat"></span></a></li>
					<li><a><span class="fas fa-user-lock"></span></a></li>
				</ul>
			</div>
			<div class="row">
				<div id="header">
					<a id="menu_toggle_mobile" href="#" style="display:none;"><span id="main_icon_mobile" class="glyphicon glyphicon-align-justify"></span></a>
					<img src="{{ asset('images/logo.png') }}" alt="Logo tabex" width="100" height="60">
					<span class="fas fa-sign-out-alt"></span>
					<span class="fas fa-user-cog"></span>
					<span>Olá, Lu</span>
					<span class="fas fa-th-list"></span>
				</div>
			</div>
			<div id="page-content-wrapper">
				<div class="page-content inset">
					<div id="breadCrumb">
						<span class="fas fa-home"></span>
						<span class="chevron right"></span>
						<strong>Tabex</strong>
						<span class="chevron right"></span>
					</div>
					<div class="row" id="containerProduct">
						@yield('content')
					</div>
					{{ isset($produtos) ? $produtos->links() : '' }}
				</div>
			</div>
		</div>
	</body>
</html>
