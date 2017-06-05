<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargo;
use \Excel;

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

    public function importUsers(Request $request, Encargo $encargo)
    {
    	
        //
        //Excel::selectSheets($excel)->load()
        Excel::load($request->excel, function($reader) {
            $reader->formatDates(true, 'Y-m-d');
    		$excel = $reader->get();
            
    		$excel->each(function($row) {
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
        return response()->json(
                        ['data' => $this->data]
            );
        $this->request->session()->flash('info', 'Fichero Procesado');
        // return view('registro.index', ['data' => $this->data]);

    }
// {"id":1, "values":{"country":"uk","age":33,"name":"Duke","firstname":"Patience","height":1.842,"email":"patience.duke@gmail.com","lastvisit":"11\/12\/2002"}},


}
