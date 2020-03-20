<?php

namespace App\Services;

use App\Repositories\Contracts\PegawaiContract as PegawaiRepo;
use App\Services\Contracts\PegawaiContract;
use Illuminate\Support\Facades\DB;
use DataTables;

class PegawaiService implements PegawaiContract
{
    protected $pegawaiRepo;

    public function __construct(PegawaiRepo $pegawaiRepo)
    {
        $this->pegawaiRepo = $pegawaiRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->pegawaiRepo->getAll();
    }

    /**
     * @param $select
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable($select)
    {
        $data = $this->pegawaiRepo->datatable($select);
        return Datatables::eloquent($this->pegawaiRepo->datatable($select))
            ->addIndexColumn()
            ->editColumn('jenis_kelamin', function($data) {
                return $data->jenis_kelamin == 0 ? 'Pria' : 'Wanita';
            })
            ->addColumn('jabatan_id', function($data) {
                return empty($data->jabatan->nama) ? '-' : $data->jabatan->nama;
            })
            ->addColumn('action', function($data){
                return '<a href="'.route('pegawai.show', $data->id).'" class="btn btn-info btn-sm"><i class="fa fa-th"></i> '.__('global.show').'</a>
                        <a href="'.route('pegawai.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> '.__('global.edit').'</a>
                        <button onclick="deleteConfirm('.$data->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> '.__('global.delete').'</button>
                        <form method="POST" action="'.route('pegawai.destroy', $data->id).'" style="display:inline-block;" id="submit_'.$data->id.'">
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
                return $this->pegawaiRepo->create($request);
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
                return $this->pegawaiRepo->update($request, $id);
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
        return $this->pegawaiRepo->delete($id);
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
        return $this->pegawaiRepo->get($id);
    }
}
