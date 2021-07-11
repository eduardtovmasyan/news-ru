<?php

namespace App\Services;

use ParserLog;
use GuzzleHttp\Client as GuzzleClient;

class ParserService
{
    const URL = 'http://static.feed.rbc.ru/rbc/logical/footer/news.rss';
    const MEDTHOD = 'GET';

    public function parserGet()
    {
        $client = new GuzzleClient();
        $response = $client->request(self::MEDTHOD, self::URL);
        $ResponseHTTPCode =$response->getStatusCode();
        $header = $response->getHeader('content-type')[0];
        $data = $response->getBody();
        $xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        $url = $array['channel']['link'];

        $log = [
            'request_method' => self::MEDTHOD,
            'url' => $url,
            'response_http_code' => $ResponseHTTPCode,
            'response_body' => $data,
        ];

        ParserLog::parseLogging($log);

        return $array;
    }
}
