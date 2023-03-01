<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/BlogModule/Presenters/templates/@layout.latte */
final class Templated42899cf6c extends Latte\Runtime\Template
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
		echo '/css/style_blog.css">
	<title>';
		if ($this->hasBlock("title")) /* line 8 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striphtml', $ʟ_fi, $s));
			}) /* line 8 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('scripts', get_defined_vars()) /* line 9 */;
		echo '
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-2">
				';
		$this->renderBlock('mainBtnLocation', [], 'html') /* line 23 */;
		echo '<i class="';
		$this->renderBlock('mainBtn', [], 'htmlAttr') /* line 23 */;
		echo '"></i></a>
			</div>
			<h1 class="mainText col-6">';
		$this->renderBlock('mainTitle', [], 'html') /* line 25 */;
		echo '</h1>
			<div class="user col-sm-2">
				';
		echo LR\Filters::escapeHtmlText($user->isLoggedIn() ? "{$user->getIdentity()->username} je {$user->getRoles()[0]}" : "Jsi tu jako host, můžeš se pouze dívat") /* line 27 */;
		echo '
				<div>
					<a class="" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("signOut")) /* line 29 */;
		echo '">Odhlásit</a>
				</div>
				<a class="" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":Admin:Homepage:default")) /* line 31 */;
		echo '">Projekty</a>
			</div>
';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 33 */ {
			echo '			<div';
			echo ($ʟ_tmp = array_filter(['alert', 'alert-' . $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 33 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 33 */;
			echo '</div>
';
			$iterations++;
		}
		echo '		</div>
';
		$this->renderBlock('content', [], 'html') /* line 35 */;
		echo '	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '33'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block scripts} on line 9 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '		<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */;
		echo '/js/main.js"></script>
		<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
		<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */;
		echo '/js/bootstrap.min.js"></script>
		<script src="https://kit.fontawesome.com/b654b84b10.js" crossorigin="anonymous"></script>
';
	}

}
