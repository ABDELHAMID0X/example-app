<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Auth;
class BookController extends Controller
{
    public function liste_book()
    {
        $Books  = Books::all();
        return view('books.liste' , compact('Books'));
    }



    public function update($id)
    {
        $Books  = Books::find($id);
        return view('books.update' ,  compact('Books'));
    }

    public function ajouter()
    {
        return view('books.ajouter');
    }

    public function ajouter_traitement(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'auteur'=>'required',
            'published_date'=>'required',
            'desciption'=>'required',
            'cover_image'=>'required',
        ]);
        $book = new Books();
        $book->title = $request->title;
        $book->auteur = $request->auteur;
        $book->published_date = $request->published_date;
        $book->desciption = $request->desciption;
        $book->cover_image = $request->cover_image;
        $book -> save();
        return redirect('/ajouter')->with('status','book a bien ajouter ');
    }



    public function update_traitement(Request $request){
        $request->validate([
            'title'=>'required',
            'auteur'=>'required',
            'published_date'=>'required',
            'desciption'=>'required',
            'cover_image'=>'required',
        ]);

        $book = Books::find($request->id);
        $book->title = $request->title;
        $book->auteur = $request->auteur;
        $book->published_date = $request->published_date;
        $book->desciption = $request->desciption;
        $book->cover_image = $request->cover_image;
        $book -> update();
        return redirect('/book')->with('status','etudiant a bien update ');
    }

    public function delete($id ){

        $Books  = Books::find($id);
    if (!$Books) {
        return back()->withErrors('book not found.');
    }
    $Books->delete();
        return redirect('/book')->with('status','book a bien supprimer');

    }


}
