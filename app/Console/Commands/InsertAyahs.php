<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Audio;
use App\Models\Ayah;
use App\Models\Edition;
use App\Models\Surah;
use Illuminate\Support\Facades\Http;

class InsertAyahs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:ayahs';
    private $URL         = 'http://api.alquran.cloud/v1/';
    protected $allSurahs;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $allSurahs = Surah::pluck('id', 'name');
        $editions  = Edition::all();
        $count     = 0;

        foreach ($editions as $edition) {
            $res       = Http::get($this->URL.'quran/'.$edition);
            $surahs    = $res->json()['data']['surahs'];
            foreach ($surahs as $surah) {
                foreach ($surah['ayahs'] as $ayah) {
                    $newAyah = Ayah::updateOrCreate(['surah_id' => $allSurahs[$surah['name']], 'edition_id' => $edition->id, 'text' => $ayah['text']], [
                        'number'         => $ayah['number'],
                        'text'           => $ayah['text'],
                        'image'          => $ayah['image'] ?? '',
                        'order_in_surah' => $ayah['numberInSurah'],
                        'juz'            => $ayah['juz'],
                        'manzil'         => $ayah['manzil'],
                        'page'           => $ayah['page'],
                        'ruku'           => $ayah['ruku'],
                        'hizb_quarter'   => $ayah['hizbQuarter'],
                        'is_sajda'       => $ayah['number'] == false ? 0 : 1 ,
                        'surah_id'       => $allSurahs[$surah['name']],
                        'edition_id'     => $edition->id,
                    ]);

                    if (isset($ayah['audioSecondary']) && count($ayah['audioSecondary']) > 0) {
                        foreach ($ayah['audioSecondary'] as $audio) {
                            $src = str_replace('https://cdn.islamic.network/', '', $audio);
                            $quality = explode('/', $src)[2];

                            Audio::updateOrCreate(['edition_id' => $edition->id, 'ayah_id' => $newAyah->id, 'src' => 'uploads/'.$src], [
                                'src'           => 'uploads/'.$src,
                                'quality'       => $quality,
                                'default_audio' => $audio == $ayah['audio'] ? 1 : 0,
                                'ayah_id'       => $newAyah->id,
                                'edition_id'    => $edition->id,
                            ]);
                        }
                    }

                    if($ayah)
                        $count++;
                }
            }
        }

        return 'data inserted successfully! ' . $count . ' Ayah inserted from '.count($surahs) . ' sourhs';
    }
}
