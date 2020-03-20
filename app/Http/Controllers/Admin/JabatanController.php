<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanRequest;
use App\Services\Contracts\JabatanContract;
use App\Traits\RedirectTo;

class JabatanController extends Controller
{
    use RedirectTo;

    protected $jabatanContract;

    public function __construct(JabatanContract $jabatanContract)
    {
        $this->jabatanContract = $jabatanContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jabatan.index');
    }

    public function datatable(Request $request)
    {
        if($request->ajax() == true) {
            $select = [
                'id',
                'nama',
                'gaji_pokok'
            ];

            return $this->jabatanContract->datatable($select);
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
        return view('admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JabatanRequest $request)
    {
        #store
        $this->jabatanContract->store($request);

        #dump
        return $this->redirectSuccessCreate(route('jabatan.index'), __('jabatan.title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.jabatan.edit')->with([
            'jabatan' => $this->jabatanContract->get($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JabatanRequest $request, $id)
    {
        #update
        $this->jabatanContract->update($request, $id);

        #dump
        return $this->redirectSuccessUpdate(route('jabatan.index'), __('jabatan.title'));
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
        $this->jabatanContract->delete($id);

        #dump
        return $this->redirectSuccessDelete(route('jabatan.index'), __('jabatan.title'));
    }
}
