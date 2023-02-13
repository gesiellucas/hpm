<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ImportRowJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
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

        // Add the patient
        $cpf = $data['cpf'];
        $cns = $data['cns'];
        $new_patient = array(
            'fullname' => $data['fullname'],
            'mothername' => $data['mothername'],
            'birthday' => $data['birthday'],
            'cpf' => $cpf,
            'cns' => $cns,
            'address_id' => $address_id
        );

        DB::table('patient')
        ->insert($new_patient);
    }
}
