<?php
namespace App\Exports;
use EloquentBuilder;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\AssignRegistry;
use Illuminate\Http\Request;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;

class TaskingExports implements Responsable, FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    protected $request;
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Tasking.xlsx';

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
            'assign_registry_id',
            'file_registry_id',
            'registry_id',
            'date_issued',
            'issued_to',
            'duration_issued',
            'reason_you_issue',
        ];
    }

    public function map($history): array
    {
        //$contact = Accounts::where('accounts_id',Auth::user()->userShopUser['customer_id'])->where('contact','LIKE',"%".$history->recipient."%")->with('contactGroup')->first();
        return [
            $history->assign_registry_id,
            $history->file_registry_id,
            $history->date_issued,
            $history->issued_to,
            $history->duration_issued,
            $history->reason_you_issue,
            
        ];
    }

    public function collection()
    {
        // return Customer::all();
        $history = AssignRegistry::All();
       // $history = EloquentBuilder::to($query, request()->all())->get();
        return $history;
    }
}
