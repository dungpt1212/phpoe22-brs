<?php

namespace Tests\Unit\Http\Controllers\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Mockery as m;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Http\Request;
use App\Http\Controllers\User\RequireBookController;
use App\Models\RequestNewbook;
use App\Models\User;
use Auth;



class RequireBookControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $db;
    protected $requestNewbookMock;


    public function setUp(): void
    {
        $this->afterApplicationCreated(function () {
            $this->db = m::mock(
                Connection::class.'[select,update,insert,delete]',
                [m::mock(\PDO::class)]
            );
            $manager = $this->app['db'];
            $manager->setDefaultConnection('mock');
            $r = new \ReflectionClass($manager);
            $p = $r->getProperty('connections');
            $p->setAccessible(true);
            $list = $p->getValue($manager);
            $list['mock'] = $this->db;
            $p->setValue($manager, $list);
            $this->requestNewbookMock = m::mock(RequestNewbook::class . '[update, delete]');
        });
        parent::setUp();
    }

    public function test_index_returns_view()
    {
        $user = new User([
            'id' => 1,
            'name' => 'dung'
        ]);
        $this->be($user);
        $controller = new RequireBookController();
        $this->db->shouldReceive('select')->once()->withArgs([
            'select * from "request_newbooks" where "user_id" = ?',
            [1],
            m::any(),
        ])->andReturn((object) []);

        $view = $controller->index();
        $this->assertEquals('user.book-require-list', $view->getName());
        $this->assertArrayHasKey('requests', $view->getData());
    }

    public function test_create_returns_view()
    {
        $controller = new RequireBookController();
        $view = $controller->create();
        $this->assertEquals('user.book-require', $view->getName());

    }

    /*public function test_it_stores_new_requestNewBook()
    {
        $controller = new RequireBookController();
        $this->db->shouldReceive('insert')
            ->once()
            ->withArgs([
                'insert into "request_newbooks" ("book_name", "author", "request_content", "user_id") values (?, ?, ?, ?)',
                m::on(function ($arg) {
                    return is_array($arg) &&
                    $arg[0] == 'New City';
                })
            ])
            ->andReturn(true);
    }*/

    public function test_edit_requestNewbook()
    {
        $id = 1;
        $controller = new RequireBookController();
        $require = $this->db->shouldReceive('select')->once()->withArgs([
            'select * from "request_newbooks" where "id" = ? limit 1',
            [$id],
            m::any(),
        ])->andReturn((object) []);
        $view = $controller->edit($id);
        $this->assertEquals('user.book-require-update', $view->getName());
        $this->assertArrayHasKey('require', $view->getData());
    }


}
