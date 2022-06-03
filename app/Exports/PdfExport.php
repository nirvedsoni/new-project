<?php

namespace App\Exports;

use App\NozleEntry;
use App\NozleEntryItem;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PdfExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $entryId;
    protected $entry;

    public $totalRows = 0;

    function __construct($entryId) {
        $this->entryId = $entryId;
    }

    public function collection()
    {
        $this->entry = NozleEntry::find($this->entryId);
        // $list = NozleEntryItem::where("entryId",$this->entryId)->get();
        $list = NozleEntryItem::select("nozle_entry_items.*","products.product")->join("products","products.id","=","nozle_entry_items.productId")->where("entryId",$this->entryId)->get();

        $this->totalRows = count($list)+3;
        $report = [];

        if (count($list)){
            foreach ($list as $key => $value){
                $data['Nozle'] = $value->nozle . "(" . $value->product . ")";
                $data['Cl Reading'] = $value->closing_reading;
                $data['Test'] = $value->test_qty;
                $data['Net Sale'] = $value->net_sale;
                $data['Rate'] = $value->sale_rate;
                $data['Amount'] = $value->amount;

                array_push($report, $data);
            }
        }

        return collect($report);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // $event->sheet->getDelegate()->getStyle('A1:F' . $this->totalRows)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                // $event->sheet->getStyle('A1:F3')->applyFromArray([
                //     'font' => [
                //         'bold' => true
                //     ]
                // ]);
                $event->sheet->mergeCells('B1:E1');
                $event->sheet->mergeCells('B2:E2');

                $event->sheet->getStyle('A1:F' . $this->totalRows)->applyFromArray([
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => ['argb' => '000000'],
                                ],
                            ],
                ]);

                $event->sheet->getDelegate()->getStyle('A1:F3')->getFont()->setSize(9);
                $event->sheet->getDelegate()->getStyle('A4:F' . $this->totalRows)->getFont()->setSize(10);

                $event->sheet->getDelegate()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT)->setPaperSize(PageSetup::PAPERSIZE_A4);

                // $event->sheet->getDelegate()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 3);
                $event->sheet->setCellValue('A2', date("d-M-Y",strtotime($this->entry->realdatetime)));
                $event->sheet->setCellValue('F2', date("H:i:s",strtotime($this->entry->realdatetime)));

                $event->sheet->setCellValue('A' . ($this->totalRows+1), "Total Sale Amount");
                $event->sheet->setCellValue('A' . ($this->totalRows+2), "Phone Pay");
                $event->sheet->setCellValue('A' . ($this->totalRows+3), "Sbi swep");
                $event->sheet->setCellValue('A' . ($this->totalRows+4), "Hpcl Swep");
                $event->sheet->setCellValue('A' . ($this->totalRows+5), "Credit sale");
                $event->sheet->setCellValue('A' . ($this->totalRows+6), "Net Cash Sale");

                $event->sheet->setCellValue('B' . ($this->totalRows+1), $this->entry->totalamount);
                $event->sheet->setCellValue('B' . ($this->totalRows+2), $this->entry->phonepayswap);
                $event->sheet->setCellValue('B' . ($this->totalRows+3), $this->entry->sbiswap);
                $event->sheet->setCellValue('B' . ($this->totalRows+4), $this->entry->hpclswap);
                $event->sheet->setCellValue('B' . ($this->totalRows+5), $this->entry->creditsale);
                $event->sheet->setCellValue('B' . ($this->totalRows+6), $this->entry->cash_amount);

                $event->sheet->getStyle('A' . ($this->totalRows+6) . ':A' . ($this->totalRows+6))->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);

                $event->sheet->setCellValue('A' . ($this->totalRows+7), "Cash Detail");
                $event->sheet->mergeCells('A' . ($this->totalRows+7) . ':F' . ($this->totalRows+7));
                $event->sheet->getDelegate()->getStyle('A' . ($this->totalRows+7) . ':F' . ($this->totalRows+7))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $notes = ["2000","500","200","100","50","20","10","5","2","1"];

                $entry = array($this->entry);
                
                $total_cash_amount = 0;
                foreach ($notes as $key => $note) {
                    $event->sheet->setCellValue('A' . ($this->totalRows+8+$key), $note);
                    $event->sheet->mergeCells('A' . ($this->totalRows+8+$key) . ':B' . ($this->totalRows+8+$key));

                    switch ($note) {
                        case '2000':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_2000);
                            $amount = $note*$this->entry->note_2000;

                            break;
                        case '500':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_500);
                            $amount = $note*$this->entry->note_500;

                            break;
                        case '200':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_200);
                            $amount = $note*$this->entry->note_200;

                            break;
                        case '100':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_100);
                            $amount = $note*$this->entry->note_100;

                            break;
                        case '50':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_50);
                            $amount = $note*$this->entry->note_50;

                            break;
                        case '20':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_20);
                            $amount = $note*$this->entry->note_20;

                            break;
                        case '10':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_10);
                            $amount = $note*$this->entry->note_10;

                            break;
                        case '5':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_5);
                            $amount = $note*$this->entry->note_5;

                            break;
                        case '2':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_2);
                            $amount = $note*$this->entry->note_2;

                            break;
                        case '1':
                            $event->sheet->setCellValue('C' . ($this->totalRows+8+$key), $this->entry->note_1);
                            $amount = $note*$this->entry->note_1;

                            break;
                    }

                    $event->sheet->mergeCells('C' . ($this->totalRows+8+$key) . ':D' . ($this->totalRows+8+$key));

                    
                    $event->sheet->setCellValue('E' . ($this->totalRows+8+$key), $amount);
                    $event->sheet->mergeCells('E' . ($this->totalRows+8+$key) . ':F' . ($this->totalRows+8+$key));

                    if(!$amount){
                        $amount = 0;
                    }

                    $total_cash_amount += $amount;
                }

                $event->sheet->setCellValue('A' . ($this->totalRows+8+1+count($notes)), "Total Cash Amount");
                $event->sheet->mergeCells('A' . ($this->totalRows+8+1+count($notes)) . ':D' . ($this->totalRows+8+1+count($notes)));
                $event->sheet->setCellValue('E' . ($this->totalRows+8+1+count($notes)), $total_cash_amount);
                $event->sheet->mergeCells('E' . ($this->totalRows+8+1+count($notes)) . ':F' . ($this->totalRows+8+1+count($notes)));

                $event->sheet->getDelegate()->getStyle('A' . ($this->totalRows+8+count($notes)) . ':F' . ($this->totalRows+8+count($notes)))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function headings(): array
    {
        return [
            [
                "Date",
                "",
                "",
                "",
                "",
                "Time"
            ],
            [
                "",
                "",
                "",
                "",
                "",
                ""
            ],
            [
                "Nozle",
                "Cl Reading",
                "Test",
                "Net Sale",
                "Rate",
                "Amount"
            ]
        ];
    }
}
