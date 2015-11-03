<?php

namespace OutsideNow\EventBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use OutsideNow\EventBundle\Entity\Event;
use OutsideNow\EventBundle\Form\SearchType;

/**
 * Event controller.
 *
 * @Route("/event")
 */
class EventController extends Controller
{

    /**
     * Lists all Event entities.
     *
     * @Route("/", name="event")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OutsideNowEventBundle:Event')->findAll();

        $searchForm = $this->createForm(new SearchType(), null, array(
            'action' => $this->generateUrl('event'),
            'method' => 'GET',
        ));

        return array(
            'entities' => $entities,
            'search_form' => $searchForm->createView(),
        );
    }

     /**
     * Finds and displays a Event entity.
     *
     * @Route("/{id}", name="event_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OutsideNowEventBundle:Event')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Event entity.');
        }

        return array(
            'entity' => $entity,
        );
    }
}

