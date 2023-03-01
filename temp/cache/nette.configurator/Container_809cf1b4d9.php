<?php
// source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/config/common.neon
// source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/config/services.neon
// source: /Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/config/local.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_809cf1b4d9 extends Nette\DI\Container
{
	protected $types = ['container' => 'Nette\DI\Container'];

	protected $aliases = [
		'application' => 'application.application',
		'cacheStorage' => 'cache.storage',
		'database.default' => 'database.default.connection',
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.cacheJournal' => 'cache.journal',
		'nette.database.default' => 'database.default',
		'nette.database.default.context' => 'database.default.context',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'nette.latteFactory' => 'latte.latteFactory',
		'nette.mailer' => 'mail.mailer',
		'nette.presenterFactory' => 'application.presenterFactory',
		'nette.templateFactory' => 'latte.templateFactory',
		'nette.userStorage' => 'security.userStorage',
		'session' => 'session.session',
		'user' => 'security.user',
	];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Application\Application' => [['application.application']],
		'Nette\Application\IPresenterFactory' => [['application.presenterFactory']],
		'Nette\Application\LinkGenerator' => [['application.linkGenerator']],
		'Nette\Caching\Storages\Journal' => [['cache.journal']],
		'Nette\Caching\Storage' => [['cache.storage']],
		'Nette\Database\Connection' => [['database.default.connection']],
		'Nette\Database\IStructure' => [['database.default.structure']],
		'Nette\Database\Structure' => [['database.default.structure']],
		'Nette\Database\Conventions' => [['database.default.conventions']],
		'Nette\Database\Conventions\DiscoveredConventions' => [['database.default.conventions']],
		'Nette\Database\Explorer' => [['database.default.context']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Bridges\ApplicationLatte\LatteFactory' => [['latte.latteFactory']],
		'Nette\Application\UI\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Bridges\ApplicationLatte\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Mail\Mailer' => [['mail.mailer']],
		'Nette\Security\Passwords' => [['security.passwords']],
		'Nette\Security\UserStorage' => [['security.userStorage']],
		'Nette\Security\IUserStorage' => [['security.legacyUserStorage']],
		'Nette\Security\User' => [['security.user']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [['tracy.logger']],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'Nextras\Orm\Mapper\Mapper' => [
			['nextras.orm.mappers.travel_posts', 'nextras.orm.mappers.shopping', 'nextras.orm.mappers.tasks'],
		],
		'Nextras\Orm\Mapper\Dbal\DbalMapper' => [
			['nextras.orm.mappers.travel_posts', 'nextras.orm.mappers.shopping', 'nextras.orm.mappers.tasks'],
		],
		'Nextras\Orm\Mapper\IMapper' => [
			['nextras.orm.mappers.travel_posts', 'nextras.orm.mappers.shopping', 'nextras.orm.mappers.tasks'],
		],
		'app\model\orm\Travel_postsMapper' => [['nextras.orm.mappers.travel_posts']],
		'Nextras\Orm\Repository\Repository' => [
			[
				'nextras.orm.repositories.travel_posts',
				'nextras.orm.repositories.shopping',
				'nextras.orm.repositories.tasks',
			],
		],
		'Nextras\Orm\Repository\IRepository' => [
			[
				'nextras.orm.repositories.travel_posts',
				'nextras.orm.repositories.shopping',
				'nextras.orm.repositories.tasks',
			],
		],
		'app\model\orm\Travel_postsRepository' => [['nextras.orm.repositories.travel_posts']],
		'app\model\orm\ShoppingMapper' => [['nextras.orm.mappers.shopping']],
		'app\model\orm\ShoppingRepository' => [['nextras.orm.repositories.shopping']],
		'app\model\orm\TasksMapper' => [['nextras.orm.mappers.tasks']],
		'app\model\orm\TasksRepository' => [['nextras.orm.repositories.tasks']],
		'Nextras\Orm\Model\IRepositoryLoader' => [['nextras.orm.repositoryLoader']],
		'Nextras\Orm\Bridges\NetteDI\RepositoryLoader' => [['nextras.orm.repositoryLoader']],
		'Nette\Caching\Cache' => [2 => ['nextras.orm.cache']],
		'Nextras\Orm\Repository\IDependencyProvider' => [['nextras.orm.dependencyProvider']],
		'Nextras\Orm\Bridges\NetteDI\DependencyProvider' => [['nextras.orm.dependencyProvider']],
		'Nextras\Orm\Entity\Reflection\IMetadataParserFactory' => [['nextras.orm.metadataParserFactory']],
		'Nextras\Orm\Model\MetadataStorage' => [['nextras.orm.metadataStorage']],
		'Nextras\Orm\Model\Model' => [['nextras.orm.model']],
		'Nextras\Orm\Model\IModel' => [['nextras.orm.model']],
		'app\model\orm\Model' => [['nextras.orm.model']],
		'Nextras\Dbal\IConnection' => [['nextras.dbal.connection']],
		'Nextras\Dbal\Connection' => [['nextras.dbal.connection']],
		'Nette\Routing\RouteList' => [['01']],
		'Nette\Routing\Router' => [['01']],
		'ArrayAccess' => [
			2 => [
				'01',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Countable' => [2 => ['01']],
		'IteratorAggregate' => [2 => ['01']],
		'Traversable' => [2 => ['01']],
		'Nette\Application\Routers\RouteList' => [['01']],
		'Nette\Security\Authenticator' => [['02']],
		'Nette\Security\IAuthenticator' => [['02']],
		'App\Model\MyAuthenticator' => [['02']],
		'App\Model\DatabaseManager' => [['03', '04', '05']],
		'App\Model\ArticleManager' => [['03']],
		'App\Model\PanDeskovekManager' => [['04']],
		'App\Model\ReceptyManager' => [['05']],
		'Nette\Security\Authorizator' => [['06']],
		'Nette\Security\Permission' => [['06']],
		'App\AdminModule\Forms\FormFactory' => [['07']],
		'App\AdminModule\Forms\SignInFormFactory' => [['08']],
		'App\AdminModule\Forms\RegisterFormFactory' => [['09']],
		'App\ReceptyModule\Forms\FormFactory' => [['010']],
		'App\ReceptyModule\Forms\EditorRecipesFormFactory' => [['011']],
		'App\BlogModule\Forms\FormFactory' => [['012']],
		'App\BlogModule\Forms\EditorFormFactory' => [['013']],
		'App\PanDeskovekModule\Forms\FormFactory' => [['014']],
		'App\PanDeskovekModule\Forms\AddGameFormFactory' => [['015']],
		'App\PanDeskovekModule\Forms\AddGameNightFormFactory' => [['016']],
		'Nette\Application\IPresenter' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
				'application.14',
				'application.15',
			],
		],
		'App\ErrorModule\Presenters\ErrorPresenter' => [2 => ['application.1']],
		'Nette\Application\UI\Presenter' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\Application\UI\Control' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\Application\UI\Component' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\ComponentModel\Container' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\ComponentModel\Component' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\Application\UI\Renderable' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\Application\UI\StatePersistent' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\Application\UI\SignalReceiver' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\ComponentModel\IContainer' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'Nette\ComponentModel\IComponent' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
				'application.11',
				'application.12',
				'application.13',
			],
		],
		'App\ErrorModule\Presenters\Error4xxPresenter' => [2 => ['application.2']],
		'App\BlogModule\Presenters\HomepagePresenter' => [2 => ['application.3']],
		'App\AdminModule\Presenters\RegisterPresenter' => [2 => ['application.4']],
		'App\AdminModule\Presenters\HomepagePresenter' => [2 => ['application.5']],
		'App\ReceptyModule\Presenters\HomepagePresenter' => [2 => ['application.6']],
		'App\WebModule\Presenters\CestovaniPresenter' => [2 => ['application.7']],
		'App\WebModule\Presenters\FotogaleriePresenter' => [2 => ['application.8']],
		'App\WebModule\Presenters\InformacePresenter' => [2 => ['application.9']],
		'App\WebModule\Presenters\HomepagePresenter' => [2 => ['application.10']],
		'App\PanDeskovekModule\Presenters\BasePresenter' => [2 => ['application.11', 'application.12']],
		'App\PanDeskovekModule\Presenters\HomepagePresenter' => [2 => ['application.11']],
		'App\PanDeskovekModule\Presenters\StatisticPresenter' => [2 => ['application.12']],
		'App\ToDoModule\Presenters\HomepagePresenter' => [2 => ['application.13']],
		'NetteModule\ErrorPresenter' => [2 => ['application.14']],
		'NetteModule\MicroPresenter' => [2 => ['application.15']],
		'Nextras\Orm\Mapper\Dbal\DbalMapperCoordinator' => [['nextras.orm.mapperCoordinator']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [];
	}


	public function createService01(): Nette\Application\Routers\RouteList
	{
		return App\Router\RouterFactory::createRouter();
	}


	public function createService02(): App\Model\MyAuthenticator
	{
		return new App\Model\MyAuthenticator($this->getService('database.default.context'), $this->getService('security.passwords'));
	}


	public function createService03(): App\Model\ArticleManager
	{
		return new App\Model\ArticleManager($this->getService('database.default.context'));
	}


	public function createService04(): App\Model\PanDeskovekManager
	{
		return new App\Model\PanDeskovekManager($this->getService('database.default.context'));
	}


	public function createService05(): App\Model\ReceptyManager
	{
		return new App\Model\ReceptyManager($this->getService('database.default.context'));
	}


	public function createService06(): Nette\Security\Permission
	{
		return App\Security\AuthorizatorFactory::create();
	}


	public function createService07(): App\AdminModule\Forms\FormFactory
	{
		return new App\AdminModule\Forms\FormFactory;
	}


	public function createService08(): App\AdminModule\Forms\SignInFormFactory
	{
		return new App\AdminModule\Forms\SignInFormFactory($this->getService('07'), $this->getService('security.user'));
	}


	public function createService09(): App\AdminModule\Forms\RegisterFormFactory
	{
		return new App\AdminModule\Forms\RegisterFormFactory(
			$this->getService('07'),
			$this->getService('02'),
			$this->getService('security.user')
		);
	}


	public function createService010(): App\ReceptyModule\Forms\FormFactory
	{
		return new App\ReceptyModule\Forms\FormFactory;
	}


	public function createService011(): App\ReceptyModule\Forms\EditorRecipesFormFactory
	{
		return new App\ReceptyModule\Forms\EditorRecipesFormFactory($this->getService('010'), $this->getService('05'));
	}


	public function createService012(): App\BlogModule\Forms\FormFactory
	{
		return new App\BlogModule\Forms\FormFactory;
	}


	public function createService013(): App\BlogModule\Forms\EditorFormFactory
	{
		return new App\BlogModule\Forms\EditorFormFactory($this->getService('012'), $this->getService('03'));
	}


	public function createService014(): App\PanDeskovekModule\Forms\FormFactory
	{
		return new App\PanDeskovekModule\Forms\FormFactory;
	}


	public function createService015(): App\PanDeskovekModule\Forms\AddGameFormFactory
	{
		return new App\PanDeskovekModule\Forms\AddGameFormFactory($this->getService('014'), $this->getService('04'));
	}


	public function createService016(): App\PanDeskovekModule\Forms\AddGameNightFormFactory
	{
		return new App\PanDeskovekModule\Forms\AddGameNightFormFactory($this->getService('014'), $this->getService('04'));
	}


	public function createServiceApplication__1(): App\ErrorModule\Presenters\ErrorPresenter
	{
		return new App\ErrorModule\Presenters\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__10(): App\WebModule\Presenters\HomepagePresenter
	{
		$service = new App\WebModule\Presenters\HomepagePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->travel_postsRepository = $this->getService('nextras.orm.repositories.travel_posts');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__11(): App\PanDeskovekModule\Presenters\HomepagePresenter
	{
		$service = new App\PanDeskovekModule\Presenters\HomepagePresenter(
			$this->getService('04'),
			$this->getService('015'),
			$this->getService('016')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__12(): App\PanDeskovekModule\Presenters\StatisticPresenter
	{
		$service = new App\PanDeskovekModule\Presenters\StatisticPresenter(
			$this->getService('04'),
			$this->getService('015'),
			$this->getService('016')
		);
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__13(): App\ToDoModule\Presenters\HomepagePresenter
	{
		$service = new App\ToDoModule\Presenters\HomepagePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->tasksRepository = $this->getService('nextras.orm.repositories.tasks');
		$service->shoppingRepository = $this->getService('nextras.orm.repositories.shopping');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__14(): NetteModule\ErrorPresenter
	{
		return new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__15(): NetteModule\MicroPresenter
	{
		return new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('01'));
	}


	public function createServiceApplication__2(): App\ErrorModule\Presenters\Error4xxPresenter
	{
		$service = new App\ErrorModule\Presenters\Error4xxPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__3(): App\BlogModule\Presenters\HomepagePresenter
	{
		$service = new App\BlogModule\Presenters\HomepagePresenter($this->getService('03'), $this->getService('013'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__4(): App\AdminModule\Presenters\RegisterPresenter
	{
		$service = new App\AdminModule\Presenters\RegisterPresenter($this->getService('02'), $this->getService('09'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__5(): App\AdminModule\Presenters\HomepagePresenter
	{
		$service = new App\AdminModule\Presenters\HomepagePresenter($this->getService('08'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__6(): App\ReceptyModule\Presenters\HomepagePresenter
	{
		$service = new App\ReceptyModule\Presenters\HomepagePresenter($this->getService('05'), $this->getService('011'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__7(): App\WebModule\Presenters\CestovaniPresenter
	{
		$service = new App\WebModule\Presenters\CestovaniPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->travel_postsRepository = $this->getService('nextras.orm.repositories.travel_posts');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__8(): App\WebModule\Presenters\FotogaleriePresenter
	{
		$service = new App\WebModule\Presenters\FotogaleriePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__9(): App\WebModule\Presenters\InformacePresenter
	{
		$service = new App\WebModule\Presenters\InformacePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory')
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response')
		);
		$service->catchExceptions = null;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationDI\ApplicationExtension::initializeBlueScreenPanel(
			$this->getService('tracy.blueScreen'),
			$service
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory')
		));
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		return new Nette\Application\LinkGenerator(
			$this->getService('01'),
			$this->getService('http.request')->getUrl()->withoutUserInfo(),
			$this->getService('application.presenterFactory')
		);
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback(
			$this,
			5,
			'/Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/temp/cache/nette.application/touch'
		));
		$service->setMapping(['*' => 'App\*Module\Presenters\*Presenter']);
		return $service;
	}


	public function createServiceCache__journal(): Nette\Caching\Storages\Journal
	{
		return new Nette\Caching\Storages\SQLiteJournal('/Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/temp/cache/journal.s3db');
	}


	public function createServiceCache__storage(): Nette\Caching\Storage
	{
		return new Nette\Caching\Storages\FileStorage(
			'/Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/temp/cache',
			$this->getService('cache.journal')
		);
	}


	public function createServiceContainer(): Container_809cf1b4d9
	{
		return $this;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=test', null, null, []);
		Nette\Database\Helpers::initializeTracy(
			$service,
			true,
			'default',
			true,
			$this->getService('tracy.bar'),
			$this->getService('tracy.blueScreen')
		);
		return $service;
	}


	public function createServiceDatabase__default__context(): Nette\Database\Explorer
	{
		return new Nette\Database\Explorer(
			$this->getService('database.default.connection'),
			$this->getService('database.default.structure'),
			$this->getService('database.default.conventions'),
			$this->getService('cache.storage')
		);
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		return new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		return new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return $this->getService('http.requestFactory')->fromGlobals();
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		$service->cookieSecure = $this->getService('http.request')->isSecured();
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\LatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\LatteFactory {
			private $container;


			public function __construct(Container_809cf1b4d9 $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('/Applications/XAMPP/xamppfiles/htdocs/ironmankooiker.cz/temp/cache/latte');
				$service->setAutoRefresh(true);
				$service->setContentType('html');
				Nette\Utils\Html::$xhtml = false;
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Bridges\ApplicationLatte\TemplateFactory
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage'),
			null
		);
		Nette\Bridges\ApplicationDI\LatteExtension::initLattePanel($service, $this->getService('tracy.bar'), false);
		return $service;
	}


	public function createServiceMail__mailer(): Nette\Mail\Mailer
	{
		return new Nette\Mail\SendmailMailer;
	}


	public function createServiceNextras__dbal__connection(): Nextras\Dbal\Connection
	{
		$service = new Nextras\Dbal\Connection([
			'driver' => 'mysqli',
			'host' => '127.0.0.1',
			'port' => 3306,
			'database' => 'test',
			'username' => null,
			'password' => null,
			'connectionTz' => 'auto-offset',
		]);
		$this->getService('tracy.blueScreen')->addPanel('Nextras\Dbal\Bridges\NetteTracy\BluescreenQueryPanel::renderBluescreenPanel');
		Nextras\Dbal\Bridges\NetteTracy\ConnectionPanel::install($service, true);
		return $service;
	}


	public function createServiceNextras__orm__cache(): Nette\Caching\Cache
	{
		return new Nette\Caching\Cache($this->getService('cache.storage'), 'nextras.orm');
	}


	public function createServiceNextras__orm__dependencyProvider(): Nextras\Orm\Bridges\NetteDI\DependencyProvider
	{
		return new Nextras\Orm\Bridges\NetteDI\DependencyProvider($this);
	}


	public function createServiceNextras__orm__mapperCoordinator(): Nextras\Orm\Mapper\Dbal\DbalMapperCoordinator
	{
		return new Nextras\Orm\Mapper\Dbal\DbalMapperCoordinator($this->getService('nextras.dbal.connection'));
	}


	public function createServiceNextras__orm__mappers__shopping(): app\model\orm\ShoppingMapper
	{
		return new app\model\orm\ShoppingMapper(
			$this->getService('nextras.dbal.connection'),
			$this->getService('nextras.orm.mapperCoordinator'),
			$this->getService('nextras.orm.cache')
		);
	}


	public function createServiceNextras__orm__mappers__tasks(): app\model\orm\TasksMapper
	{
		return new app\model\orm\TasksMapper(
			$this->getService('nextras.dbal.connection'),
			$this->getService('nextras.orm.mapperCoordinator'),
			$this->getService('nextras.orm.cache')
		);
	}


	public function createServiceNextras__orm__mappers__travel_posts(): app\model\orm\Travel_postsMapper
	{
		return new app\model\orm\Travel_postsMapper(
			$this->getService('nextras.dbal.connection'),
			$this->getService('nextras.orm.mapperCoordinator'),
			$this->getService('nextras.orm.cache')
		);
	}


	public function createServiceNextras__orm__metadataParserFactory(): Nextras\Orm\Entity\Reflection\IMetadataParserFactory
	{
		return new class ($this) implements Nextras\Orm\Entity\Reflection\IMetadataParserFactory {
			private $container;


			public function __construct(Container_809cf1b4d9 $container)
			{
				$this->container = $container;
			}


			public function create(array $entityClassesMap): Nextras\Orm\Entity\Reflection\IMetadataParser
			{
				return new Nextras\Orm\Entity\Reflection\MetadataParser($entityClassesMap);
			}
		};
	}


	public function createServiceNextras__orm__metadataStorage(): Nextras\Orm\Model\MetadataStorage
	{
		return new Nextras\Orm\Model\MetadataStorage(
			[
				'app\model\orm\Travel_post' => 'app\model\orm\Travel_postsRepository',
				'app\model\orm\Shopping' => 'app\model\orm\ShoppingRepository',
				'app\model\orm\Task' => 'app\model\orm\TasksRepository',
			],
			$this->getService('nextras.orm.cache'),
			$this->getService('nextras.orm.metadataParserFactory'),
			$this->getService('nextras.orm.repositoryLoader')
		);
	}


	public function createServiceNextras__orm__model(): app\model\orm\Model
	{
		return new app\model\orm\Model(
			[
				[
					'app\model\orm\Travel_postsRepository' => true,
					'app\model\orm\ShoppingRepository' => true,
					'app\model\orm\TasksRepository' => true,
				],
				[
					'travel_posts' => 'app\model\orm\Travel_postsRepository',
					'shopping' => 'app\model\orm\ShoppingRepository',
					'tasks' => 'app\model\orm\TasksRepository',
				],
				[
					'app\model\orm\Travel_post' => 'app\model\orm\Travel_postsRepository',
					'app\model\orm\Shopping' => 'app\model\orm\ShoppingRepository',
					'app\model\orm\Task' => 'app\model\orm\TasksRepository',
				],
			],
			$this->getService('nextras.orm.repositoryLoader'),
			$this->getService('nextras.orm.metadataStorage')
		);
	}


	public function createServiceNextras__orm__repositories__shopping(): app\model\orm\ShoppingRepository
	{
		$service = new app\model\orm\ShoppingRepository(
			$this->getService('nextras.orm.mappers.shopping'),
			$this->getService('nextras.orm.dependencyProvider')
		);
		$service->setModel($this->getService('nextras.orm.model'));
		return $service;
	}


	public function createServiceNextras__orm__repositories__tasks(): app\model\orm\TasksRepository
	{
		$service = new app\model\orm\TasksRepository(
			$this->getService('nextras.orm.mappers.tasks'),
			$this->getService('nextras.orm.dependencyProvider')
		);
		$service->setModel($this->getService('nextras.orm.model'));
		return $service;
	}


	public function createServiceNextras__orm__repositories__travel_posts(): app\model\orm\Travel_postsRepository
	{
		$service = new app\model\orm\Travel_postsRepository(
			$this->getService('nextras.orm.mappers.travel_posts'),
			$this->getService('nextras.orm.dependencyProvider')
		);
		$service->setModel($this->getService('nextras.orm.model'));
		return $service;
	}


	public function createServiceNextras__orm__repositoryLoader(): Nextras\Orm\Bridges\NetteDI\RepositoryLoader
	{
		return new Nextras\Orm\Bridges\NetteDI\RepositoryLoader(
			$this,
			[
				'app\model\orm\Travel_postsRepository' => 'nextras.orm.repositories.travel_posts',
				'app\model\orm\ShoppingRepository' => 'nextras.orm.repositories.shopping',
				'app\model\orm\TasksRepository' => 'nextras.orm.repositories.tasks',
			]
		);
	}


	public function createServiceSecurity__legacyUserStorage(): Nette\Security\IUserStorage
	{
		return new Nette\Http\UserStorage($this->getService('session.session'));
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		return new Nette\Security\Passwords;
	}


	public function createServiceSecurity__user(): Nette\Security\User
	{
		$service = new Nette\Security\User(
			$this->getService('security.legacyUserStorage'),
			$this->getService('02'),
			$this->getService('06'),
			$this->getService('security.userStorage')
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\UserStorage
	{
		return new Nette\Bridges\SecurityHttp\SessionStorage($this->getService('session.session'));
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		$service->setOptions(['readAndClose' => null, 'cookieSamesite' => 'Lax']);
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize()
	{
		// di.
		(function () {
			$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		})();
		// http.
		(function () {
			$response = $this->getService('http.response');
			$response->setHeader('X-Powered-By', 'Nette Framework 3');
			$response->setHeader('Content-Type', 'text/html; charset=utf-8');
			$response->setHeader('X-Frame-Options', 'SAMEORIGIN');
			Nette\Http\Helpers::initCookie($this->getService('http.request'), $response);
		})();
		// session.
		(function () {
			$this->getService('session.session')->autoStart(false);
		})();
		// tracy.
		(function () {
			if (!Tracy\Debugger::isEnabled()) { return; }
			Tracy\Debugger::getLogger()->mailer = [
				new Tracy\Bridges\Nette\MailSender($this->getService('mail.mailer'), null),
				'send',
			];
		})();
	}
}
