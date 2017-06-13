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
        $this->rules = [
            'albaran'       => 'required|numeric|max:9999999999',
            'destinatario'  => 'required|string|max:28',
            'direccion'     => 'required|string|max:250',
            'poblacion'     => 'required|string|max:10',
            'cp'            => 'required|string|min:5|max:5',
            'provincia'     => 'required|max:20',
            'telefono'      => 'required|max:10',
            'observaciones' => 'max:500',
            'fecha'         => 'required|date',
        ];

        $this->errors = [];
        $this->data = [];

        Excel::selectSheetsByIndex(0)->load($request->excel, function($reader) {
            
            $reader->formatDates(true, 'd-m-Y');

            $excel = $reader->get();

            $this->errors = [];
            $this->rowNumber = 0;

            $excel->each(function($row) {

                $this->data[$this->rowNumber] = [
                    'albaran'       => $row->albaran,
                    'destinatario'  => $row->destinatario,
                    'direccion'     => $row->direccion,
                    'poblacion'     => $row->poblacion,
                    'cp'            => $row->cp,
                    'provincia'     => $row->provincia,
                    'telefono'      => $row->telefono,
                    'observaciones' => $row->observaciones,
                    'fecha'         => $row->fecha,
                ];

                foreach ($this->data[$this->rowNumber] as $key => $value) {

                    $error = $this->validateCell([$key => $value], [$key => $this->rules[$key]]);

                    if (!empty($error)) {
                        $this->errors[$this->rowNumber][$key] = $error;
                    }
                    
                }

                $this->data[$this->rowNumber]['id'] = $this->rowNumber;

                $this->rowNumber++;
            });
        });

        return view('registro.export', [ 'data' => $this->data, 'errors' => $this->errors, 'input' => $this->input]);
    }

    /**
     * Validate cell against the rules.
     *
     * @param array $data
     * @param array $rules
     *
     * @return array
     */
    protected function validateCell(array $data, array $rules)
    {
        // Perform Validation
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->messages();

            // crete error message by using key and value
            foreach ($errorMessages as $key => $value) {
                $errorMessages = $value[0];
            }

            return $errorMessages;
        }

        return [];
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
