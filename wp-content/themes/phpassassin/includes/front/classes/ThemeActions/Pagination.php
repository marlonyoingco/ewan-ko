<?php

class Pagination extends ActionControl implements ThemeAction {

    protected $totalPages;
    protected $currentPage;
    protected $range;
    protected $links = [];

    /**
     * start($args) function is called by do_action('pagination')
     * @param $args
     */
    public function start($args) {
        $this->totalPages  = floor($args['count'] / $args['limit']);
        $this->currentPage = $args['page'];
        $this->range       = isset($args['range']) ? $args['range'] : 2;
        $this->generate_links();

        require __DIR__.'/templates/Pagination/template.php';
    }

    private function generate_links() {
        $links = [];

        $this->generate_back_links();
        $this->generate_self_link();
        $this->generate_front_links();

        return $links;
    }

    private function generate_self_link() {
        $this->links[] = [
            'label' => $this->currentPage,
            'link'  => $this->generate_parameters($this->currentPage),
            'class' => 'active'
        ];
    }

    private function generate_front_links() {
        for($i=1; $i<=$this->range; $i++) {
            if($this->currentPage+$i <= $this->totalPages) {
                $this->links[] = [
                    'label' => $this->currentPage+$i,
                    'link'  => $this->generate_parameters($this->currentPage+$i)
                ];
            }
        }

        if($this->currentPage < $this->totalPages) {
            $this->links[] = [
                'label' => '>',
                'link'  => $this->generate_parameters($this->currentPage + 1),
                'class' => 'arrow'
            ];
            $this->links[] = [
                'label' => '>>',
                'link'  => $this->generate_parameters($this->totalPages),
                'class' => 'arrow'
            ];
        }
    }

    private function generate_back_links() {
        if($this->currentPage > 1) {
            $this->links[] = [
                'label' => '<<',
                'link'  => $this->generate_parameters(1),
                'class' => 'arrow'
            ];
            $this->links[] = [
                'label' => '<',
                'link'  => $this->generate_parameters($this->currentPage - 1),
                'class' => 'arrow'
            ];
        }

        for($i=$this->range; $i>=1; $i--) {
            if($this->currentPage-$i >= 1) {
                $this->links[] = [
                    'label' => $this->currentPage-$i,
                    'link'  => $this->generate_parameters($this->currentPage-$i)
                ];
            }
        }
    }

    private function generate_parameters($page) {
        $paramsArray = [];
        $_GET['page'] = $page;

        foreach($_GET as $key=>$params) {
            $paramsArray[] = "$key=$params";
        }

        return '?'.implode('&', $paramsArray);
    }

}