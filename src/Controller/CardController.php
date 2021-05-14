<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormBuilderInterface;
use App\Repository\BookRepository;



class CardController extends AbstractController
{
    /**
     * @Route("/card", name="card_index")
     */
    public function index(SessionInterface $session, BookRepository $bookRepo)
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
        return $this->render('card/index.html.twig',[
            'items' => $panierWithData,
            'total' => $total
        ]);
    }
    
    /**
     * @Route("/card/add/{id}" , name = "card_add")
     */
    public function add($id, SessionInterface $session){
        $session->set('foo', 'bar');

        $panier = $session->get('panier', []);
        if(!empty($panier[$id])){
            $panier[$id]++ ;
        }else{
            $panier[$id] = 1 ; 
        }
        //remettre le panier dans la session & sauvegarder l'état de la session
         $session ->set('panier' , $panier);
         return $this->redirectToRoute("card_index");
    }
    /**
     * @Route("/panier/remove/{id}", name="card_remove")
     */
    public function remove($id, SessionInterface $session){
        $panier = $session->get('panier',[]);
        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        $session->set('panier' , $panier);

        return $this->redirectToRoute("card_index");

    }    
}
