<?php

namespace App\Controller;

use App\Model\Employee;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends BaseController
{
    function data()
    {
        return new Employee();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/employees/edit/{id}", methods={"post","get"})
     */
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $q = $this->data()->update( $id, $_POST, 'employee');
            $this->db->raw($q);
            return $this->redirect('/employees');
        }

        $row = $this->db->row($this->data()->getById($id,'employee' ));

        return $this->render('employee/form.html.twig', [
            'employee' => $row
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     * @Route ("/employees/new", methods={"get", "post"})
     */
    public function insertNew(Request $request){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->raw($this->data()->insert($_POST, 'employee'));
            return $this->redirect('/employees');
        }

        $users = $this->db->rows($this->data()->getUnused('user_'));

        return $this->render('employee/new.html.twig', [
            'users' => $users,

        ]);
    }


}
