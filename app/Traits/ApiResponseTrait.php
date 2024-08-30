<?php

namespace App\Traits;

trait ApiResponseTrait
{
    private function parseGivenData(array $data = [], int $statusCode = 200, array $headers = []): array
    {

        //success, message, result, errors, exeception, status, error_code

        $responseStructure = [

            'success' => $data['success'] ?? false,
            'message' => $data['message'] ?? null,
            'result' => $data['result'] ?? null
        ];

        if (isset($data['errors'])) {
            $responseStructure['errors'] = $data['errors'];
        }

        if (isset($data['errors'])) {
            $statusCode = $data['status'];
        }

        if (isset($data['exception']) && ($data['exception'] instanceof \Error || $data['exception'] instanceof \Exception)) {

            //VERIFICAR SE O AMBIENTE EH DE PRODUCAO
            if (config(key: 'app.env') !== 'production') {
                $responseStructure['exception'] = [
                    'message' => $data['exception']->getMessage(),
                    'file' => $data['exception']->getFile(),
                    'line' => $data['exception']->getLine(),
                    'code' => $data['exception']->getCode(),
                    'trace' => $data['exception']->getTrace(),
                ];
            }

            if ($statusCode == 200) {
                $statusCode = 500;
            }
        }

        if ($data['success'] === false) {
            if (isset($data['error_code'])) {
                $responseStructure['error_code'] = $data['error_code'];
            } else {
                $responseStructure['error_code'] = 1;
            }
        }

        return ['content' => $responseStructure, 'statusCode' => $statusCode, 'headers' => $headers];
    }

    public function apiResponse(array $data = [], int $statusCode = 200, array $headers = [])
    {

        $result = $this->parseGivenData($data, $statusCode, $headers);
        return response()->json($result['content'], $result['statusCode'],  $result['headers']);
    }
}
