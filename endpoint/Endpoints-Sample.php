<?php
class Endpoint_Sample extends EndpointRoute
{

    function __construct($route, $routeCallback, $routeMethod, $routeArgs = [], $overrideRoute = false)
    {
        parent::__construct($route, $routeCallback, $routeMethod, $routeArgs, $overrideRoute);
    }

    public function samplefunction(\WP_REST_Request $req)
    {
        $auth = $req->get_header('Authorization');
        $user = checkAuth($auth);

        if ($user === false) {
            return new \WP_Error('rest_forbidden_user', __('Sorry, you are not allowed to do that.'), ['status' => 401]);
        }

        $notifUnread = Notifications::getNotificationUnread($user->ID);

        return new \SuccessResponse('success', $notifUnread);
    }

    public function functionsample1(\WP_REST_Request $req)
    {
        $auth = $req->get_header('Authorization');
        $user = checkAuth($auth);

        if ($user === false) {
            return new \WP_Error('rest_forbidden_user', __('Sorry, you are not allowed to do that.'), ['status' => 401]);
        }

        $data = $req->get_params(); // GET PARAMS

        foreach ($data['id'] as $i) {
            $read = Notifications::addNotificationRead($user->ID, $i);
        }

        return new \SuccessResponse('success');
    }

    public function testsample(\WP_REST_Request $req)
    {
        $auth = $req->get_header('Authorization');
        $user = checkAuth($auth);

        if ($user === false) {
            return new \WP_Error('rest_forbidden_user', __('Sorry, you are not allowed to do that.'), ['status' => 401]);
        }

        $postObj = $req->get_json_params(); //POST PARAMS

        $delete = Notifications::deleteNotification($user->ID, $data['id']);

        return new \SuccessResponse('success');
    }
}
