<?php
CLass User_c Extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('Template');
        $this->load->model('Admin_m','admin');
	}

	public function login()
    {
        $this->form_validation->set_rules('email','Email','required|trim');
            $this->form_validation->set_rules('password','Password','required|trim');
            if($this->form_validation->run()==false){
                $data['title'] = 'login';
                $this->load->view('admin/login_user',$data);
            } else {
                $email = $this->input->POST('email');
            	$password = $this->input->POST('password');
            	$user = $this->db->GET_WHERE('programer',['email'=> $email, 'password'=> md5($password) ])->row_array();
                    if($user['email']==$email){
                        if(md5($user['password'],$password)){
                            $this->session->set_userdata($user);
                            redirect('User_c/halaman');
                        }else{
                            redirect('User_c/login');
                        }
                }else{
                    $this->session->set_flashdata('pesan','Username Atau Password Salah!');
               redirect('User_c/login');
                }
            }
    }

    public function halaman()
    {
        $data['title'] = 'Halaman Programer';
        $data['tampil'] = $this->admin->tampil_project();
        $this->template->user('user/home',$data);
    }

    public function listproject()
    {
        $data['title'] = 'List Project';
        $data['tampil'] = $this->admin->tampil_proses();
        $this->template->user('user/project/project',$data);

    }

    public function logout()
    {
        $this->session->unset_userdata(array('email','password'));
        $this->session->set_flashdata('logout','Anda Telah Logout.');
        redirect('Admin_c/index');
    }

     public function ajaxDataProject($id)
    {
        echo json_encode($this->admin->ambilid($id));
    }

    public function ubah_proses()
    {   
        $data = array('status' => 'Proses');
        $id = array('id_project' => $this->input->post('id'));
        $this->admin->svpengerjaan($id,$data);
        $this->session->set_flashdata('pesan','Project Diproses');
        redirect('User_c/halaman');
    }

    public function ubah_selesai()
    {   
        $tgl1 = $this->input->post('tanggal');
        $date1 = date_create($tgl1);
        date_add($date1, date_interval_create_from_date_string('3 Days')); 
        $new = date_format($date1, 'Y-m-d');
        // var_dump($new);exit;
        $data = array(
            'status' => 'Success',
            'kadarluasa' => $new
        );
        $id = array('id_project' => $this->input->post('id'));
        $this->admin->svpengerjaan1($id,$data);
        $this->session->set_flashdata('pesan','Project Selesai');
        redirect('User_c/halaman');
    }
}