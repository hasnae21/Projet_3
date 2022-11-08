<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Apprenant;

use Illuminate\Http\Request;
// use App\Http\Requests\CreateApprenantRequest;

class ApprenantController extends Controller
{

    //ajouter apprenant
    public function create($id)
    {
        return view('apprenant.create', compact('id'));
    }




    //ajouter Promotion
    public function store(request $request)
    {
        Apprenant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'promotion_id' => $request->promotion_id,
        ]);

        return  redirect(url('edit_form/'.$request->promotion_id));  ///edit_form promo
    }




    // modifier Apprenant
    public function edit($id)
    {
        $apprenant = Apprenant::where('id', $id)
            ->get();

        return view('apprenant.edit', compact('apprenant'));
    }


    public function update(Request $request, $id)
    {
        Apprenant::where('id', $id)
            ->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'promotion_id' => $request->promotion_id,
            ]);

        return redirect(url('edit_form/'.$request->promotion_id));  ///edit_form apprenants
    }




    //supprmer Apprenant
    public function destroy($id)
    {
        Apprenant::where('id', $id)
            ->delete();

        return back();
    }




    // Rechercher Apprenant
    public function searchs(Request $request)
    {
        if ($request->ajax()) {

            $input = $request->key;
            $id = $request->id;
            $output = "";

            $apprenant = Apprenant::where([

                ["promotion_id", '=', $id],
                ['id', '=', $input],
            ])

                ->orWhere([
                    ["promotion_id", '=', $id],
                    ['nom', 'like', $input . "%"]
                ])

                ->orWhere([
                    ["promotion_id", '=', $id],
                    ['prenom', 'like', $input . "%"]
                ])

                ->orWhere([
                    ["promotion_id", '=', $id],
                    ['email', 'like', $input . "%"]
                ])

                ->join('promotions', 'apprenants.promotion_id', 'promotions.id')
                ->get();


            if ($apprenant) {
                foreach ($apprenant as $value) {

                    $urlEdit = (url('edit_form/'.$value->id));
                    $urlDelete = (url('delete/'.$value->id));

                    $output .= '
                    <tr>
                    <td>
                            <a href='.$urlEdit.'>Modifier</a>
                            <a href='.$urlDelete.'>Supprimer</a>
                    <td>
                            <td>' . $value->id . '</td>
                            <td>' . $value->nom . '</td>
                            <td>' . $value->prenom . '</td>
                            <td>' . $value->email . '</td>

                    </tr>';
                }

                return Response($output);
            }
        }
    }




}
