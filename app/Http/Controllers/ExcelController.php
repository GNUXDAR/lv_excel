<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargo;
use \Excel;
use Illuminate\Contracts\Validation\Validator;

class ExcelController extends Controller
{
    protected $request;
    protected $encargo;
    protected $i = 1;
    public $data = [];

	public function __construct(Request $request, Encargo $encargo)
	{
		$this->request = $request;
		$this->encargo = $encargo;
	}

    public function index()
    {
    	return view('registro.index');
    }

    public function tabla()
    {
        return view('registro.tabla');
    }

    public function importFile(Request $request, Encargo $encargo)
    {
    	
        //Excel::load($request->excel, function($reader)
        //
        Excel::selectSheetsByIndex(0)->load($request->excel, function($reader) {
            $reader->formatDates(true, 'd-m-Y');
            $reader->toArray();
    		$excel = $reader->get();
            //echo count($excel);
             //print_r($excel-);
             //dd($excel);
    		$excel->each(function($row) {

            $this->validator($row);

    		$this->data[] = [
                            'id' => $this->i, 
                            'values' => [
                                            'albaran' => $row->albaran,
                                            'destinatario' => $row->destinatario,
                                            'direccion' => $row->direccion,
                                            'poblacion' => $row->poblacion,
                                            'cp' => $row->cp,
                                            'provincia' => $row->provincia,
                                            'telefono' => $row->telefono,
                                            'observaciones' => $row->observaciones,
                                            'fecha' => $row->fecha,
                                        ]
                            ];
    			//$data = $row->toArray();  //recore los datos
            $this->i++;
    		});
    	});
        //dd($this->data);
        /*return response()->json(
                        ['data' => $this->data]
            );*/
        //$this->request->session()->flash('info', 'Fichero Procesado');
        return view('registro.export', ['data' => json_encode($this->data)]);
    }

    public function validator($data)
    {
        //dd($data);
         $validator = Validator::make($data, [
            'albaran' => 'required',
        ]);
         if ($validator->fails()) {

            dd($validator);
        }
    }
}
