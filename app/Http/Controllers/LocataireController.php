<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locataire;
use App\Models\Contrat;
class LocataireController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
       $locataires=Locataire::all();
       $total=Locataire::count();
             
    return view('/locataire.index', compact('locataires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/locataire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_complet'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'cni'=>'required',
        ]);

        $locataire= new Locataire([
            'nom_complet'=>$request->get('nom_complet'),
            'adresse'=>$request->get( 'adresse'),
            'telephone'=>$request->get('telephone'),
            'cni'=>$request->get('cni'),
            'nbre_contrat'=>0,
     ] );
        
        $locataire->save();
        return redirect('/locataire')->with('success','Locataire ajouté avec succès');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locataires=Locataire::findOrFail($id);
        return view('/locataire.show',compact('locataires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locataires = Locataire::findOrFail($id);
        return view('/locataire.edit', compact('locataires'));
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
        $request->validate([
            'nom_complet'=>'required',
            'adresse'=>'required',
            'telephone'=>'required',
            'cni'=>'required',
        ]);
        
        $locataire = Locataire::findOrFail($id);
        $locataire->nom_complet=$request->get('nom_complet');
        $locataire->adresse=$request->get('adresse');
        $locataire->telephone=$request->get('telephone');
        $locataire->cni=$request->get('cni');

        $locataire->update();
        return redirect('/locataire')->with('success','Locataire  '  .$locataire->nom_complet.'  modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locataire=Locataire::findOrFail($id);
        try{
        $locataire->delete();
        }catch(\Illuminate\Database\QueryException){
           return back()->with('alert','Il a un contrat en cours par conséquent, il ne peut être supprimé');
        }
        return redirect('/locataire')->with('success','Locataire supprimé avec succès');
    }
}
