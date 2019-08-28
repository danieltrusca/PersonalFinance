<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Account;
use AppBundle\Form\AccountType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    /**
     * @Route("Account/addNewAccount", name="create_account")
     */
    public function addNewAccountAction(Request $request)
    {
        $account = new Account();
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $account = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();
//            return new Response('New person is add in DB!');
            return $this->redirect('/Account/' . $account->getId());
        }
        return $this->render('@App/Account/add_new_account.html.twig', ['form_account'=>$form->createView()]);
    }

    /**
     * @Route("/Account/showAllAccount", name="show_all_accounts")
     */
    public function showAllAccountAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('AppBundle:Account');
        $accounts = $repo->findAll();
        return $this->render('@App\Account\show_all_account.html.twig', ['accounts' => $accounts]);
    }

    /**
     * @Route("/Account/{id}/", name="show_details")
     */
    public function showOneAccountAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Account');
        $account = $repository->find($id);
        if (!$account) {
            return new Response('no such an account');
        }

        $incomeRepo = $em->getRepository('AppBundle:Income');
        $incomes = $incomeRepo->findBy(array('account' => $account));

        return $this->render('@App\Account\show_one_account.html.twig', ['account' => $account,
                                                                                'incomes'=>$incomes
        ]);
    }

    /**
     * @Route("/Account/{id}/updateAccount" , name="updateAccount")
     */
    public function updatePersonAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Account');
        $account=  $repository->find($id);

        $form = $this->createForm(AccountType::class, $account);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $account = $form->getData();
            $em->persist($account);
            $em->flush();
            return $this->redirectToRoute('show_all_accounts');
        }

        return $this->render('@App\Account\update_account.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/Account/{id}/delete" )
     */

    public function deleteAccountAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $repository=$em->getRepository('AppBundle:Account');
        $account=$repository->find($id);
        $em->remove($account);
        $em->flush();
        return $this->redirectToRoute('show_all_accounts');
    }




}
