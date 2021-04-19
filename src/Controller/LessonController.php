<?php

namespace App\Controller;

use App\Model\Lesson;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonController extends BaseController
{
    function data(){
        return new Lesson();
    }

    /**
     * @param $id
     * @return Response
     * @Route("/lessons/edit/{id}", methods={"get", "post"})
     */
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->db->raw($this->data()->update( $id, $_POST, 'lesson'));
            return $this->redirect('/lessons');
        }
        $row = $this->db->row($this->data()->getById($id,'lesson'));

        return $this->render('lesson/form.html.twig', [
            'lesson' => $row
        ]);
    }

}
