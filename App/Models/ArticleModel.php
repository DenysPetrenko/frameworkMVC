<?php

namespace App\Models;

use Petrenko\Framework\Models\Model;

class ArticleModel extends Model
{
    /**
     * @var string
     */
    protected string $table = 'articles';
    /**
     * @var bool
     */
    protected bool $created_at = true;
    /**
     * @var bool
     */
    protected bool $updated_at = true;

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $arctleModel = new self;
        $sql = "SELECT * FROM $arctleModel->table";
        return $arctleModel->pdo->query($sql);
    }

    /**
     * @param $id
     * @return array
     */
    public function getOneArticle($id): array
    {
        $arctleModel = new self;
        return $arctleModel->whereOne('id', '=', $id);

    }


}