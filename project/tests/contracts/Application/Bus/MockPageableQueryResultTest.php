<?php

namespace SaaSFormation\Framework\Tests\Contracts\Application\Bus;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MockPageableQueryResult::class)]
class MockPageableQueryResultTest extends TestCase
{
    public function testMockPageableQueryResultReturnsProperValues(): void {
        // Arrange
        $expectedPage = 1;
        $expectedPerPage = 20;
        $expectedTotalResults = 301;
        $expectedTotalPages = 16;
        $mockPageablePageableQueryResult = new MockPageableQueryResult($expectedPage, $expectedPerPage, $expectedTotalResults, $expectedTotalPages);

        // Act
        $page = $mockPageablePageableQueryResult->page();
        $perPage = $mockPageablePageableQueryResult->perPage();
        $totalResults = $mockPageablePageableQueryResult->totalResults();
        $totalPages = $mockPageablePageableQueryResult->totalPages();

        // Assert
        $this->assertEquals($expectedPage, $page);
        $this->assertEquals($expectedPerPage, $perPage);
        $this->assertEquals($expectedTotalResults, $totalResults);
        $this->assertEquals($expectedTotalPages, $totalPages);
    }
}
