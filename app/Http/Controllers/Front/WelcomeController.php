<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Serie;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        SEOMeta::setTitle('Filma me titra shqip - Marinsat.xyz - Shiko dhe shkarko filmat e fundit falas.');
        SEOMeta::setDescription('Marinsat filma me titra shqip, Shikoni dhe shkakroni Filma Aksion, Filma Erotik, Filma Indian, Filma Turk, Seriale Turke me titra shqip');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        OpenGraph::setDescription('Shiko dhe shkarko filma me titra shqip FALAS!, Shiko Seriale Turke Me Titra Shqip');
        OpenGraph::setTitle('Filma me titra shqip - Marinsat.xyz - Shiko dhe shkarko filmat e fundit falas.');
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(url(asset('/img/logo.png')));
        OpenGraph::addImage(url(asset('/img/logo.png')), ['height' => 290, 'width' => 185]);
        TwitterCard::setTitle('Filma me titra shqip - Marinsat.xyz - Shiko dhe shkarko filmat e fundit falas.');
        $movies = Movie::published(true)->orderBy('updated_at', 'desc')->take(12)->get()->map(function (Movie $movie) {
            $movie->slug = route('movies.show', $movie->slug);
            $movie->poster_path = $movie->poster_path;
            $movie['new'] = $movie->created_at->format('d') == Carbon::today() ? true : false;
            return $movie;
        });
        $series = Serie::orderBy('updated_at', 'desc')->take(12)->get();

        return view('welcome', compact('movies', 'series'));
    }
}
