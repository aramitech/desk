<?php
namespace App\Exports;
use EloquentBuilder;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\FileRegistry;
use Illuminate\Http\Request;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;

class FilingExports implements Responsable, FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    protected $request;
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Filing.xlsx';

    /**
    * Optional Writer Type
    */
    private $writerType = Excel::XLSX;

    /**
    * Optional headers
    */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    // public function __construct($request)
    // {
    //     $this->request = $request;
    // }

    public function headings(): array
    {
        return [
            'file_registry_id',
            'registry_id',
            'folio',
            'subject_heading',
            'registry_date',
            'status',
        ];
    }

    public function map($history): array
    {
        //$contact = Accounts::where('accounts_id',Auth::user()->userShopUser['customer_id'])->where('contact','LIKE',"%".$history->recipient."%")->with('contactGroup')->first();
        return [
            $history->file_registry_id,
            $history->registry_id,
            $history->folio,
            $history->subject_heading,
            $history->registry_date,
            $history->status,
            
        ];
    }

    public function collection()
    {
        // return Customer::all();
        $history = FileRegistry::All();
       // $history = EloquentBuilder::to($query, request()->all())->get();
        return $history;
    }
}
