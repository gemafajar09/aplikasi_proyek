<?php
include('./excell/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
Class Admin_c Extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('template');
        $this->load->model('Admin_m', 'admin');
    }

    public function index()
    {
        $this->load->view('welcome');
    }

    public function loginad()
    {
        $this->form_validation->set_rules('username','Username','required|trim');
            $this->form_validation->set_rules('password','Password','required|trim');
            if($this->form_validation->run()==false){
                $data['title'] = 'login';
                $this->load->view('admin/loginn',$data);
            } else {
                $username = $this->input->POST('username');
            	$password = $this->input->POST('password');
            	$user = $this->db->GET_WHERE('admin',['username'=> $username, 'password'=> md5($password) ])->row_array();
                    if($user['username']==$username){
                        if(md5($user['password'],$password)){
                            $data =['username' =>$user['username']];
                            $this->session->set_userdata($data);
                            redirect('admin/halaman');
                        }else{
                            redirect('login');
                        }
                }else{
                    $this->session->set_flashdata('pesan','<div align="center" class="alert alert-danger" role="alert"><b>Username Atau Password Salah!</b></div>');
               redirect('Admin_c/login');
                }
            }
    }

    public function daftarr()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('admin/daftar',$data);  
    }

    public function register()
    {
       $this->form_validation->set_rules('username','Username','required|trim');
            $this->form_validation->set_rules('password','Password','required|trim');
            if($this->form_validation->run()==false){
                $data['title'] = 'Registrasi';
                $this->load->view('admin/daftar',$data);
            }else{
                $user = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'username' => $user,
                    'password' => md5($password),
                    'repassword' => $this->input->post('password')
                );
                // var_dump($data); exit;
                $this->admin->regis($data);
                redirect('Admin_c');
            }
    }

    public function halaman()
    {
        $data['user'] =$this->db->GET_WHERE('admin',['username' => $this->session->userdata('username')])->row_array();
        $data['title']= "Halaman Awal";
        $data['in'] = $this->admin->tmpproject();
        $data['kar'] = $this->admin->tampilHasil();
        $this->template->tampil('template/home',$data);
    }

    public function logout()
    {
        $this->session->unset_userdata(array('username','password'));
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Anda Telah Logout. </div>');
        redirect('Admin_c/loginad');
    }

    // karyawan
    public function karyawan()
    {
        $data['title'] = 'Data Karyawan';
        $data['kar'] = $this->admin->programer();
        $this->template->tampil('admin/input/input_karyawan',$data);
    }


    // project
    public function project()
    {
        $data['title'] = 'Data Project';
        $this->template->tampil('admin/input/input_project',$data);
    }

    public function status()
    {
        $data['title'] = 'Status Pengerjaan';
        $this->template->tampil('admin/status/status_pengerjaan',$data);
    }

    public function todo()
    {
        $data['title'] = 'Todo List';
        $data['in'] = $this->admin->tmpproject();
        $this->template->tampil('admin/todo_list',$data);
    }

    public function project_masuk()
    {
        $data['title'] = "Project Masuk";
        $this->template->tampil('admin/project_masuk',$data);
    }

    public function simpan_project()
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'client' => $this->input->post('client'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_masuk' => date('Y-m-d'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'level' => $this->input->post('level'),
            'status' => 'Masuk'
        );
        
        $this->admin->svproject($data);

        $this->session->set_flashdata('pesan','Project Berhasil Ditambahkan');
        redirect('karyawan/todo');
    }

    public function pemilihan()
    {
        $data = array(
            'id_programer0' => $this->input->post('programer'),
            'status' => 'Pending'
        );
        $where = array('id_project'=> $this->input->post('id'));
        $this->admin->svpemilihan($data,$where);
        $this->session->set_flashdata('pesan','Project Telah Di Proses');
        redirect('karyawan/todo');
    }

    public function pending($id) {
        $data['id'] = $this->admin->ambilid($id);
        // var_dump($data['id']); exit;
        if (!$data["id"]) show_404();
        $data['programer'] = $this->admin->programer();
        $data['status'] = $this->admin->pendingUser();
        $data['title'] = 'To-do List';
        $this->template->tampil('admin/input/pending',$data);
    }

    public function ajaxDataProject($id)
    {
        echo json_encode($this->admin->ambilid($id));
    }

    public function ajaxDataUser($id)
    {
        echo json_encode($this->admin->ambiluser($id));
    }

    public function simpan_password()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' =>md5($this->input->post('password'))
        );
        $where = array('id_programer' => $this->input->post('id_programer'));
        $this->session->set_flashdata('pesan', 'Perubahan Disimpan');
        $this->admin->passwordUser($data,$where);
        redirect('karyawan/data');
    }

    public function hapus_user($id)
    {
        if (!isset($id)) show_404();
        
        if ($this->admin->hapus($id)) {
            redirect('karyawan/data');
        }
    }

    public function export(){
        $project = $this->admin->tmpproject();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Cv.Mediatama Web Indonesia')
        ->setLastModifiedBy('Cv.Mediatama Web Indonesia')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Programer')
        ->setCellValue('B1', 'Nama Project')
        ->setCellValue('C1', 'Nama Client')
        ->setCellValue('D1', 'Deskripsi')
        ->setCellValue('E1', 'Tanggal Masuk')
        ->setCellValue('F1', 'Tanggal Selesai')
        ->setCellValue('G1', 'Level Pengerjaan')
        ;

        // Miscellaneous glyphs, UTF-8
        $i=2; foreach($project as $a) {

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $a->nama)
        ->setCellValue('B'.$i, $a->judul)
        ->setCellValue('C'.$i, $a->client)
        ->setCellValue('D'.$i, $a->deskripsi)
        ->setCellValue('E'.$i, $a->tanggal_masuk)
        ->setCellValue('F'.$i, $a->tanggal_selesai)
        ->setCellValue('G'.$i, $a->level);
        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Project '.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
        }

        public function simpan_karyawan()
        {
            $password = $this->input->post('password');
            $data = array(
                'nama' => $this->input->post('nama'),
                'telpon' => $this->input->post('telpon'),
                'kelamin' => $this->input->post('kelamin'),
                'email' => $this->input->post('email'),
                'password' => md5($password)
            );
            $this->admin->tambahUser($data);
            $this->session->set_flashdata('pesan','Akun Telah Ditambahkan');
            redirect('karyawan/data');
        }

}
