<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Rate;
use App\Models\User;
use App\Models\Book;

class RateTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Review_model_configuation()
    {
        $model = new Rate();
        $fillable = [
            'book_id',
            'user_id',
            'stars',

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
        $table = 'rates';

        $this->runConfigurationAssertions($model, $fillable, $hidden, $guarded, $visible, $casts, $dates, $primaryKey, $collectionClass, $connection, $table);

    }

    public function test_Rate_belongsTo_User()
    {
        $m = new Rate();
        $r = new User();
        $relation = $m->user();
        $key = 'user_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

    public function test_Rate_belongsTo_Book()
    {
        $m = new Rate();
        $r = new Book();
        $relation = $m->book();
        $key = 'book_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

}
