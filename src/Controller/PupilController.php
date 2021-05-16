<?php

namespace App\Controller;

use App\Model\Book;
use App\Model\Class_;
use App\Model\Pupil;
use App\Model\PupilRepresentative;
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
        $c = new Class_();
        $r = new PupilRepresentative();
        $b = new Book();
        $classes = $this->db->rows($c->getAll('class'));

        $row = $this->db->row($this->data()->getPupilById($id, 'pupil'));
        $books = $this->db->rows($b->getUserBooks($row->user_id));
        $users = $this->db->rows($this->data()->getUnused('user_'));
        $reps = $this->db->rows($r->getAll('pupil_representative'));

        return $this->render('pupil/form.html.twig', [
            'pupil' => $row,
            'classes' => $classes,
            'users' => $users,
            'reps' => $reps,
            'books' => $books,

        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     * @Route ("/pupils/new", methods={"get", "post"})
     */
    public function insertNew(Request $request){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->raw($this->data()->insert($_POST, 'pupil'));
            return $this->redirect('/pupils');
        }
        $c = new Class_();
        $r = new PupilRepresentative();
        $users = $this->db->rows($this->data()->getUnused('user_'));
        $classes = $this->db->rows($c->getAll('class'));
        $reps = $this->db->rows($r->getAll('pupil_representative'));

        return $this->render('pupil/new.html.twig', [
            'users' => $users,
            'classes' => $classes,
            'reps' => $reps,
        ]);
    }

}
