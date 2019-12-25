<?php


namespace App\Http\Controllers;

use App\Episode;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class EpisodeController extends Controller {

    public function index(Request $request) {
//        $cat = $request->query('cat', '');
//        $value = $request->cookie('cat');
//        if ($cat == 'All' || (empty($cat) && empty($value))) {
//            if (empty($cat))
//                $cat = 'All';
//            else
//                Cookie::queue('cat', '', 0, '/episodes');
//            $episodes = Episode::all();
//        } elseif (!empty($cat) || !empty($value)) {
//            if (empty($cat))
//                $cat = $value;
//            $episodes = Episode::where('numero', $cat)->get();
//            Cookie::queue('cat', $cat, 10, '/episodes');
//        }
//
//        $numeros = Episode::distinct('numero')->pluck('numero');
//        return view('episodes.index', ['episodes' => $episodes, 'cat' => $cat, 'numeros' => $numeros]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ep=Episode::find($id);
        $serie=Serie::find($ep->serie_id);
        return view('episodes.show',['ep'=>$ep,'serie'=>$serie]);
    }

    /*public function showSaison(Request $request, $idserie, $saison) {
        $action = $request->query('action', 'show');
        $episodes = Episode::where([['saison', $saison], ['serie_id', $idserie]])->get();

        return view('saison.show', ['episodes'=>$episodes, 'action'=>$action]);
    }

    public function seen() {
        $user=DB::table('user')->get();
        $episodes=DB::table('episodes')->get();
        return $user->$episodes->attach('episodes_id')->get();
    }*/
}
