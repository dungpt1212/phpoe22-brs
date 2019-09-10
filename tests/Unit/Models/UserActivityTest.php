<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\ModelTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\UserActivity;
use App\Models\User;
use App\Models\Activity;

class UserActivityTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_UserActivity_model_configuation()
    {
        $model = new UserActivity();
        $fillable = [
            'user_id',
            'activity_id',
            'type_id',

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
        $table = 'user_activity';

        $this->runConfigurationAssertions($model, $fillable, $hidden, $guarded, $visible, $casts, $dates, $primaryKey, $collectionClass, $connection, $table);

    }

    public function test_UserActivity_belongsTo_User()
    {
        $m = new UserActivity();
        $r = new User();
        $relation = $m->user();
        $key = 'user_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

    public function test_UserActivity_belongsTo_Activity()
    {
        $m = new UserActivity();
        $r = new Activity();
        $relation = $m->activity();
        $key = 'activity_id';
        $owner = null;

        $this->assertBelongsToRelation($relation, $m, $r, $key, $owner );
    }

}
