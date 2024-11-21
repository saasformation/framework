<?php

namespace SaaSFormation\Framework\Tests\Projects\Infrastructure\API;

use League\Route\Router;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use React\Http\Message\Request;
use React\Http\Message\Response;
use React\Http\Message\ServerRequest;
use SaaSFormation\Framework\Projects\Infrastructure\API\LeagueBasedRouter;
use PHPUnit\Framework\TestCase;

#[CoversClass(LeagueBasedRouter::class)]
class LeagueBasedRouterTest extends TestCase
{
    #[Test]
    public function checkRouteCallsLeagueRouterProperly(): void
    {
        // Arrange
        $request = new ServerRequest('GET', '/foo');
        $expectedResponse = new Response(200);
        /** @var MockObject&Router $leagueRouter */
        $leagueRouter = $this->createMock(Router::class);
        $leagueRouter->expects($this->once())->method('dispatch')->with($request)->willReturn($expectedResponse);
        $leagueBasedRouter = new LeagueBasedRouter($leagueRouter);

        // Act
        $response = $leagueBasedRouter->route($request);

        // Assert
        $this->assertEquals($expectedResponse, $response);
    }
}
