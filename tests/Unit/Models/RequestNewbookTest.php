<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\RequestNewbook;
use App\Models\User;

class RequestNewbookTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_RequestNewbook_model_configuation()
    {
        $model = new RequestNewbook();
        $fillable = [
            'book_name',
            'author',
            'request_content',
            'user_id',
            'status',

        ];
        $hidden = [];
        $guarded = ['*'];
        $visible = [];
        $casts = [
            'id' => 'int',

        ];
        $dates = ['created_at', 'updated_at'];
        $primaryKey = 'id';
        $collectionClass = Collection::class;
        $connection = null;
        $table = 'request_newbooks';

        $this->runConfigurationAssertions($model, $fillable, $hidden, $guarded, $visible, $casts, $dates, $primaryKey, $collectionClass, $connection, $table);

    }

    public function test_RequestNewbook_belongsTo_User()
    {
        $m = new RequestNewbook();
        $r = new User();
        $relation = $m->user();
        $key = 'user_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

    public function test_accessor_status()
    {
        $dbRequestNewBook = DB::select('select * from request_newbooks where id = 1');
        $dbStatus = $dbRequestNewBook[0]->status;
        $dbStatus = ($dbStatus == 1) ? "<strong>Resolved</strong>" : "Processing";

        $modelRequestNewBook = RequestNewbook::find(1);
        $modelStatus = $modelRequestNewBook->status;

        $this->assertEquals($dbStatus, $modelStatus);
    }

}
