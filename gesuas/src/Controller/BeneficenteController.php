<?php

namespace App\Controller;

use App\Entity\Beneficente;
use App\Form\FormType;
use App\Repository\BeneficenteRepository;
use App\Services\GerarNisService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class BeneficenteController extends AbstractController
{
    private $gerarNisService;

    public function __construct(GerarNisService $gerarNisService)
    {
        $this->gerarNisService = $gerarNisService;
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('beneficente/index.html.twig');
    }

    #[Route('/buscar-beneficente', name: 'buscar_beneficente', methods: 'POST')]
    public function buscarBeneficente(Request $req, BeneficenteRepository $beneficenteRepository) : Response
    {
        $nis = $req->request->get('nis');

        if(strlen($nis) != 11) {
            return $this->render('beneficente/index.html.twig', [
                'log' => "O NIS deve conter 11 dígitos"
            ]);
        }

        $beneficente = $beneficenteRepository->pesquisarPorNis($nis);

        if(!$beneficente) {
            return $this->render('beneficente/index.html.twig', [
                'log' => "Beneficente não encontrado!"
            ]);
        }

        return $this->render('beneficente/index.html.twig', [
            'beneficente' => $beneficente
        ]);
    }

    #[Route('/registrar-beneficente', name: 'registrar_beneficente', methods: 'POST')]
    public function cadastrarBeneficente(EntityManagerInterface $entityManager, Request $req) : Response
    {
        $nome = $req->request->get('nome');

        if(!$nome)
        {
            return $this->render('beneficente/index.html.twig', [
                'log' => "Não foi possível finalizar o cadastro."
            ]);
        }

        try {
            $nis = $this->gerarNisService->gerarUnicoNis();
            
            $beneficente = new Beneficente();
            $beneficente->setNome($nome);
            $beneficente->setNis($nis);
    
            $entityManager->persist($beneficente);
            $entityManager->flush();
    
            return $this->render('beneficente/index.html.twig', [
                'beneficente' => $beneficente
            ]);
        } catch (Exception $e) {
            return $this->render('beneficente/index.html.twig', [
                'log' => "Não foi possível finalizar o cadastro."
            ]);
        }
    }

   
    
}
