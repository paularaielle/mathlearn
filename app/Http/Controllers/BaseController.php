<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $title = '';

    protected $path = '';

    protected $router = '';

    protected $index = 'layouts.crud.index';

    protected $edit = 'layouts.crud.edit';

    protected $create = 'layouts.crud.create';

    protected $show = 'layouts.crud.show';

    public function __construct()
    {
        view()->share('path', $this->path);
        view()->share('router', $this->router);
        view()->share('title', $this->title);
    }

    protected function redirectIndex()
    {
        return redirect()->route($this->router . '.index');
    }

    protected function redirectEdit($id)
    {
        return redirect()->route($this->router . '.edit', $id);
    }

    protected function redirectShow($id)
    {
        return redirect()->route($this->router . '.show', $id);
    }

    protected function redirectCreate()
    {
        return redirect()->route($this->router . '.create');
    }
}
