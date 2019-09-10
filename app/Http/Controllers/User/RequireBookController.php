<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestNewbook;
use App\Models\User;
use App\Http\Requests\RequireBookFormRequest;
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
        $requests = User::findOrfail(Auth::user()->id)->requestNewBooks;

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
        $requestNewbook = new RequestNewbook;
        $requestNewbook->fill($request->all());
        $requestNewbook->user_id = Auth::user()->id;
        $requestNewbook->save();

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
        $require = RequestNewbook::findOrFail($id);
        if($require->status == trans('client.resolved')){
            return abort(404);
        }
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
        $require->delete();

        return redirect(route('require.index'))->with('status', trans('client.delete_success'));
    }
}
