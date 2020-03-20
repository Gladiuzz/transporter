<?php

namespace App\Services;

use App\Repositories\Contracts\KasKecilContract as KasKecilRepo;
use App\Services\Contracts\KasKecilContract;
use Illuminate\Support\Facades\DB;
use DataTables;

class KasKecilService implements KasKecilContract
{
    protected $kasKecilRepo;

    public function __construct(KasKecilRepo $kasKecilRepo)
    {
        $this->kasKecilRepo = $kasKecilRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->kasKecilRepo->getAll();
    }

    /**
     * @param $select
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable($select)
    {
        $data = $this->kasKecilRepo->datatable($select);
        return Datatables::eloquent($this->kasKecilRepo->datatable($select))
            ->addIndexColumn()
            ->editColumn('tanggal', function($data) {
                return $data->tanggal->format('d F Y');
            })
            ->editColumn('debit', function($data) {
                return 'Rp. '.number_format($data->debit,2);
            })
            ->editColumn('kredit', function($data) {
                return 'Rp. '.number_format($data->kredit,2);
            })
            ->addColumn('action', function($data){
                return '<a href="'.route('kas-kecil.edit', $data->id).'" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> '.__('global.edit').'</a>
                        <button onclick="deleteConfirm('.$data->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> '.__('global.delete').'</button>
                        <form method="POST" action="'.route('kas-kecil.destroy', $data->id).'" style="display:inline-block;" id="submit_'.$data->id.'">
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
                $input['debit'] = str_replace(",","", $request->debit);
                $input['kredit'] = str_replace(",","", $request->kredit);
                return $this->kasKecilRepo->create($input);
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
                $input = $request->except('_token', '_method');
                $input['debit'] = str_replace(",","", $request->debit);
                $input['kredit'] = str_replace(",","", $request->kredit);
                return $this->kasKecilRepo->update($input, $id);
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
        return $this->kasKecilRepo->delete($id);
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
        return $this->kasKecilRepo->get($id);
    }

    /**
     * get total kredit
     *
     * @return void
     */
    public function totalKredit()
    {
        return $this->kasKecilRepo->totalKredit();
    }

    /**
     * get total debit
     *
     * @return void
     */
    public function totalDebit()
    {
        return $this->kasKecilRepo->totalDebit();
    }

    /**
     * get total debit
     *
     * @return void
     */
    public function totalSaldo()
    {
        return $this->totalDebit() - $this->totalKredit();
    }
}
