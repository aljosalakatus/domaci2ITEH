<?php

namespace App\Http\Resources;

use App\Models\Company;
use App\Models\Sektor;

use Illuminate\Http\Resources\Json\JsonResource;

class ZaposleniResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kompanija = Company::find($this->kompanijaID);
        $sektor = Sektor::find($this->sektorID);

        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'godinaRodjenja' => $this->godinaStudija,
            'kompanija' => $kompanija->nazivKompanije,
            'sektor' => $sektor->nazivSektora
        ];
    }
}
