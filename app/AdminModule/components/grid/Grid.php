<?php

namespace App\AdminModule\Components\Grid;

/**
 * Description of Grid
 *
 * @author Dejv
 */
use App\AdminModule\Components\Grid\Column;

class Grid extends \Nette\Application\UI\Control {

    private $columns;
    private $emptyText;
    private $data;
    private $items_to_page;
    private $pages;
    
    /**
     *
     * @var type 
     * @persistent
     */
    private $actual_page;

    function setActual_page($actual_page) {
        if($actual_page>$this->pages){
            throw new \Exception('Požadovaná strana neexsituje', 0, null);
        }
        $this->actual_page = $actual_page;
    }

    function __construct($data) {
        parent::__construct();
        $this->data = $data;
        $this->emptyText = 'Nenalezena žádná shoda';
        $this->items_to_page = 20;
        $this->pages = ceil((count($this->data) / $this->items_to_page));
        $this->actual_page = 1;
                
        
    }

    
    public function render() {
       
        $this->template->pages = $this->pages;
        $this->template->actualPage = $this->actual_page;
        $this->template->data = $this->getActualData();
        $this->template->columns = $this->columns;
        $this->template->emptyText = $this->emptyText;
        $this->template->setFile(__DIR__ . '/grid.latte');
        $this->template->render();
    }

    private function getActualData() {
        $data = array();
        for ($i = ($this->actual_page - 1) * $this->items_to_page; $i < (($this->actual_page - 1) * $this->items_to_page) + $this->items_to_page; $i++) {
            if (isset($this->data[$i])) {
                $data[] = $this->data[$i];
            }
        }
        return $data;
    }

    public function addColumn(Column\Column $column) {
        $this->columns[] = $column;
    }
    
    public function handleSetActualPage($actualPage){
        $this->actual_page = $actualPage;
        
    }

}
