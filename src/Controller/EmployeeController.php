<?php

namespace App\Controller;

use App\Model\Employee;
use Symfony\Component\HttpFoundation\RedirectResponse;
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


}
