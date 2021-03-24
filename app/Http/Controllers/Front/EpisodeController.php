<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function show($slug)
    {
        $episode = Episode::where('slug', $slug)->first();

        SEOMeta::setTitle($episode->season->serie->name.' Episodi '. $episode->episode_number. ' me Titra Shqip Marinsat.xyz');
        SEOMeta::setDescription($episode->season->serie->name .' me Titra Shqip. Shiko dhe shkarko Seriale me titra shqip FALAS!. Filma me titra shqip, Seriale turke. Marinsat.xyz .');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $episode->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:type', 'article', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        SEOMeta::addMeta('article:tag', 'Netflix', 'property');
        SEOMeta::addMeta('article:section', $episode->name, 'property');
        SEOMeta::addMeta('og:site_name', 'Filma24.pw | Filma me titra shqip HD', 'property');
        OpenGraph::setDescription($episode->season->serie->name .' me Titra Shqip. Shiko dhe shkarko Seriale me titra shqip FALAS!. Filma me titra shqip, Seriale turke. Marinsat.xyz .');
        OpenGraph::setTitle($episode->season->serie->name.' Episodi '. $episode->episode_number. ' me Titra Shqip Marinsat.xyz');
        OpenGraph::addImage(url(asset('storage/serie/season/'. $episode->season->poster_path)));
        OpenGraph::addImage(url(asset('storage/serie/season/'. $episode->season->poster_path)), ['height' => 290, 'width' => 185]);

        return view('episodes.show', compact('episode'));
    }
}
