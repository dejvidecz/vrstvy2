<?php

namespace App\AdminModule\Components\Grid\Column;

/**
 * Description of Column
 *
 * @author Dejv
 */
class Column_Link extends Column {

    protected $link;
    
    protected $type = 'link';
    
    public function __construct($name, $label,$link) {
        parent::__construct($name, $label);
        $this->link = $link;
    }
    
    function getLink() {
        return $this->link;
    }



    
   

    


}
