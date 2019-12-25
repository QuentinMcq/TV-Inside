<?php


namespace App\Http\Controllers;


use App\Genre;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GenreController
{

    function index(Request $request)
    {
        $cat = $request->query('cat', '');
        $value = $request->cookie('cat');
        if ($cat == 'All' || (empty($cat) && empty($value))) {
            if (empty($cat))
                $cat = 'All';
            else
                Cookie::queue('cat', '', 0, '/genres');
            $genres = Genre::all();
        } elseif (!empty($cat) || !empty($value)) {
            if (empty($cat))
                $cat = $value;
            $genres = Genre::where('nom', $cat)->get();
            Cookie::queue('cat', $cat, 10, '/genres');
        }

        $nom = Genre::distinct('nom')->pluck('nom');
        return view('genres.index', ['genres' => $genres, 'cat' => $cat, 'nom' => $nom]);
    }

    public function store(Request $request)
    {
        // validation des données de la requête
        /*$this->validate(
            $request,
            [
                'nom' => 'required',
            ]
        );*/
        $validatedData=$request->validate(
            [
                'nom' => ['required','max:191'],


            ]);
        // code exécuté uniquement si les données sont validaées
        // sinon un message d'erreur est renvoyé vers l'utilisateur
        $input=$request-> only(['nom']

        );

        // préparation de l'enregistrement à stocker dans la base de données
        $genres = new Genre;
        $genres->nom = $input['nom'];



        // insertion de l'enregistrement dans la base de données
        $genres->save();
        $request->session()->flash('status', 'Task was successful!');

        // redirection vers la page qui affiche la liste des genre
        return redirect('/genres');
    }

    public function show($id,Request $request)
    {
        $action = $request->query('action','show');

        $genres = Genre::find($id);
        $series = $genres->serie()->get();

        return view('genres.show',['genres' => $genres,'series'=>$series,'action' =>$action]);
    }

}
