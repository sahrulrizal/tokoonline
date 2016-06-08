<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mb');
	}

	public function index()
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = $data['key']->nama_brand;
		$data['slider'] = $this->mb->slider();
		$data['produk'] = $this->mb->produk_hal_depan();
		$this->load->view('main', $data, FALSE);
	}

	public function login()
	{
		if ($this->session->userdata('id')) {
            redirect(site_url('vp'));
		}else{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Login | '.$data['key']->nama_brand;
		$this->load->view('login', $data, FALSE);
		}
	}

	public function produk($l='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Produk | '.$data['key']->nama_brand;
		if ($this->uri->segment(2) != '') {
			$data['p'] = $this->mb->single_produk($l);
		}else{
			$data['p'] = $this->mb->p_all_kate();
		}
		$this->load->view('main', $data, FALSE);	
	}

	public function kategori($l='',$offset='')
	{
		$data['key'] = $this->mb->utama_user()->row();

		if ($l == 'promo') {
			$data['title'] = 'Promo | '.$data['key']->nama_brand;
			$jml = $this->db->get_where('promo',array('kategori' => $l));
			//pengaturan pagination
			$config['base_url'] = base_url().'kategori/'.$l;
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = '12';
					// Desain pagination
			$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

		//inisialisasi config
			$this->pagination->initialize($config);

			$data['promo'] = $this->db->get_where('promo',array('kategori' => $l),$config['per_page'], $offset)->result();	
		}else{	
			$data['title'] = 'Kategori | '.$data['key']->nama_brand;
			if ($this->db->get_where('produk',array('kategori' => $l))->num_rows() > 0){
				$data['title'] = 'Kategori | '.$data['key']->nama_brand;
				$jml = $this->db->get_where('produk',array('kategori' => $l));
				//pengaturan pagination
				$config['base_url'] = base_url().'kategori/'.$l;
				$config['total_rows'] = $jml->num_rows();
				$config['per_page'] = '12';
				// Desain pagination
				$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
				$config['full_tag_close'] ="</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tagl_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tagl_close'] = "</li>";

				//inisialisasi config
				$this->pagination->initialize($config);

				$data['produk'] = $this->db->get_where('produk',array('kategori' => $l),$config['per_page'], $offset)->result();	
				$data['promo'] = '';		
			}else{
				echo "tidak";
			}
		}
		//buat pagination
		$data['halaman'] = $this->pagination->create_links();

		$this->load->view('main', $data, FALSE);	
	}

	public function incart($id="")
	{
		if ($this->mb->prodprom($id)->num_rows() > 0) {
			$p = $this->mb->prodprom($id)->row();
			$price = $p->harga_satuan - $p->potongan;
		}else{
			$p = $this->mb->produk_id($id);
			$price = $p->harga_satuan;
		}
		$data = array(
			'id'      => $p->id_produk,
			'img'     => $p->img,
			'qty'     => 1,
			'name'    => $p->nama_produk,
			'subtotal' => $p->nama_produk*1,
			'price'   => $price
			);

		$val = $this->cart->insert($data);
		if ($val) {
			$this->session->set_flashdata('sukses', 'Item berhasil ditambahkan ke keranjang belanja');
			redirect('keranjang_belanja');
		}
	}

	public function decart($i='')
	{
		$data = array(
			'rowid'   => $i,
			'qty'     => 0
			);

		$this->cart->update($data);
		$this->session->set_flashdata('sukses', 'Item berhasil dihapus dari keranjang belanja');
		redirect('keranjang_belanja');
	}

	public function upcart()
	{
		$data = array(
			'rowid'   => $this->input->post('row'),
			'qty'     => $this->input->post('qty')
			);

		$this->cart->update($data);
		$this->session->set_flashdata('sukses', 'Item berhasil diedit dari keranjang belanja');
		redirect('keranjang_belanja');
	}

	public function keranjang_bel()
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Keranjang Belanja | '.$data['key']->nama_brand;
		$this->load->view('main', $data, FALSE);
	}
	public function inpemesanan()
	{
		if (isset($_POST['kirimpem'])) {
			$inpem = $this->mb->inpemesanan();
			if ($inpem == true) {
				$this->session->set_flashdata('sukses', 'Pemesanan berhasil, detail pemesanan akan dikirimkan ke email anda jika email anda belum juga mendapatkan tanggapan silahkan tunggu 1x24 jam. Terimakasih ');
				// hapus cart
				$data = array(
					'rowid'   => $i,
					'qty'     => 0
					);

				$this->cart->update($data);
				redirect('pemesanan');
			}
		}else{
			redirect('pemesanan');
		}
	}

	public function laman($b='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Laman | '.$data['key']->nama_brand;
		if ($this->uri->segment(2) != '') {
			$data['l'] = $this->mb->single_laman($b);
		}
		$this->load->view('main', $data, FALSE);	
	}

	public function promo($b='',$t='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Kategori | '.$data['key']->nama_brand;
		if ($this->uri->segment(2) != 'produk'){
			$data['l'] = $this->mb->single_promo($b,$t);
		}
		$this->load->view('main', $data, FALSE);	
	}

	public function feedback()
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Feedback | '.$data['key']->nama_brand;
		if ($this->uri->segment(1) == 'feedback') { 
			$this->load->view('main', $data, FALSE);
		}else{
			redirect('404');
		}
	}

}

