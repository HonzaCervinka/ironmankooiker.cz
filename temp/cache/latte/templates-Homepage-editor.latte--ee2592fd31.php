<?php

use Latte\Runtime as LR;

/** source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/app/BlogModule/Presenters/templates/Homepage/editor.latte */
final class Templateee2592fd31 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['title' => 'blockTitle', 'description' => 'blockDescription', 'mainTitle' => 'blockMainTitle', 'mainBtn' => 'blockMainBtn', 'mainBtnLocation' => 'blockMainBtnLocation', 'content' => 'blockContent', 'scripts' => 'blockScripts'],
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
		echo "\n";
		$this->renderBlock('scripts', get_defined_vars()) /* line 11 */;
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
		echo 'Editor';
	}


	/** {block description} on line 2 */
	public function blockDescription(array $ʟ_args): void
	{
		echo 'Editor článků.';
	}


	/** {block mainTitle} on line 3 */
	public function blockMainTitle(array $ʟ_args): void
	{
		echo 'Editor';
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
		/* line 9 */ $_tmp = $this->global->uiControl->getComponent("editorForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		
	}


	/** {block scripts} on line 11 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->renderBlockParent('scripts', get_defined_vars()) /* line 12 */;
		echo '    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.5.1/tinymce.min.js" integrity="sha512-rCSG4Ab3y6N79xYzoaCqt9gMHR0T9US5O5iBuB25LtIQ1Hsv3jKjREwEMeud8q7KRgPtxhmJesa1c9pl6upZvg==" crossorigin="anonymous"></script> <script type="text/javascript">
        
        tinymce.init({
            selector: \'textarea[name=content]\',
            height: 1000,
            plugins: [
                \'advlist autolink lists link image imagetools charmap print preview anchor\',
                \'searchreplace visualblocks code fullscreen\',
                \'insertdatetime media table contextmenu paste\'
            ],
            toolbar: \'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image\',
            entities: \'160,nbsp\',
            entity_encoding: \'raw\',
            image_class_list: [
                { title: \'Responzivní\', value: \'img-responsive\'}
            ],
            content_style: \'img.img-responsive { max-width: 100%; height: auto;}\',
            content_css: \'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\',
            image_advtab: true,
            images_upload_url: ';
		echo LR\Filters::escapeJs($this->global->uiControl->link("tinymceInsertImage")) /* line 32 */;
		echo ',
            images_upload_credentials: true

        });
    </script>
';
	}

}
