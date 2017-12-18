<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 04/12/2017
 * Time: 18:51
 */

namespace lib;


use PhpParser\NodeDumper;
use PhpParser\ParserFactory;

class Parser
{
    private $nikicParser;
    private $directoryScanner;
    private $fileNames;

    public function __construct()
    {
        $this->nikicParser = (new ParserFactory())->create(ParserFactory::PREFER_PHP5);
        $this->directoryScanner = new DirectoryScanner();
    }

    public function parse($path) {
        $this->setFileNames($path);
        foreach($this->fileNames as $fileName) {
            try {
                $ast = $this->nikicParser->parse(file_get_contents($fileName));
//				echo '<pre>';
//                Helper::prettyVarDump($ast);
//                echo (new NodeDumper())->dump($ast);
//				echo '</pre>';

            }
            catch (\Exception $exception) {
                print 'Error '. $exception->getMessage();
                die();
            }
            return $ast;
        }
    }

    private function setFileNames($path) {
        $this->fileNames = [];
        if(!is_dir($path)) {
            $this->fileNames[] = $path;
        }
        else {
            $this->fileNames = $this->directoryScanner->scan($path);
        }
    }
}