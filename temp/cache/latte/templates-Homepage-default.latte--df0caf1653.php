<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/AdminModule/Presenters/templates/Homepage/default.latte */
final class Templatedf0caf1653 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
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
			foreach (array_intersect_key(['error' => '5', 'key' => '8', 'label' => '8'], $this->params) as $ʟ_v => $ʟ_l) {
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
		echo '<h1>Vyber projekt</h1>
';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $this->global->formsStack[] = $this->global->uiControl["signInForm"], []) /* line 3 */;
		echo '
    <div class = "col-lg-6 mx-auto">
';
		$iterations = 0;
		foreach ($form->errors as $error) /* line 5 */ {
			if ($form->hasErrors()) /* line 5 */ {
				echo '        <div';
				echo ($ʟ_tmp = array_filter(['alert', 'alert-danger'])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 5 */;
				echo '>';
				echo LR\Filters::escapeHtmlText($error) /* line 5 */;
				echo '</div>
';
			}
			$iterations++;
		}
		echo '    </div>
    <div class="radio-buttons">
';
		$iterations = 0;
		foreach ($form["project"]->items as $key => $label) /* line 8 */ {
			echo '            <label class="custom-radio">
                <input type="radio" name="project" value="';
			echo LR\Filters::escapeHtmlAttr($key) /* line 10 */;
			echo '" onclick="changeBackgroundColor(';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::escapeJs($key)) /* line 10 */;
			echo ')">
                    <span class="radio-btn">
                    <i class="fa-solid fa-check fa-2x"></i>
                        <div class="hobbies-icon">
                        <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */;
			echo '/img/login/';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($key)) /* line 14 */;
			echo 'Icon.png">
                        <p>';
			echo LR\Filters::escapeHtmlText($label) /* line 15 */;
			echo '</p>
                        </div>
                    </span>
            </label>
';
			$iterations++;
		}
		echo '    </div>
    <div class="text">
    ';
		echo end($this->global->formsStack)["username"]->getControl()->addAttributes(['class' => ""]) /* line 22 */;
		echo '
    ';
		echo end($this->global->formsStack)["password"]->getControl()->addAttributes(['class' => ""]) /* line 23 */;
		echo '
    </div>
    ';
		echo end($this->global->formsStack)["send"]->getControl()->addAttributes(['class' => "button login"]) /* line 25 */;
		echo '

    <a class="button btn" data-toggle="tooltip" data-placement="top" title="Přihlásí tě do aplikace Pán deskovek. Tvoje funkce budou omezeny!" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":PanDeskovek:Homepage:default")) /* line 27 */;
		echo '">Vstoupit jako host</a>
';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
		echo '

';
		if ($user->isLoggedIn()) /* line 30 */ {
			echo '<div class="center">
<a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Register:default")) /* line 31 */;
			echo '">Nová registrace</a>
<a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("signOut")) /* line 32 */;
			echo '">Odhlasit se</a>
</div>
';
		}
		echo '
    <script>

    function changeBackgroundColor(project)
    {
        document.body.style.backgroundImage = "url("+';
		echo LR\Filters::escapeJs($basePath) /* line 39 */;
		echo '+"/www/img/login/Pozadi"+project+".jpg)";
    }

    document.querySelector(\'input[value="PanDeskovek"]\').checked = true;
    </script>';
	}

}
