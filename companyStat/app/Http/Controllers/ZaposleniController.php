<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZaposleniResurs;
use App\Models\Zaposleni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZaposleniController extends BaseController
{
    public function index()
    {
        $zaposleni = Zaposleni::all();
        return $this->uspesnoOdgovor(ZaposleniResurs::collection($zaposleni), 'Vraceni svi podaci o zaposlenima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'godinaRodjenja' => 'required',
            'kompanijaID' => 'required',
            'sektorID' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $zaposlen = Zaposleni::create($input);

        return $this->uspesnoOdgovor(new ZaposleniResurs($zaposlen), 'Novi zaposleni je kreiran.');
    }


    public function show($id)
    {
        $zaposlen = Zaposleni::find($id);
        if (is_null($zaposlen)) {
            return $this->greskaOdgovor('Zaposleni sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new ZaposleniResurs($zaposlen), 'Zaposleni sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $zaposlen = Zaposleni::find($id);
        if (is_null($zaposlen)) {
            return $this->greskaOdgovor('Zaposleni sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'godinaStudija' => 'required',
            'kompanijaID' => 'required',
            'sekotrID' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $zaposlen->ime = $input['ime'];
        $zaposlen->prezime = $input['prezime'];
        $zaposlen->godinaRodjenja = $input['godinaRodjenja'];
        $zaposlen->kompanijaID = $input['kompanijaID'];
        $zaposlen->sektorID = $input['sektorID'];
        $zaposlen->save();

        return $this->uspesnoOdgovor(new ZaposleniResurs($zaposlen), 'Zaposleni je azuriran.');
    }

    public function destroy($id)
    {
        $zaposlen = Zaposleni::find($id);
        if (is_null($zaposlen)) {
            return $this->greskaOdgovor('Zaposleni sa zadatim id-em ne postoji.');
        }

        $zaposlen->delete();
        return $this->uspesnoOdgovor([], 'Zaposleni je obrisan.');
    }
}
