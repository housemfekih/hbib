<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
   
       /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dachAction(Request $request)
    {
        // replace this example code with whatever you need
        // dump(explode('/myApp',$this->get('kernel')->getProjectDir())[1].'/templatechamp/testTmp/');

        $em = $this->getDoctrine()->getManager();
        $data=[];
       // $data['champs'] = $em->getRepository('AppBundle:Champ')->findAll();
        $data['champs'] = $em->getRepository('AppBundle:Champ')->findBy([],['id'=>'DESC']);
        $data['Sections'] = $em->getRepository('AppBundle:Section')->findBy([],['id'=>'DESC']);
        $data['Templates'] = $em->getRepository('AppBundle:Template')->findBy([],['id'=>'DESC']);
      //  $data['Groupes'] = $em->getRepository('AppBundle:Groupe')->findAll();
        $data['Groupes'] = $em->getRepository('AppBundle:Groupe')->findBy([],['id'=>'DESC']);
        $data['Users_compte'] = $em->getRepository('AppBundle:User')->findBy([],['id'=>'DESC']);

        $data['Cvs'] = $em->getRepository('AppBundle:Cv')->findBy([],['id'=>'DESC']);
        $data['Users'] = $em->getRepository('AppBundle:User')->findBy([],['lastLogin'=>'DESC']);
        return $this->render('dashboard.html.twig',['data'=>$data]);
    }


      /**
     * @Route("/", name="acceuilPage")
     */
    public function acceuilAction(Request $request)
    {
        // replace this example code with whatever you need
      //  dump($request);
        return $this->render('acceuil.html.twig');
    }
    

          /**
     * @Route("/contact", name="contactPage")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('contact.html.twig');
    }

    
          /**
     * @Route("/themes", name="themePage")
     */
    public function themeAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('themes.html.twig');
    }

              /**
     * @Route("/about", name="aboutPage")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('about.html.twig');
    }





/**
     * @Route("/send-notification", name="send_notification")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function sendNotification(Request $request)
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world !');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');
        // or the one-line method :
        // $manager->createNotification('Notification subject','Some random text','http://google.fr');

        // you can add a notification to a list of entities
        // the third parameter ``$flush`` allows you to directly flush the entities
        $manager->addNotification(array($this->getUser()), $notif, true);

        return $this->render('test.html.twig');
//        return $this->redirectToRoute('homepage
    }







        /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('test.html.twig');
    }

           /**
     * @Route("/log_out", name="logout_page")
     */
    public function logoutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('logout.html.twig');
    }

         /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/admin", name="admin_page")
     *
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction(Request $request)
    {
$em = $this->getDoctrine()->getManager();
    $dd=[];
    $dd['threads'] = $em->getRepository('AppBundle:Thread')->findAll();
     //$data['champs'] = $em->getRepository('AppBundle:Champ')->findBy([],['id'=>'DESC']);

        return $this->render('admin.html.twig',['dd'=>$dd]);
        //return $this->render('dashboard.html.twig',['data'=>$data]);

    }


      /**
     * @Route("/calendrier", name="calend_page")
     */
    public function calendAction(Request $request)

   {
       return $this->render('calendrier.html.twig');
}


   
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user", name="user_page")
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function userAction(){
      
        return $this->render('user.html.twig');
}

}
