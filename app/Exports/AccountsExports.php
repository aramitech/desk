<?php
namespace App\Exports;
use EloquentBuilder;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;

class AccountsExports implements Responsable, FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    protected $request;
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Accounts.xlsx';

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
            'accounts_id',
            'company_id',
            'mrno',
            'application_fee',
            'transfer_fee',
            'annual_license_fee',
            'investigation_fee_local',
            'investigation_fee_foreign',
            'premise_fee',  
            'renewal_fee',
            'operating_fee',
            'totals',
            'status'
        ];
    }

    public function map($history): array
    {
        //$contact = Accounts::where('accounts_id',Auth::user()->userShopUser['customer_id'])->where('contact','LIKE',"%".$history->recipient."%")->with('contactGroup')->first();
        return [
            $history->accounts_id,
            $history->company_id,
            $history->mrno,
            $history->application_fee,
            $history->transfer_fee,
            $history->annual_license_fee,
            $history->investigation_fee_local,
            $history->investigation_fee_foreign,
            $history->premise_fee,
            $history->renewal_fee,
            $history->operating_fee,
            $history->totals,
            $history->status,

        ];
    }

    public function collection()
    {
        // return Customer::all();
        $history = Accounts::All();
       // $history = EloquentBuilder::to($query, request()->all())->get();
        return $history;
    }
}
