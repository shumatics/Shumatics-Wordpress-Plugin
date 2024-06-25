<?php

class EndpointRoute
{

    public $routeNamespace = 'api/v1';
    public $route;
    public $routeCallback;
    public $routeMethod;
    public $routeArgs = [];
    public $overrideRoute = false;
    public $permissionCallback;

    function __construct($route, $routeCallback, $routeMethod, $routeArgs = [], $permissionCallback = true, $overrideRoute = false)
    {
        $this->route = $route;
        $this->routeCallback = $routeCallback;
        $this->routeMethod = $routeMethod;
        $this->routeArgs = $routeArgs;
        $this->permissionCallback = $permissionCallback;
        $this->overrideRoute = $overrideRoute;

        add_action('rest_api_init', [$this, 'register_api_endpoints']);
    }

    function register_api_endpoints()
    {
        register_rest_route(
            $this->routeNamespace,
            $this->route,
            [
                'methods'   => $this->routeMethod,
                'callback'  => [$this, $this->routeCallback],
                'args'      => $this->routeArgs
            ],
            $this->overrideRoute
        );
    }
}
