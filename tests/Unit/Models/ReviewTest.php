<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Review;
use App\Models\Comment;
use App\Models\User;
use App\Models\Book;
use App\Models\ReviewLike;

class ReviewTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Review_model_configuation()
    {
        $model = new Review();
        $fillable = [
            'review_content',
            'user_id',
            'book_id',

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
        $table = 'reviews';

        $this->runConfigurationAssertions($model, $fillable, $hidden, $guarded, $visible, $casts, $dates, $primaryKey, $collectionClass, $connection, $table);

    }

    public function test_Review_hasMany_Comments()
    {
        $m = new Review();
        $r = new Comment();
        $relation = $m->comments();
        $key = 'review_id';
        $parent = 'id';

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent );
    }

    public function test_Review_belongsTo_User()
    {
        $m = new Review();
        $r = new User();
        $relation = $m->user();
        $key = 'user_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

    public function test_Review_belongsTo_Book()
    {
        $m = new Review();
        $r = new Book();
        $relation = $m->book();
        $key = 'book_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

    public function test_Review_hasMany_ReviewLikes()
    {
        $m = new Review();
        $r = new ReviewLike();
        $relation = $m->reviewLikes();
        $key = 'review_id';
        $parent = 'id';

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent );
    }

}
