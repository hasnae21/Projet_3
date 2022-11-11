<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Tache;
use Illuminate\Http\Request;


class BriefController extends Controller
{
    
    public function index()
    {
        $brief = Brief::select("*")
        ->paginate(5);

        return view('brief.index' , compact('brief'));
    }


    public function create()
    {
        return view('brief.create');
    }



    //ajouter Brief
    public function store(Request $request)
    {
        Brief::create([
            'nom_brief' => $request->nom_brief,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        return redirect('/brief')->with('success','Nouveau Brief ajouter');
    }


    // modifier Brief
    public function edit($id)
    {
        $brief = Brief::where('id', $id)
            ->get();

        $tache = Tache::where('brief_id', $id)
            ->join('briefs', 'taches.brief_id', 'briefs.id')
            ->get();

            return view('brief.edit', compact('brief','tache'));
    }


    public function update(Request $request, $id)
    {
        Brief::where('id', $id)
            ->update([
                'nom_brief' => $request->nom_brief
            ]);

        return redirect(url('/brief/edit/'.$id));
    }



    // suprimer Brief
    public function destroy($id)
    {
        Brief::where('id', $id)
            ->delete();

        return redirect('./brief')->with(['success' => 'Brief suprimer']);
    }


    // Rechercher Brief
    public function search(Request $request)
    {
        if ($request->ajax()) {

            $input = $request->key;
            $output = "";
            $brief = Brief::where('nom_brief', 'like', '%' . $input . "%")
                ->get();

            if ($brief) {
                foreach ($brief as $value) {

                    $urlEdit = (url('/brief/edit/'.$value->id));
                    $urlDelete = (url('/brief/delete/'.$value->id));

                    $output .= '
                    <tr>
                        <td>' . $value->id . '</td>
                        <td>' . $value->nom_brief . '</td>
                        <td>
                        <a class="text-danger" href='.$urlDelete.'>Supprimer</a>
                        <a class="text-success" href='.$urlEdit.'>Modifier</a>
                        </td>
                        <td><a href="assign">Assigner</a></td>
                        <td><a href="/tache/create"> + Tâches </a></td>
                    </tr>';
                }

                return Response($output);
            }
        }
    }

    public function assignbrief()
    {
        $briefs = Brief::all();
        return view('assign.index', ['briefs' => $briefs]);
    }




}
