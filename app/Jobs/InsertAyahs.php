<?php

namespace App\Jobs;

use App\Models\Audio;
use App\Models\Ayah;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class InsertAyahs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $edition;
    public $url;
    public $allSurahs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($edition, $url, $allSurahs)
    {
        $this->allSurahs = $allSurahs;
        $this->edition = $edition;
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $res       = Http::get($this->url.'quran/'.$this->edition->identifier);
        $surahs    = $res->json()['data']['surahs'];
        $count     = 0;
        DB::beginTransaction();
            foreach ($surahs as $surah) {
                foreach ($surah['ayahs'] as $ayah) {
                    $newAyah = Ayah::updateOrCreate([
                        'surah_id'      => $this->allSurahs[$surah['name']],
                        'edition_id'    => $this->edition->id,
                        'text'          => $ayah['text'],
                        'number'        => $ayah['number']
                    ], [
                        'number'         => $ayah['number'],
                        'text'           => $ayah['text'],
                        'image'          => 'uploads/quran/images/'.$ayah['number'].'.png',
                        'order_in_surah' => $ayah['numberInSurah'],
                        'juz'            => $ayah['juz'],
                        'manzil'         => $ayah['manzil'],
                        'page'           => $ayah['page'],
                        'ruku'           => $ayah['ruku'],
                        'hizb_quarter'   => $ayah['hizbQuarter'],
                        'is_sajda'       => $ayah['sajda'] == false ? 0 : 1 ,
                        'surah_id'       => $this->allSurahs[$surah['name']],
                        'edition_id'     => $this->edition->id,
                    ]);
                    ;

                    if (isset($ayah['audioSecondary']) && count($ayah['audioSecondary']) > 0) {
                        foreach ($ayah['audioSecondary'] as $audio) {
                            $src = str_replace('https://cdn.islamic.network/', '', $audio);
                            $quality = explode('/', $src)[2];

                            Audio::updateOrCreate([
                                'ayah_id'       => $newAyah->id,
                                'src'           => 'uploads/'.$src
                            ], [
                                'src'           => 'uploads/'.$src,
                                'quality'       => $quality,
                                'default_audio' => $audio == $ayah['audio'] ? 1 : 0,
                                'ayah_id'       => $newAyah->id,
                            ]);
                        }
                    }

                    if($ayah)
                        $count++;
                }
            }
        DB::commit();
        return 'data inserted successfully! ' . $count . ' Ayah inserted from '.count($surahs) . ' sourhs';
    }
}
