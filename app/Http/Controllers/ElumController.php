<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use PixiiBomb\Essentials\Entities\Meta;
use PixiiBomb\Essentials\Entities\Navigation;
use PixiiBomb\Essentials\Entities\Page;
use PixiiBomb\Essentials\Http\Controllers\PageController;
use PixiiBomb\Essentials\View\Components\Container;

class ElumController extends PageController
{
    protected function getBaseContainers($folder, $feature, $is_shared_thumbnail = true): array
    {
        $thumbnail_view = $is_shared_thumbnail
            ? 'pages/shared/thumbnail'
            : $this->localContent("{$folder}/thumbnail");

        return [
            (new Container())
                ->setAlias('Thumbnail')
                ->quickView($thumbnail_view)
                ->setData([TITLE => Str::studly($folder)]),
            (new Container())
                ->setAlias('Feature')
                ->quickView('pages/shared/feature')
                ->setData([TEXT => $feature]),
        ];
    }

    protected function setPage(Meta $meta, array $containers = [], array $styleSheets = []): Page
    {
        return (new Page($containers))
            ->setStylesheets($styleSheets)
            ->setMeta($meta)
            ->setNavigation((new Navigation('sidebar')))
            ->setBreadcrumbs(false);
    }
}
