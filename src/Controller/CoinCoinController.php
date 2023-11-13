<?php

namespace App\Controller;

use App\Entity\CoinCoin;
use App\Form\CoinCoinType;
use App\Repository\CoinCoinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/coinCoin')]
class CoinCoinController extends AbstractController
{
    #[Route('/quackList', name: 'app_coin_coin_index', methods: ['GET'])]
    public function index(CoinCoinRepository $coinCoinRepository): Response
    {
        return $this->render('coin_coin/index.html.twig', [
            'coin_coins' => $coinCoinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_coin_coin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $coinCoin = new CoinCoin();
        $form = $this->createForm(CoinCoinType::class, $coinCoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($coinCoin);
            $entityManager->flush();

            return $this->redirectToRoute('app_coin_coin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('coin_coin/new.html.twig', [
            'coin_coin' => $coinCoin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coin_coin_show', methods: ['GET'])]
    public function show(CoinCoin $coinCoin): Response
    {
        return $this->render('coin_coin/show.html.twig', [
            'coin_coin' => $coinCoin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_coin_coin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CoinCoin $coinCoin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CoinCoinType::class, $coinCoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_coin_coin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('coin_coin/edit.html.twig', [
            'coin_coin' => $coinCoin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_coin_coin_delete', methods: ['POST'])]
    public function delete(Request $request, CoinCoin $coinCoin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coinCoin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($coinCoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_coin_coin_index', [], Response::HTTP_SEE_OTHER);
    }
}
