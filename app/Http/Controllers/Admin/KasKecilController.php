<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KasKecilRequest;
use App\Services\Contracts\KasKecilContract;
use App\Traits\RedirectTo;

class KasKecilController extends Controller
{
    use RedirectTo;

    protected $kasKecilContract;

    public function __construct(KasKecilContract $kasKecilContract)
    {
        $this->kasKecilContract = $kasKecilContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kas_kecil.index')->with([
            'totalDebit' => $this->kasKecilContract->totalDebit(),
            'totalKredit' => $this->kasKecilContract->totalKredit(),
            'totalSaldo' => $this->kasKecilContract->totalSaldo(),
        ]);
    }

    public function datatable(Request $request)
    {
        if($request->ajax() == true) {
            $select = [
                'id',
                'tanggal',
                'keterangan',
                'debit',
                'kredit'
            ];

            return $this->kasKecilContract->datatable($select);
        }
        
        return abort('404', 'Uppss....');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kas_kecil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KasKecilRequest $request)
    {
        #store
        $this->kasKecilContract->store($request);

        #dump
        return $this->redirectSuccessCreate(route('kas-kecil.index'), __('kas_kecil.title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.kas_kecil.edit')->with([
            'kas_kecil' => $this->kasKecilContract->get($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KasKecilRequest $request, $id)
    {
        #update
        $this->kasKecilContract->update($request, $id);

        #dump
        return $this->redirectSuccessUpdate(route('kas-kecil.index'), __('kas_kecil.title'));
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
        $this->kasKecilContract->delete($id);

        #dump
        return $this->redirectSuccessDelete(route('kas-kecil.index'), __('kas_kecil.title'));
    }
}
