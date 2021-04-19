<?php

namespace App\Controller;

use App\Model\Class_;
use App\Model\Employee;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassController extends BaseController
{
    function data(){
        return new Class_();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/classes/edit/{id}", methods={"post","get"})
     */
    public function edit($id){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->raw($this->data()->update($id, $_POST, 'class'));
            return $this->redirect('/classes');
        }

        $row = $this->db->row($this->data()->getById($id, 'class'));
        $employees = new Employee();
        $em = $this->db->rows($employees->JoinWithUser());

        return $this->render('class/form.html.twig', [
            'class' => $row,
            'employees' => $em,

        ]);
    }
















    // kas skaitys tas gaidys
}
