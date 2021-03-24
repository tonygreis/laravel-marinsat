<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show($slug)
    {
        $genre = Genre::with('movies')->where('slug', $slug)->first();

        SEOMeta::setTitle('Filma '.$genre->title. ' me Titra Shqip Marinsat.xyz');
        SEOMeta::setDescription('Filma '.$genre->title. ' me Titra Shqip Marinsat.xyz Shiko dhe shkarko filma Aksion. Filma dhe serialet e fundit, seriale turke me titra shqip. Faqe per filma.');
        SEOMeta::setCanonical(url()->current());
        SEOMeta::addMeta('article:published_time', $genre->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('og:locale', 'en_US', 'property');
        SEOMeta::addMeta('og:type', 'article', 'property');
        SEOMeta::addMeta('og:url', url()->current(), 'property');
        SEOMeta::addMeta('article:tag', 'Netflix', 'property');
        SEOMeta::addMeta('article:section', $genre->title, 'property');
        SEOMeta::addMeta('og:site_name', 'Marinsat.xyz | Filma me titra shqip HD', 'property');
        OpenGraph::setDescription('Filma '.$genre->title. ' me Titra Shqip Marinsat.xyz Shiko dhe shkarko filma Aksion. Filma dhe serialet e fundit, seriale turke me titra shqip. Faqe per filma.');
        OpenGraph::setTitle('Filma '.$genre->title. ' me Titra Shqip HD - Filma me titra shqip HD!');
        OpenGraph::addImage(url(asset('/img/logo.png')));
        OpenGraph::addImage(url(asset('/img/logo.png')), ['height' => 290, 'width' => 185]);


        $movies = $genre->movies()->paginate(18);

        return view('genres.show', compact('genre', 'movies'));
    }
}
