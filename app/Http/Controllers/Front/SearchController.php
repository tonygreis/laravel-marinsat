<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Movie;
use App\Models\Serie;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function search(Request $request)
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

        $searchResults = [];
        if ($request->search) {
            $get_movies = Movie::search($request->search)->where('is_public', true)->get()
                ->map(function (Movie $movie) {
                    $movie->slug = route('movies.show', $movie->slug);
                    $movie->poster_path = asset('storage/movie/'. $movie->poster_path);
                    $movie['type'] = 'Film';
                    return $movie;
                });
            $get_series = Serie::search($request->search)->get()
                ->map(function (Serie $serie) {
                    $serie->slug = route('series.show', $serie->slug);
                    $serie->poster_path = asset('storage/serie/'. $serie->poster_path);
                    $serie['title'] = $serie->name;
                    $serie['type'] = 'Serial';
                    return $serie;
                });
            $get_actors = Cast::search($request->search)->get()
                ->map(function (Cast $cast) {
                    $cast->slug = route('casts.show', $cast->slug);
                    $cast->poster_path = asset('storage/cast/'. $cast->poster_path);
                    $cast['title'] = $cast->name;
                    $cast['type'] = 'Aktor';
                    return $cast;
                });
            $all = $get_movies->merge($get_series)->merge($get_actors);
        }
        $searchResults = $this->paginate($all);
        $searchResults->setPath('search');
        $searchResults->appends(['search' => $request->search]);

        return view('search', compact('searchResults'));
    }

    public function paginate($items, $perPage = 18, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
