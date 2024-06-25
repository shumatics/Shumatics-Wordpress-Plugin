<?php

class SuccessResponse
{

    public $code;
    public $data;

    function __construct($code, $data = [])
    {
        $this->code = $code;
        $this->data = $data;

        $this->success();
    }

    function success()
    {
        return new WP_REST_Response([
            'code' => $this->code,
            'data' => $this->data
        ], 200);
    }
}
