<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Income;
use AppBundle\Form\IncomeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IncomeController extends Controller
{

    /**
     * @Route("/{id}/addNewIncome", name="addIncome")
     */
    public function addNewIncomeAction(Request $request, $id)
    {
        $income = new Income();
        $form = $this->createForm(IncomeType::class, $income);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $account = $em->getRepository('AppBundle:Account')->find($id);
        if($form->isSubmitted() && $form->isValid()){
            $income = $form->getData();
            $income->setAccount($account);
            $em->persist($income);
            $em->flush();
//            return new Response("Address is successfully added");
            return $this->redirect('../Account/'.$id);
        }
        return $this->render('@App/Account/add_income.html.twig', [
            'form_income' => $form->createView(),
            'account' => $account
        ]);
    }


    /**
     * @Route("/Income/{id}/modify" )
     */
    public function updateAddressAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Income');
        $income=  $repository->find($id);

        $form = $this->createForm(IncomeType::class, $income);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $income = $form->getData();

            $em->persist($income);
            $em->flush();
            return $this->redirectToRoute('show_all_accounts');
        }

        return $this->render('@App\Income\update_income.html.twig', ['form' => $form->createView()]);
    }



    /**
     * @Route("{accountId}/{incomeId}/deleteIncome")
     */
    public function deleteIncome($accountId, $incomeId){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Account');
        $account = $repo->find($accountId);
        $incomes = $em->getRepository('AppBundle:Income')->findBy(array('account'=>$account, 'id' =>$incomeId ));
        foreach($incomes as $income){
            $incomeId = $income->getId();
        }
        $em->remove($income);
        $em->flush();
        return $this->redirect('/Account/'. $accountId);
    }

}
