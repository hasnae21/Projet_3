<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Apprenant;
use App\Models\Briefs_apprenant;

use Illuminate\Http\Request;

class Briefs_apprenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (is_null(Brief::find($request->brief_id)->briefsApprenant()->find($request->apprenant_id))) {

            $assign = Briefs_apprenant::create([
                'apprenant_id' => $request->apprenant_id,
                'brief_id' => $request->brief_id
            ]);
        }
        return back();
    }

    public function show($id)
    {
        $apprenant = Apprenant::select("*")->paginate(3);

        return view(
            'brief.assign',
            ['apprenant' => $apprenant, 'id' => $id]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // Rechercher Apprenant
    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {

    //         $input = $request->key;
    //         $id = $request->id;
    //         $output = "";

    //         $apprenant = Apprenant::where([
    //             ['promotion_id', 'like', '%' . $id . "%"],
    //             ['nom', 'like', '%' . $input . '%'],
    //         ])
    //         ->orWhere([
    //             ['promotion_id', 'like', '%' . $id . "%"],
    //             ['prenom', 'like', '%' . $input . '%']
    //         ])

    //         ->orWhere([
    //             ['promotion_id', 'like', '%' . $id . "%"],
    //             ['email', 'like', '%' . $input . '%']
    //         ])

    //         ->join('promotions', 'apprenants.promotion_id', 'promotions.id')
    //         ->get();


    //         if ($apprenant) {
    //             foreach ($apprenant as $value) {

    //                 $output .= '
    //                 <tr>
    //                     <td></td>
    //                     <td>' . $value->nom . '</td>
    //                     <td>' . $value->prenom . '</td>
    //                     <td>' . $value->email . '</td>
    //                     <td>

    //                         <form action="{{route('.'assign.store'.')}}" method="post">
    //                         @csrf
    //                         <input type="hidden" name="apprenant_id" value="{{$value->id}}">
    //                         <input type="hidden" name="brief_id" value="{{$id}}">

    //                         <button type="submit">+</button>
    //                     </form>
    //                     <td>
    //                 </tr>';
    //             }

    //             return Response($output);
    //         }
    //     }
    // }

}
