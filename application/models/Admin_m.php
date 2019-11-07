<?php
	Class Admin_m Extends CI_Model
	{
		public function regis($data)
		{
			$this->db->insert('admin',$data);
		}

		public function tampilHasil()
		{
			return $this->db->query("SELECT * FROM project_masuk LEFT JOIN programer ON programer.id_programer=project_masuk.id_programer0")->result();
		}

		public function svproject($data)
		{
			$this->db->insert('project_masuk',$data);
		}

		public function svpemilihan($data,$where)
		{
			$this->db->where($where)->update('project_masuk',$data);
		}

		public function svpengerjaan($id,$data)
		{
			$this->db->where($id)->update('project_masuk',$data);
		}

		public function svpengerjaan1($id,$data)
		{
			$this->db->where($id)->update('project_masuk',$data);
		}

		public function tmpproject()
		{
			return $this->db->query("SELECT * FROM project_masuk LEFT JOIN programer ON programer.id_programer=project_masuk.id_programer0 WHERE TIMESTAMPDIFF(DAY, tanggal_selesai, CURDATE()) <= 3 ORDER BY id_project DESC")->result();
		}

		public function programer()
		{
			return $this->db->query("SELECT * FROM programer")->result();
		}

		public function tampil_project()
		{
			$id = $this->session->userdata('id_programer');
			// var_dump($id); exit;
			return $this->db->query("SELECT * FROM project_masuk WHERE id_programer0=$id")->result();
		}

		public function ambilid($id)
		{
			return $this->db->query("SELECT * FROM project_masuk LEFT JOIN programer ON programer.id_programer=project_masuk.id_programer0 WHERE id_project=$id")->row();
		}

		public function status_admin()
		{
			return $this->db->query("SELECT * FROM status LEFT JOIN programer ON programer.id_programer=status.id_programer")->result();
		}

		public function ambiluser($id)
		{
			return $this->db->query("SELECT * FROM programer WHERE id_programer=$id")->row();
		}

		public function passwordUser($data,$where)
		{
			$this->db->where($where)->update('programer',$data);
		}

		public function pendingUser()
		{
			return $this->db->query("SELECT * FROM project_masuk LEFT JOIN programer ON programer.id_programer=project_masuk.id_programer0")->result();
		}

		public function tampil_proses()
		{	
			$id = $this->session->userdata('id_programer');
			return $this->db->query("SELECT * FROM project_masuk WHERE id_programer0=$id")->result();
		}

		public function hapus($id)
		{
			$this->db->query("DELETE FROM programer WHERE id_programer=$id");
		}

		public function tambahUser($data)
		{
			$this->db->insert('programer',$data);
		}
	}