<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 04/12/2017
 * Time: 18:41
 */

namespace lib;


class DirectoryScanner
{
    public function scan($basePath) {
        $files = array();
        $maxExecTime = @ini_get('max_execution_time');
        @ini_set('max_execution_time', 0);

        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($basePath,
            \RecursiveDirectoryIterator::KEY_AS_PATHNAME),
            \RecursiveIteratorIterator::SELF_FIRST, \RecursiveIteratorIterator::CATCH_GET_CHILD);
        foreach($rii as $file) {
            if($file->isDir()){
                continue;
            }
            $files[] = $file->getPathname();
        }

        @ini_set('max_execution_time', $maxExecTime);
        return $files;
    }
}