<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use PixiiBomb\Essentials\Entities\Meta;
use PixiiBomb\Essentials\View\Components\Container;

class FundamentalsController extends ElumController
{
    protected string $layout = DOCUMENTATION;

    public function imagery(): View
    {
        $folder = 'imagery';
        $meta = new Meta($folder);

        $containers = $this->getBaseContainers($folder, "Imagery is a powerful conduit for showcasing our innovative technology and advanced learning management solutions.");
        $sections = [
            (new Container())
                ->setAlias('Mood-Board')
                ->quickView($this->localContent("{$folder}/mood-board")),
            (new Container())
                ->setAlias('Donts')
                ->quickView($this->localContent("{$folder}/donts"))
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, []));
    }

    public function logo(): View
    {
        $folder = 'logo';
        $meta = new Meta($folder);

        $containers = $this->getBaseContainers($folder, "Work in Progress");
        $sections = [
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, []));
    }

    public function components(): View
    {
        $folder = 'components';
        $meta = new Meta($folder);

        $containers = $this->getBaseContainers($folder, "Work in Progress");
        $sections = [
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, []));
    }
}
