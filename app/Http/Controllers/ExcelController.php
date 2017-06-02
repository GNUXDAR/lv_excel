<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargo;
use \Excel;

class ExcelController extends Controller
{
    protected $request;
    protected $encargo;
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

    public function importUsers(Request $request, Encargo $encargo)
    {
    	
        Excel::load($request->excel, function($reader) {
    		$excel = $reader->get();

    		$excel->each(function($row) {
    		$this->data[] = $row;
    			//$data = $row->toArray();  //recore los datos
    		});
    	});
        //dd($this->data);
        return response()->json(
                        ['data' => $this->data]
            );
        // $this->request->session()->flash('info', 'Fichero Procesado');
        // return view('registro.index', ['data' => $this->data]);

    }



}
