<?php
/**
 * Created by PhpStorm.
 * User: duonght6255
 * Date: 5/10/2021
 * Time: 10:07 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Task\TaskRepositoryInterface;

class TaskController extends Controller
{
    /**
     * @var TaskRepositoryInterface
     */
    protected $taskRepository;

    /**
     * TasksController constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * Show all
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = $this->taskRepository->getAll();

        return view('task/task', compact('returns'));
    }

    /**
     * Create task
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $this->taskRepository->create($data);

        return redirect('/');
    }

    /**
     * Change status
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $this->taskRepository->changeStatusDone($request->get('id'));

        return redirect('/');
    }

    /**
     * Clear task
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function clear(Request $request)
    {
        $id = $request->get('id');
        $this->taskRepository->delete($id);

        return redirect('/');

    }

    /**
     * Clear task
     *
     * @param $request \Illuminate\Http\Request
     * @param int $clearAll
     * @return \Illuminate\Http\Response
     */
    public function clearAll(Request $request)
    {
        if ($request->get('clear_all')) {
            $this->taskRepository->clearAll();
        }

        return redirect('/');
    }


    /**
     * Delete task
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->taskRepository->delete($id);
        return view('task/task');
    }
}
