<?php

namespace App\Controller;

use App\Model\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends BaseController
{
    function data(){
        return new User();
    }

    /**
     * @param $id
     * @return Response
     * @Route("users/edit/{id}", methods={"get", "post"})
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update( $id, $_POST, 'user_'));

            return $this->redirect('/users');
        }
        $row = $this->db->row($this->data()->getById($id, 'user_'));

        return $this->render('user/form.html.twig', [
            'user' => $row
        ]);
    }
}
