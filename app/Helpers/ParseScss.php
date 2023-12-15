<?php

namespace App\Helpers;

class ParseScss {

    protected array $variables = [];

    public function __construct() {
        $this->variables = $this->parseVariables();
    }

    public function parseVariables(): array
    {
        $content = file_get_contents('scss/_ruleset.scss');
        $pattern = '/\$([\w-]+)\s*:\s*([^;]+);/';
        preg_match_all($pattern, $content, $matches);

        $variables = [];
        foreach ($matches[1] as $index => $varName) {
            $variables[$varName] = trim($matches[2][$index]);
        }

        return $variables;
    }

    public function getBackgroundColors(): array
    {
        $titles = ['Raisin Black', 'Onyx', 'Charcoal'];
        $variables = $this->getVariables([COLOR_PRIMARY_BG, COLOR_SECONDARY_BG, COLOR_TERTIARY_BG]);
        return $this->getColorGroup($titles, $variables);
    }

    public function getInteractiveColors(): array
    {
        $titles = ['Celestial Blue', 'Meadow Breeze', 'Sky Blue'];
        $variables = $this->getVariables([COLOR_PRIMARY, COLOR_SECONDARY, COLOR_ACCENT]);
        return $this->getColorGroup($titles, $variables);
    }

    public function getNotificationColors(): array
    {
        $titles = ['Emerald Green', 'Vermilion', 'Bright Orange', 'Oceanic Surge'];
        $variables = $this->getVariables([COLOR_SUCCESS, COLOR_WARNING, COLOR_CAUTION, COLOR_NOTE]);
        return $this->getColorGroup($titles, $variables);
    }

    public function getColorGroup($titles, $variables): array
    {
        $variant_names = [HOVER, ACTIVE, INACTIVE, ALPHA];

        $i = 0;
        foreach($variables as $name => $value)
        {
            if (!is_array($variables[$name])) {
                $variables[$name] = [];
            }

            $sub_items = [];
            foreach($variant_names as $variant)
            {
                $sub_items[] = "{$name}-$variant";
            }

            $variables[$name][TITLE] = $titles[$i];
            $variables[$name][HEX] = $this->convertToHex($value);
            $variables[$name][RGBA] = $this->convertToRgba($value);
            $variables[$name][VARIANTS] = [];

            $variants = $this->getVariables($sub_items);
            foreach($variants as $key => $variant)
            {
                $variables[$name][VARIANTS][$key][HEX] = $this->convertToHex($variant);
                $variables[$name][VARIANTS][$key][RGBA] = $this->convertToRgba($variant);
            }

            $i++;
        }

        return $variables;
    }

    public function getVariables(array $keys = []): array
    {
        return array_intersect_key($this->variables, array_flip($keys));
    }

    public function getHeaderVariables(): array
    {
        $group = [];

        foreach ($this->variables as $name => $value) {
            if (strpos($name, 'header') === 0) {
                $group[$name] = $value;
            }
        }

        return $group;
    }

    public function getFontSizeVariables(): array
    {
        $group = [];

        foreach ($this->variables as $name => $value) {
            if (strpos($name, 'font-size') === 0) {
                $group[$name] = $value;
            }
        }

        return $group;
    }

    public function getGroups() {
        $colorGroups = [];

        foreach ($this->variables as $name => $value) {
            // Split the variable name into parts
            $parts = explode('-', $name);

            // Grouping logic: the first part is the group name, the rest is the subgroup name
            if (count($parts) > 1) {
                $groupName = array_shift($parts);
                $subGroupName = implode('-', $parts);

                // Initialize the group if not already done
                if (!isset($colorGroups[$groupName])) {
                    $colorGroups[$groupName] = [];
                }

                // Add the subgroup to the group
                $colorGroups[$groupName][$subGroupName] = $this->getColorValues($value);
            } else {
                // For variables that don't fit the grouping pattern, treat them as standalone groups
                $colorGroups[$name] = ['base' => $this->getColorValues($value)];
            }
        }

        return $colorGroups;
    }

    private function getColorValues($value): array
    {
        return [
            'HEX' => $this->convertToHex($value),
            'RGBA' => $this->convertToRgba($value)
        ];
    }

    private function convertToHex($color): ?string
    {
        if (preg_match('/^#/', $color)) {
            return ucwords($color); // Already in HEX
        } else if (preg_match('/rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*([\d.]+))?\)/', $color, $matches)) {
            // Convert RGBA to HEX
            return ucwords(sprintf("#%02x%02x%02x", $matches[1], $matches[2], $matches[3]));
        }
        return null; // Not a color value
    }

    private function convertToRgba($color) {
        if (preg_match('/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', $color, $matches)) {
            // Convert HEX to RGBA
            $hex = str_replace('#', '', $color);
            if (strlen($hex) == 3) {
                $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
            }
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            return "rgba($r, $g, $b, 1)";
        } else if (preg_match('/rgba?\(/', $color)) {
            return $color; // Already in RGBA
        }
        return null; // Not a color value
    }
}
