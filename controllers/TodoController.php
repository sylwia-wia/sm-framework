<?php

namespace sm\controllers;

use sm\Controller;
use sm\exceptions\NotFoundHttpException;
use sm\models\Todo;
use sm\Response;

//COOKIE
//define('ONE_WEEK', 7*86400);
//$returning_visitor = false;
//if(!isset($_COOKIE['return'])) {
//    setcookie('return', '1', time() + ONE_WEEK);
//} else {
//    $returning_visitor = true;
//}
//echo $returning_visitor ? "Welcome back" : "Welcome to my website";


class TodoController extends Controller
{



    public function create(): Response
    {
        if ($this->request->isPost()) {
            $todo = new Todo();
            $todo->name = $this->request->post('todo');
            $todo->save();

            $this->redirect(['todo', 'index']);
        }
        return $this->createResponse('views/todo_create.php');
    }

    public function update(): Response
    {

        $id = (int)$this->request->get('id');
        $todo = Todo::getOneByID($id);

        if ($this->request->isPost()) {
            $todo->name = $this->request->post('name');
            $todo->save();
            $this->redirect(['todo', 'index']);
        }

        return $this->createResponse('views/todo_update.php', [
            'todo' => $todo
        ]);
    }


    public function index(): Response
    {
        $search = $this->request->get('search');

        if ($search !== null && $search !== '') {
            $todos = Todo::getAllByName($search);
        } else {
            $todos = Todo::getAll();
        }

        return $this->createResponse('views/todo_index.php', [
            'todos' => $todos,
        ]);
    }

    public function delete(): Response
    {
        if ($this->request->isPost() === false) {
            throw new NotFoundHttpException('Only post request allowed');
        }

        $todos = Todo::getAll();
        $id = (int) $this->request->get('id');

        foreach ($todos as $todo) {
            if ($todo->id === $id) {
                $todo->delete();
                $this->redirect(['todo', 'index']);
            }
        }
        throw new \Exception('Not found todo with specific ID.');
    }



}