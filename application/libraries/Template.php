<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{

    protected $_CI;

    function __construct()
    {
        $this->_CI = &get_instance();
    }

    function display_toko($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('Themes/Toko/Header', $data, true);
        $data['_footer'] = $this->_CI->load->view('Themes/Toko/Footer', $data, true);
        $this->_CI->load->view('Themes/Toko/Master', $data);
    }

    function display_admin($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('Themes/Admin/Header', $data, true);
        $data['_footer'] = $this->_CI->load->view('Themes/Admin/Footer', $data, true);
        $this->_CI->load->view('Themes/Admin/Master', $data);
    }

    function v1($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('Themes/Mobile/Header', $data, true);
        $data['_footer'] = $this->_CI->load->view('Themes/Mobile/Footer', $data, true);
        $this->_CI->load->view('Themes/Mobile/Master', $data);
    }
    function v2($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('Themes/Mobile/v2/Header', $data, true);
        $data['_footer'] = $this->_CI->load->view('Themes/Mobile/v2/Footer', $data, true);
        $this->_CI->load->view('Themes/Mobile/v2/Master', $data);
    }
    function adminmobile($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('Themes/Mobile/v2/Admin/Header', $data, true);
        $data['_footer'] = $this->_CI->load->view('Themes/Mobile/v2/Admin/Footer', $data, true);
        $this->_CI->load->view('Themes/Mobile/v2/Admin/Master', $data);
    }
    function displayauth($template, $data = null)
    {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('Themes/Mobile/v2/Login/Header', $data, true);
        $data['_footer'] = $this->_CI->load->view('Themes/Mobile/v2/Login/Footer', $data, true);
        $this->_CI->load->view('Themes/Mobile/v2/Login/Master', $data);
    }
}
