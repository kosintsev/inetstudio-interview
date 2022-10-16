<?php
class Concept {
    private $client;
    private $storage;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
        $this->storage = new \RedisStorage();
    }

    public function getUserData() {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    private function getSecretKey(): string {
        return $this->storage->get('token')??'';
    }
}

interface StorageStrategy
{
    public function save($fieldName);
    public function get($fieldName);
}

class RedisStorage implements StorageStrategy
{
    public function __construct() {}
    public function save($fieldName) {}
    public function get($fieldName) {}
}

class FileStorage implements StorageStrategy
{
    public function __construct() {}
    public function save($fieldName) {}
    public function get($fieldName) {}
}

class DbStorage implements StorageStrategy
{
    public function __construct() {}
    public function save($fieldName) {}
    public function get($fieldName) {}
}

class CloudStorage implements StorageStrategy
{
    public function __construct() {}
    public function save($fieldName) {}
    public function get($fieldName) {}
}
