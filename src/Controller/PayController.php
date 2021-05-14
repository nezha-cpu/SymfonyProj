<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Pay;
use App\Entity\book;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormBuilderInterface;
use App\Form\PayType;

class PayController extends AbstractController
{
    /**
     * @Route("/pay", name="pay")
     */
    public function index(SessionInterface $session, BookRepository $bookRepo ,Request $request): Response
    {
        $panier = $session->get('panier' , []);
        $panierWithData = [];
        foreach($panier as $id => $quantity){
            $panierWithData[] = [
                'book' => $bookRepo->find($id),
                'quantity' => $quantity
            ];
        }
        $total = 0 ; 
        foreach($panierWithData as $item){
            $totalItem = $item['book']->getPrice()*$item['quantity'];
            $total += $totalItem;
        }
        $em = $this->getDoctrine()->getManager();
        $pay = new Pay();
        $form = $this->createForm(PayType::class , $pay);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em->persist($pay);
            $em->flush();
            return $this->redirectToRoute('show' );

        }
        return $this->render('pay/index.html.twig',[
            'form' => $form-> createView(),
            'items' => $panierWithData,
            'total' => $total
        ]);
         
    }
    /**
     * @Route("/pay/show" , name="show")
     */
    public function show(SessionInterface $session, BookRepository $bookRepo ){
        $panier = $session->get('panier' , []);
        $panierWithData = [];
        foreach($panier as $id => $quantity){
            $panierWithData[] = [
                'book' => $bookRepo->find($id),
                'quantity' => $quantity
            ];
        }
        $total = 0 ; 
        foreach($panierWithData as $item){
            $totalItem = $item['book']->getPrice()*$item['quantity'];
            $total += $totalItem;
        }
        return $this->render('pay/show.html.twig',[
            'items' => $panierWithData,
            'total' => $total
        ]);
    }

} 
