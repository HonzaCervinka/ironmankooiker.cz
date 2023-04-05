<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/PanDeskovekModule/Presenters/templates/Homepage/default.latte */
final class Template2a8e84c35b extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'description' => 'blockDescription', 'content' => 'blockContent'],
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
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		echo "\n";
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['playerPosition' => '9', 'gameNight' => '38', 'boardGame' => '83'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block title} on line 1 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Pán deskovek';
	}


	/** {block description} on line 2 */
	public function blockDescription(array $ʟ_args): void
	{
		echo 'Pán deskovek';
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<div class="row">		
    <div class="col-lg-3 ">
		<h1>Hodnoceni</h1>
		<div class="dashboardTables table-sm">
			<table class="table">
';
		$iterations = 0;
		foreach ($playersPosition as $playerPosition) /* line 9 */ {
			echo '				<tbody>
					<tr>
						<td class="_';
			echo LR\Filters::escapeHtmlAttr($playerPosition->rank) /* line 12 */;
			echo ' align-middle">';
			echo LR\Filters::escapeHtmlText($playerPosition->player) /* line 12 */;
			echo '</td>
						<td class= "align-middle points">';
			echo LR\Filters::escapeHtmlText($playerPosition->points) /* line 13 */;
			echo '</td>
						<td class= "align-middle vyher">výher</td>
					</tr>
				</tbody>
';
			$iterations++;
		}
		echo '			</table>
		</div>
	</div>



    <div class="col-lg-6 ">
        <h1>Herní sezení</h1>
		<div class="dashboardTables">
			<table class="table center table-sm">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th>Honza</th>
						<th>Michal</th>
						<th>Ševi</th>
						<th>Johny</th>
					</tr>
				</thead>
';
		$iterations = 0;
		foreach ($gameNights as $gameNight) /* line 38 */ {
			echo '				<tbody>
					<tr>
						<td class= "align-middle">';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($gameNight->date, 'd.m.Y')) /* line 41 */;
			echo '</td>
						<td class= "align-middle">';
			echo LR\Filters::escapeHtmlText($gameNight->idGame->name) /* line 42 */;
			echo '</td>
						<td>
';
			if ($gameNight->honza == 1) /* line 44 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 45 */;
				echo '/img/panDeskovek/win.png ">
';
			}
			else /* line 46 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 47 */;
				echo '/img/panDeskovek/loss.png ">
';
			}
			echo '						</td>
						<td>
';
			if ($gameNight->michal == 1) /* line 51 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 52 */;
				echo '/img/panDeskovek/win.png ">
';
			}
			else /* line 53 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 54 */;
				echo '/img/panDeskovek/loss.png ">
';
			}
			echo '						</td>
						<td>
';
			if ($gameNight->sevi == 1) /* line 58 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 59 */;
				echo '/img/panDeskovek/win.png ">
';
			}
			else /* line 60 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 61 */;
				echo '/img/panDeskovek/loss.png ">
';
			}
			echo '						</td>
						<td>
';
			if ($gameNight->johny == 1) /* line 65 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 66 */;
				echo '/img/panDeskovek/win.png ">
';
			}
			else /* line 67 */ {
				echo '						<img src="';
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 68 */;
				echo '/img/panDeskovek/loss.png ">
';
			}
			echo '						</td>
						<td class="delete"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("RemoveGameNight!", [$gameNight->id])) /* line 71 */;
			echo '"><i class="fa-solid fa-trash"></i></a></td>
					</tr>
				</tbody>
';
			$iterations++;
		}
		echo '			</table>
		</div>
    </div>

	    <div class="col-lg-3">
		<h1>Seznam her</h1>
		<div class="dashboardTables">
			<table class="table table-sm">
';
		$iterations = 0;
		foreach ($boardGames as $boardGame) /* line 83 */ {
			echo '				<tbody>
					<tr>
						<td>';
			echo LR\Filters::escapeHtmlText($boardGame->name) /* line 86 */;
			echo '</td>
						<td class="delete"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("RemoveBoardgame!", [$boardGame->id])) /* line 87 */;
			echo '"><i class="fa-solid fa-trash"></i></a></td>
					</tr>
				</tbody>
';
			$iterations++;
		}
		echo '			</table>
		</div>
    </div>

</div>

';
	}

}
