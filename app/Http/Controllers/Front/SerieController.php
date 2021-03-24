<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Serie;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SerieController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Seriale me Titra Shqip marinsat.xyz - Seriale Turke');
        SEOMeta::setDescription('Marinsat.xyz filma me titra shqip, Shikoni dhe shkakroni Seriale me titra shqip, Seriale Turke me titra shqip HD, Episodet e perditesuara ne kohe reale.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        OpenGraph::setDescription('Marinsat.xyz filma me titra shqip, Shikoni dhe shkakroni Seriale me titra shqip, Seriale Turke me titra shqip HD, Episodet e perditesuara ne kohe reale.');
        OpenGraph::setTitle('Seriale me Titra Shqip marinsat.xyz, Seriale Turke. Seriale HD');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addImage(url(asset('/img/logo.png')));
        OpenGraph::addImage(url(asset('/img/logo.png')), ['height' => 290, 'width' => 185]);

        TwitterCard::setTitle('Seriale me Titra Shqip marinsat.xyz, Seriale Turke. Seriale HD');
        $series = Serie::orderBy('created_at', 'desc')->paginate(18);
        return view('series.index', compact('series'));
    }

    public function show($slug)
    {
        $serie = Serie::with('seasons')->where('slug', $slug)->first();

        SEOMeta::setTitle(Str::limit($serie->name. ' me Titra Shqip HD - Seriale me titra shqip.', 67, '...'));
        SEOMeta::setDescription($serie->name.' me Titra Shqip marinsat.xyz, Shiko dhe shkarko filma me titra shqip. Seriale turke, Serialet dhe filmat e fundit.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $serie->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:type', 'article', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        SEOMeta::addMeta('article:tag', 'Netflix', 'property');
        SEOMeta::addMeta('article:section', 'Series', 'property');
        SEOMeta::addMeta('og:site_name', 'Marinsat.xyz | Filma me titra shqip HD', 'property');
        OpenGraph::setDescription($serie->name.' me Titra Shqip marinsat.xyz, Shiko dhe shkarko filma me titra shqip. Seriale turke, Serialet dhe filmat e fundit.');
        OpenGraph::setTitle(Str::limit($serie->name. ' me Titra Shqip HD - Seriale me titra shqip.', 67, '...'));
        OpenGraph::addImage(url(asset('storage/serie/'.$serie->poster_path)));
        OpenGraph::addImage(url(asset('storage/serie/'.$serie->poster_path)), ['height' => 290, 'width' => 185]);

        $seasons = $serie->seasons()->paginate(18);

        return view('series.show', compact('serie', 'seasons'));
    }

    public function seasonShow($serie_slug, $slug)
    {
        $serie = Serie::where('slug', $serie_slug)->first();
        $season = Season::where('slug', $slug)->first();

        SEOMeta::setTitle(Str::limit($serie->name. ' Sezoni '. $season->season_number. ' me Titra Shqip Marinsat.xyz', 67));
        SEOMeta::setDescription($serie->name. ' Sezoni '. $season->season_number. ' me Titra Shqip. Shiko dhe shkarko Seriale me titra shqip FALAS! Seriale turke, Serialet dhe filmat e fundit.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $season->created_at, 'property');
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:type', 'article', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        SEOMeta::addMeta('article:tag', 'Netflix', 'property');
        SEOMeta::addMeta('article:section', 'Series', 'property');
        SEOMeta::addMeta('og:site_name', 'Marinsat.xyz | Seriale me titra shqip HD', 'property');
        OpenGraph::setDescription('Shiko dhe shkarko seriale me titra shqip FALAS!');
        OpenGraph::setTitle($serie->name. ' Sezoni '. $season->season_number. ' me Titra Shqip HD - Seriale me titra shqip HD!');
        OpenGraph::addImage(url(asset('storage/serie/season/'. $season->poster_path)));
        OpenGraph::addImage(url(asset('storage/serie/season/'. $season->poster_path)), ['height' => 290, 'width' => 185]);

        $episodes = $season->episodes()->paginate(18);
        return view('series.seasons.show', compact('serie', 'season', 'episodes'));
    }
}
