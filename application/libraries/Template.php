<?php 

Class Template{
    protected $_ci;
    
    public function __construct(){
        $this->_ci = &get_instance();
    }
    public function tampil($content, $data = NULL)
    {
        $data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
        
        $this->_ci->load->view('template/index', $data);
    }

    public function user($content, $data = NULL)
    {
        $data['header'] = $this->_ci->load->view('user/header',$data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('user/footer',$data, TRUE);

        $this->_ci->load->view('user/index',$data);
    }

    public function cek_login() {
        if($this->_ci->session->userdata('email') == '') {
        $this->_ci->session->set_flashdata('pesan','<div align="center" class="alert alert-danger" role="alert"><b>Silahkan Login Terlebih Dahulu!</b></div>');
        redirect('user/login');
        }
    }

    public function ceklogin() {
        if($this->_ci->session->userdata('username') == '') {
        $this->_ci->session->set_flashdata('pesan','<div align="center" class="alert alert-danger" role="alert"><b>Silahkan Login Terlebih Dahulu!</b></div>');
        redirect('login');
        }
    }

    function tgl_indo($tgl){

            $tanggal = substr($tgl,8,2);

            $bulan = getBulan(substr($tgl,5,2));

            $tahun = substr($tgl,0,4);

            return $tanggal.' '.$bulan.' '.$tahun;       

    }   



    function getBulan($bln){

                switch ($bln){

                    case 1: 

                        return "Januari";

                        break;

                    case 2:

                        return "Februari";

                        break;

                    case 3:

                        return "Maret";

                        break;

                    case 4:

                        return "April";

                        break;

                    case 5:

                        return "Mei";

                        break;

                    case 6:

                        return "Juni";

                        break;

                    case 7:

                        return "Juli";

                        break;

                    case 8:

                        return "Agustus";

                        break;

                    case 9:

                        return "September";

                        break;

                    case 10:

                        return "Oktober";

                        break;

                    case 11:

                        return "November";

                        break;

                    case 12:

                        return "Desember";

                        break;

                }

            } 
}