<?php

namespace Tests\Unit\Http\Requests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\VoteRequest;

class VoteRequestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_contains_valid_rules()
    {
        $r = new VoteRequest();

        $this->assertEquals([
        'star' => 'required',

        ], $r->rules());
    }
}
