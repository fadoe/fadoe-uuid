<?php

declare(strict_types=1);

namespace FaDoe\Uuid;

use Exception;
use FaDoe\Uuid\Exception\GenerateUuidException;
use FaDoe\Uuid\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use Stringable;

/**
 * Class UuidId
 *
 * @package FaDoe\Uuid
 */
abstract class UuidId implements Stringable
{
    /**
     * Create UUID from string
     */
    public static function fromString(string $string): static
    {
        if (false === Uuid::isValid($string)) {
            throw InvalidArgumentException::invalidId($string);
        }

        return new static($string);
    }

    /**
     * Generate UUID
     */
    public static function generate(): static
    {
        try {
            return static::fromString(Uuid::uuid4()->toString());
        } catch (Exception $exception) {
            throw new GenerateUuidException('Unable to generate Uuid', null, $exception);
        }
    }

    public function toString(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    private function __construct(private string $string)
    {
    }
}
