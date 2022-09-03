<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function list()
    {

        $list['allUsersArticles'] = ArticleModel::getAll();
        $this->view('article/list', $list);
    }
}