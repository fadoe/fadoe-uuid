<?php

namespace FaDoe\Uuid;

use FaDoe\Uuid\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Class UuidIdTest
 *
 * @package FaDoe\Uuid
 */
class UuidIdTest extends TestCase
{
    public function testFromString()
    {
        $uuId = 'd1de9589-1571-4922-a14d-09c43a46637a';
        $uuId = UuidStub::fromString($uuId);

        $this->assertInstanceOf(UuidId::class, $uuId);
        $this->assertEquals($uuId, $uuId->toString());
        $this->assertEquals($uuId, (string) $uuId);
    }

    public function testFromStringWithInvalidParameter()
    {
        $this->expectException(InvalidArgumentException::class);
        $uuId = UuidStub::fromString('invalid');
    }

    public function testGenerateId()
    {
        $uuid = UuidStub::generate();
        $this->assertEquals(36, strlen($uuid));
    }
}
