<?php

namespace App\Imports;

use App\Models\BookMarkers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//batch inserts do not rollback all but the batch that failed 
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class ClientsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //get cust id

    public function __construct($company_id,$licensee_name,$license_no,$trading_name) {
        $this->company_id = $company_id;
        $this->licensee_name = $licensee_name;
        $this->license_no = $license_no;
        $this->trading_name = $trading_name;
    }
    //insert to db
    public function model(array $row)
    {
        try
        {
            \Log::info($row);
            \Log::info($licensee_name);
            $wht = 0.2*$row['total_payout'];
            $ggr = $row['total_sales']-$row['total_payout'];
            $ggrtax = 0.15*$ggr;
            BookMarkers::create([
                'licensee_name'=> $this->licensee_name,
                'license_no'=> $this->license_no,
                'date' => $row['date'],
                'deposits' => $row['deposits'],
                'total_sales' => $row['total_sales'],
                'total_payout' => $row['total_payout'],
                'wht' => $wht,
                'ggr' => $ggr,
                'winloss' => $ggr,
            ]);
            return redirect()->back()->with('success',"Bookmarkers Uploaded Succesfully" );
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // heading row
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
        }
    }
   public function rules(): array
    {
        return [
            
        ];
    }
    public function customValidationMessages()
    {
        return [
            
        ];
    }
    public function batchSize(): int
    {
        return 200;
    }
    public function chunkSize(): int
    {
        return 200;
    }

}
