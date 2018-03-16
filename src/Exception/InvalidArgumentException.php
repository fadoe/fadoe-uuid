<?php

namespace FaDoe\Uuid\Exception;

/**
 * Class InvalidArgumentException
 *
 * @package FaDoe\Uuid\Exception
 */
class InvalidArgumentException extends \InvalidArgumentException implements Exception
{
    /**
     * @param string $id
     *
     * @return InvalidArgumentException
     */
    public static function invalidId(string $id): self
    {
        $msg = sprintf('Invalid uuid "%s"', $id);

        return new self($msg);
    }
}
