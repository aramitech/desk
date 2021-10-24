<?php

namespace App\Imports;

use App\Models\BookmarkersCompany;
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

class PublicLotteryCompanyImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //get cust id

    public function __construct($company_id) {

    }
    
    //insert to db
    public function model(array $row)
    {
        try
        {
            \Log::info($row);
                  BookmarkersCompany::create([
                'category_type_id'=> '2',
                'company_name'=> $row['company_name'] ?? $row['company_name'],
                'trading_name'=> $row['trading_name'] ?? $row['trading_name'],
                'license_no'=> $row['license_no'] ?? $row['license_no'],
                'email'=> $row['email'] ?? $row['email'],
                'contact'=> $row['contact'] ?? $row['contact'],
                'physicaladdress'=> $row['physicaladdress'] ?? $row['physicaladdress'],
                'branch'=> $row['branch'] ?? $row['branch'],
                'paybillno'=> $row['paybillno'],
                'status'=> $row['status'] ?? $row['status'],
                ]);
            
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
         'trading_name'  =>  'unique:'.BookmarkersCompany::class.',trading_name'  
        ];
    }
    public function customValidationMessages()
    {
        return [
        'trading_name.unique' => 'Trading name already Exist'   
        ];
    }
    public function headingRow(): int
    {
        return 1;
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
