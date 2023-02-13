<?php

namespace App\Http\Controllers;

use App\Jobs\ImportRowJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportCsvController extends Controller
{
    //
    public function importCsv(Request $request)
    {
        if($request->hasFile('csv')){
            $file = $request->file('csv');

            $handle = fopen($file->getRealPath(), 'r');
            $header = fgetcsv($handle);
            while($row = fgetcsv($handle)){
                ImportRowJob::dispatch($row)->onQueue('importcsv');
            }
            fclose($handle);

            return true;
        }
        else { dd('has no csv');}
    }
}
