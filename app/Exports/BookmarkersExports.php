<?php
namespace App\Exports;
use EloquentBuilder;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\BookMarkers;
use Illuminate\Http\Request;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;

class BookmarkersExports implements Responsable, FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    protected $request;
    /**
    * It's required to define the fileName within
    * the export class when making use of Responsable.
    */
    private $fileName = 'Bookmarkers.xlsx';

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
            'bookmarker_id',
            'company_id',
            'licensee_name',
            'license_no',
            'return_for_the_period_of',
            'return_for_the_period_to',
            'branch',
            'date',
            'bets_no',  
            'deposits',
            'total_sales',
            'total_payout',
            'wht',
            'winloss',
            'ggr'
        ];
    }

    public function map($history): array
    {
        //$contact = Accounts::where('accounts_id',Auth::user()->userShopUser['customer_id'])->where('contact','LIKE',"%".$history->recipient."%")->with('contactGroup')->first();
        return [
            $history->bookmarker_id,
            $history->company_id,
            $history->licensee_name,
            $history->license_no,
            $history->return_for_the_period_of,
            $history->return_for_the_period_to,
            $history->branch,
            $history->date,
            $history->bets_no,
            $history->deposits,
            $history->total_sales,
            $history->total_payout,
            $history->wht,
            $history->winloss,
            $history->ggr,
        ];
    }

    public function collection()
    {
        // return Customer::all();
        $history = BookMarkers::All();
       // $history = EloquentBuilder::to($query, request()->all())->get();
        return $history;
    }
}
