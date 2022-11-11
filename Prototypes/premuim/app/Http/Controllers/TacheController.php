<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
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
    public function create($id)
    {
        return view('mytache.createT',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation existe et remplir de tache
        $validation=$request->validate([
            'nomtache' =>'required',
            'dateD'=>'required',
            'dateF'=>'required',
            'Description'=>'required'
        ]);

        $tache=new Tache();
        $tache->nomtache=$request->input('nomtache');
        $tache->dateD=$request->input('dateD');
        $tache->dateF=$request->input('dateF');
        $tache->Description=$request->input('Description');
        $tache->idbrif=$request->input('idbrif');
        $tache->save();
        return redirect()->route('gestionbrif.edit',$tache->idbrif);
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
        $index=Tache::findOrFail($id);
        return view('mytache.updateT',['tach'=>$index]);
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
        $tache=Tache::findOrFail($id);
        $tache->nomtache=$request->input('nomtache');
        $tache->dateD=$request->input('dateD');
        $tache->dateF=$request->input('dateF');
        $tache->Description=$request->input('Description');
        $tache->idbrif=$request->input('idbrif');
        $tache->save();
        return redirect()->route('gestionbrif.edit',$tache->idbrif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $index=Tache::findOrFail($id);
        $index->delete();
        return redirect()->route('gestionbrif.edit',$index->idbrif);
    }

    public function searchtache(Request $request){
        $output="";
        $id = $request->idbrif;
        $tache=Tache::where('nomtache','Like','%'.$request->search.'%')->where('idbrif', $id)->get();

        foreach($tache as $tach)
        {
            $output.=
            '<tr>
            <td> '.$tach->nomtache.' </td>
            <td> '.$tach->dateD.' </td>
            <td> '.$tach->dateF.' </td>
            <td> '.$tach->Description.' </td>
            <td>'.'<a href="/mytache/updateT/'.$tach['id'].'">'.'<button class="me-2 btn btn-outline-warning fw-bolder">modifier tache</button></a>'.'</td>
            <td>'.'<form method="post" action="'.route('gestiontache.destroy',$tach->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" class="me-2 btn btn-outline-danger fw-bolder">supprimer</button>
            </form>'.'</td>
            </tr>';
        }
        return response($output);
    }
}
