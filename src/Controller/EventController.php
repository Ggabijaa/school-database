<?php

namespace App\Controller;

use App\Model\Event;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends BaseController
{
    function data(){
        return new Event();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/events/edit/{id}", methods={"get", "post"})
     */
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update( $id, $_POST, 'event_'));
            return $this->redirect('/events');
        }

        $row = $this->db->row($this->data()->getById('event_', $id));

        return $this->render('event/form.html.twig', [
            'event' => $row
        ]);
    }
}
