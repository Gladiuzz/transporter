<?php

namespace App\Services;

use App\Repositories\Contracts\PengirimanContract as PengirimanRepo;
use App\Services\Contracts\PengirimanContract;
use Illuminate\Support\Facades\DB;
use DataTables;

class PengirimanService implements PengirimanContract
{
    protected $pengirimanRepo;

    public function __construct(PengirimanRepo $pengirimanRepo)
    {
        $this->pengirimanRepo = $pengirimanRepo;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->pengirimanRepo->getAll();
    }

    /**
     * @param $select
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function datatable($select)
    {
        $data = $this->pengirimanRepo->datatable($select);
        return Datatables::eloquent($this->pengirimanRepo->datatable($select))
            ->addIndexColumn()
            ->editColumn('tanggal', function($data) {
                return $data->tanggal->format('d-m-Y');
            })
            ->addColumn('action', function($data){
                return '<a href="'.route('pengiriman.show', $data->id).'" class="btn btn-info btn-sm"><i class="fa fa-th"></i> '.__('global.detail').'</a>
                        <button onclick="deleteConfirm('.$data->id.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> '.__('global.delete').'</button>
                        <form method="POST" action="'.route('pengiriman.destroy', $data->id).'" style="display:inline-block;" id="submit_'.$data->id.'">
                            '.method_field('delete').csrf_field().'
                        </form';
            })
            ->rawColumns(['action','filename'])
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
                $input['nomor_invoice'] = 'CSM-INV'.rand(8,8);

                $totalVolume = 0;
                if($request->jalur == "0") {
                    $totalVolume = $request->panjang * $request->lebar * $request->tinggi / 6000;
                } else if($request->jalur == "1") {
                    $totalVolume = $request->panjang * $request->lebar * $request->tinggi / 4000;
                } else if ($request->jalur == "2") {
                    $totalVolume = $request->panjang * $request->lebar * $request->tinggi /100000;
                } else {
                    $totalVolume = 0;
                }
                // tentukan jenis perhitungan berat
    
                $totalBerat =  0;
                if($request->jenis_berat == "0") {
                    $totalBerat =$request->berat;
                } else if($request->jenis_berat == "1") {
                    $totalBerat = round($totalVolume);
                } else {
                    $totalBerat = 0;
                }

                // menghitung subcharge
                $subcharge = 0;
                if($totalBerat >= 151 && $request->jalur != "") {
                    $subcharge = 125;
                } else if($totalBerat >= 51 && $totalBerat <= 75 && $request->jalur != "") {
                    $subcharge = 50;
                } else if($totalBerat >= 76 && $totalBerat <= 100 && $request->jalur != "") {
                    $subcharge = 75;
                } else if($totalBerat >= 101 && $totalBerat <= 150 && $request->jalur != "") {
                    $subcharge = 100;
                } else {
                    $subcharge = 0;
                }

                $biayaPerKg = str_replace(",","",$request->harga)  * $totalBerat;
                $biayaCharge =  ($biayaPerKg * ($subcharge/100));
    
                if($request->jenis_berat == "") {
                    $ongkir = 0;
                } else {
                    $ongkir = $biayaPerKg + $biayaCharge + str_replace(",","",$request->asuransi);                
                }
                $input['nomor_invoice'] = $this->getNomorInvoice();
                $input['sub_charge'] = $subcharge;
                $input['berat'] = $totalBerat;
                $input['ongkos_kirim'] = $ongkir;
                $input['asuransi'] = str_replace(",","",$request->asuransi);
                $input['harga'] = str_replace(",","",$request->harga);
                
                return $this->pengirimanRepo->create($input);
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
        return $this->pengirimanRepo->delete($id);
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
        return $this->pengirimanRepo->get($id);
    }

    public function getNomorInvoice()
    {
        $query = DB::select( DB::raw("SELECT max(nomor_invoice) as maxKode FROM pengiriman"));
        $nomorInvoice = $query[0]->maxKode;
        $noUrut = (int) substr($nomorInvoice, 7, 8);
        $noUrut++;
        $char = "CSM-INV";
        $nomorInvoice = $char . sprintf("%08s", $noUrut);
        return $nomorInvoice;
    }
}
