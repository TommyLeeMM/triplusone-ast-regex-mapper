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
    public function scan($basePath, $lastModifiedDate = null) {
        $files = array();
        $maxExecTime = @ini_get('max_execution_time');
        @ini_set('max_execution_time', 0);

        if(!is_dir($basePath)) {
            if($lastModifiedDate === null) {
                $files[] = $basePath;
            }
            else if(!$this->isOlder($basePath, $lastModifiedDate)) {
                $files[] = $basePath;
            }
        }
        else {
            $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($basePath,
                \RecursiveDirectoryIterator::KEY_AS_PATHNAME),
                \RecursiveIteratorIterator::SELF_FIRST, \RecursiveIteratorIterator::CATCH_GET_CHILD);
            foreach($rii as $file) {
                if($file->isDir()){
                    continue;
                }
                $pathName = $file->getPathName();
                if($lastModifiedDate === null) {
                    $files[] = $pathName;
                }
                else if(!$this->isOlder($pathName, $lastModifiedDate)) {
                    $files[] = $pathName;
                }
            }
        }

        @ini_set('max_execution_time', $maxExecTime);
        return $files;
    }

    private function isOlder($filename, $lastModifiedDate) {
        $fileModTimestamp = filemtime($filename);
        $lastTimestamp = strtotime($lastModifiedDate);
        return $fileModTimestamp < $lastTimestamp;
    }
}