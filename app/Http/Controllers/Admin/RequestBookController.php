<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RequestNewbook;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Enums\Status;

class RequestBookController extends Controller
{
    public function index()
    {
        $requestBook = RequestNewbook::orderBy('id', 'DESC')
            ->paginate(config('limitdata.list_records'));

        return view('admin.book.requestbook', compact('requestBook'));
    }

    public function edit($id)
    {
        try {
            $data = [
                'bookInfo' => RequestNewbook::findOrfail($id),
                'user_name' => RequestNewbook::findOrfail($id)->user->name,
            ];
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $newbook = RequestNewbook::findOrFail($id);
            $newbook->status = $request->status;
            $newbook->save();
            $returnHTML = view('admin.book.requestbookByAjax')->with('newbook', $newbook)->render();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        return response()->json([
                'id' => $newbook->id,
                'returnHTML' => $returnHTML,
            ]);
    }
}
