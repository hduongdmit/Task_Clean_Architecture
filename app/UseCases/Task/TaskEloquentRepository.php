<?php
/**
 * Created by PhpStorm.
 * User: duonght6255
 * Date: 5/10/2021
 * Time: 10:08 PM
 */
namespace App\UseCases\Task;

use App\Repositories\EloquentRepository;
use App\Entities\Task;

class TaskEloquentRepository extends EloquentRepository implements TaskRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Entities\Task::class;
    }

    /**
     * Change status done
     * @param int $id
     * @return mixed
     */
    public function changeStatusDone($id)
    {
        return $this->_model
            ->where('id', $id)
            ->where('status', Task::STATUS_UNDONE)
            ->update([
                'status' => Task::STATUS_DONE
            ]);
    }

    public function clearAll()
    {
        return $this->_model
            ->where('status', Task::STATUS_DONE)
            ->delete();
    }

}
