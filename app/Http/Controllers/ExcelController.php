<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Encargo;
use \Excel;
use JavaScript;
//use Illuminate\Contracts\Validation\Validator;

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
            //$reader->toArray();
    		$excel = $reader->get();
            //echo count($excel);
             //print_r($excel-);
             //dd($excel);
    		$excel->each(function($row) {

            $this->errors[] = $this->validator($row);

    		$this->data[] = [
                            'id' => $this->i, 
                            'values' => [
                                            'albaran' =>'<input name="albaran[]">',
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

        JavaScript::put([
            'data' => $this->data
        ]);

        //$this->request->session()->flash('info', 'Fichero Procesado');
        return view('registro.export', ['data' => json_encode($this->data), 'errors' => $this->errors]);
    }

    public function validator($data)
    {
        //dd($data);
         $validator = Validator::make($data->toArray(), [
            'albaran' => 'required|numeric|max:10',
            'destinatario' => 'required|string|max:28',
            'direccion' => 'required|string|max:250',
            'poblacion' => 'required|string|max:10',
            'cp' => 'required|string|min:5|max:5',
            'provincia' => 'required|max:20',
            'telefono' => 'required|max:10',
            'observaciones' => 'max:500',
            'fecha' => 'required|date',

        ]);
         if ($validator->fails()) {

            return $validator->errors()->all();
            //return redirect()->back()->withInput()->withErrors($validator->errors());
        }
    }
}
