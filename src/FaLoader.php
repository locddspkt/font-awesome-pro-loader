<?php

namespace FaLoader;

include_once __DIR__ . '/CommonFunction.php';

/***
 * Class Icons
 * change: save cache icon for each session
 * @package FaLoader
 */
class Icons {
    private static $LICENSE_MEINTION = "<!-- For the best support, please buy the pro license at https://fontawesome.com/ -->";

    public static $defaultIconsFolder = false; //if not set, use the folder of this project

    public static $PREVENT_LICENSE = '<circle cx="0" cy="0" r="0" fill="transparent"/> <!-- prevent license -->';


    /***
     * key = icon name
     * value = [
     *      path
     *      content = content of that path
     * ]
     *
     * more than one key can have the same path
     *
     * @var array
     */
    public static $loadedIcons = [];

    /***
     * set the default folder and some options for the project
     * @param $defaultFolder
     */
    public static function init($defaultFolder = false) {
        self::$defaultIconsFolder = $defaultFolder;
    }

    /***
     * load the icon in the file (dir include)
     *  the icon can be included the extension (.svg) or not. The order to load =
     *      1. the exact file name
     *      2. file name with svg
     *      3. file name that is removed the svg
     * @param $iconName can include .svg and can not. load
     * @param $externalClass add class for svg
     * @return string content of the file
     */
    public static function Load($iconName, $externalClass = false) {
        //try on session first
        //1. via key
        if (isset(self::$loadedIcons[$iconName])) {
            return self::applyClassForContent(self::$loadedIcons[$iconName]['content'], $externalClass);
        }

        //2. via path

        //try with the icon name first
        if (file_exists($iconName)) {
            return self::applyClassForContent(self::checkAndGetContentFromPath($iconName, $iconName), $externalClass);
        }

        $defaultFolder = self::$defaultIconsFolder;
        if ($defaultFolder === false) $defaultFolder = __DIR__ . '/icons/';

        $iconPathAndFileName = $defaultFolder . '/' . $iconName;
        //check existed first
        if (file_exists($iconPathAndFileName)) {
            return self::applyClassForContent(self::checkAndGetContentFromPath($iconName, $iconPathAndFileName), $externalClass);
        }

        //then add svg if not exist
        $extension = pathinfo($iconPathAndFileName, PATHINFO_EXTENSION);
        if (strtolower($extension) != 'svg') {
            //try it
            $iconPathAndFileName .= '.svg';
            return self::applyClassForContent(self::checkAndGetContentFromPath($iconName, $iconPathAndFileName), $externalClass);
        }
        else {
            //have svg but not have file --> try to remove it
            $pathinfo = pathinfo($iconPathAndFileName);
            $iconPathAndFileName = $pathinfo['dirname'] . '/' . $pathinfo['filename'];
            return self::applyClassForContent(self::checkAndGetContentFromPath($iconName, $iconPathAndFileName), $externalClass);
        }

        //no one existed, return false;

        return false;
    }

    /***
     * get the content in the path, if not existed, get content then get (do not check path now)
     * @param $iconName
     * @param $path
     * @return string content of the path
     */
    private static function checkAndGetContentFromPath($iconName, $path) {
        foreach (self::$loadedIcons as $key => $icon) {
            if ($icon['path'] == $path) {
                //check if the content has value or not, if yes, add it, otherwise, get content then add
                if (!empty($icon['content'])) return $icon['content'];

                //last time wasn't success
                if (file_exists($path)) {
                    $icon['content'] = self::preventLicenseForContent(file_get_contents($path));
                }
                return $icon['content'];
            }
        }

        //do not have, add then return
        if (file_exists($path)) {
            self::$loadedIcons[$iconName] = [
                'path' => $path,
                'content' => self::preventLicenseForContent(file_get_contents($path))
            ];
        }
        else {
            self::$loadedIcons[$iconName] = [
                'path' => $path,
                'content' => false
            ];
        }

        return self::$loadedIcons[$iconName]['content'];
    }

    private static function preventLicenseForContent($content) {

        //replace the last </svg> add transparent circle

        //svg last
        $svgLastPos = strrpos(strtolower($content), '</svg>');
        if ($svgLastPos === false) {
            return $content . self::$LICENSE_MEINTION;
        }

        $content = substr($content, 0, $svgLastPos - 1);
        $content .= self::$PREVENT_LICENSE;
        $content .= self::$LICENSE_MEINTION;
        $content .= '</svg>';
        //add the note to buy the pro license
        return $content;
    }


    private static function applyClassForContent($content, $externalClass = false) {
        if ($externalClass === false) return $content;
        $currentClass = CommonFunction::getContentBetween2Patterns($content, 'class="', '"');

        $content = str_replace('class="' . $currentClass, 'class="' . $currentClass . ' ' . $externalClass, $content);
        return $content;
    }
}