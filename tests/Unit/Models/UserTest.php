<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Rate;
use App\Models\Review;
use App\Models\RequestNewbook;
use App\Models\ReviewLike;
use App\Models\UserFollow;
use App\Models\Book;
use App\Models\Activity;

class UserTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_User_model_configuation()
    {
        $model = new User();
        $fillable = [
            'id',
            'name',
            'email',
            'password',
            'avatar',
            'role',

        ];
        $hidden = [
            'password',
            'remember_token',
        ];
        $guarded = ['*'];
        $visible = [];
        $casts = [
            'id' => 'int',
            'email_verified_at' => 'datetime',
        ];
        $dates = ['created_at', 'updated_at'];
        $primaryKey = 'id';
        $collectionClass = Collection::class;
        $connection = null;
        $table = 'users';

        $this->runConfigurationAssertions($model, $fillable, $hidden, $guarded, $visible, $casts, $dates, $primaryKey, $collectionClass, $connection, $table);

    }

    public function test_user_hasMany_rates()
    {
        $m = new User();
        $r = new Rate();
        $relation = $m->rates();
        $key = 'user_id';
        $parent = 'id';

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent );
    }

    public function test_user_hasMany_reviews()
    {
        $m = new User();
        $r = new Review();
        $relation = $m->reviews();
        $key = null;
        $parent = null;

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent);
    }

    public function test_user_hasMany_request_newbooks()
    {
        $m = new User();
        $r = new RequestNewBook();
        $relation = $m->requestNewBooks();
        $key = null;
        $parent = null;

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent);
    }

    public function test_user_hasMany_reviewLikes()
    {
        $m = new User();
        $r = new ReviewLike();
        $relation = $m->reviewLikes();
        $key = null;
        $parent = null;

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent);
    }

    public function test_user_hasMany_userFollows()
    {
        $m = new User();
        $r = new UserFollow();
        $relation = $m->userFollows();
        $key = null;
        $parent = null;

        $this->assertHasManyRelation($relation, $m, $r, $key, $parent);
    }

    public function test_user_belongsToMany_book(){
        $m = new User();
        $r = new Book();
        $relation = $m->books();
        $foreignPivotKey = 'book_users.book_id';
        $relatedPivotKey = 'book_users.user_id';

        $this->assertBelongsToManyRelation($relation, $m, $r, $foreignPivotKey, $relatedPivotKey);
    }

    public function test_user_belongsToMany_activity(){
        $m = new User();
        $r = new Activity();
        $relation = $m->activities();
        $foreignPivotKey = 'user_activity.user_id';
        $relatedPivotKey = 'user_activity.activity_id';

        $this->assertBelongsToManyRelation($relation, $m, $r, $foreignPivotKey, $relatedPivotKey);
    }

}
