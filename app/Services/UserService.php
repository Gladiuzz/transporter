<?php

namespace App\Services;

use App\Repositories\Contracts\UserContract as UserRepo;
use App\Services\Contracts\UserContract;
use Illuminate\Support\Facades\DB;
use DataTables;

class UserService implements UserContract
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    /**
     * @param $select
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

     public function datatable($select)
     {
         $data = $this->userRepo->datatable($select);
         return DataTables::eloquent($this->userRepo->datatable($select))
         ->addIndexColumn()
        //  ->editColumn('')
        ->addColumn('action', function($data){
            return '<a href="'.route('jabatan.edit', $data->id).'" class="btn btn-warning btn-sm" id="editjabatan" data-id="'.$data->id.'"><i class="fa fa-pencil"></i> '.__('global.edit').'</a>
                        <button onclick="deleteConfirm('.$data->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> '.__('global.delete').'</button>
                        <form method="POST" action="'.route('jabatan.destroy', $data->id).'" style="display:inline-block;" id="submit_'.$data->id.'">
                            '.method_field('delete').csrf_field().'
                        </form';
        })
        ->rawColumns(['action'])
        ->make(true);
     }
     /**
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store($request)
    {
        $permissions = DB::transaction(
            function () use ($request) {
                return $this->userRepo->create($request);
            }
        );

        return $permissions;
    }

     /**
     * @param $id
     * @param $request
     *
     * @return mixed
     * @throws \Throwable
    */
    public function update($request, $id)
    {
        $permissions = DB::transaction(
            function () use ($request, $id) {
                return $this->userRepoRepo->update($request, $id);
            }
        );

        return $permissions;
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->userRepo->delete($id);
    }

     /**
     * Get Data By ID
     *
     * @param $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->userRepo->get($id);
    }
}
