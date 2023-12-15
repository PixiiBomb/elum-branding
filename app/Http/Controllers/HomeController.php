<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use PixiiBomb\Essentials\Entities\Meta;
use PixiiBomb\Essentials\View\Components\Container;

class HomeController extends ElumController
{
    protected string $layout = DOCUMENTATION;

    public function index(): View
    {
        $meta = new Meta('Home');

        $containers = [
            (new Container())
                ->setAlias('Jumbotron')
                ->quickView($this->localContent('jumbotron'))

        ];

        return parent::page(self::setPage($meta, $containers, ['home-fundamentals.min']));
    }

}
