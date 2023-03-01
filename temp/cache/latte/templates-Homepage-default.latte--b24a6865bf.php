<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/WebModule/Presenters/templates/Homepage/default.latte */
final class Templateb24a6865bf extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['keywords' => 'blockKeywords', 'description' => 'blockDescription', 'title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('keywords', get_defined_vars()) /* line 1 */;
		echo "\n";
		$this->renderBlock('description', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 5 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['post' => '36'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block keywords} on line 1 */
	public function blockKeywords(array $ʟ_args): void
	{
		echo 'Ironman, Kooikerhondje';
	}


	/** {block description} on line 2 */
	public function blockDescription(array $ʟ_args): void
	{
		echo 'Stránky věnované kachnímu psíkovi Kooikerhondje Ironman z Ploužnické stáje a zápisky z cest po Evropě.';
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Kooikerhondje Ironman';
	}


	/** {block content} on line 5 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '
    <!-- obrazek Carousel -->
        <!-- Carousel obsah -->
        <div class="row main">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 bg-custom d-lg-block py-3 px-0">
                            <h1><strong>Ironman</strong></h1>
                            <div class="border-top border-primary w-50 mx-auto my-3"></div>
                            <h3 class="pb-3"><strong></strong>Kooikerhondje</strong></h3>
                            <a class="btn btn-danger btn-lg mr-2" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Informace:default")) /* line 17 */;
		echo '">Základní informace</a>
                            <a href="#kontakt" class="btn btn-primary btn-lg ml-2">Kontakt</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Hlavni stranka nadpis -->
    <div class="col-12 text-center mt-5">
        <h1 class="text-dark pt-4"><strong>Ironman z Ploužnické stáje</strong></h1>
        <div class="border-top border-primary w-50 mx-auto my-3"></div>
        <p class="lead">Stránky o kachním psíkovi Ironmanovi. Pokud hledáte <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Informace:default")) /* line 29 */;
		echo '">informace</a> pro Iryho budoucí nevěstu, nebo tip na <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Cestovani:default")) /* line 29 */;
		echo '">výlety</a> s
            pejskem, jste na správné adrese.</p>
    </div>

    <!-- tri odkazy na cestovani -->
    <div class="container">
        <div class="row">
';
		$iterations = 0;
		foreach ($posts as $post) /* line 36 */ {
			echo '                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 39 */;
			echo '/img/blog/nahled/';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($post->photoTitle)) /* line 39 */;
			echo '" alt="Card image cap">
                        <div class="card-body">        
                            <tr><td>
                            <h4><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Cestovani:Post", [$post->id])) /* line 42 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($post->title) /* line 42 */;
			echo '</a></h4>
                            <div>';
			echo ($this->filters->truncate)($post->content, 200) /* line 43 */;
			echo '</div>
                        </div>
                        <div class="card-footer text-muted">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($post->date, 'j. n. Y')) /* line 45 */;
			echo '</div>
                    </div>
                </div>
';
			$iterations++;
		}
		echo '        </div>
    </div>
	
    <!-- zacatek fixniho pozadi -->
    <!-- horni ohraniceni  -->
    <section id="fixed">
        <a class="navbar emoji top"></a>

        <!-- zacatek carousel obsahu -->
        <div class="row text-light py-5">
            <div class="col-lg-8 col-md-8 col-sm-12 text-center center-vertical">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8 col-sm-12 bg-custom py-3 px-0">
                            <h2><strong>Informace pro krytí</strong></h2>
                            <div class="border-top border-primary w-50 mx-auto my-3"></div>
                            <h3 class="pb-3"><strong>Výsledky výstav</strong></h3>
                            <h3 class="pb-3"><strong>Záznamy o krytí</strong></h3>
                            <h3 class="pb-3"><strong>Průkaz původu</strong></h3>
                            <a class="btn btn-primary btn-lg mr-2" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Informace:default")) /* line 68 */;
		echo '">Přejít</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- konec carousel obsahu -->

    </section>
    <!-- spodni ohraniceni  -->
    <a class="navbar emoji"></a>
';
	}

}
