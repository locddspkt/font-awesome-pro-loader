<?php


namespace FaLoader;



class Icons {

    public static $defaultIconsFolder = false; //if not set, use the folder of this project

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
     * @return string content of the file
     */
    public static function Load($iconName) {
        //try with the icon name first
        if (file_exists($iconName)) return file_get_contents($iconName);

        $defaultFolder = self::$defaultIconsFolder;
        if ($defaultFolder === false) $defaultFolder = __DIR__ . '/icons/';

        $iconPathAndFileName = $defaultFolder . '/' . $iconName;
        //check existed first
        if (file_exists($iconPathAndFileName)) return file_get_contents($iconPathAndFileName);

        //then add svg if not exist
        $extension = pathinfo($iconPathAndFileName, PATHINFO_EXTENSION);
        if (strtolower($extension) != 'svg') {
            //try it
            $iconPathAndFileName .= '.svg';
            if (file_exists($iconPathAndFileName)) return file_get_contents($iconPathAndFileName);
        }
        else {
            //have svg but not have file --> try to remove it
            $pathinfo = pathinfo($iconPathAndFileName);
            $iconPathAndFileName = $pathinfo['dirname'] . '/' . $pathinfo['filename'];

            if (file_exists($iconPathAndFileName)) return file_get_contents($iconPathAndFileName);
        }

        //no one existed, return false;

        return false;
    }
}