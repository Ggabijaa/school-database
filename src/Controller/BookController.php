<?php

namespace App\Controller;

use App\Model\Book;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends BaseController
{
    function data(){
        return new Book();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/books/edit/{id}", methods={"get", "post"})
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->raw($this->data()->update( $id, $_POST, 'book'));
            return $this->redirect('/books');
        }

        $row = $this->db->row(($this->data()->getById($id,'book')));
        $users = $this->db->rows($this->data()->getAll('user_'));

        return $this->render('book/form.html.twig', [
            'book' => $row,
            'users' => $users,

        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     * @Route("/books/new", methods={"get", "post"})
     */
    public function insertNew(Request $request){


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->raw($this->data()->insert($_POST, 'book'));
            return $this->redirect('/books');
        }

        $users = $this->db->rows($this->data()->getAll('user_'));

        return $this->render('book/new.html.twig', [
            'users' => $users,
        ]);
    }



}
