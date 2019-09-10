<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\ReviewLike;
use App\Models\User;
use App\Models\Review;

class ReviewLikeTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_ReviewLike_model_configuation()
    {
        $model = new ReviewLike();
        $fillable = [
            'review_id',
            'user_id',
            'like',
            'unlike',

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
        $table = 'review_like';

        $this->runConfigurationAssertions($model, $fillable, $hidden, $guarded, $visible, $casts, $dates, $primaryKey, $collectionClass, $connection, $table);

    }

    public function test_ReviewLike_belongsTo_User()
    {
        $m = new ReviewLike();
        $r = new User();
        $relation = $m->user();
        $key = 'user_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

    public function test_ReviewLike_belongsTo_Review()
    {
        $m = new ReviewLike();
        $r = new Review();
        $relation = $m->review();
        $key = 'review_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

}
