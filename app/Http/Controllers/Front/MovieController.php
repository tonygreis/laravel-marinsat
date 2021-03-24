<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Filmat e fundit me Titra Shqip - Filma Aksion - Filma Erotik - Filma indian Filma24.');
        SEOMeta::setDescription('Filmat e fundit me titra shqip, Shikoni dhe shkakroni Filma Aksion, Filma Erotik, Filma Indian, Filma Turk, Seriale Turke me titra shqip Filma24.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        OpenGraph::setDescription('Marinsat.xyz filma me titra shqip, Shikoni dhe shkakroni Filma Aksion, Filma Erotik, Filma Indian, Filma Turk, Seriale Turke me titra shqip');
        OpenGraph::setTitle('Marinsat.xyz Filma me Titra Shqip - Filma Aksion - Filma Erotik');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(url(asset('/img/logo.png')));
        OpenGraph::addImage(url(asset('/img/logo.png')), ['height' => 290, 'width' => 185]);

        TwitterCard::setTitle('Marinsat.xyz Filma me Titra Shqip - Filma Aksion - Filma Erotik');

        $movies = Movie::published(true)->orderBy('updated_at', 'desc')->paginate(18);
        return view('movies.index', compact('movies'));
    }

    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();

        SEOMeta::setTitle(Str::limit( $movie->title. ' | Marinsat.xyz shiko filma falas', 68, '.'));
        SEOMeta::setDescription(Str::limit($movie->overview, 150));
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $movie->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:type', 'article', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        SEOMeta::addMeta('article:tag', $movie->title . ' me titra shqip', 'property');
        SEOMeta::addMeta('article:section', $movie->genres->first()->title, 'property');
        SEOMeta::addMeta('og:site_name', 'Filma me titra shqip - Marinsat.xyz', 'property');
        OpenGraph::setDescription(Str::limit($movie->overview, 150));
        OpenGraph::setTitle(Str::limit( $movie->title. ' me Titra Shqip Marinsat.xyz', 68, '.'));
        OpenGraph::addImage(url(asset('storage/movie/'. $movie->poster_path)));
        OpenGraph::addImage(url(asset('storage/movie/'. $movie->poster_path)), ['height' => 425, 'width' => 300]);

        $latest = Movie::orderBy('created_at', 'desc')->published(true)->take(12)->get();

        return view('movies.show', compact('movie', 'latest'));
    }
}
