<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 04/12/2017
 * Time: 18:51
 */

namespace lib;

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

    public function parse($path, $lastModifiedDate = null) {
        $this->fileNames = $this->directoryScanner->scan($path, $lastModifiedDate);
        $asts = [];
        foreach($this->fileNames as $fileName) {
            try {
                $ast = $this->nikicParser->parse(file_get_contents($fileName));
            }
            catch (\Exception $exception) {
                print 'Error '. $exception->getMessage();
                die();
            }
            $asts[$fileName] = $ast;
        }
        return $asts;
    }
}