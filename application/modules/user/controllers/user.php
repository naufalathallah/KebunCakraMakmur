<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		date_default_timezone_set('Asia/Jakarta');
		$this->db->query("DELETE FROM chart WHERE DATEDIFF(CURDATE(), tanggal) > 2 ");
	}
	
	public function index()
	{
		if(!$this->input->cookie('remember_me',true)){
 		  $cookie = array(
            'name'   => 'remember_me',
            'value'  => "".rand()."-".date("d-m-YHis")."",                            
            'expire' =>  strtotime('+3 days'),
            // 'secure' => TRUE
         );
         $this->input->set_cookie($cookie);
  }
		$this->load->view('index');
	}
	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function chart()
	{
		$cookie = $_COOKIE['remember_me'];
		$data['chart'] = $this->db->query('select * from chart a left join vegetable b on a.id = b.id where a.cookie = "'.$cookie.'"')->result();


		$this->load->view('chart', $data);
	}
	public function checkout()
	{
		$cookie = $_COOKIE['remember_me'];
		$data['cart'] = $this->db->query('select * from chart a left join vegetable b on a.id = b.id where a.cookie = "'.$cookie.'"')->result();

		$this->load->view('checkout', $data);
	}

	public function tampil()
	{
		$data['sayur_1'] = $this->db->query('select * from vegetable')->result();
		$this->load->view('store', $data);
	}

		public function detail($id)
	{
		$data['sayur'] = $this->db->get_where('vegetable', array('id' => $id))->row();
		$this->load->view('detail', $data);
	}

	public function addtochart($id)
	{	
		// $edit	= $this->db->query('select * from chart')->result();
		// foreach ($edit as $key) {
		// 	if ($key->id == $id) {
		// 		$jumlahkan = $key->jumlah + $this->input->post('jumlah');
		// 		$this->db->set('jumlah', $jumlahkan);
		// 		$this->db->where('id', $id);
		// 		$this->db->update('chart'); 
		// 		redirect('user/tampil','refresh');
		// 	}

		// }

		$edit	= $this->db->query('select * from chart where id = '.$id.' and cookie = "'.$_COOKIE['remember_me'].'"')->row();
		if ($edit) {
			$jumlahkan = $edit->jumlah + $this->input->post('jumlah');
			$this->db->set('jumlah', $jumlahkan);
			$this->db->where('id', $id);
			$this->db->where('cookie', $_COOKIE['remember_me']);
			$this->db->update('chart'); 

			redirect('user/tampil','refresh');
		}else{
			$post 			= $this->input->post();
			$this->id 		= $id;
			$this->jumlah 	= $post["jumlah"];
			$this->cookie 	= $_COOKIE['remember_me'];
			$this->tanggal  = date('Y-m-d');

			$this->db->insert('chart', $this);
				
			redirect('user/tampil','refresh');
		}
	}

	public function hapus($kode)
	{
		$this->db->delete('chart', array('kode' => $kode));
		redirect('user/chart','refresh');
	}

	public function edit_jumlah()
	{
		$kode 			= $this->input->post('Id');
		$cart 			= $this->db->get_where('chart', array('kode' => $kode))->row();
		$data['cart'] 	= $cart;
		$data['sayur'] 	= $this->db->get_where('vegetable', array('id' => $cart->id))->row();
		$this->load->view('edit_jumlah', $data);
	}

	public function proses_edit_jumlah($kode)
	{
		$jumlahkan 		= $this->input->post('jumlah');

		$this->db->set('jumlah', $jumlahkan);
		$this->db->where('kode', $kode);
		$this->db->update('chart'); 

		redirect('user/chart','refresh');
	}


	public function addorder()
	{
		$cookie = $_COOKIE['remember_me'];
		$post				= $this->input->post();
		$this->pemesan 		= $post["nama"];
		$this->no_hp 		= $post["nohp"];
		$this->totalharga 	= $post["total"];
		$this->tanggal 		= date('d/m/Y'); 
		$this->cookie = $_COOKIE['remember_me'];
		$this->db->insert('pesan', $this);

		$pesanan = $this->db->query('select id_order from pesan order by id_order DESC')->row();

		$cart = $this->db->get_where('chart', array('cookie' => $cookie))->result();
		foreach ($cart as $key) {
			$data_cart = [
				'id_order'   => $pesanan->id_order,
				'id'		 => $key->id,
				'jumlah' 	 => $key->jumlah,
			];
			$this->db->insert('pesan_detail', $data_cart);
		}
			$this->db->delete('chart', array('cookie' => $cookie));
			$data1 = $this->db->query("select * from pesan_detail a left join pesan b on a.id_order = b.id_order order by a.id_order DESC")->row() ;
			$data['gd1'] = $this->db->query("select * from pesan_detail a left join pesan b on a.id_order = b.id_order where a.id_order=".$data1->id_order."")->row() ;
			$data['jumlah'] = $this->db->query("select * from pesan_detail a left join pesan b on a.id_order = b.id_order where a.id_order=".$data1->id_order."")->result() ;
			$data['gd2'] = $this->db->query("select * from pesan_detail a left join vegetable b on a.id = b.id where id_order =".$data1->id_order."")->result();
			$this->load->view('invoice', $data);
	}
			
	// public function invoice($nama,$nohp,$totalharga)
	// {	
		
	// 	$cookie = $_COOKIE['remember_me'];
	// 	$data['order'] = $this->db->query('select * from chart a left join vegetable b on a.id = b.id where a.cookie = "'.$cookie.'"')->result();
	// 	$data['get'] = $this->db->query('select * from pesan where cookie = "'.$cookie.'"')->row();
	// 	// foreach ($data1 as $key) {
	// 	// 	$data['ambilnama'] = $this->db->query('select * from vegetable where id = "'.$key->id.'"')->result();
			
	// 	// }
	// 	$data['nama'] = $nama;
	// 	$data['nohp'] = $nohp;
	// 	$data['totalharga'] = $totalharga;
	// 	$this->db->delete('chart', array('cookie' => $cookie));



	// 	// $this->load->view('checkout', $data);

	// 	// $cookie = $_COOKIE['remember_me'];
	// 	// $data['cekot'] = $this->db->query('select * from chart a left join vegetable b on a.id = b.id where a.cookie = "'.$cookie.'"')->result();
	// 	// $data['data'] = $this->db->query('select * from chart a left join vegetable b on a.id = b.id where a.cookie = "'.$cookie.'"')->row();
	// 	$this->load->view('invoice', $data);
	// }
}