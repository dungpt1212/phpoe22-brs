<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestNewbook;
use App\Models\User;
use App\Http\Requests\RequireBookFormRequest;
use App\Events\CreateRequireAddNewBookEvent;
use Auth;

class RequireBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create']]);
    }

    public function index()
    {
        $requests = RequestNewbook::where('user_id', Auth::user()->id)->get();

        return view('user.book-require-list', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.book-require');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequireBookFormRequest $request)
    {
        $requestNewbook = RequestNewbook::firstOrCreate([
            'book_name' => $request->get('book_name'),
            'author' => $request->get('author'),
            'request_content' => $request->get('request_content'),
            'user_id' => Auth::user()->id,

        ]);

        if($requestNewbook->wasRecentlyCreated == true) {
            event(new CreateRequireAddNewBookEvent($requestNewbook));
        }else{
            return redirect()->back()->with('status', trans('client.this_book_required'));
        }

        return redirect(route('require.index'))->with('status', trans('client.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $require = RequestNewbook::where('id', $id)->first();
       /* if(($require->status == trans('client.resolved')) || ($require->user_id != Auth::user()->id)) {
            return abort(404);
        }*/
        return view('user.book-require-update', compact('require'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequireBookFormRequest $request, $id)
    {
        $require = RequestNewbook::findOrFail($id);
        $require->fill($request->all());
        $require->user_id = Auth::user()->id;
        $require->save();

        return redirect(route('require.index'))->with('status', trans('client.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $require = RequestNewbook::findOrFail($id);
        if(($require->status == trans('client.resolved')) || ($require->id != Auth::user()->id)) {
            return abort(404);
        }
        $require->delete();

        return redirect(route('require.index'))->with('status', trans('client.delete_success'));
    }
}
