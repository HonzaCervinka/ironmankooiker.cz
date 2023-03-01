<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/WebModule/Presenters/templates/Cestovani/default.latte */
final class Templatefeb6c21f36 extends Latte\Runtime\Template
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
			foreach (array_intersect_key(['post' => '16'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block keywords} on line 1 */
	public function blockKeywords(array $ʟ_args): void
	{
		echo 'Cestování se psem, obytným autem';
	}


	/** {block description} on line 2 */
	public function blockDescription(array $ʟ_args): void
	{
		echo 'Cestujeme se psem do zahraníčí i v Česku převážně obtytným autem.';
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Cestování';
	}


	/** {block content} on line 5 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '    <div class="container">
        <div class="col-12 text-center mt-5 px-0">
            <h2 class="text-dark pt-4"><strong>Příběhy a tipy na výlety s pejskem u nás i v zahraničí</strong></h2>
            <div class="border-top border-primary w-100 mx-auto my-3"></div>
        </div>
    </div>

    <!-- Vypis článků v kartě -->
    <div class="container">
        <div class="row">
';
		$iterations = 0;
		foreach ($posts as $post) /* line 16 */ {
			echo '                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */;
			echo '/img/blog/nahled/';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($post->photoTitle)) /* line 19 */;
			echo '" alt="Card image cap">
                        <div class="card-body">        
                            <tr><td>
                            <h4><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Cestovani:Post", [$post->id])) /* line 22 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($post->title) /* line 22 */;
			echo '</a></h4>
                            <div>';
			echo ($this->filters->truncate)($post->content, 200) /* line 23 */;
			echo '</div>
                        </div>
                        <div class="card-footer text-muted">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($post->date, 'j. n. Y')) /* line 25 */;
			echo '</div>
                    </div>
                </div>
';
			$iterations++;
		}
		echo '        </div>
    </div>
';
	}

}
