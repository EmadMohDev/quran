<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Azkar;
use App\Models\Category;

class InsertAzkars implements ShouldQueue
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
        $res    = Http::get($this->url);
        $azkars = $res->json();

        foreach ($azkars as $azkar) {
            $category = Category::updateOrCreate(['title' => $azkar['category']], ['title' => $azkar['category']]);

            Azkar::updateOrCreate(['zekr' => $azkar['zekr'], 'reference' => $azkar['reference']], [
                'zekr'        => $azkar['zekr'] ?? "",
                'description' => $azkar['description'] ?? "",
                'count'       => $azkar['count'] ?? "",
                'reference'   => $azkar['reference'] ?? "",
                'category_id' => $category->id ?? 1,
            ]);
        }
    }
}
