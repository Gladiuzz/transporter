<?php

namespace App\Services;

use App\Repositories\Contracts\JabatanContract as JabatanRepo;
use App\Services\Contracts\JabatanContract;
use Illuminate\Support\Facades\DB;
use DataTables;

class JabatanService implements JabatanContract
{
    protected $jabatanRepo;

    public function __construct(JabatanRepo $jabatanRepo)
    {
        $this->jabatanRepo = $jabatanRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->jabatanRepo->getAll();
    }

    /**
     * @param $select
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable($select)
    {
        $data = $this->jabatanRepo->datatable($select);
        return Datatables::eloquent($this->jabatanRepo->datatable($select))
            ->addIndexColumn()
            ->editColumn('gaji_pokok', function($data) {
                return 'Rp. '.number_format($data->gaji_pokok,0,",",".");
            })
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
                $input = $request->all();
                $input['gaji_pokok'] = str_replace(",","",$request->gaji_pokok);
                return $this->jabatanRepo->create($input);
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
                $input = $request->except('_token','_method');
                $input['gaji_pokok'] = str_replace(",","",$request->gaji_pokok);
                return $this->jabatanRepo->update($input, $id);
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
        return $this->jabatanRepo->delete($id);
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
        return $this->jabatanRepo->get($id);
    }
}
