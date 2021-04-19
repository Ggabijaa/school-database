<?php

namespace App\Controller;

use App\Model\Attend;
use App\Model\Pupil;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendController extends BaseController
{
    function data()
    {
        return new Attend();
    }

    /**
     * @param $id
     * @Route("/attend/edit/{id}", name="attend-edit")
     * @return Response
     */
    public function edit(int $id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update($id, $_POST));
            return $this->redirect('/attend');
        }

        $row = $this->db->row($this->data()->getById($id));
        $p = new Pupil();
        return $this->render('attend/form.html.twig', [
            'attend' => $row,
            'activities' => $this->db->rows($this->data()->getAll('activity')),
            'pupils' => $this->db->rows($p->JoinWithUser())
        ]);
    }
}
