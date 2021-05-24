<?php

namespace App\Controller;

use App\DB;
use App\Model\Activity;
use App\Model\Attend;
use App\Model\Book;
use App\Model\Class_;
use App\Model\Employee;
use App\Model\Event;
use App\Model\Lesson;
use App\Model\ModelInterface;
use App\Model\Organize;
use App\Model\Place;
use App\Model\Pupil;
use App\Model\PupilRepresentative;
use App\Model\User;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @var DB
     */
    protected $db;

    function __construct()
    {
        $this->db = DB::GetDB();
    }

    private function getClass(string $name)
    {
        switch ($name) {
            case 'Activity':
                return new Activity();
            case 'Attend':
                return new Attend();
            case 'Book':
                return new Book();
            case 'Class':
                return new Class_();
            case 'Employee':
                return new Employee();
            case 'Event':
                return new Event();
            case 'Lesson':
                return new Lesson();
            case 'Organize':
                return new Organize();
            case 'Place':
                return new Place();
            case 'Pupil':
                return new Pupil();
            case 'PupilRepresentative':
                return new PupilRepresentative();
            case 'User':
                return new User();
        }
    }




    private function getListRoute(string $name)
    {
        switch ($name) {
            case 'Activity':
                return '/activities';
            case 'Attend':
                return '/attend';
            case 'Book':
                return '/books';
            case 'Class':
                return '/classes';
            case 'Employee':
                return '/employees';
            case 'Event':
                return '/events';
            case 'Lesson':
                return '/lessons';
            case 'Organize':
                return '/organize';
            case 'Place':
                return '/places';
            case 'Pupil':
                return '/pupils';
            case 'PupilRepresentative':
                return '/pupil-representatives';
            case 'User':
                return '/users';
        }
    }

    /**
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function indexx(PaginatorInterface $paginator, Request $request): Response
    {
        $className = $this->resolveModelFromRequest($request);

        /** @var ModelInterface $model */
        $model = $this->getClass($className);

        $rowCount = $this->db->row($model->countAll($model->getTableName()));
        $rowCount = get_object_vars($rowCount);

        $rows = $paginator->paginate(
            $this->db->rows($model->getAll($model->getTableName())),
            $request->query->getInt('page', 1), 10
        );

        return $this->render(lcfirst($className) . '/index.html.twig', [
            'items' => $rows,
            'c' => $rowCount['cnt']
        ]);
    }

    /**
     * @Route("/reports")
     */
    public function reports(){

           $data =new Activity();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $rows = $this->db->rows($data->getreport
            ($_POST['enrolled_from'],$_POST['enrolled_until'],$_POST['birth_date_from'],
                $_POST['birth_date_until'], $_POST['cf'], $_POST['ct']));

            $pups = $this->db->rows($data->pupilCount(
                $_POST['enrolled_from'],$_POST['enrolled_until'],$_POST['birth_date_from'],
                $_POST['birth_date_until'], $_POST['cf'], $_POST['ct']));

            $books = $this->db->rows($data->takenBookCount(
                $_POST['enrolled_from'],$_POST['enrolled_until'],$_POST['birth_date_from'],
                $_POST['birth_date_until'], $_POST['cf'], $_POST['ct']));

            $allP = $this->db->row($data->allPupils(
                $_POST['enrolled_from'],$_POST['enrolled_until'],$_POST['birth_date_from'],
                $_POST['birth_date_until'], $_POST['cf'], $_POST['ct']));
            return $this->render('reports/report1.html.twig', [
                'items' => $rows,
                'pups' => $pups,
                'books' => $books,
                'allp' => $allP,
            ]);
        }

        return $this->render('reports/filter.html.twig', [
        ]);
    }


    public function delete(Request $request, int $id): Response
    {
        $className = $this->resolveModelFromRequest($request);

        $route = $this->getListRoute($className);
        /** @var ModelInterface $model */
        $model = $this->getClass($className);

        if ($route == '/classes'){

            try {
                $this->db->raw($model->delete( $id,$model->getTableName()));
            }catch (\PDOException $exception ){
                $this->addFlash('error', "Can't delete Employee id - {$id} - manages a class. Change employee ID");
                return $this->redirect('/classes');
            }
        }
        else{
            $this->db->raw($model->delete( $id,$model->getTableName()));
        }

        return $this->redirect($route);
    }

    public function insertNew(Request $request){

        $className = $this->resolveModelFromRequest($request);
        $route = $this->getListRoute($className);
        /** @var ModelInterface $model */
        $model = $this->getClass($className);

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->raw($model->insert($_POST, $model->getTableName()));
            return $this->redirect($route);
        }
        return $this->render(lcfirst($className) .'/new.html.twig', []);
    }

    private function resolveModelFromRequest(Request $request): string
    {
        $routeName = $request->attributes->get('_route');

        return ucfirst(substr($routeName, strpos($routeName, "_") + 1));
    }
}