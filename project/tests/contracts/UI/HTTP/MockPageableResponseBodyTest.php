<?php

namespace SaaSFormation\Framework\Tests\Contracts\UI\HTTP;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MockPageableResponseBody::class)]
class MockPageableResponseBodyTest extends TestCase
{
    public function testMockPageableResponseBodyReturnsProperValues(): void {
        // Arrange
        $expectedPage = 1;
        $expectedPerPage = 20;
        $expectedTotalResults = 301;
        $expectedTotalPages = 16;
        $mockPageablePageableResponseBody = new MockPageableResponseBody($expectedPage, $expectedPerPage, $expectedTotalResults, $expectedTotalPages);

        // Act
        $data = $mockPageablePageableResponseBody->toArray();

        // Assert
        $this->assertEquals([
            'page' => $expectedPage,
            'per_page' => $expectedPerPage,
            'total_results' => $expectedTotalResults,
            'total_pages' => $expectedTotalPages,
        ], $data);
    }
}
