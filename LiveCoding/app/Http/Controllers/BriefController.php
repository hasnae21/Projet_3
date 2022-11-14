<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brief;
use App\Models\Tache;

class BriefController extends Controller
{

    //afficher Brief
    public function index()
    {
        $brief = Brief::select("*")
        ->paginate(5);

        return view('index', compact('brief'));
    }
    
    //ajouter Brief
    public function create()
    {
        return view('brief.create');

    }
    public function store(Request $request)
    {
        Brief::create([
            'nomBrief' => $request->nomBrief,
            'heurLivraison' => $request->heurLivraison,
            'heurRecuperation' => $request->heurRecuperation,
        ]);
        
        return redirect('/')->with('success', 'Nouveau Brief ajouter');
    }
    
    // suprimer Brief
    public function destroy($id)
    {
        Brief::where('id', $id)
            ->delete();

        return redirect('/')->with(['massage' => 'Brief suprimer']);
    }

    // modifier Brief
    public function edit($id)
    {
        $brief = Brief::where('id', $id)
            ->get();
        return view('brief.edit', compact('brief'));
    }

    public function update(Request $request, $id)
    {
        Brief::where('id', $id)
            ->update([
                'nomBrief' => $request->nomBrief,
                'heurLivraison' => $request->heurLivraison,
                'heurRecuperation' => $request->heurRecuperation,
            ]);

        return redirect('/')->with(['confirmation' => 'Brief modifier']);
    }
}
