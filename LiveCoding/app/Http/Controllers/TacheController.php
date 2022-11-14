<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;
use App\Models\Brief;


class TacheController extends Controller
{

    // afficher tache
    public function index($id)
    {
        $brief = Brief::where('id', $id)
                ->get();
    
        $tache = Tache::where('Brief_id', $id)
                ->join('briefs', 'taches.Brief_id', 'briefs.id')
                ->get();
    
        return view('tache.index', compact('brief', 'tache'));
    }

    //ajouter tache
    public function create($id)
    {
        return view('tache.create', compact('id'));
    }
    
    public function store(request $request)
    {
        Tache::create([
                'nomTache' => $request->nomTache,
                'debutTache' => $request->debutTache,
                'finTache' => $request->finTache,
                'description' => $request->description,
                'Brief_id' => $request->Brief_id,
        ]);
    
        return redirect(url('/tache/create/'.$request->Brief_id))
                ->with('success', 'Nouvelle Tache ajouter');
        // return redirect('/')->with('success', 'Nouvelle Tache ajouter');
    }
     
    
    //supprimer tache
    public function destroy($id)
    {
        Tache::where('id', $id)
            ->delete();

        return redirect('/')->with(['massage' => 'Tache suprimer']);
    }


    // modifier tache
    public function edit($id)
    {
        $tache = Tache::where('id', $id)
            ->get();
    
        return view('tache.edit', compact('tache'));
    }

    public function update(Request $request, $id)
    {
        Tache::where('id', $id)
            ->update([
                    'nomTache' => $request->nomTache,
                    'debutTache' => $request->debutTache,
                    'finTache' => $request->finTache,
                    'description' => $request->description,
                    'Brief_id' => $request->Brief_id,
            ]);
    
        return redirect(url('/tache/edit/'.$request->brief_id));  ///edit_form taches
    }
    
}
