<?php

namespace FaDoe\Uuid;

use FaDoe\Uuid\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;

/**
 * Class UuidId
 *
 * @package FaDoe\Uuid
 */
abstract class UuidId
{
    /**
     * @var string
     */
    private $string;

    /**
     * @param string $string
     *
     * @return static
     */
    public static function fromString(string $string): self
    {
        if (false === Uuid::isValid($string)) {
            throw InvalidArgumentException::invalidId($string);
        }

        return new static($string);
    }

    /**
     * @return static
     */
    public static function generate(): self
    {
        return static::fromString(Uuid::uuid4()->toString());
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->string;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->string;
    }

    /**
     * UuidId constructor.
     *
     * @param $string
     */
    private function __construct($string)
    {
        $this->string = (string) $string;
    }
}
