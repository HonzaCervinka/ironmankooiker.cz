<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/WebModule/Presenters/templates/@layout.latte */
final class Template8cbfb4bc9d extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['keywords' => 'blockKeywords', 'description' => 'blockDescription', 'title' => 'blockTitle', 'scripts' => 'blockScripts'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-RDVPLHZWLD"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments);}
        gtag(\'js\', new Date());
        
        gtag(\'config\', \'G-RDVPLHZWLD\');
	</script>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="keywords" content="';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('keywords', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'htmlAttr', $s);
		}) /* line 17 */;
		echo '">
	<meta name="description" content="';
		$this->renderBlock('description', get_defined_vars(), function ($s, $type) {
			$ʟ_fi = new LR\FilterInfo($type);
			return LR\Filters::convertTo($ʟ_fi, 'htmlAttr', $s);
		}) /* line 18 */;
		echo '">
	<title>';
		$this->renderBlock('title', get_defined_vars()) /* line 19 */;
		echo '</title>

    <link rel="shortcut icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 21 */;
		echo '/img/ironman_logo.ico">
    <!-- Bootstrap 4.5 CSS -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 23 */;
		echo '/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 25 */;
		echo '/css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- Lihtbox -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 29 */;
		echo '/css/lightbox.min.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 30 */;
		echo '/css/style_web.css">

</head>

<body>
    <!-- hlavicka -->
    <div class="top-bar">
    </div>

	    <!-- Navigacni lista -->
    <nav class="navbar bg-light navbar-light navbar-expand-lg sticky-top ">
        <div class="container">

            <a class="navbar-brand" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 43 */;
		echo '"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 43 */;
		echo '/img/logo.png" alt="Logo" title="Ironman"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link ';
		if ($this->global->uiPresenter->isLinkCurrent("Homepage:default")) {
			echo 'active';
		}
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 51 */;
		echo '">O Irym</a></li>
                    <li class="nav-item"><a class="nav-link ';
		if ($this->global->uiPresenter->isLinkCurrent("Informace:default")) {
			echo 'active';
		}
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Informace:default")) /* line 52 */;
		echo '">Informace</a></li>
                    <li class="nav-item"><a class="nav-link ';
		if ($this->global->uiPresenter->isLinkCurrent("Cestovani:default")) {
			echo 'active';
		}
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Cestovani:default")) /* line 53 */;
		echo '">Cestování se psem</a></li>
                    <li class="nav-item"><a class="nav-link ';
		if ($this->global->uiPresenter->isLinkCurrent("Fotogalerie:default")) {
			echo 'active';
		}
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Fotogalerie:default")) /* line 54 */;
		echo '">Fotky</a></li>
                    <li class="nav-item"><a href="#kontakt" class="nav-link">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>

';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 61 */ {
			echo '	<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 61 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 61 */;
			echo '</div>
';
			$iterations++;
		}
		echo '	
';
		$this->renderBlock('content', [], 'html') /* line 63 */;
		echo '
	<footer>
        <div class="container">
            <div class="row text-light text-center py-4 justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 69 */;
		echo '/img/logo.png" alt="">
                    <hr class="bg-light">
                    <h5 id="kontakt">Kontaktujte nás</h5>
                    <hr class="bg-light">
                    <p>+420 736 531 603</p>
                    <p>+420 737 033 040</p>
                    <p><a href="mailto:+veronika.gecova@gmail.com">veronika.gecova@gmail.com</a></p>
                    <p><a href="mailto:+cervinka.j92@gmail.com">cervinka.j92@gmail.com</a></p>
                    <ul class="social pt-3">
                        <li><a href="https://www.facebook.com/jan.cervinka.75/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Start Socket -->
    <div class="socket text-light text-center py-3">
        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Homepage:default")) /* line 88 */;
		echo '">&copy; Jan Červinka</a>
    </div>

';
		$this->renderBlock('scripts', get_defined_vars()) /* line 91 */;
		echo '
</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '61'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block keywords} on line 17 */
	public function blockKeywords(array $ʟ_args): void
	{
		
	}


	/** {block description} on line 18 */
	public function blockDescription(array $ʟ_args): void
	{
		
	}


	/** {block title} on line 19 */
	public function blockTitle(array $ʟ_args): void
	{
		
	}


	/** {block scripts} on line 91 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
	    <!-- jQuery -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 94 */;
		echo '/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 4.5 JS -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 96 */;
		echo '/js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 98 */;
		echo '/js/popper.min.js"></script>
    <!-- Font Awesome -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 100 */;
		echo '/js/all.min.js"></script>
    	<!-- Lihtbox -->
	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 102 */;
		echo '/js/lightbox.min.js"></script>
';
	}

}
