<?php

namespace MinPhp\Core;

use MinPhp\Core\Contracts\KernelInterface;
use MinPhp\Http\Constants\HttpStatusCode;
use MinPhp\Http\Contracts\RequestInterface;
use MinPhp\Http\Contracts\ResponseInterface;
use MinPhp\Http\Request;
use MinPhp\Http\Response;
use MinPhp\Routing\Router\Contracts\RouterInterface;
use MinPhp\Routing\Router\Router;

class Kernel implements KernelInterface
{
    private RouterInterface $router;
    private RequestInterface $request;
    private ResponseInterface $response;

    public function __construct()
    {
        $this->router = new Router();
        $this->request = new Request(
            $_SERVER['REQUEST_METHOD'],
            $_SERVER['REQUEST_URI']
        );
        $this->response = new Response();
    }

    public function run(array $routes): void
    {
        $this->router->registerRoutes($routes);

        $page = $this->router->handleRequest($this->request);

        if ($page === null) {
            $this->response->setStatusCode(HttpStatusCode::STATUS_404);
            $this->response->setBody('Page not found');
            $this->response->send();
        }

        $content = $page->render();

        if (defined('MINPHP_START')) {
            $diff = microtime(true) - MINPHP_START;
            $milliseconds = number_format($diff * 1000, 2, ',', '.');
            $content .= "<br><br>Request lifetime: $milliseconds ms";
        }

        $this->response->setBody($content);
        $this->response->send();
    }
}