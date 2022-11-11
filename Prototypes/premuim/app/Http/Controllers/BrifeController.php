<?php

namespace App\Http\Controllers;

use App\Models\Brif;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class BrifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mybrief.index',['brifall'=>Brif::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mybrief.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation existe et remplir de brif
        $validation=$request->validate([
            'nombrif' =>'required|unique:brifs,nombrif',
            'dateheurelivraison'=>'required',
            'dateheurerecupiration'=>'required',
        ]);

        $brife=new Brif();
        $brife->nombrif=$request->input('nombrif');
        $brife->dateheurelivraison=$request->input('dateheurelivraison');
        $brife->dateheurerecupiration=$request->input('dateheurerecupiration');
        $brife->save();
       return redirect()->route('gestionbrif.index');
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
        $verifier=Brif::findOrFail($id);
        $alltache=Tache::select("*")->where('idbrif',$id)->get();
        return view('mybrief.updateB',['idB'=>$verifier,'alltache'=>$alltache]);

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
        $verif=Brif::findOrFail($id);
        $verif->nombrif=$request->input('nombrif');
        $verif->dateheurelivraison=$request->input('dateheurelivraison');
        $verif->dateheurerecupiration=$request->input('dateheurerecupiration');
        $verif->save();
       return redirect()->route('gestionbrif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suppr=Brif::findOrFail($id);
        $suppr->delete();
        return redirect()->route('gestionbrif.index');
    }

    public function search(Request $request){
        $output="";
        $brifs=Brif::where('nombrif','Like','%'.$request->search.'%')->get();

        foreach($brifs as $brif)
        {
            $output.=
            '<tr>
            <td> '.$brif->id.' </td>
            <td> '.$brif->nombrif.' </td>
            <td> '.$brif->dateheurelivraison.' </td>
            <td> '.$brif->dateheurerecupiration.' </td>
            <td class="td1">'.'<a href="/gestionbrif/'.$brif['id'].'/edit">'.'<button class="me-2 btn btn-outline-warning fw-bolder">modifier</button></a>'.'</td>
            <td class="td1">'.'<form method="post" action="'.route('gestionbrif.destroy',$brif->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" class="me-2 btn btn-outline-danger fw-bolder">supprimer</button>
            </form>'.'</td>
            <td class="td1">'.'<a href="/apprebrif/show/'.$brif['id'].'">'.'<button class="btn btn-outline-secondary">assigner</button></a>'.'</td>
            <td class="td1">'.'<a href="/mytache/createT/'.$brif['id'].'">'.'<button class="btn btn-outline-primary fw-bolder">+tache</button></a>'.'</td>
            </tr>';
        }
        return response($output);
    }
}
