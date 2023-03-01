<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/ToDoModule/Presenters/templates/Homepage/default.latte */
final class Template38462f4db4 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['shop' => '7', 'task' => '22'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<div class="container">
';
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '		<div class="row justify-content-center">
			<div class="col-sm-auto tabulky" >
				<h2>Nákupní seznam</h2>
';
		$iterations = 0;
		foreach ($shopping as $shop) /* line 7 */ {
			echo '				<div class="shop">
					<table class="table">
						<tbody>
							<tr>
								<td>';
			echo LR\Filters::escapeHtmlText($shop->goods) /* line 11 */;
			echo '</td>
								<td class="delete"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("RemoveShop!", [$shop->id])) /* line 12 */;
			echo '"><i class="fa-solid fa-circle-check fa-2x " ></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
';
			$iterations++;
		}
		/* line 17 */ $_tmp = $this->global->uiControl->getComponent("shopForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '			</div>

			<div class="col-sm-auto tabulky">
				<h2>Úkoly</h2>
';
		$iterations = 0;
		foreach ($tasks as $task) /* line 22 */ {
			echo '				<div class="shop">
					<table class="table">
						<tbody>
							<tr>
								<td>';
			echo LR\Filters::escapeHtmlText($task->task) /* line 26 */;
			echo '</td>
								<td class="delete"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("RemoveTasks!", [$task->id])) /* line 27 */;
			echo '"><i class="fa-solid fa-circle-check fa-2x" ></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
';
			$iterations++;
		}
		/* line 32 */ $_tmp = $this->global->uiControl->getComponent("tasksForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '			</div>
		</div>
	</div>
';
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '		<h1>Nákupy a úkoly</h1>
';
	}

}
