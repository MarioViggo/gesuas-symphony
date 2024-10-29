<?php

namespace App\Services;

use App\Repository\BeneficenteRepository;

class GerarNisService
{
    private $beneficenteRepository;

    public function __construct(BeneficenteRepository $beneficenteRepository)
    {
        $this->beneficenteRepository = $beneficenteRepository;
    }

    private function gerarNis() : string
    {
        $nis_nmr = "";

        for($i = 0; $i <= 10; $i++ )
        {
            $nis_nmr .= mt_rand(0, 9);
        }

        return $nis_nmr;
    }

    /**
     * @return string 
     */
    public function gerarUnicoNis() : string
    {
        do {
            
            $nis_nmr = $this->gerarNis();
            $existente = $this->beneficenteRepository->pesquisarPorNis($nis_nmr);

        } while($existente);

        return $nis_nmr;
    }

    /**
     * @return string 
     */
}