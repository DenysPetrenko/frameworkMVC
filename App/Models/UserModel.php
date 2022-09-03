<?php

namespace App\Models;

use Petrenko\Framework\Models\Model;

class UserModel extends Model
{
    /**
     * @var string
     */
    protected string $table = 'users';
    /**
     * @var bool
     */
    protected bool $created_at = true;
    /**
     * @var bool
     */
    protected bool $updated_at = true;


    /**
     * @param array $dataUser
     *
     * @return bool
     */
    public static function createUser(array $dataUser): bool
    {
        if (empty($dataUser) || !isset($dataUser['pass'], $dataUser['email'], $dataUser['name'])) {
            return false;
        }
        $dataUser['pass'] = password_hash($dataUser['pass'], PASSWORD_BCRYPT);
        unset($dataUser['remember']);
        $userModel = new self;
        $userModel->insert($dataUser);
        return true;
    }

    /**
     * @param $id
     * @return array
     */
    public static function getOne($id): array
    {
        $userModel = new self;
        return $userModel->where('id', '=', $id);
    }

    /**
     * @return array
     */
    public static function getLastOne(): array
    {
        $userModel = new self;
        return $userModel->order('id', 'DESC', 1);
    }

    /**
     * @param array $dataUser
     * @return bool
     */
    public static function updateUser(array $dataUser): bool
    {
        if (empty($dataUser) || !isset($dataUser['pass'], $dataUser['email'], $dataUser['name'])) {
            return false;
        }
        $dataUser['pass'] = password_hash($dataUser['pass'], PASSWORD_BCRYPT);
        unset($dataUser['remember']);

        $userModel = new self;
        $userModel->update($dataUser);

        return true;
    }

    /**
     * @param int $id
     */
    public function deleteUser(int $id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
    }

    public function sortUser()
    {
        $userModel = new self;
        $userModel->sortUser();

    }


}
