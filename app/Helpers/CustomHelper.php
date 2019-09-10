<?php
use App\Models\Book;
use App\Models\ReviewLike;
use App\Models\User;
use App\Models\UserActivity;


if (!function_exists('avgRate')) {
     function avgRate($bookRate)
    {
        $numberRates = $bookRate->count();
        $totalStars = 0;
        $totalStars = $bookRate->sum('stars');
        $averageStars = ($numberRates != 0) ? floor($totalStars / $numberRates) : 0;

        return $averageStars;
    }

    function numberLike($id)
    {
        $reviewlikes = ReviewLike::where([
            ['review_id', '=', $id],
            ['like', '=', 1],
        ])->count();

        return $reviewlikes;

    }

    function numberUnLike($id)
    {
        $reviewlikes = ReviewLike::where([
            ['review_id', '=', $id],
            ['unlike', '=', 1],
        ])->count();

        return $reviewlikes;

    }

    function checkUserLikedReview($id)
    {
        $reviewLike = ReviewLike::where([
            ['review_id', '=', $id],
            ['like', '=', 1],
            ['user_id', '=', Auth::user()->id],

        ])->first();

        $result = (!empty($reviewLike)) ? 1 : 0;

        return $result;


    }

    function checkUserUnLikedReview($id)
    {
        $reviewLike = ReviewLike::where([
            ['review_id', '=', $id],
            ['unlike', '=', 1],
            ['user_id', '=', Auth::user()->id],

        ])->first();

        $result = (!empty($reviewLike)) ? 1 : 0;

        return $result;
    }

    function checkActivityRelatedTable($userActivity)
    {
        $id = $userActivity->type_id;
        if($userActivity->activity->type == 1) {
            $data = User::findOrFail($id);
        }else {
            $data = Book::findOrFail($id);
        }

        return $data;
    }

}
