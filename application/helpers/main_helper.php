<?php
if (!defined('BASEPATH')) exit('No direct script access
allowed');
if (!function_exists('forward')) {
	function forward($controller, $page, $data, $titre = 'Document', $description = '', $keywords = '')
	{
		// définition des données variables du template
		$data['title'] = $titre;
		$data['description'] = $description;
		$data['keywords'] = $keywords;
		$data['page'] = $page;
		$controller->load->view('templates/template', $data);
	}
}
if (!function_exists('generate_table')) {
    function generate_table($query) {
        $CI =& get_instance();
        $CI->load->library('table');

        $tmpl = array(
            'table_open' => '<table class="table table-bordered">',
        );

        $CI->table->set_template($tmpl);
        return $CI->table->generate($query);
    }
}

