<?php

namespace Yemengeek\ImageOptim;

use ShortPixel;

class ImageOptim {


    /**
     * ImageOptim constructor.
     */
    public function __construct()
    {
        ShortPixel\setKey(config('imageoptim.api_key'));
        ShortPixel\setOptions([
            'base_path' => config('imageoptim.base_path'),
        ]);
    }

    public function default($urls = [], $name = null, $paths = null)
    {
        try
        {
            if ($name)
                return ShortPixel\fromUrls($urls)->optimize(config('imageoptim..optimize_level'))->toFiles(($paths ?? ''), $name)->succeeded[0]->Status->Code == 2;
            else
                return ShortPixel\fromUrls($urls)->optimize(config('imageoptim..optimize_level'))->toFiles(($paths ?? ''))->succeeded[0]->Status->Code == 2;
        } catch (ShortPixel\ClientException $e)
        {
            return $e->getMessage();
        }
    }

    public function fromFile($filePath, $name = null, $paths = null)
    {
        try
        {
            if ($name)
                return ShortPixel\fromFile($filePath)->optimize(config('imageoptim..optimize_level'))->toFiles(($paths ?? ''), $name)->succeeded[0]->Status->Code == 2;
            else
                return ShortPixel\fromFile($filePath)->optimize(config('imageoptim..optimize_level'))->toFiles(($paths ?? ''))->succeeded[0]->Status->Code == 2;
        } catch (ShortPixel\ClientException $e)
        {
            return $e->getMessage();
        }
    }

    public function fromFiles($filePath, $name = null, $paths = null)
    {
        try
        {
            if ($name)
                return ShortPixel\fromFiles($filePath)->optimize(config('imageoptim..optimize_level'))->toFiles(($paths ?? ''), $name)->succeeded[0]->Status->Code == 2;
            else
                return ShortPixel\fromFiles($filePath)->optimize(config('imageoptim..optimize_level'))->toFiles(($paths ?? ''))->succeeded[0]->Status->Code == 2;
        } catch (ShortPixel\ClientException $e)
        {
            return $e->getMessage();
        }
    }
}
