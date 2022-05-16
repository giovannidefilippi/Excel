<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGaraRequest;
use App\Http\Requests\UpdateGaraRequest;
use App\Models\Gara;
use App\Models\Stato;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\String_;

class GaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreGaraRequest $request)
    {
        Gara::create([
            'rdo' =>$request->rdo,
            'rdoelotto'=>$request->rdo+$request->lotto,
            'denominazioneiniziativa' =>$request->denominazioneiniziativa,
            'amministrazione' =>$request->amministrazione,
            'regione' =>$request->regione,
            'referente' =>$request->telefono,
            'telefono' =>$request->provincia,
            'bando' =>$request->bando,
            'lotto' =>$request->lotto,
            'basedasta' =>$request->basedasta,
            'email2' =>$request->email2,
            'datapubblicazione' =>$request->datapubblicazione,
            'datascadenza' =>$request->datascadenza,
            'dataterminechiarimenti' =>$request->dataterminechiarimenti,
            'giornidiconsegna' =>$request->giornidiconsegna,
            'criterioaggiudicazione' =>$request->criterioaggiudicazione,
            'note' =>$request->note,
            'quotazione' =>$request->quotazione,
            'offerta' =>$request->offerta
        ]);
        $id=Gara::max('id');
        return redirect()->route('gare.show',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $gara = Gara::findOrFail($id);
        return view('show',compact('gara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $gara = Gara::findOrFail($id);
        return view('edit',compact('gara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse|Response
     */
    public function update(UpdateGaraRequest $request, int $id)
    {
        $gara=Gara::findOrFail($id);
        if($request->stato)
        {
        $gara->update([
            'stato_id' =>$request->stato,

        ]);
        return back()->withInput();
        }
        else
            $gara->update([
                'note' =>$request->note,
                'quotazione' =>$request->quotazione,
                'offerta' =>$request->offerta

            ]);

        return redirect()->route('gare.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $gara = Gara::findOrFail($id);
        $gara->delete();
        $path="\RDO".$gara->rdoelotto;
        Storage::deleteDirectory($path);
        return back()->withInput();
    }

    public function nuovaGara(){
        $gara=Gara::where('stato_id',1)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Nuove Gare";

        return view('index',compact('gara','stato','tipo'));
    }

    public function inValutazione(){
        $gara=Gara::where('stato_id',2)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare in Valutazione";

        return view('index',compact('gara','stato','tipo'));
    }
    public function richiestaChiarimenti(){
        $gara=Gara::where('stato_id',3)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare con richiesta chiarimenti";

        return view('index',compact('gara','stato','tipo'));
    }
    public function richiestaQuotazione(){
        $gara=Gara::where('stato_id',4)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare con richiesta di quotazione";

        return view('index',compact('gara','stato','tipo'));
    }
    public function quotazioneRicevuta(){
        $gara=Gara::where('stato_id',5)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare con quotazione ricevuta";

        return view('index',compact('gara','stato','tipo'));
    }
    public function attesaPrezzoUscita(){
        $gara=Gara::where('stato_id',6)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare in attesa del prezzo d'uscita";

        return view('index',compact('gara','stato','tipo'));
    }
    public function daPartecipare(){
        $gara=Gara::where('stato_id',7)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare da partecipare";

        return view('index',compact('gara','stato','tipo'));
    }
    public function partecipata(){
        $gara=Gara::where('stato_id',8)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare partecipate";

        return view('index',compact('gara','stato','tipo'));
    }
    public function revocata(){
        $gara=Gara::where('stato_id',9)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare revocate";

        return view('index',compact('gara','stato','tipo'));
    }
    public function scartata(){
        $gara=Gara::where('stato_id',10)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare scartate";

        return view('index',compact('gara','stato','tipo'));
    }
    public function eliminata(){
        $gara=Gara::where('stato_id',11)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare eliminate";

        return view('index',compact('gara','stato','tipo'));
    }

    public function creaCartella($rdoelotto,$id){

        $path="\RDO".$rdoelotto;
        Storage::makeDirectory($path);
        $gara=Gara::findOrFail($id);
        $gara->update([
                'percorsocartella' =>$path,
            ]);

        return back()->withInput();
    }

    public function apriCartella($string){


    }
}
