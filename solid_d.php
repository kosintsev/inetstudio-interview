<?php

abstract class XMLHttpService extends XMLHTTPRequestService {
    private XMLHttpService $service;
    public abstract function post(string $url);
    public abstract function get(string $url, array $options);
}

class Http extends XMLHttpService {
    private $service;

    public function __construct(XMLHttpService $xmlHttpService) {
        $this->service = $xmlHttpService;
    }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}