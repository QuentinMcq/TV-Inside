<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Policies\CommentPolicy;
use App\Providers\AuthServiceProvider;
use App\Serie;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CommentController extends Controller
{

    public function index(Request $request) {
        $cat = $request->query('cat', '');
        $value = $request->cookie('cat');
        if ($cat == 'All' || (empty($cat) && empty($value))) {
            if (empty($cat))
                $cat = 'All';
            else
                Cookie::queue('cat', '', 0, '/comments');
            $comments = Comment::all();
        } elseif (!empty($cat) || !empty($value)) {
            if (empty($cat))
                $cat = $value;
            $comments = Comment::where('serie_id', $cat)->get();
            Cookie::queue('cat', $cat, 10, '/comments');
        }

        $series_id = Comment::distinct('series_id')->pluck('serie_id');
        return view('comments.index', ['comments' => $comments, 'cat' => $cat, 'series_id' => $series_id]);
    }


    public function create()
    {
        return view('comments.create');
    }


    public function store(Request $request)
    {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'content' => 'required',
                'note' => 'required',
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $comment = new Comment;

        $comment->content = $request->get("content");
        $comment->note = $request->note;
        $comment->validated = 1;
        $comment->user_id = 1;
        $comment->serie_id=$request->serie_id;


        // insertion de l'enregistrement dans la base de données
        $comment->save();

        // redirection vers la page qui affiche la liste des comments
        return redirect('/comments?cat='.$comment->serie_id);
    }


    public function show(Request $request, $id) {
        $action = $request->query('action', 'show');
        $comment = Comment::find($id);
        $serie = Serie::find($comment->serie_id);
        return view('comments.show', ['comment' => $comment, 'action' => $action,'serie'=>$serie]);
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, $id) {
        $comment = Comment::findOrFail($id);

        /*if ($this -> $user->cant('update', $comment)) {
            return redirect()->route('serie.show', ['jeu' => $comment->serie, 'action' => 'show'])->with('status', 'Impossible de modifier le commentaire');
        }*/

        $this->validate(
            $request, [
                'content' => 'required',
                'note' => 'required',
                ]
        );

        $comment->content = $request->get("content");
        $comment->note = $request->note;
        $comment->validated = 1;
        $comment->user_id = 1;
        $comment->serie_id;



        $comment->save();

        return redirect()->route('series.show', ['serie' => $comment->serie, 'action' => 'show'])->with('status', 'Commentaire modifié avec succès');
    }

    public function destroy(Request $request, $id) {
        $comment = Comment::findOrFail($id);
        //$this->authorize('delete', $comment);

        if ($request->delete == 'delete') {
            $comment->delete();
        }

        else if($request->modify == 'modify') {
           return redirect()->route("comments.edit",$comment->id);
        }

        return redirect('/comments?cat='.$comment->serie_id);
    }
}
