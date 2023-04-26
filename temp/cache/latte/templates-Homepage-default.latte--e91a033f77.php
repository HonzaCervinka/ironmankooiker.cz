<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/BlogModule/Presenters/templates/Homepage/default.latte */
final class Templatee91a033f77 extends Latte\Runtime\Template
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
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 6 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['post' => '9'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block title} on line 1 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Články';
	}


	/** {block description} on line 2 */
	public function blockDescription(array $ʟ_args): void
	{
		echo 'Články';
	}


	/** {block mainTitle} on line 3 */
	public function blockMainTitle(array $ʟ_args): void
	{
		echo 'Články';
	}


	/** {block mainBtn} on line 4 */
	public function blockMainBtn(array $ʟ_args): void
	{
		echo 'fa-solid fa-plus fa-xl';
	}


	/** {block mainBtnLocation} on line 5 */
	public function blockMainBtnLocation(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<a class="btn btn-primary" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("editor")) /* line 5 */;
		echo '">';
	}


	/** {block content} on line 6 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '
		<div class="row">
';
		$iterations = 0;
		foreach ($posts as $post) /* line 9 */ {
			echo '                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 12 */;
			echo '/img/blog/nahled/';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($post->photo_title)) /* line 12 */;
			echo '" alt="Card image cap">
                        <div class="card-body">        
                            <tr><td>
                            <h4><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:Post", [$post->id])) /* line 15 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($post->title) /* line 15 */;
			echo '</a></h4>
                            <div>';
			echo ($this->filters->truncate)($post->content, 200) /* line 16 */;
			echo '</div>
                        </div>
                        <div class="card-footer text-muted">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($post->date, 'j. n. Y')) /* line 18 */;
			echo '
                            <div class="controlBtn">
                            <a class="btn btn-success" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("editor", [$post->id])) /* line 20 */;
			echo '"><i class="fa-solid fa-pen-to-square "></i></a>
                            <a class="btn btn-danger" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("remove", [$post->id])) /* line 21 */;
			echo '"><i class="fa-regular fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
';
			$iterations++;
		}
		echo '        </div>
';
	}

}
