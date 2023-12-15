<?php

namespace App\Http\Controllers;

use App\Helpers\ParseScss;
use Illuminate\View\View;
use PixiiBomb\Essentials\Entities\Meta;
use PixiiBomb\Essentials\View\Components\Container;

class RulesetController extends ElumController
{
    protected string $layout = DOCUMENTATION;

    public function variables(): View
    {
        $folder = 'variables';
        $meta = new Meta($folder);

        $containers = $this->getBaseContainers($folder, "Work in Progress");
        $sections = [
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, []));
    }

    public function palette(): View
    {
        $folder = 'palette';
        $meta = new Meta($folder);
        $parse = new ParseScss();

        $containers = $this->getBaseContainers($folder, "Applying color effectively is a simple yet impactful method to ensure our materials consistently represent the elum brand. The core of our color palette is derived from our logo, enhanced by supplementary shades that harmonize with this style. For every base color, we have developed distinct variations to adapt to different interactive scenarios.");
        $sections = [
            (new Container())
                ->setAlias('Background-Colors')
                ->quickView($this->localContent("{$folder}/background-colors"))
                ->setData($parse->getBackgroundColors()),
            (new Container())
                ->setAlias('Interactive-Colors')
                ->quickView($this->localContent("{$folder}/interactive-colors"))
                ->setData($parse->getInteractiveColors()),
            (new Container())
                ->setAlias('Notification-Colors')
                ->quickView($this->localContent("{$folder}/notification-colors"))
                ->setData($parse->getNotificationColors())
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, ['documentation-ruleset-palette.min']));
    }

    public function typography(): View
    {
        $folder = 'typography';
        $meta = new Meta($folder);
        $parse = new ParseScss();

        $containers = $this->getBaseContainers($folder, "When applied effectively, typography becomes a key element in branding. The typography we choose is designed to convey messages in a clear and uncluttered manner, while also being versatile enough to suit a variety of contexts.");
        $sections = [
            (new Container())
                ->setAlias('Font-Faces')
                ->quickView($this->localContent("{$folder}/font-faces")),
            (new Container())
                ->setAlias('Headers')
                ->quickView($this->localContent("{$folder}/headers"))
                ->setData([
                    HEADERS => $parse->getHeaderVariables(),
                    VALUES => $parse->getVariables([BASE_FONT_SIZE, BASE_HEADER_LINE_HEIGHT, HEADER_1])
                ]),
            (new Container())
                ->setAlias('Font-Sizes')
                ->quickView($this->localContent("{$folder}/font-sizes"))
                ->setData($parse->getFontSizeVariables())
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, ['ruleset-typography.min']));
    }

    public function borders(): View
    {
        $folder = 'borders';
        $meta = new Meta($folder);

        $containers = $this->getBaseContainers($folder, "Work in Progress");
        $sections = [
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, []));
    }

    public function spacing(): View
    {
        $folder = 'spacing';
        $meta = new Meta($folder);

        $containers = $this->getBaseContainers($folder, "Work in Progress");
        $sections = [
        ];
        $containers = array_merge($containers, $sections);

        return parent::page(self::setPage($meta, $containers, []));
    }
}
