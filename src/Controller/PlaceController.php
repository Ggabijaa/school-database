<?php

namespace App\Controller;

use App\Model\Place;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlaceController extends BaseController
{
    function data()
    {
        return new Place();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/places/edit/{id}", methods={"get", "post"})
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update( $id, $_POST,'placeclassroom'));
            return $this->redirect('/places');
        }
        $row = $this->db->row($this->data()->getById($id,'placeclassroom'));

        return $this->render('place/form.html.twig', [
            'place' => $row
        ]);
    }

}
