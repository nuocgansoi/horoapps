<?php
/**
 * Created by IntelliJ IDEA.
 * User: mon.ls
 * Date: 11/7/2016
 * Time: 6:13 AM
 */

use App\Helpers\HtmlHelper;

if (!function_exists('html_helper')) {
    /**
     * @return App\Helpers\HtmlHelper
     */
    function html_helper()
    {
        return app(HtmlHelper::class);
    }
}

if (!function_exists('html')) {
    /**
     * @return \Collective\Html\HtmlBuilder
     */
    function html()
    {
        return app('html');
    }
}

if (!function_exists('form')) {
    /**
     * @return \Collective\Html\FormBuilder
     */
    function form()
    {
        return app('form');
    }
}

if (!function_exists('agent')) {
    /**
     * @return \Jenssegers\Agent\Agent
     */
    function agent()
    {
        return app('agent');
    }
}

if (!function_exists('format_byte')) {
    /**
     * @param $bytes integer
     * @return string
     */
    function format_byte($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}

if (!function_exists('obfuscate_email')) {
    /**
     * @param $email
     * @return string
     */
    function obfuscate_email($email)
    {
        $emailPieces = explode("@", $email);
        $name = implode(array_slice($emailPieces, 0, count($emailPieces) - 1), '@');
        $length = floor(strlen($name) / 2);

        return substr($name, 0, $length) . str_repeat('*', $length) . "@" . end($emailPieces);
    }
}

if (!function_exists('url_query_string')) {

    /**
     * Generate a query string url for the application.
     *
     * Assumes that you want a URL with a query string rather than route params
     * (which is what the default url() helper does)
     *
     * @param  string $path
     * @param  mixed $qs
     * @param  bool $secure
     * @return string
     */
    function url_query_string($path = null, $qs = [], $secure = null)
    {
        $url = app('url')->to($path, $secure);
        if (count($qs)) {

            foreach ($qs as $key => $value) {
                $qs[$key] = sprintf('%s=%s', $key, urlencode($value));
            }
            $url = sprintf('%s?%s', $url, implode('&', $qs));
        }

        return $url;
    }
}

if (!function_exists('js_trans')) {

    function js_trans()
    {
        $locale = config('app.locale');
        $files = glob(resource_path("lang/{$locale}/*.{php}"), GLOB_BRACE);
        $data = [];
        foreach ($files as $file) {
            $trans = basename($file, '.php');
            $data[$trans] = trans($trans);
        }

        return json_encode($data);
    }
}
