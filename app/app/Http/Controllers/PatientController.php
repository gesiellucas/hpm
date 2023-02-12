<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


class PatientController extends Controller
{
    public function createPatient()
    {
        return Inertia::render('CreatePatient');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        // if(!CpfValidateController::validateCpf($data['cpf'])) return false;
        // if(!CnsValidateController::validateCns($data['cns'])) return false;

        // Add first the address
        $patient_address = array(
            'zipcode' => $data['zipcode'],
            'street' => $data['street'],
            'number' => $data['number'],
            'complement' => $data['complement'],
            'city' => $data['city'],
            'neighborhood' => $data['neighborhood'],
            'state' => $data['state']
        );

        $address_id = DB::table('address')
        ->insertGetId($patient_address);

        $image_data = $request->file('picprofile');
        $image_name = Carbon::now()->timestamp .".".$image_data->getClientOriginalExtension();
        $image_url = $request->file('picprofile')->storeAs('profile', $image_name);

        // Add the patient
        $cpf = $data['cpf'];
        $cns = $data['cns'];
        $new_patient = array(
            'fullname' => $data['fullname'],
            'mothername' => $data['mothername'],
            'birthday' => $data['birthday'],
            'cpf' => $cpf,
            'cns' => $cns,
            'address_id' => $address_id,
            'profile' => $image_url
        );

        DB::table('patient')
        ->insert($new_patient);
    }

    public function list(Request $request)
    {
        if($request->query->has('name')) {
            $data = $request->query->get('name');

            $results = DB::table('patient')
            ->join('address', 'patient.address_id', '=', 'address.id')
            ->where('fullname', 'like', "%{$data}%")
            ->get();
            return $results;
        } else{
            $results = DB::table('patient')
            ->join('address', 'patient.address_id', '=', 'address.id')
            ->get();
            return $results;
        }



    }

    public function update(Request $request)
    {
        $data = $request->all();
        // if(!CpfValidateController::validateCpf($data['cpf'])) return false;
        // if(!CnsValidateController::validateCns($data['cns'])) return false;

        // Add first the address
        $patient_address = array(
            'zipcode' => $data['zipcode'],
            'street' => $data['street'],
            'number' => $data['number'],
            'complement' => $data['complement'],
            'city' => $data['city'],
            'neighborhood' => $data['neighborhood'],
            'state' => $data['state']
        );

        $address_id = DB::table('address')
        ->where('id', $data['address_id'])
        ->update($patient_address);

        $image_data = $request->file('picprofile');
        $image_name = Carbon::now()->timestamp .".".$image_data->getClientOriginalExtension();
        $image_url = $request->file('picprofile')->storeAs('profile', $image_name);

        // Add the patient
        $cpf = $data['cpf'];
        $cns = $data['cns'];
        $new_patient = array(
            'fullname' => $data['fullname'],
            'mothername' => $data['mothername'],
            'birthday' => $data['birthday'],
            'cpf' => $cpf,
            'cns' => $cns,
            'address_id' => $address_id,
            'profile' => $image_url
        );

        DB::table('patient')
        ->where('id', $data['patient_id'])
        ->update($new_patient);
    }

    public function updatePatient($id)
    {
        if(!$id) return false;
        $result = DB::table('patient')
        ->where('patient.id', $id)
        ->join('address', 'patient.address_id', '=', 'address.id')
        ->get();

        return Inertia::render('UpdatePatient', ['datapatient'=> $result[0] ]);
    }

    public function delete($id)
    {
        $delete = DB::table('patient')
        ->where('id',$id)
        ->delete();
        return Inertia::render('pesquisa');
    }
}
