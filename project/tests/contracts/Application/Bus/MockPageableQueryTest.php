<?php

namespace SaaSFormation\Framework\Tests\Contracts\Application\Bus;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MockPageableQuery::class)]
class MockPageableQueryTest extends TestCase
{
    public function testMockPageableQueryReturnsProperValues(): void {
        // Arrange
        $expectedPage = 1;
        $expectedPerPage = 20;
        $mockPageablePageableQuery = new MockPageableQuery($expectedPage, $expectedPerPage);

        // Act
        $page = $mockPageablePageableQuery->page();
        $perPage = $mockPageablePageableQuery->perPage();

        // Assert
        $this->assertEquals($expectedPage, $page);
        $this->assertEquals($expectedPerPage, $perPage);
    }
}
