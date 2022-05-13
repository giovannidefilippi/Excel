<?php

namespace App\Http\Controllers;

use App\Imports\GaraImport;
use App\Models\Gara;
use App\Models\Operatore;
use App\Models\Stato;
use ErrorException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $gara=Gara::all();
        $operatore=Operatore::all();
        $stato=Stato::all();
        $sorted_gara=$gara->sortBy('datascadenza');
        /*$sorted_gara=$gara->sortBy(function ($gara,$key){
            return $gara['rdo'].$gara['bando'];
        });*/

        return view('index',compact('sorted_gara','operatore','stato'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
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
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }

    /**
     * @throws ValidationException
     */
    public function import(Request $request): string
    {
       $this->validate($request,[
            //'select_file' => 'required|mimes:xls,xlsx'
            //'scegli_file' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
           'scegli_file' => 'required|mimetypes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
           //'select_file' => 'required|mimes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);
        $path = $request->file('scegli_file')->getRealPath();
        Excel::import(new GaraImport,$path);
        return back()->with('success','Il file Excel è stato importato senza errori.'); // Test senza try catch-> errore più verboso
     /* try{
            Excel::import(new GaraImport,$path);
            return back()->with('success','Il file Excel è stato importato senza errori.'); // scrive su $session chiave => valore
        }
           catch (QueryException $exception){
                return back()->with('error','Il file Excel non è stato importato. La query non è stata accettata dal db.');
             }
            catch (ErrorException $exception){
                return back()->with('error','Il file Excel non è stato importato. Errore di caricamento');
             }
            catch (\Exception $exception){
            //return view('file_non_caricato'); posso ritornare una view personalizzata
            //dd($exception->getMessage()); //oppure in sviluppo per capire quale eccezione è stata sollevata
            //dd(get_class($exception));
            return back()->with('error','Il file Excel non è stato importato');
        }*/

    }
}
