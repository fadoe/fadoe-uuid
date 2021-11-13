<?php

declare(strict_types=1);

namespace FaDoe\Uuid\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;

final class InvalidArgumentException extends BaseInvalidArgumentException implements Exception
{
    public static function invalidId(string $id): self
    {
        $msg = sprintf('Invalid uuid "%s"', $id);

        return new self($msg);
    }
}
