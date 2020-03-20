<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Services\Contracts\{userContract,ProvinsiContract,KotaContract,JabatanContract};
use App\Traits\RedirectTo;

class UserController extends Controller
{
    use RedirectTo;

    protected $userContract, $provinsiContract, $kotaContract, $jabatanContract;

    public function __construct(userContract $userContract, ProvinsiContract $provinsiContract, KotaContract $kotaContract, JabatanContract $jabatanContract)
    {
        $this->userContract = $userContract;
        $this->provinsiContract = $provinsiContract;
        $this->kotaContract = $kotaContract;
        $this->jabatanContract = $jabatanContract;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.user.index');

    }



    /**
     * Datatable Ajax Request
     *
     * @param Request $request
     * @return mixed
     */
    public function datatable(Request $request)
    {
        // if($request->ajax() == true) {
            $select = [
                'id',
                'name',
                'email',
                'password'
            ];

            return $this->userContract->datatable($select);
        // }

        return abort('404', 'Uppss....');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        #delete
        $this->userContract->delete($id);

        #dump
        return $this->redirectSuccessDelete(route('user.index'), __('user.title'));
    }
}
