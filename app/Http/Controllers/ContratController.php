<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Type_logement;
use App\Models\Locataire;
use DB;

class ContratController extends Controller

{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contrats=Contrat::all();
        return view('contrat.index', compact('contrats') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $contrats=Contrat::all();
      $locataires=Locataire::all();
      $type_logements=Type_logement::all();
        return view('contrat.create', compact('contrats', 'type_logements', 'locataires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
       
       $locataire=$request->input('locataire_id');
       $logement=$request->input('type_logement_id');

        $loc=DB::table('locataires')->where('nom_complet',$locataire)->value('id');
        $log=DB::table('type_logements')->where('libelle',$logement)->value('id');
       
        
        

        $request->validate([
            'date_signature'=>'required',
            'date_occupation'=>'required',
            'date_fin'=>'required',
            'loyer_mensuel'=>'required',
            'nbre_mois_verser'=>'required',
            'caution'=>'required',
            'locataire_id'=>'required',
            'type_logement_id'=>'required',
            'code_logement'=>'required',
        ]);
        $contrat= new contrat([
            'date_signature'=>$request->get('date_signature'),
            'date_occupation'=>$request->get('date_occupation'),
            'date_fin'=>$request->get('date_fin'),
            'loyer_mensuel'=>$request->get('loyer_mensuel'),
            'nbre_mois_verser'=>$request->get('nbre_mois_verser'),
            'caution'=>$request->get('caution'),
            'code_logement'=>$request->get('code_logement'),
            'locataire_id'=>$loc,
            'type_logement_id'=>$log,
        ]);
        
        $contrat->save();
        $comp= DB::table('contrats')->where('locataire_id',$loc)->DISTINCT()->count();
         DB::table('locataires')->where('id',$loc)->update(['nbre_contrat'=>$comp]);
        return redirect('/contrat')->with('success', 'Contrat Ajouté avec succès');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrats= Contrat::FindOrFail($id);
        return view('contrat.show', compact('contrats'));
    }

    public function imprimer($id)
    {
        $contrats= Contrat::FindOrFail($id);
        return view('contrat.impContrat', compact('contrats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_logements=Type_logement::all();
        $contrats= Contrat::FindOrFail($id);
        return view('contrat.edit', compact('contrats','type_logements'));
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
        $logement=$request->input('type_logement_id');
        $log=DB::table('type_logements')->where('libelle',$logement)->value('id');
        
        $request->validate([
            'date_signature'=>'required',
            'date_occupation'=>'required',
            'date_fin'=>'required',
            'loyer_mensuel'=>'required',
            'nbre_mois_verser'=>'required',
            'caution'=>'required',
            'type_logement_id'=>'required',
        ]);

        $contrat= Contrat::FindOrFail($id);
            $contrat-> date_signature = $request->get('date_signature');
            $contrat-> date_occupation = $request->get('date_occupation');
            $contrat-> date_fin = $request->get('date_fin');
            $contrat-> loyer_mensuel = $request->get('loyer_mensuel');
            $contrat-> nbre_mois_verser = $request->get('nbre_mois_verser');
            $contrat-> caution = $request->get('caution');
            $contrat-> type_logement_id = $log;
        
            $contrat->update();
            return redirect('/contrat')->with('success', 'Contrat modifié avec succès');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrat= Contrat::FindOrFail($id);

        $loc=$contrat->locataire_id;
        $comp= DB::table('contrats')->where('locataire_id',$loc)->DISTINCT()->count();
        $contrat->delete();
         DB::table('locataires')->where('id',$loc)->update(['nbre_contrat'=>$comp-1]);
        return redirect('/contrat')->with('success', 'Contrat supprimé avec succès');
    }

    
}
