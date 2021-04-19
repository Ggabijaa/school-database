<?php

namespace App\Controller;

use App\Model\Pupil;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PupilController extends BaseController
{
    function data(){
        return new Pupil();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/pupils/edit/{id}", methods={"get", "post"})
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update( $id, $_POST, 'pupil'));

            return $this->redirect('/pupils');
        }
        $row = $this->db->row($this->data()->getById($id, 'pupil'));

        return $this->render('pupil/form.html.twig', [
            'pupil' => $row
        ]);
    }

}
