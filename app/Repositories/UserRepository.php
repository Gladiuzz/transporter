<?php
namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\UserContract;

class UserRepository extends BaseRepository implements UserContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Users $user
     */

     public function __construct(Users $user)
     {
        $this->model = $user->orderBy('id', 'DESC');
     }
}
