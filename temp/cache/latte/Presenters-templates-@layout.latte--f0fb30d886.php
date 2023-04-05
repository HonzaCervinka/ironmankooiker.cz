<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/PanDeskovekModule/Presenters/templates/@layout.latte */
final class Templatef0fb30d886 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['scripts' => 'blockScripts'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */;
		echo '/css/bootstrap.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/css/style.css">
	 <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */;
		echo '/css/style_panDeskovek.css">
	<title>';
		if ($this->hasBlock("title")) /* line 9 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striphtml', $ʟ_fi, $s));
			}) /* line 9 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('scripts', get_defined_vars()) /* line 10 */;
		echo '
	</head>


</head>

<body>

	<header class="main-header">
	<!-- Navigacni lista -->
    <nav class="navbar bg-dark navbar-dark navbar-expand-lg sticky-top ">
        <a class="navbar-brand" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 31 */;
		echo '">Pán deskovek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link ';
		if ($this->global->uiPresenter->isLinkCurrent("Homepage:default")) {
			echo 'active';
		}
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 38 */;
		echo '">Souhrn</a></li>
				<li class="nav-item"><a class="nav-link ';
		if ($this->global->uiPresenter->isLinkCurrent("Statistic:default")) {
			echo 'active';
		}
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Statistic:default")) /* line 39 */;
		echo '">Statistiky</a></li>
';
		if ($user->isAllowed('PanDeskovek', 'addGame')) /* line 40 */ {
			echo '				<li class="nav-item"><a href="#kontakt" class="nav-link" data-toggle="modal" data-target="#addGameModal">Přidat hru</a></li>
';
		}
		if ($user->isAllowed('PanDeskovek', 'addGameNight')) /* line 43 */ {
			echo '				<li class="nav-item"><a href="#kontakt" class="nav-link" data-toggle="modal" data-target="#addGameNightModal">Přidat sezení</a></li>
';
		}
		echo '            </ul>
        </div>
		<div>
		';
		echo LR\Filters::escapeHtmlText($user->isLoggedIn() ? "{$user->getIdentity()->username} má práva {$user->getRoles()[0]}" : "Jsi tu jako host, můžeš se pouze dívat") /* line 49 */;
		echo '
			<div>
			<a class="" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("signOut")) /* line 51 */;
		echo '">Odhlasit se</a>
			</div>
		</div>	
    </nav>
';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 55 */ {
			echo '		<div';
			echo ($ʟ_tmp = array_filter(['center', 'alert', 'alert-' . $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 55 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 55 */;
			echo '</div>
';
			$iterations++;
		}
		echo '	</header>
';
		$this->renderBlock('content', [], 'html') /* line 57 */;
		echo '
	<!-- The Modal -->
	<div class="modal fade" id="addGameModal">
		<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		
			<!-- Modal Header -->
			<div class="modal-header">
			<h4 class="modal-title">Přidání hry</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
';
		/* line 72 */ $_tmp = $this->global->uiControl->getComponent("addGameForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '			</div>
			

			
		</div>
		</div>
	</div>

		<!-- The Modal -->
	<div class="modal fade" id="addGameNightModal">
		<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		
			<!-- Modal Header -->
			<div class="modal-header">
			<h4 class="modal-title">Pridat sezeni</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
';
		/* line 94 */ $_tmp = $this->global->uiControl->getComponent("addGameNightForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '			</div>
			
		</div>
		</div>
	</div>

</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '55'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block scripts} on line 10 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '		<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */;
		echo '/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<script src="https://kit.fontawesome.com/b654b84b10.js" crossorigin="anonymous"></script>
';
	}

}
