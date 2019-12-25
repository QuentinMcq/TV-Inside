<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Genre;

use Illuminate\Http\Request;
use App\Serie;
use Illuminate\Support\Facades\Cookie;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cat = $request->query('cat', -1);
        $value = $request->cookie('cat');

        /*if ($cat==-1 && !empty($value))) {
            $cat = $value;
    if (empty($cat))
                $cat = 'All';
            else
                Cookie::queue('cat', '', 0, '/series');
            $series= Serie::all();
        } elseif (!empty($cat) || !empty($value)) {
            if (empty($cat))
                $cat = $value;
            $series = Serie::where('nom', $cat)->get();
            Cookie::queue('cat', $cat, 10, '/series');
        }*/


        if ($cat == -1)
            $series = Serie::all();
        else
            $series = Genre::find($cat)->serie;


        //return $series;
        $noms = Genre::all();
        return view('series.index', ['series' => $series, 'cat' => $cat, 'noms' => $noms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request,$id){
        $serie=Serie::find($id);

        $saison=$request->query('saison',0);
        $episode=$serie->episodes()->get();
        $saisons=$serie->episodes->max('saison');
        $episodes= $serie->episodes->where('saison',$saison);


        $action = $request -> query('action', 'show');
        $comments= $serie->comments()->get();

        return view('series.show',['serie'=>$serie,'episodes'=>$episodes,'saisons'=>$saisons,'comments'=>$comments, 'action'=>$action]);

    }

    public function showSaison($idSerie,$idSaison){
        $serie=Serie::find($idSerie);
        $saison=$idSaison;
        $episode=$serie->episodes()->get();
        $saisons=$serie->episodes->max('saison');
        $episodes= $serie->episodes->where('saison',$saison);

        return view('series.showSaison',['serie'=>$serie,'episodes'=>$episodes,'episode'=>$episode,'saisons'=>$saisons,'saison'=>$saison]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    public function updateAvis(Request $request, $id)
    {
        $s=Serie::find($id);

        $s->avis = $request->avis;

        $s->save();
        return redirect('/series');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editAvis($id){
        $serie=Serie::find($id);
        return view("series.editAvis",['serie'=>$serie]);
    }
}
