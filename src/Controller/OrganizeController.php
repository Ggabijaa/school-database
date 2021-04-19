<?php

namespace App\Controller;

use App\DB;
use App\Model\Organize;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrganizeController extends BaseController
{
    function data(){
        return new Organize();
    }

    /**
     * @param $id
     * @Route("/organize/edit/{id}", name="organize-edit", methods={"get", "post"})
     * @return Response
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update( $id, $_POST,'lesson'));
            return $this->redirect('/lessons');
        }
        $row = $this->db->row($this->data()->getById($id,'organize'));

        return $this->render('organize/form.html.twig', [
            'organize' => $row,
        ]);
    }


}
