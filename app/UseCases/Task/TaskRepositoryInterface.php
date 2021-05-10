<?php
/**
 * Created by PhpStorm.
 * User: duonght6255
 * Date: 5/10/2021
 * Time: 10:09 PM
 */
namespace App\UseCases\Task;

interface TaskRepositoryInterface
{
    /**
     * Change status done
     * @return mixed
     */
    public function changeStatusDone($id);

    /**
     * @return mixed
     */
    public function clearAll();
}
