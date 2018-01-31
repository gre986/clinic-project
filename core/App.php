<?php

class App
{

	protected $controller = 'services';

	protected $method = 'index';

	protected $params = [];

	public function __construct($database)
	{
		$url = $this->parseURL();

		//setup the controller
		if (file_exists('../app/controllers/' . $url[0] . 'Controller.php')) 
		{
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/' . $this->controller . 'Controller.php';

		$this->controller = new $this->controller($database);
		
		//setup the method
		if (isset($url[1])) 
		{
			if (method_exists($this->controller, $url[1])) 
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//setup the parameters
		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if(isset($_GET['url']))
		{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}
