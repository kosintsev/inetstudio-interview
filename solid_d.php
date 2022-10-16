<?php

abstract class XMLHttpService extends XMLHTTPRequestService {
    private XMLHttpService $service;
    public abstract function request(string $url);
}

class HttpPostRequest extends XMLHttpService {
    private $service;

    public function __construct(XMLHttpService $xmlHttpService) {
        $this->service = $xmlHttpService;
    }

    public function request(string $url) {
        $this->service->request($url, 'POST');
    }
}

class HttpGetRequest extends XMLHttpService {
    private $service;
    private $options;

    public function __construct(XMLHttpService $xmlHttpService, array $options) {
        $this->service = $xmlHttpService;
        $this->options = $options;
    }

    public function request(string $url) {
        $this->service->request($url, 'GET', $this->options);
    }
}