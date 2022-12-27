<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_logement;
use App\Models\Contrat;
use DB;
use Session;

class Type_logementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $type_logements=Type_logement::all();
       return view('/type_logement.index',compact('type_logements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/type_logement.create');
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
            'libelle'=>'required',
            'quantité'=>'required',
            'disponible'=>'required',
            'bareme'=>'required',
       ]);

       $type_logement = new Type_logement([
        'libelle'=>$request->get('libelle'),
        'quantité'=>$request->get('quantité'),
        'disponible'=>$request->get('disponible'),
        'bareme'=>$request->get('bareme'),
       ]);

       $type_logement->save();
       return redirect('/type_logement')->with('success','Logement ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         $type_logements=Type_logement::findOrFail($id);
        return view('/type_logement.edit',compact('type_logements'));
      
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
        'libelle'=>'required',
        'quantité'=>'required',
        'disponible'=>'required',
        'bareme'=>'required',
       ]);

       $type_logements = Type_logement::findOrFail($id);
       $type_logements->libelle=$request->get('libelle');
       $type_logements->quantité=$request->get('quantité');
       $type_logements->disponible=$request->get('disponible');
       $type_logements->bareme=$request->get('bareme');

       if($type_logements->quantité < $type_logements->disponible) 
      
        return back()->with('alert','La quantité disponible ne peut en aucun cas être supérieure à la quantité initiale');
       $type_logements->update();
       return redirect('/type_logement')->with('success','Logement modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $type_logements=Type_logement::findOrFail($id);
       $indentifiant=$type_logements->id;
      $verif = Contrat::where('type_logement_id',$indentifiant)->count();
       if($verif!=0)
       return back()->with('alert','Attention ce logement a un contrat et ne peut être supprimé tant que ce contrat existe');
       $type_logements->delete();
       return redirect('/type_logement')->with('success','Logement supprimé avec succès');
       
      
    }
}
