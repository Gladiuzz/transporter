<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PengirimanRequest;
use App\Services\Contracts\PengirimanContract;
use App\Services\Contracts\ProvinsiContract;
use App\Traits\RedirectTo;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    use RedirectTo;

    protected $pengirimanContract, $provinsiContract;

    public function __construct(PengirimanContract $pengirimanContract, ProvinsiContract $provinsiContract)
    {
        $this->pengirimanContract = $pengirimanContract;
        $this->provinsiContract = $provinsiContract;
    }

    public function datatable(Request $request)
    {
        if($request->ajax() == true) {
            $select = [
                'id',
                'nomor_invoice',
                'tanggal',
                'perusahaan_asal',
                'perusahaan_tujuan',
            ];

            return $this->pengirimanContract->datatable($select);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengiriman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengiriman.create')->with([
            'dataProvinsi' => $this->provinsiContract->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengirimanRequest $request)
    {
        #store
        $this->pengirimanContract->store($request);

        #dump
        return $this->redirectSuccessCreate(route('pengiriman.index'),__('pengiriman.title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pengiriman.show')->with([
            'pengiriman' => $this->pengirimanContract->get($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #delete
        $this->pengirimanContract->delete($id);

        #dump
        return $this->redirectSuccessDelete(route('pengiriman.index'), __('pengiriman.title'));
    }

    public function nomorInvoice()
    {
        return $this->pengirimanContract->getNomorInvoice();
    }
}
