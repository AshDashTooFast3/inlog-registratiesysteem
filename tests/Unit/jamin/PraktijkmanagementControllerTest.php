<?php

namespace Tests\Unit\jamin;

use Tests\TestCase;
use Mockery;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PraktijkmanagementController;
use App\Models\User;

class PraktijkmanagementControllerTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_manageUserroles_returns_correct_view_with_users()
    {
        // Arrange: nep ingelogde user id
        Auth::shouldReceive('id')
            ->once()
            ->andReturn(4);

        // Arrange: nep data alsof het uit de DB kwam
        $fakeUsers = [
            ['id' => 1, 'name' => 'Tandarts', 'email' => 'tandarts@smilepro.nl', 'rolename' => 'tandarts'],
            ['id' => 2, 'name' => 'Mondhygienist', 'email' => 'mondhygienist@smilepro.nl', 'rolename' => 'mondhygienist'],
        ];

        // Arrange: mock van User model
        $userModelMock = Mockery::mock(User::class);

        $userModelMock->shouldReceive('sp_GetAllUsers')
            ->once()
            ->with(4)
            ->andReturn($fakeUsers);

        // Controller zonder dependency injection (geen argumenten)
        $controller = new PraktijkmanagementController($userModelMock);

        // Act
        $response = $controller->manageUserroles();

        // Assert: view naam
        $this->assertEquals('praktijkmanagement.userroles', $response->getName());

        // Assert: view data
        $data = $response->getData();
        $this->assertEquals('Gebruikersrollen', $data['title']);
        $this->assertEquals($fakeUsers, $data['users']);
    }
}
