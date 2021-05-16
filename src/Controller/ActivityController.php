<?php

namespace App\Controller;

use App\Model\Activity;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends BaseController
{
    private function data()
    {
        return new Activity();
    }

    /**
     * @param $id
     * @Route("/activities/edit/{id}", name="activity-edit", methods={"post", "get"})
     * @return Response
     */
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update($id, $_POST, 'activity'));

            return $this->redirect('/activities');
        }

        $row = $this->db->row(($this->data()->getById($id, 'activity')));

        return $this->render('activity/form.html.twig', [
            'activity' => $row
        ]);
    }


    /**
     * @param Request $request
     * @return RedirectResponse|Response
     * @Route("/activities/new", methods={"get", "post"})
     */
    public function insertNew(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->insert($_POST, 'activity'));
            return $this->redirect('/activities');
        }

        return $this->render('activity/new.html.twig', [
        ]);
    }

}

