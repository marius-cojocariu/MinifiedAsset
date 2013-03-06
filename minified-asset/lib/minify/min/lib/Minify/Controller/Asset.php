<?php

class Minify_Controller_Asset extends Minify_Controller_Base {
    /**
     *
     * @var array
     */
    private $files = array();
    
    public function setFiles($files) {
        $this->files = $files;
    }
    
    public function setupSources($options) {
        $this->sources = array();
        
        $sources = array();
        $basenames = array();
        
        if(!empty($this->files)) {
            foreach($this->files as $file) {
                $path = path('public') . $file;
                
                $sources[] = $this->_getFileSource($path);
                $basenames[] = $file;
            }
            
            $this->selectionId = implode(',', $basenames);
            $this->sources = $sources;
        }
        
        return $options;
    }
    
    protected function _getFileSource($file) {
        $spec['filepath'] = $file;
        return new Minify_Source($spec);
    }
    
    public function loadMinifier($minifierCallback) {
        //is autoloaded by lavarel
    }
    
}