<?php

    const
        VARIANTS = 'variants',
        ALPHA = 'alpha',
        HEX = 'hex',
        RGBA = 'rgba',
        ACTIVE = 'active',
        INACTIVE = 'inactive',
        HOVER = 'hover',
        TERTIARY = 'tertiary',
        SUCCESS = 'success',
        WARNING = 'warning',
        CAUTION = 'caution',
        NOTE = 'note',
        KEY = 'key',
        VALUE = 'value',
        VALUES = 'values',
        HEADERS = 'headers',
        TEXT = 'text',
        COLOR_PRIMARY_BG = 'color-primary-bg',
        COLOR_SECONDARY_BG = 'color-secondary-bg',
        COLOR_TERTIARY_BG = 'color-tertiary-bg',
        COLOR_PRIMARY = 'color-primary',
        COLOR_SECONDARY = 'color-secondary',
        COLOR_ACCENT = 'color-accent',
        COLOR_SUCCESS = 'color-success',
        COLOR_WARNING = 'color-warning',
        COLOR_CAUTION = 'color-caution',
        COLOR_NOTE = 'color-note',
        // Ruleset: Font Size
        BASE_FONT_SIZE = 'base-font-size',
        BASE_FONT_LINE_HEIGHT = 'base-font-line-height',
        BASE_HEADER_LINE_HEIGHT = 'base-header-line-height',
        HEADER_1 = 'header-1';

    function multiplePxByRem(string $base, string $rem): string
    {
        $base_value = floatval(rtrim($base, 'px'));
        $rem_value = floatval(rtrim($rem, 'rem'));
        return strval($base_value * $rem_value) . 'px';
    }
