<?php

class Controller
{
    protected $actionName;
    protected $request;
    protected $databaseManager;
    
    public function __construct($application)
    {
        $this->request = $application->getRequest();
        $this->databaseManager = $application->getDatabaseManager();
        $this->startSession();
        $this->generateCsrfToken();
    }

    public function run($action)
    {
        $this->actionName = $action;
        if (!method_exists($this, $action)) {
            throw new HttpNotFoundException();
        }
        $content = $this->$action();
        return $content;
    }

    protected function render($variables = [], $templete = null, $layout = 'layout')
    {
        $view = new View(__DIR__ . '/../views');
        if (is_null($templete)) {
            $templete = $this->actionName;
        }
        $controllerName = strtolower(substr(get_class($this), 0, -10));
        $path = $controllerName . '/' . $templete;
        return $view->render($path, $variables, $layout);
    }

    protected function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function generateCsrfToken() {
        if (!isset($_SESSION['token'])) {
            $_SESSION['token'] = uniqid('', true);
        }
    }

    public function verifyCsrfToken() {
        if ($this->request->isPost() && (!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] !== $_POST['token'])) {
            throw new HttpException("Invalid CSRF token", 403);
        }
    }
}
