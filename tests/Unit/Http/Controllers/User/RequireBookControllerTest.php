<?php

namespace Tests\Unit\Http\Controllers\User;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\User\RequireBookController;
use App\Http\Requests\RequireBookFormRequest;
use App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Models\RequestNewbook;
use Mockery as m;



class RequireBookControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    private $requireBookRepo;
    private $userRepo;
    private $request;
    public function setUp(): void
    {
        parent::setup();
        $this->requireBookRepo = m::mock(RequestNewBookRepositoryInterface::class);
        $this->userRepo = m::mock(UserRepositoryInterface::class);
        $this->request = m::mock(RequireBookFormRequest::class);
    }
    public function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }
    public function test_index()
    {
        $controller = new RequireBookController($this->requireBookRepo, $this->userRepo);

        $this->userRepo->shouldReceive('getAuthId')->once()->andReturn(array());
        $this->requireBookRepo->shouldReceive('getRequireBook')->once()->andReturn(array());

        $view = $controller->index();

        $this->assertEquals('user.book-require-list', $view->getName());
        $this->assertArrayHasKey('requests', $view->getData());


    }

    public function test_create()
    {
        $controller = new RequireBookController($this->requireBookRepo, $this->userRepo);
        $view = $controller->create();
        $this->assertEquals('user.book-require', $view->getName());

    }

    public function test_store()
    {
        $controller = new RequireBookController($this->requireBookRepo, $this->userRepo);

        $this->request->shouldReceive('all')->once()->andReturn(array());
        $this->userRepo->shouldReceive('getAuthId')->once()->andReturn(array());
        $this->requireBookRepo->shouldReceive('create')->once()->andReturn(new RequestNewbook());

        $response = $controller->store($this->request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('require.index'), $response->headers->get('location'));

    }

    public function test_edit()
    {
        $id = 1;
        $controller = new RequireBookController($this->requireBookRepo, $this->userRepo);
        $this->requireBookRepo->shouldReceive('find')->once()->andReturn(new RequestNewbook());
        $this->userRepo->shouldReceive('getAuthId')->once()->andReturn(array());

        $view = $controller->edit($id);

        $this->assertEquals('user.book-require-update', $view->getName());
        $this->assertArrayHasKey('require', $view->getData());
    }

    public function test_update()
    {
        $id = 1;
        $controller = new RequireBookController($this->requireBookRepo, $this->userRepo);
        $this->requireBookRepo->shouldReceive('find')->once()->andReturn(new RequestNewbook());
        $this->request->shouldReceive('all')->once()->andReturn(array());
        $this->requireBookRepo->shouldReceive('update')->once()->andReturn(new RequestNewbook());

        $response = $controller->update($this->request, $id);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('require.index'), $response->headers->get('location'));

    }

    public function test_destroy()
    {
        $id = 1;
        $controller = new RequireBookController($this->requireBookRepo, $this->userRepo);
        $this->requireBookRepo->shouldReceive('find')->once()->andReturn(new RequestNewbook());
        $this->userRepo->shouldReceive('getAuthId')->once()->andReturn(array());
        $this->requireBookRepo->shouldReceive('delete')->once()->andReturn(new RequestNewbook());

        $response = $controller->destroy($id);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('require.index'), $response->headers->get('location'));
    }

}
