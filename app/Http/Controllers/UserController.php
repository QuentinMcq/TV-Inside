<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){

        $users = User::all();
        return view('users.index',['users'=> $users] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
    public function show($id,Request $request)
    {
        //
        $action = $request->query('action','show');
        $user=User::find($id);
        $duree=0;
        $nbCom=0;
        $nbSerieVue=0;
        $commentaires=[];
        $series=[];

        foreach($user->commente as $com){
            $nbCom++;


        }



        foreach($user->seen as $ep){
            $duree+=$ep->duree;

            if(!in_array($ep->serie,$series)){
                array_push($series,$ep->serie);
                $nbSerieVue++;
            }
        }

        return view('users.show',['users' => $user,'action' =>$action,'duree'=>$duree,'commentaires'=>$commentaires,'nbCom'=>$nbCom,'nbSerieVue'=>$nbSerieVue,'series'=>$series]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
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
        $user = User::find($id);

        $validatedData = $request -> validate([
            'name' => ['required', 'max:191'],
            'email'=> ['required', 'max:191'],
            'password'=>['required','max:191'],
            'avatar'=>['required', 'max:191']
        ]);

        $input = $request->only(['name', 'email', 'password', 'avatar']);
        $user->name = $request->name;
        $user->email = $request -> email;
        $user->password = Hash::make($request['password']);
        $user->avatar = $request->avatar;

        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //

    }
}
