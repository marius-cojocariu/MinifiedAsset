<?php 

class MinifiedAsset_Container extends \Laravel\Asset_Container {
    protected function asset($group, $name) {
        if (!isset($this->assets[$group][$name])) 
            return false;

        $asset = $this->assets[$group][$name];

        if (filter_var($asset['source'], FILTER_VALIDATE_URL) === false) {
            $asset['source'] = $this->path($asset['source']);
        }

        return array(
            "source" => $asset['source'], 
            "attributes" => $asset['attributes']
        );
    }
        
    protected function group($group) {
        if(!isset($this->assets[$group]) or count($this->assets[$group]) == 0) 
            return false;

        $assets = array();

        foreach ($this->arrange($this->assets[$group]) as $name => $data) {
            $asset = $this->asset($group, $name);
            if($asset)
                $assets[] = $asset;
        }

        return $this->min_generate_html($group, $this->min_generate($assets));
    }
    
    protected function min_generate($assets) {
        $min_groups = $new_group_data = array();
        $current_group = 0;
        
        for($i=0; $i<count($assets); $i++) {
            if($current_group === 0 || ($assets[$i-1]['attributes'] != $assets[$i]['attributes'])) {
                $new_group_data = array("attributes" => $assets[$i]['attributes'], "files" => array());
                $min_groups[] = $new_group_data;
                
                $current_group++;
            }
            
            $min_groups[$current_group - 1]["files"][] = $assets[$i]["source"];
        }
        
        return $min_groups;
    }
    
    protected function min_generate_html($group, $min_assets) {
        $ret = '';
        
        foreach($min_assets as $asset) {
            $ret .= HTML::$group(
                "min-".$group."/".rawurlencode(base64_encode(serialize($asset["files"]))) . $this->get_group_extension($group), 
                $asset["attributes"]
            );
        }
        
        return $ret;
    }
    
    protected function get_group_extension($group) {
        switch($group) {
            case "style": return ".css";
            case "script": return ".js";
        }
    }
}
