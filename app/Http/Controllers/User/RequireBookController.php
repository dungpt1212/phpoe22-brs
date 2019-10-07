<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\RequireBookFormRequest;
use App\Http\Controllers\Controller;
use App\Events\CreateRequireAddNewBookEvent;
use App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class RequireBookController extends Controller
{
    protected $requireBookRepo;
    protected $userRepo;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(
        RequestNewBookRepositoryInterface $requireBookRepo,
        UserRepositoryInterface $userRepo
    )
    {
        $this->requireBookRepo = $requireBookRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

    public function index()
    {
        $authId = $this->userRepo->getAuthId();
        $requests = $this->requireBookRepo->getRequireBook($authId);

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
        $data = $request->all();
        $data['user_id'] = $this->userRepo->getAuthId();
        $requestNewbook = $this->requireBookRepo->create($data);

        if($requestNewbook->wasRecentlyCreated == true) {
            event(new CreateRequireAddNewBookEvent($requestNewbook));
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
        $require = $this->requireBookRepo->find($id);
        if($require == false){
            return view('errors.notfound');
        }

        if(($require->status == trans('client.resolved')) || ($require->user_id != $this->userRepo->getAuthId())) {
            return view('errors.notfound');
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
        $require = $this->requireBookRepo->find($id);
        if($require == false){
            return view('errors.notfound');
        }
        $data = $request->all();
        $require = $this->requireBookRepo->update($id, $data);

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
        $require = $this->requireBookRepo->find($id);
        if($require == false){
            return view('errors.notfound');
        }

        if(($require->status == trans('client.resolved')) || ($require->user_id != $this->userRepo->getAuthId())) {
            return view('errors.notfound');
        }

        $this->requireBookRepo->delete($id);

        return redirect(route('require.index'))->with('status', trans('client.delete_success'));
    }
}
