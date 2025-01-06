<?php

declare(strict_types=1);

namespace Chronoarc\Marvel\Traits;

use Chronoarc\Marvel\Exceptions\InvalidAttributeTypeException;
use DateTimeInterface;
use ReflectionClass;
use ReflectionParameter;

trait HasArrayableAttributes
{
    use HasComplexArrayTypes;

    protected static string $datetimeFormat = 'Y-m-d\\TH:i:sP';

    /**
     * @var array<string, string>
     * A mapping of internal attribute names to their original names per the API specification.
     */
    protected static array $attributeMap = [];

    /**
     * Converts the object's attributes to an array.
     *
     * @return array<string, mixed>
     * @throws InvalidAttributeTypeException
     */
    public function toArray(): array
    {
        $constructor = $this->getConstructorOrFail();
        $attributeTypes = $this->resolveAttributeTypes($constructor->getParameters());

        $asArray = array_reduce(array_keys($attributeTypes), function (array $carry, string $name) use ($attributeTypes) {
            $value = $this->{$name};
            $type = $attributeTypes[$name];
            $attributeAsArray = $this->valueToArray($value, $type);

            if ($name === 'additionalProperties') {
                return array_merge($carry, $attributeAsArray);
            }

            $originalName = static::$attributeMap[$name] ?? $name;
            $carry[$originalName] = $attributeAsArray;

            return $carry;
        }, []);

        return array_filter($asArray, fn($v) => $v !== null);
    }

    /**
     * Converts a value to an array based on its type.
     *
     * @param mixed $value
     * @param string|array $type
     * @return mixed
     * @throws InvalidAttributeTypeException
     */
    public function valueToArray(mixed $value, array|string $type): mixed
    {
        if (is_null($value)) {
            return null;
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format(static::$datetimeFormat);
        }

        if (is_string($type)) {
            return $this->handleStringType($value, $type);
        }

        if (is_array($type)) {
            return $this->handleArrayType($value, $type);
        }

        throw new InvalidAttributeTypeException("Unrecognized attribute type `$type`");
    }

    /**
     * Handles conversion for string types.
     *
     * @param mixed $value
     * @param string $type
     * @return mixed
     */
    private function handleStringType(mixed $value, string $type): mixed
    {
        if (class_exists($type)) {
            return $value->toArray();
        }

        return $value;
    }

    /**
     * Handles conversion for array types.
     *
     * @param mixed $value
     * @param array $type
     * @return mixed
     */
    private function handleArrayType(mixed $value, array $type): mixed
    {
        if (is_null($value)) {
            return null;
        }

        return array_map(fn($item) => $this->valueToArray($item, $type[0]), $value);
    }

    /**
     * Retrieves the constructor of the current class or throws an exception if not found.
     *
     * @return \ReflectionMethod
     * @throws InvalidAttributeTypeException
     */
    private function getConstructorOrFail(): \ReflectionMethod
    {
        $constructor = (new ReflectionClass(static::class))->getConstructor();

        if (!$constructor) {
            throw new InvalidAttributeTypeException('Class to be deserialized must have a constructor');
        }

        return $constructor;
    }

    /**
     * Resolves the attribute types from the constructor parameters.
     *
     * @param ReflectionParameter[] $parameters
     * @return array<string, string>
     */
    private function resolveAttributeTypes(array $parameters): array
    {
        return array_reduce($parameters, function (array $carry, ReflectionParameter $param) {
            $name = $param->getName();
            $type = $param->getType()->getName();

            if ($type === 'array') {
                $type = static::getArrayType($name);
            }

            $carry[$name] = $type;
            return $carry;
        }, []);
    }
}
