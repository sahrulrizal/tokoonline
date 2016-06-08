<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('error', 'Maaf halaman tidak dapat anda akses, silahkan '.anchor('vb/login', 'Login').' terlebih dahulu untuk akases halaman ini !');
            redirect(site_url());
		}
			$this->load->model('mp');
			// $this->load->model('mb');
	}

	
	// Produk
	public function inproduk()
	{
		$this->mp->inproduk();
	}

	public function upproduk()
	{
		$this->mp->upproduk();
	}

	public function json_p($i='')
	{
		$val = $this->mp->json_p($i);
		foreach ($val as $key) {
			echo json_encode($key);
		}
	}

	// Slider

	public function inslider()
	{
		$this->mp->inslider();
	}

	public function upslider()
	{
		$this->mp->upslider();
	}

	//Navigasi 
	public function innavigasi()
    {

       if ($this->uri->segment(3) == "daftar_menu") {
       	$data = array(
       		'menu' => $this->input->post('menu'),
       		'link' => $this->input->post('link'),
       		'level' => '1',
       		'date_buat' => date('Y-m-d')
       		);
       	$val = $this->mp->innavigasi($data);
       	if ($val == "") {
       		$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
       	}else{
       		$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
       	}
       	redirect('vp/navigasi/daftar_menu');
       }elseif($this->uri->segment(3) == "daftar_submenu"){
       	 	if ($this->input->post('link') == "") {
       		$link = '#';
       	}else{
       		$link = $this->input->post('link');
       	}
       	$data = array(
       		'menu' => $this->input->post('menu'),
       		'judul' => $this->input->post('judul'),
       		'link' => $link,
       		'level' => '2',
       		'id_level' => $this->input->post('id_level'),
       		'date_buat' => date('Y-m-d')
       		);
	       	$val = $this->mp->innavigasi($data);
	       	if ($val == "") {
	       		$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
	       	}else{
	       		$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
	       	}
	       redirect('vp/navigasi/daftar_submenu');
       }
    }

    public function upnavigasi()
    {
       if ($this->uri->segment(3) == "edit_menu") {
       	$data = array(
       		'menu' => $this->input->post('menu'),
       		'link' => $this->input->post('link'),
       		'date_buat' => date('Y-m-d')
       		);
       		$val = $this->mp->upnavigasi($data);
	       	if ($val == "") {
	       		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
	       	}else{
	       		$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
	       	}
	       	redirect('vp/navigasi/daftar_menu');
       }elseif($this->uri->segment(3) == "edit_submenu"){
       	if ($this->input->post('link') == "") {
       		$link = '#';
       	}else{
       		$link = $this->input->post('link');
       	}
       	$data = array(
       		'menu' => $this->input->post('menu'),
       		'link' => $link,
       		'level' => '2',
       		'id_level' => $this->input->post('id_level'),
       		'date_buat' => date('Y-m-d')
       		);
	       	$val = $this->mp->upnavigasi($data);
	       	if ($val == "") {
	       		$this->session->set_flashdata('sukses', 'Data berhasil diedit');
	       	}else{
	       		$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
	       	}
	       	redirect('vp/navigasi/daftar_submenu');
       }
    }

    // Gadget

    public function ingadget()
    {
    	$data = array(
    		'judul' => $this->input->post('judul'),
    		'isi' => $this->input->post('isi'),
    		'letak' => $this->input->post('letak')
    		);
    	$val = $this->mp->ingadget($data);
    	if ($val == "") {
	       		$this->session->set_flashdata('sukses', 'Gadget berhasil ditambahkan');
	       	}else{
	       		$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
	       	}
	       redirect('vp/gadget');
    }

    public function upgadget()
    {
    	$data = array(
    		'judul' => $this->input->post('judul'),
    		'isi' => $this->input->post('isi'),
    		'letak' => $this->input->post('letak')
    		);
    	$val = $this->mp->upgadget($data);
    	if ($val == "") {
	       		$this->session->set_flashdata('sukses', 'Gadget berhasil diedit');
	       	}else{
	       		$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
	       	}
	       redirect('vp/gadget');
    }

    // Promo

    public function inpromo()
    {
    	$config['upload_path']          = './uploads/promo/';
      $config['allowed_types']        = 'svg|gif|jpg|png';

      $this->load->library('upload', $config);

    // Logo
      if (!$this->upload->do_upload('img'))
      {
        $data = array('error' => $this->upload->display_errors());
      }else{
        $img = $this->upload->data();
        $a = strtolower($this->input->post('judul'));
        $filter = str_replace('-',' ', $a);
        $link = str_replace(' ','-',$filter);

        $data = array(
          'judul' => $this->input->post('judul'),
          'link' => $link,
          'kategori' => 'promo',
          'img' => $img['file_name'],
          'isi' => $this->input->post('isi'),
          'kode_promo' => $this->input->post('kode_promo'),
          'potongan' => $this->input->post('potongan'),
          'date_buat' => date('Y-m-d')
          );
        $val = $this->mp->inpromo($data);
        if ($val == "") {
          $this->session->set_flashdata('sukses', 'promo berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
        }
      }
      redirect('vp/promo');
    }

    public function uppromo()
    {
    	 $config['upload_path']          = './uploads/promo/';
      $config['allowed_types']        = 'svg|gif|jpg|png';

      $this->load->library('upload', $config);

    // Logo
      if (!$this->upload->do_upload('img'))
      {
        $data = array('error' => $this->upload->display_errors());
        $img = $this->upload->data();
        $a = strtolower($this->input->post('judul'));
        $filter = str_replace('-',' ', $a);
        $link = str_replace(' ','-',$filter);

        $data = array(
          'judul' => $this->input->post('judul'),
          'link' => $link,
          'kategori' => 'promo',
          'isi' => $this->input->post('isi'),
          'kode_promo' => $this->input->post('kode_promo'),
          'potongan' => $this->input->post('potongan'),
          'date_buat' => date('Y-m-d')
          );
        $val = $this->mp->uppromo($data);
        if ($val == "") {
          $this->session->set_flashdata('sukses', 'promo berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
        }
      }else{
        $img = $this->upload->data();
        $a = strtolower($this->input->post('judul'));
        $filter = str_replace('-',' ', $a);
        $link = str_replace(' ','-',$filter);

        $data = array(
          'judul' => $this->input->post('judul'),
          'link' => $link,
          'kategori' => 'promo',
          'img' => $img['file_name'],
          'isi' => $this->input->post('isi'),
          'kode_promo' => $this->input->post('kode_promo'),
          'potongan' => $this->input->post('potongan'),
          'date_buat' => date('Y-m-d')
          );
        $val = $this->mp->uppromo($data);
        if ($val == "") {
          $this->session->set_flashdata('sukses', 'promo berhasil ditambahkan');
        }else{
          $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
        }
      }
      redirect('vp/promo');
    }

    // Laman

    public function inlaman()
    {
       $a = strtolower($this->input->post('judul'));
        $filter = str_replace('-',' ', $a);
        $link = str_replace(' ','-',$filter);

      $data = array(
        'judul' => $this->input->post('judul'),
        'isi' => $this->input->post('isi'),
        'link' => $link,
        'date_buat' => date('Y-m-d')
        );
      $val = $this->mp->inlaman($data);
      if ($val == "") {
            $this->session->set_flashdata('sukses', 'Laman berhasil dibuat');
          }else{
            $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
          }
         redirect('vp/laman');
    }


    public function uplaman()
    {
      $data = array(
        'judul' => $this->input->post('judul'),
        'isi' => $this->input->post('isi'),
        'date_buat' => date('Y-m-d')
        );
      $val = $this->mp->uplaman($data);
      if ($val == "") {
            $this->session->set_flashdata('sukses', 'Laman berhasil diubah');
          }else{
            $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
          }
         redirect('vp/laman');
    }

    // Profile

    public function upprofile()
    {
      $val = $this->mp->upprofile();
      if ($val == "") {
            $this->session->set_flashdata('sukses', 'Profile berhasil diubah');
          }else{
            $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
          }
      redirect('vp/profile');
    }

    // Invoices

    public function deinvoiceba()
    {
      $val = $this->mp->deinvoiceba();
      if ($val == "") {
            $this->session->set_flashdata('sukses', 'Invoices berhasil dikosongkan');
          }else{
            $this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
          }
      redirect('vp/invoices/invoices_batal');
    }

    public function feedback_to()
    {
      $this->mp->feedback_to();
    }

}
