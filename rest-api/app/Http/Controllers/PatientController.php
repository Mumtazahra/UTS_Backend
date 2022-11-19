<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
     # method index - get all resources
    public function index()
    {
       # menggunakan model patient untuk select data
       $patients = Patient::all();

       if($patients)
       {
       $data = [
        'message' =>  'Get All Resource',
        'data' => $patients,
       ];

       # status code
       return response()->json($data,200);
    }else{
        $data = [
            'message' => 'Data is Empty',
        ];
            #mangembalikan data json status code 200
        return response()->json($data, 200);
   
    }
    }  

    # menambahkan resource patient
    # membuat method store
        public function store(Request $request)
        {
            # membuat validasi
            $validatedData = $request->validate([
                # kolom => rules|rules
                'name' => 'required',
                'phone' => 'numeric|required',
                'address' => 'required',
                'status' => 'required',
                'in_date_at' => 'date|required',
                'out_date_at' => 'date|required',
            ]);
    
            # menggunakan patient untuk insert data
            $patients = Patient::create($validatedData);
    
            $data = [
                'message' => 'Resource is added successfully',
                'data' => $patients,
            ];
    
            # mengembalikan data (json) status code 201
            return response()->json($data, 201);
        }

    # mendapatkan detail resource patient
    # membuat method show
    public function show($id)
    {
        # cari data patient
        $patients = Patient::find($id);

        if($patients)
        {
        $data = [
            'message' => 'Get all resource',
            'data' => $patients,
        ];

        #mangembalikan data json status code 200
        return response()->json($data, 200);
    }else{
        $data = [
            'message' => 'Resource not found',
        ];
            #mangembalikan data json status code 200
        return response()->json($data, 404);
   
    }
    }

   # mengupdate resource patient
    # dengan membuat method update
    public function update(Request $request, $id){
        # cari data patient yg ingin dicari
        $patients = Patient::find ($id);

        if ($patients)
        {
        # mendapatakan data request
        $input = [
            'name'=>$request->name ?? $patients->name,
            'phone'=>$request->phone ?? $patients->phone,
            'address'=>$request->address ?? $patients->address,
            'status'=>$request->status ?? $patients->status,
            'in_date_at'=>$request->in_date_at ?? $patients->in_date_at,
            'out_date_at'=>$request->out_date_at ?? $patients->out_date_at,
        ];

        # mengupdate data
        $patients->update($input);

        $data = [
            'message'=>'Resource is update successfully',
            'data'=>$patients,
        ];
         #mangembalikan data json status code 200
        return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Resource not found',
            ];
                #mangembalikan data json status code 200
            return response()->json($data, 404);
       
        }
    }

    # menghapus resource patient
    # dengan membuat method destroy
    public function destroy($id)
    {
        # mencari data patient yg ingin di apus
        $patients = Patient::find($id);

        if($patients)
        {
        #hapus data patient
        $patients->delete();

        $data = [
            'message'=>'Resource is delete successfully',
        ];

        # mengembalikan data json status code 200
        return response()->json($data, 200);
    }else{
        $data = [
            'message' => 'Resource not found',
        ];
            #mangembalikan data json status code 200
        return response()->json($data, 404);
   
    }
    }

    # mencari resource patient berdasarkan nama
    # dengan membuat method search
    public function search($name)
    {
        # mencari data patient 
        $patients = Patient::where( "name", "like","%".$name."%")->get();

        if($patients)
        {
        #mencari data patient
        

        $data = [
            'message'=>'Get searched resource',
            'data'=> $patients,
        ];

        # mengembalikan data json status code 200
        return response()->json($data, 200);
    }else{
        $data = [
            'message' => 'Resource not found',
        ];
            #mangembalikan data json status code 200
        return response()->json($data, 404);
   
    }
    }

    # mencari resource patient berdasarkan status positive
    # dengan membuat method positive
    public function positive()
    {
        # mencari data patient 
        $patients = Patient::where('status','positive')->get();

        $data = [
            'message'=>'Get positive resource',
            'data'=> $patients
        ];

        # mengembalikan data json status code 200
        return response()->json($data, 200);
    }

        # mencari resource patient berdasarkan status recovered
    # dengan membuat method recovered
    public function recovered()
    {
        # mencari data patient 
        $patients = Patient::where('status','recovered')->get();

        $data = [
            'message'=>'Get recovered resource',
            'data'=> $patients
        ];

        # mengembalikan data json status code 200
        return response()->json($data, 200);
    }

    # mencari resource patient berdasarkan status dead
    # dengan membuat method dead
    public function dead()
    {
        # mencari data patient 
        $patients = Patient::where('status','dead')->get();

        $data = [
            'message'=>'Get dead resource',
            'data'=> $patients
        ];

        # mengembalikan data json status code 200
        return response()->json($data, 200);
    }


}
