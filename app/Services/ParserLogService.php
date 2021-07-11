<?php

namespace App\Services;

use App\Models\ParserLog;

class ParserLogService
{
    protected $parserLog;

    function __construct(ParserLog $parserLog)
    {
        $this->parserLog = $parserLog;
    }

    public function parseLogging($request)
    {
        $log = $this->parserLog->create([
            'request_method' => $request['request_method'],
            'url' => $request['url'],
            'response_http_code' => $request['response_http_code'],
            'response_body' => $request['response_body'],
            'created_at' => now()
        ]);

        return $log;
    }
}
