<?php

namespace Source\WebService;

use Source\Core\JWTToken;

class Api
{
    protected $headers;
    protected $response;
    protected $userAuth;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();
    }

    protected function call (int $code, ?string $status = null, ?string $message = null, ?string $type = null): Api
    {
        http_response_code($code);
        if(!empty($status)){
            $this->response = [
                "code" => $code,
                "type" => $type,
                "status" => $status,
                "message" => (!empty($message) ? $message : null)
            ];
        }
        return $this;
    }

    protected function back(?array $data = null): Api
    {
        if ($data) {
            $this->response["data"] = $data;
        }
        echo json_encode($this->response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return $this;
    }

    protected function auth(): bool
    {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            $this->call(401, "unauthorized", "Token não fornecido", "error")->back();
            return false;
        }

        $authHeader = trim($headers['Authorization']);
        $token = str_replace("Bearer ", "", $authHeader);

        $jwt = new JWTToken();
        $decoded = $jwt->decode($token);

        if (!$decoded) {
            $this->call(401, "unauthorized", "Token inválido ou expirado", "error")->back();
            return false;
        }

        return true;
    }

}