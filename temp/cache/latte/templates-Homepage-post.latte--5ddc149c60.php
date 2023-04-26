<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/BlogModule/Presenters/templates/Homepage/post.latte */
final class Template5ddc149c60 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'description' => 'blockDescription', 'mainTitle' => 'blockMainTitle', 'mainBtn' => 'blockMainBtn', 'mainBtnLocation' => 'blockMainBtnLocation', 'content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('title', get_defined_vars()) /* line 1 */;
		echo "\n";
		$this->renderBlock('description', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('mainTitle', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('mainBtn', get_defined_vars()) /* line 4 */;
		echo "\n";
		$this->renderBlock('mainBtnLocation', get_defined_vars()) /* line 5 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 7 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block title} on line 1 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Výpis článků';
	}


	/** {block description} on line 2 */
	public function blockDescription(array $ʟ_args): void
	{
		echo 'Výpis všech článků.';
	}


	/** {block mainTitle} on line 3 */
	public function blockMainTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo LR\Filters::escapeHtmlText($post->title) /* line 3 */;
		
	}


	/** {block mainBtn} on line 4 */
	public function blockMainBtn(array $ʟ_args): void
	{
		echo 'fa-solid fa-arrow-left fa-xl';
	}


	/** {block mainBtnLocation} on line 5 */
	public function blockMainBtnLocation(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<a class="btn btn-primary" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default")) /* line 5 */;
		echo '">';
	}


	/** {block content} on line 7 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<article>
    <section>
        <img class="card-img-top" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */;
		echo '/img/blog/nahled/';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($post->photo_title)) /* line 10 */;
		echo '" alt="Card image cap">
        <div class="border-top border-primary w-100 mx-auto my-3"></div>
        <div class="date">';
		echo LR\Filters::escapeHtmlText(($this->filters->date)($post->date, 'j. n. Y')) /* line 12 */;
		echo '</div>
        <div class="travel">';
		echo $post->content /* line 13 */;
		echo '</div>
        <div class="border-top border-primary w-100 mx-auto my-3"></div>
        <a class="btn btn-success" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("editor", [$post->id])) /* line 15 */;
		echo '"><i class="fa-solid fa-pen-to-square "></i></a>
        <a class="btn btn-danger" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("remove", [$post->id])) /* line 16 */;
		echo '"><i class="fa-regular fa-trash"></i></a>
    </section>
</article>';
	}

}
