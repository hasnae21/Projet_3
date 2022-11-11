<?php

namespace App\Http\Controllers;
use App\Models\Brief;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
        //ajouter tache
        public function create($id)
        {
            return view('tache.create', compact('id'));
        }
    
    
    
    
        //ajouter tache
        public function store(request $request)
        {
            Tache::create([
                'brief_id' => $request->brief_id,
                'nom_tache' => $request->nom_tache,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'description' => $request->description,
            ]);
    
            return  redirect(url('/brief/edit/'.$request->brief_id));  ///edit_form brief
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
                    'brief_id' => $request->brief_id,
                    'nom_tache' => $request->nom_tache,
                    'date_debut' => $request->date_debut,
                    'date_fin' => $request->date_fin,
                    'description' => $request->description,
                ]);
    
            return redirect(url('/tache/edit/'.$request->brief_id));  ///edit_form taches
        }
    
        
        //supprimer tache
        public function destroy($id)
        {
            Tache::where('id', $id)
                ->delete();
    
            return back()->with(['success' => 'tache suprimer']);
        }
    
    
    
        // Rechercher tache
        public function search(Request $request)
        {
            if ($request->ajax()) {
    
                $input = $request->key;
                $id = $request->id;
                $output = "";
    
                $tache = Tache::where([
                    ['brief_id', 'like', '%' . $id . "%"],
                    ['nom_tache', 'like', '%' . $input . '%'],
                ])
                ->join('briefs', 'taches.brief_id', 'briefs.id')
                ->get();
    
    
                if ($tache) {
                    foreach ($tache as $value) {
    
                        $urlEdit = (url('/tache/edit/'.$value->id));
                        $urlDelete = (url('/tache/delete/'.$value->id));
    
                        $output .= '
                        <tr>
                            <td>' . $value->nom_tache . '</td>
                            <td>' . $value->date_debut . '</td>
                            <td>' . $value->date_fin . '</td>
                            <td>' . $value->description . '</td>
                            <td>
                                <a class="text-success" href='.$urlDelete.'>Supprimer</a>
                            </td>
                            <td>
                                <a class="text-danger" href='.$urlEdit.'>Modifier</a>
                            <td>
                        </tr>';
                    }
    
                    return Response($output);
                }
            }
        }


}
