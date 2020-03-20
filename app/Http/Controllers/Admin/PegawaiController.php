<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use App\Services\Contracts\{PegawaiContract,ProvinsiContract,KotaContract,JabatanContract};
use App\Traits\RedirectTo;

class PegawaiController extends Controller
{
    use RedirectTo;

    protected $pegawaiContract, $provinsiContract, $kotaContract, $jabatanContract;

    public function __construct(PegawaiContract $pegawaiContract, ProvinsiContract $provinsiContract, KotaContract $kotaContract, JabatanContract $jabatanContract)
    {
        $this->pegawaiContract = $pegawaiContract;
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
        return view('admin.pegawai.index');
    }

    /**
     * Datatable Ajax Request
     *
     * @param Request $request
     * @return mixed
     */
    public function datatable(Request $request)
    {
        if($request->ajax() == true) {
            $select = [
                'id',
                'nip',
                'nama',
                'jenis_kelamin',
                'jabatan_id'
            ];

            return $this->pegawaiContract->datatable($select);
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
        return view('admin.pegawai.create')->with([
            'dataProvinsi' => $this->provinsiContract->getAll(),
            'dataJabatan' => $this->jabatanContract->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        #store
        $this->pegawaiContract->store($request->all());

        #dump
        return $this->redirectSuccessCreate(route('pegawai.index'), __('pegawai.title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pegawai.show')->with([
            'pegawai' => $this->pegawaiContract->get($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pegawai.edit')->with([
            'pegawai' => $this->pegawaiContract->get($id),
            'dataJabatan' => $this->jabatanContract->getAll(),
            'dataProvinsi' => $this->provinsiContract->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
        #update
        $this->pegawaiContract->update($request->except(['_method','_token']), $id);

        #dump
        return $this->redirectSuccessUpdate(route('pegawai.index'), __('pegawai.title'));
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
        $this->pegawaiContract->delete($id);

        #dump
        return $this->redirectSuccessDelete(route('pegawai.index'), __('pegawai.title'));
    }

    /**
     * get data kota ordery by id provinsi
     *
     * @param $id
     * @return mixed
     */
    public function dataKota($id)
    {
        return response()->json(\App\Models\Kota::where('provinsi_id', $id)->get());
    }
}
