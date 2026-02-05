<?php
namespace core\DI;

class Container {
    private array $instances = [];

    public function get(string $class) {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        $object = $this->build($class);

        $this->instances[$class] = $object;
        return $object;
    }

    private function build(string $class) {
        if (!class_exists($class)) {
            throw new \Exception("Класс {$class} не знайдено");
        }

        $reflection = new \ReflectionClass($class);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $class();
        }

        $params = [];
        foreach ($constructor->getParameters() as $param) {
            $type = $param->getType();
            if ($type === null) {
                throw new \Exception("Не можу оприділити залежність для {$param->name}");
            }
            $params[] = $this->get($type->getName());
        }

        return $reflection->newInstanceArgs($params);
    }
}