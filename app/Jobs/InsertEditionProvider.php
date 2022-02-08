<?php

namespace App\Jobs;

use App\Models\Edition;
use App\Models\EditionLang;
use App\Models\EditionType;
use App\Models\Format;
use App\Models\Provider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class InsertEditionProvider implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $all_langs = EditionLang::pluck('id', 'name')->toArray();
        $res  = Http::get($this->url.'edition');
        $editions = $res->json()['data'];

        foreach ($editions as $edition) {
            $provider = Provider::updateOrCreate(['name' => $edition['name'], 'name_en' => $edition['englishName']], ['name' => $edition['name'], 'name_en' => $edition['englishName']]);

            if (! isset($all_langs[$edition['language']])) {
                $lang = EditionLang::create(['name' => $edition['language']]);
                $all_langs[$lang->name] = $lang->id;
            }

            Edition::updateOrCreate(['identifier' => $edition['identifier']], [
                'identifier'        => $edition['identifier'],
                'name'              => $edition['name'],
                'name_en'           => $edition['englishName'],
                'direction'         => $edition['direction'] ?? ($edition['language'] == 'ar' ? 'rtl' : 'ltr'),
                'provider_id'       => $provider->id,
                'edition_lang_id'   =>  $all_langs[$edition['language']],
                'edition_type_id'   => EditionType::where('title', $edition['type'])->first()->id,
                'format_id'         => Format::where('title', $edition['format'])->first()->id,
            ]);
        }
    }
}
