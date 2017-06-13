<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargo;
use \Excel;
use Validator;
use JavaScript;
use App\Http\Requests\ExcelRequest;

class ExcelController extends Controller
{
    protected $request;
    protected $encargo;
    public $data = [];
    public $i = 1;
    public $errors = [];
    public $input = [];

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

    		$excel->each(function($row) {

            $this->errors = $this->validator($row);
            //var_dump($this->errors);

    		$this->data[] = [ 
                            'id' => $this->i,
                            'albaran' => $row->albaran,
                            'destinatario' => $row->destinatario,
                            'direccion' => $row->direccion,
                            'poblacion' => $row->poblacion,
                            'cp' => $row->cp,
                            'provincia' => $row->provincia,
                            'telefono' => $row->telefono,
                            'observaciones' => $row->observaciones,
                            'fecha' => $row->fecha,
                                          
                            ];



                            /*[ 
                            'id' => $this->i,
                            'albaran' => '<input type="text" size="10" name="albaran[]" value="'.$row->albaran.'">',
                            'destinatario' => '<input type="text" title="'.$row->destinatario.'" name="destinatario[]" value="'.$row->destinatario.'">',
                            'direccion' => '<input type="text" size="10" name="direccion[]" value="'.$row->direccion.'">',
                            'poblacion' => '<input type="text" size="10" name="poblacion[]" value="'.$row->poblacion.'">',
                            'cp' => '<input type="text" size="10"  name="cp[]" value="'.$row->cp.'">',
                            'provincia' => '<input type="text" size="10" name="provincia[]" value="'.$row->provincia.'">',
                            'telefono' => '<input type="text" size="10" name="telefono[]" value="'.$row->telefono.'">',
                            'observaciones' => '<input type="text" size="10" name="observaciones[]" value="'.$row->observaciones.'">',
                            'fecha' => '<input type="text" size="10" name="fecha[]" value="'.$row->fecha.'">',
                                          
                            ];*/
    			//$data = $row->toArray();  //recore los datos
            $this->i++;
    		});
    	});

        //dd($this->data);
        /*return response()->json(
                        ['data' => $this->data]
            );*/
        //$this->request->session()->flash('info', 'Fichero Procesado');
        // JavaScript::put([
        //     'data' =>  $this->data
        // ]);
        return view('registro.export', [ 'data' => $this->data, 'errors' => $this->errors, 'input' => $this->input]);
    }

    public function validator($data)
    {
        //dd($data->toArray());
        //$this->validateAlbaran($data->toArray()['albaran']);
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
            return $validator->getMessageBag()->toArray();
                //dd($validator->failed());
                    
               /* foreach ($validator->failed() as $key => $value) {
                    switch ($key) {
                        case 'albaran':
                                foreach ($value as $key => $value) {
                                   
                                   switch ($key) {
                                       case 'Required':
                                           
                                           break;
                                        case 'Max':
                                            # code...
                                            break;
                                       
                                       default:
                                           # code...
                                           break;
                                   }
                                }
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }*/
        }
        
    }

    public function store(ExcelRequest $request)
    {
        $validateExcel = new Excel;

        $validateExcel->albaran   =   $request->albaran;
        $validateExcel->destinatario   =   $request->destinatario;
        $validateExcel->direccion =   $request->direccion;
        $validateExcel->poblacion    =   $request->poblacion;
        $validateExcel->provincia    =   $request->provincia;
        $validateExcel->telefono    =   $request->telefono;
        $validateExcel->observaciones    =   $request->observaciones;
        $validateExcel->fecha    =   $request->fecha;
        $validateExcel->save();
        return redirect()->route('home')->with('info', 'Datos Guardados');
    }

    public function validateAlbaran(Request $request, Encargo $encargo)
    {
        
        //dd($request);
        $menssages = [];
        foreach ($request->albaran as $key =>  $value) {
            if ($value == '') {
                $menssages[]['required'] = 'es requerido id '.$key;
            }
             if (strlen($value) > 10) {
                 $menssages[]['max'] = 'es max id '.$key;
            }
             if ($value == '') {
                
            }

        }
       // $validator = Validator::make($request->array1, [
            
       //      'albaran' => 'required|numeric|max:10',
            
       //  ])->validate();

        return response()->json($menssages);
    }

     public function validateString($value)
    {
        
        
    }

     public function validateMax($value)
    {
        
        
    }
         public function validateMin($value)
    {
        
        
    }
         public function validateDate($value)
    {
        
        
    }
         public function validateNumeric($value)
    {
        
        
    }
    
    


}
