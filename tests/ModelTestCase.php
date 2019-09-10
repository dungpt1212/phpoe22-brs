<?php

namespace Tests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

abstract class ModelTestCase extends TestCase
{
    protected function runConfigurationAssertions(
        Model $model,
        $fillable = [],
        $hidden = [],
        $guarded = ['*'],
        $visible = [],
        $casts = ['id' => 'int', ],
        $dates = ['created_at', 'updated_at'],
        $primaryKey = 'id',
        $collectionClass = Collection::class,
        $connection = null,
        $table = null

    )
    {
        $this->assertEquals($fillable, $model->getFillable());
        $this->assertEquals($hidden, $model->getHidden());
        $this->assertEquals($guarded, $model->getGuarded());
        $this->assertEquals($visible, $model->getVisible());
        $this->assertEquals($casts, $model->getCasts());
        $this->assertEquals($dates, $model->getDates());
        $this->assertEquals($primaryKey, $model->getKeyname());

        $c = $model->newCollection();
        $this->assertEquals($collectionClass, get_class($c));

        if ($connection !== null) {
            $this->assertEquals($connection, $model->getConnectionName());
        }
        if ($table !== null) {
            $this->assertEquals($table, $model->getTable());
        }

    }

    protected function assertHasManyRelation($relation, Model $model, Model $related, $key = null, $parent = null, \Closure $queryCheck = null)
    {
        $this->assertInstanceOf(HasMany::class, $relation);

        if (!is_null($queryCheck)) {
            $queryCheck->bindTo($this);
            $queryCheck($relation->getQuery(), $model, $relation);
        }

        if (is_null($key)) {
            $key = $model->getForeignKey();
        }
        $this->assertEquals($key, $relation->getForeignKeyName());

        if (is_null($parent)) {
            $parent = $model->getKeyName();
        }
        $this->assertEquals($model->getTable().'.'.$parent, $relation->getQualifiedParentKeyName());
    }

    protected function assertBelongsToRelation($relation, Model $model, Model $related, $key, $owner = null, \Closure $queryCheck = null)
    {
        $this->assertInstanceOf(BelongsTo::class, $relation);

        if (!is_null($queryCheck)) {
            $queryCheck->bindTo($this);
            $queryCheck($relation->getQuery(), $model, $relation);
        }

        $this->assertEquals($key, $relation->getForeignKeyName());

        if (is_null($owner)) {
            $owner = $related->getKeyName();
        }
        $this->assertEquals($owner, $relation->getOwnerKeyName());
    }

    protected function assertBelongsToManyRelation($relation, Model $model, Model $related, $foreignPivotKey, $relatedPivotKey)
    {
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals($foreignPivotKey, $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals($relatedPivotKey, $relation->getQualifiedRelatedPivotKeyName());

    }




}
