<?php

class SomeObject {
    protected $name;

    public function __construct(string $name) { }

    public function getObjectName() { }
}

class SomeObjectsHandler {
    public function __construct() { }

    public function handleObjects(array $objects): array {
        return array_map(fn($o) => 'handle_' . $o->getObjectName(), $objects);
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);