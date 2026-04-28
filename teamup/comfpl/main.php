<?php

/**
 * Framework FPL - Fichier principal
 */

class cssItemBundle
{
    public $href;
    public $integrity;
    public $crossorigin;

    public function __construct($href, $integrity = null, $crossorigin = null)
    {
        $this->href        = $href;
        $this->integrity   = $integrity;
        $this->crossorigin = $crossorigin;
    }
}

class scriptItemBundle
{
    public $src;
    public $integrity;
    public $crossorigin;

    public function __construct($src, $integrity = null, $crossorigin = null)
    {
        $this->src         = $src;
        $this->integrity   = $integrity;
        $this->crossorigin = $crossorigin;
    }
}

class bundle
{
    public $css_set    = array();
    public $script_set = array();
}

class FPLGlobal
{
    public static $theme = 'default';

    public static function render_bundle_css()
    {
        global $bootstrap;

        if (!isset($bootstrap) || !($bootstrap instanceof bundle)) {
            return;
        }

        foreach ($bootstrap->css_set as $css) {
            $html = '    <link rel="stylesheet" href="'
                . htmlspecialchars($css->href) . '"';

            if (!empty($css->integrity)) {
                $html .= ' integrity="' . htmlspecialchars($css->integrity) . '"';
            }
            if (!empty($css->crossorigin)) {
                $html .= ' crossorigin="' . htmlspecialchars($css->crossorigin) . '"';
            }

            $html .= '>' . PHP_EOL;
            echo $html;
        }
    }

    public static function render_bundle_script()
    {
        global $bootstrap;

        if (!isset($bootstrap) || !($bootstrap instanceof bundle)) {
            return;
        }

        foreach ($bootstrap->script_set as $script) {
            $html = '    <script src="' . htmlspecialchars($script->src) . '"';

            if (!empty($script->integrity)) {
                $html .= ' integrity="' . htmlspecialchars($script->integrity) . '"';
            }
            if (!empty($script->crossorigin)) {
                $html .= ' crossorigin="' . htmlspecialchars($script->crossorigin) . '"';
            }

            $html .= '></script>' . PHP_EOL;
            echo $html;
        }
    }

    public static function get_theme_uri()
    {
        return 'themes/' . self::$theme;
    }

    public static function set_theme($theme)
    {
        self::$theme = $theme;
    }
}
