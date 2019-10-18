<?php
use App\Models\Book;
use App\Models\BookUser;
use App\Models\ReviewLike;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\Notification;


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

    function getDataFromAdminNotification($notification)
    {
        $notice = $notification->data;
        $user = User::find($notice['sender']);
        $data = [];
        $data['user'] = $user->name;
        $data['idRequire'] = $notice['id'];
        $data['nameBook'] = $notice['book_name'];

        return $data;
    }

    function getReadingBooksByUser($id)
    {
        $bookUsers = BookUser::where([
            'user_id' => $id,
            'reading' => config('constant.reading'),
        ])->pluck('book_id')->toArray();
        $readingBooks = Book::whereIn('id', $bookUsers)->get();

        return $readingBooks;
    }

}

if (!function_exists('getDataFromRequest')) {
    function getDataFromRequest($data)
    {
        if (isset($data['image'])) {
            $file_upload = $data['image'];
            $file_upload = $file_upload->move(public_path('images'), $file_upload->getClientOriginalName());
            $fileName = pathinfo($file_upload);
            $data['image'] = $fileName['basename'];
        }
        return $data;
    }
}
