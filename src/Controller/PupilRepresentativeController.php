<?php

namespace App\Controller;

use App\Model\Pupil_representative;
use App\Model\PupilRepresentative;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PupilRepresentativeController extends BaseController
{
    function data(){
        return new PupilRepresentative();
    }

    /**
     * @param $id
     * @return Response
     * @Route("pupil-representatives/edit/{id}", methods={"get", "post"})
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $q = $this->data()->update( $id, $_POST, 'pupil_representative');
            $this->db->raw($q);
            return $this->redirect('/pupil-representatives');
        }
        $row = $this->db->row($this->data()->getById($id,'pupil_representative'));

        return $this->render('pupilRepresentative/form.html.twig', [
            'representative' => $row,
        ]);
    }
}
