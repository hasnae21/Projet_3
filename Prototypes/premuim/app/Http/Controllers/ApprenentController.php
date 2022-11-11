<?php

namespace App\Http\Controllers;

use App\Models\Apprenent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApprenentController extends Controller
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
        return view('myapprent.createA',['idpromo'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $appre=new Apprenent();
       $appre->nom=$request->input('nom');
        $appre->prenom=$request->input('prenom');
        $appre->Email=$request->input('Email');
        $appre->promotion_id=$request->input('promotion_id');
        $appre->save();
        return redirect()->route('gestionpromotion.edit', $appre->promotion_id);
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
        $index=Apprenent::findOrFail($id);
        return view('myapprent.updateA',['idap'=>$index]);
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
      $appre=Apprenent::findOrFail($id);
      $appre->nom=$request->input('nom');
      $appre->prenom=$request->input('prenom');
      $appre->Email=$request->input('Email');
      $appre->promotion_id=$request->input('promotion_id');
      $appre->save();
      return redirect()->route('gestionpromotion.edit', $appre->promotion_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $index=Apprenent::findOrFail($id);
        $index->delete();
        return redirect()->route('gestionpromotion.edit', $index->promotion_id);
    }

    public function searchapprent(Request $request){
        $output="";
        $id = $request->promotion_id;
        $student=Apprenent::where('nom','Like','%'.$request->search.'%')->where('promotion_id', $id)->get();

        foreach($student as $stud)
        {
            $output.=
            '<tr>
            <td> '.$stud->nom.' </td>
            <td>'.'<a href="/gestionapprent/edit/'.$stud['id'].'">'.'<button class="me-2 btn btn-outline-warning fw-bolder">modifer</button></a>'.'</td>
            <td>'.'<form method="post" action="'.route('gestionapprent.destroy',$stud->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" class="me-2 btn btn-outline-warning fw-bolder">supprimer</button>
            </form>'.'</td>
            </tr>';
        }
        return response($output);
    }
}
