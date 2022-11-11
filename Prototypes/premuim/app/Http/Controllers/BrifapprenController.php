<?php

namespace App\Http\Controllers;

use App\Models\Apprenent;
use App\Models\Brif;
use App\Models\Brifapprent;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class BrifapprenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $brif=DB::table('brifapprents')
        // ->join('brifs','brifapprents.idbrif','=','brifs.id')
        // ->join('apprenents','brifapprents.idappre','=','apprenents.id')
        // ->get();
        // return view('/aa',['allba'=>$brif]);
    }
    public function addAll()
    {
        $apprents = Promotion::latest()->first()->apprenet;
        foreach ($apprents as $apre) {
            if (is_null(Brif::find(request()->id)->apprent()->find($apre->id))) {
                Brifapprent::create([
                    'apprenent_id' => $apre->id,
                    'brif_id' => request()->id
                ]);
            }
        };
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null(Brif::find($request->brif_id)->apprent()->find($request->apprenent_id))){
            $brapp=new Brifapprent();
            $brapp->brif_id=$request->input('brif_id');
            $brapp->apprenent_id=$request->input('apprenent_id');
            $brapp->save();
            return redirect()->route('apprebrif.show',$brapp->brif_id);
        }
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Promotion::latest()->first()->apprenet;
        //  dd($students);
        $brief = Brif::where('id', $id)->firstOrFail();
        
        $assigned = array_map(function ($student) {
            return $student['id'];
        }, $brief->apprent->toArray());
        
        return view('/brifappre', ['brif' => $brief, 'apprenents' => $students, 'brifapprents' => $assigned]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $index=Brif::findOrFail($id);
        // $brif=DB::table('brifapprents')
        // ->join('brifs','brifapprents.idbrif','=','brifs.id')
        // ->join('apprenents','brifapprents.idappre','=','apprenents.id')
        // ->get();
        // return view('/brifappre',['allapprenent'=>Apprenent::all(),'idBrif'=>$index,'allba'=>$brif]);
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
    public function destroy(Request $request, $id)
    {
      $idbrif=  $request->brif_id;
      Brifapprent::where([
            ['apprenent_id',$id],
            ['brif_id',$idbrif]
        ])
        ->delete();
        return back();
    }
    
}
