<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Apprenant;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    

    public function index()
    {
        $data = Promotion::select("*")
            ->paginate(5);

        return view(
            'index',
            ['data' => $data]
        );
    }


    public function create()
    {
        return view('promotion.create');
    }



    //ajouter Promotion
    public function store(Request $request)
    {

        $promo = new Promotion();
        $promo->name = $request->input("name_p");
        $promo->save();

        return redirect('/')->with(['success' => 'Promotion ajouter']);
    }




    // modifier Promotion
    public function edit($id)
    {
        $promotion = Promotion::where('id', $id)
            ->get();

        $apprenant = Apprenant::where('promotion_id', $id)
            ->join('promotions', 'apprenants.promotion_id', 'promotions.id')
            ->get();

            return view('promotion.edit', compact('promotion','apprenant'));
    }


    public function update(Request $request, $id)
    {
        Promotion::where('id', $id)
            ->update([
                'name' => $request->name
            ]);

        return redirect(url('/promotion/edit/'.$id));
    }



    // suprimer Promotion
    public function destroy($id)
    {
        Promotion::where('id', $id)
            ->delete();

        return redirect('/')->with(['success' => 'Promotion suprimer']);
    }




    // Rechercher Promotion
    public function search(Request $request)
    {
        if ($request->ajax()) {

            $input = $request->key;
            $output = "";
            $Promotion = Promotion::where('name', 'like', '%' . $input . "%")
                ->get();

            if ($Promotion) {
                foreach ($Promotion as $value) {

                    $urlEdit = (url('/promotion/edit/'.$value->id));
                    $urlDelete = (url('/promotion/delete/'.$value->id));

                    $output .= '
                    <tr>
                        <td>' . $value->id . '</td>
                        <td>' . $value->name . '</td>
                        <td><a class="text-danger" href='.$urlDelete.'>Supprimer</a></td>
                        <td><a class="text-success"href='.$urlEdit.'>Modifier</a></td>
                    </tr>';
                }

                return Response($output);
            }
        }
    }
}
