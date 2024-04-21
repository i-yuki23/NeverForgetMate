<?php

require __DIR__ . '/vendor/autoload.php';

class Application
{
    protected $router;
    protected $response;
    protected $request;
    protected $databaseManager;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->safeLoad();
        $this->router = new Router($this->registerRoutes());
        $this->response = new Response();
        $this->request = new Request();
        $this->databaseManager = new DatabaseManager();
        $this->databaseManager->connect([
            'dbHost' => $_ENV['DB_HOST'],
            'dbName' => $_ENV['DB_NAME'],
            'dbPassword' => $_ENV['DB_PASSWORD'],
            'dbUsername' => $_ENV['DB_USERNAME'],
        ]);
    }

    public function run()
    {   
        try {
            $params = $this->router->resolve($this->request->getPathInfo());
            if (!$params) {
                throw new HttpNotFoundException();
            }
            $controller = $params['controller'];
            $action = $params['action'];
            $this->runAction($controller, $action);
        } catch (HttpNotFoundException) {
            $this->render404Page();
        }

        $this->response->send();
    }

    private function runAction($controllerName, $action)
    {
        $controllerClass = ucfirst($controllerName) . 'Controller';
        if (!class_exists($controllerClass)) {
            throw new HttpNotFoundException();
        }
        $controller = new $controllerClass($this);
        $content = $controller->run($action);
        $this->response->setContent($content);
    }

    public function registerRoutes()
    {
        return [
            '/' => ['controller' => 'check', 'action' => 'index'],
            '/location' => ['controller' => 'location', 'action' => 'index'],
            '/location/create' => ['controller' => 'location', 'action' => 'create'],
        ];
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getDatabaseManager()
    {
        return $this->databaseManager;
    }

    private function render404Page()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->response->setContent(
            <<<EOF
<!DOCTYPE html>
<head>
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <title>Shuffle Lunch</title>
</head>
<body>
    <h2>
        404 Page Not Found.
    </h2>
</body>
</html>
EOF
        );
    }
}