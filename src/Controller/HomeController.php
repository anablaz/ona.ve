<?php


namespace App\Controller;


use App\Entity\MailingListSubscription;
use App\Form\MailingListSubscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $subscription = new MailingListSubscription();
        $form = $this->createForm(MailingListSubscriptionType::class, $subscription);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $subscription = $form->getData();
            $entityManager->persist($subscription);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'You have successfully added a subscription'
            );

            return $this->redirectToRoute('app_home_index');
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/terms")
     */
    public function terms(): Response
    {
        return $this->render('home/terms.html.twig');
    }
}
