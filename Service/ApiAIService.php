<?php

namespace LPStudio\ApiAIBundle\Service;

use ApiAi\Client;
use ApiAi\Method\QueryApi;
use ApiAi\Model\Query;
use Symfony\Component\DependencyInjection\Container;

class ApiAIService
{
    protected $container;
    private static $config = []; //Replace with your config if it's not in config.yml

    public function __construct(Container $container)
    {
        $this -> container = $container;
        if (sizeof(self::$config) == 0){
            self::$config = array(
                'access_token' => $this -> container -> getParameter('api_ai.access_token')
            );
        }
    }

    public function sendClientQuery($query)
    {
        try {
            $client = new Client(self::$config['access_token']);
            $query = $client -> get('query', [
                'query' => $query
            ]);
            return (string)$query -> getBody();
        } catch (\Exception $e){
            throw $e;
        }
    }

    public function sendQuery($query, $sessionId, $lang)
    {
        try {
            $client = new Client(self::$config['access_token']);
            $queryApi = new QueryApi($client);
            $meaning = $queryApi -> extractMeaning($query, [
                'sessionId' => $sessionId,
                'lang' => $lang
            ]);
            return new Query($meaning);
        } catch (\Exception $e){
            throw $e;
        }
    }
}