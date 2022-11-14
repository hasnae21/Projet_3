<?php

namespace App\Http\Controllers;


use App\Models\Promotion;
use App\Models\Apprenant;

use Illuminate\Http\Request;

class ApprenantController extends Controller
{

    //ajouter apprenant
    public function create($id)
    {
        return view('apprenant.create', compact('id'));
    }




    //ajouter apprenant
    public function store(request $request)
    {
        Apprenant::create([
            'promotion_id' => $request->promotion_id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
        ]);

        return  redirect(url('/promotion/edit/'.$request->promotion_id));  ///edit_form promo
    }




    // modifier apprenant
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
                'promotion_id' => $request->promotion_id,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
            ]);

        return redirect(url('/apprenant/edit/'.$request->promotion_id));  ///edit_form apprenants
    }





    //supprimer apprenant
    public function destroy(Request $request, $id)
    {
        Apprenant::where('id', $id)
            ->delete();

        return back()->with(['success' => 'Apprenant suprimer']);
    }



    // Rechercher Apprenant
    public function search(Request $request)
    {
        if ($request->ajax()) {

            $input = $request->key;
            $id = $request->id;
            $output = "";

            $apprenant = Apprenant::where([
                ['promotion_id', 'like', '%' . $id . "%"],
                ['nom', 'like', '%' . $input . '%'],
            ])
            ->orWhere([
                ['promotion_id', 'like', '%' . $id . "%"],
                ['prenom', 'like', '%' . $input . '%']
            ])

            ->orWhere([
                ['promotion_id', 'like', '%' . $id . "%"],
                ['email', 'like', '%' . $input . '%']
            ])

            ->join('promotions', 'apprenants.promotion_id', 'promotions.id')
            ->get();


            if ($apprenant) {
                foreach ($apprenant as $value) {

                    $urlEdit = (url('/apprenant/edit/'.$value->id));
                    $urlDelete = (url('/apprenant/delete/'.$value->id));

                    $output .= '
                    <tr>
                        <td></td>
                        <td>' . $value->nom . '</td>
                        <td>' . $value->prenom . '</td>
                        <td>' . $value->email . '</td>
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
