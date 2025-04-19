<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Laporan;
use App\Models\Barang;
use Carbon\Carbon;

class GenerateMonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate monthly report for all items';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = Barang::all();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        foreach ($items as $item) {
            $lastReport = Laporan::where('barang_id', $item->id)
                ->orderBy('created_at', 'desc')
                ->first();

            $stokAwal = $lastReport ? $lastReport->stokakhir : 0;

            Laporan::create([
                'barang_id' => $item->id,
                'stokawal' => $stokAwal,
                'stoktambah' => 0,
                'stokkurang' => 0,
                'stokakhir' => $stokAwal,
                'created_at' => Carbon::create($currentYear, $currentMonth, 1),
            ]);
        }

        $this->info('Monthly report generated successfully.');

        return 0;
    }
} 