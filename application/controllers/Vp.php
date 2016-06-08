<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			$this->session->set_flashdata('error', 'Maaf halaman tidak dapat anda akses, silahkan '.anchor('vb/login', 'Login').' terlebih dahulu untuk akases halaman ini !');
            redirect(site_url());
		}
			$this->load->model('mp');
			$this->load->model('mb');
	}

	public function index()
	{
		$data['key'] = $this->mb->utama_user()->row();
        $data['title'] = 'Dashboard | '.$data['key']->nama_brand;
        $data['judul'] = 'Dashboard';
		$this->load->view('admin',$data);
	}

    public function dashboard()
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['title'] = 'Dashboard | '.$data['key']->nama_brand;
        $data['judul'] = 'Dashboard';
        $this->load->view('admin',$data);
    }

	 public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('vb/login');
    }

    // Dashboard
    public function uputama()
    {
    	if (isset($_POST['simpan'])) {
 	  		$this->mp->uputama();
    	}else{
    		redirect('vp');
    	}
    }

    public function delogo($id)
    {
    	$this->mp->delogo($id);
    }

    public function debanner($id)
    {
    	$this->mp->debanner($id);
    }

    // Produk

    public function produk($a='',$b='')
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Produk';
        $data['promo'] = $this->mb->promo();
        if ($this->uri->segment(3) == 'edit_produk') {
           $data['title'] = 'Edit Produk | '.$data['key']->nama_brand;
           $data['produk'] = $this->mp->get_produk($b);
        }elseif ($this->uri->segment(3) == 'detail_produk') {
           $data['title'] = 'Detail Produk | '.$data['key']->nama_brand;
           $data['produk'] = $this->mp->get_produk($b);
        }elseif ($this->uri->segment(3) == 'hapus_produk') {
           $this->mp->deproduk($b);
        }else{
            $data['title'] = 'Produk | '.$data['key']->nama_brand;
            $data['produk'] = $this->mb->produk();
        }
        $this->load->view('admin',$data);
    }

     public function deproimg($id,$img)
    {
        $this->mp->depimg($id,$img);
    }

    // Invoices

    public function invoices($a='',$b='',$c='')
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Invoices';
        if ($this->uri->segment(3) == 'detail_invoice') {
           $data['title'] = 'Detail Invoices | '.$data['key']->nama_brand;
           $data['invoices'] = $this->mp->detail_invoice($b,$c);
           $data['invoice_produk'] = $this->mp->detail_invoices_produk($b);
        }elseif ($this->uri->segment(3) == 'terima_invoice') {
           $data['invoices'] = $this->mp->terima_invoice($b,$c);
        }elseif ($this->uri->segment(3) == 'tolak_invoice') {
           $data['invoices'] = $this->mp->tolak_invoice($b,$c);
        }elseif ($this->uri->segment(3) == 'invoices_pandding') {
           $data['title'] = 'Invoices menunggu konfirmasi | '.$data['key']->nama_brand;
           $data['invoices'] = $this->mp->invoices();
        }elseif ($this->uri->segment(3) == 'pesan_to_invoice') {
           $data['title'] = 'Invoices menunggu konfirmasi | '.$data['key']->nama_brand;
           $data['invoices'] = $this->mp->detail_invoice($b,$c);
           $data['invoice_produk'] = $this->mp->detail_invoices_produk($b);
        }elseif ($this->uri->segment(3) == 'feedback') {
           $data['title'] = 'Feedback | '.$data['key']->nama_brand;
           $data['feedback'] = $this->mp->feedback();
        }elseif ($this->uri->segment(3) == 'invoices_sukses') {
           $data['title'] = 'Invoices sudah di konfirmasi | '.$data['key']->nama_brand;
           $data['invoices'] = $this->mp->invoices();
        }elseif ($this->uri->segment(3) == 'invoices_batal') {
           $data['title'] = 'Invoices dibatalkan | '.$data['key']->nama_brand;
           $data['invoices'] = $this->mp->invoices();
        }
        $this->load->view('admin',$data);
    }

    // Slider

    public function slider($a='',$b='')
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Slider';
        if ($this->uri->segment(3) == "edit_slider") {
            $data['title'] = 'Slider | '.$data['key']->nama_brand;
            $data['slider'] = $this->mp->get_slider($b);
        }elseif ($this->uri->segment(3) == "hapus_slider") {
            $this->mp->deslider($b);
        }else{
            $data['title'] = 'Slider | '.$data['key']->nama_brand;
            $data['slider'] = $this->mb->slider();
        }
        $this->load->view('admin',$data);
    }

    public function desliimg($id,$img)
    {
        $this->mp->desliimg($id,$img);
    }

    // Navigasi

    public function navigasi($a='',$b='',$k='')
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Navigasi';
        if ($this->uri->segment(3) == "daftar_menu") {
            $data['title'] = 'Daftar menu | '.$data['key']->nama_brand;
            $data['menu'] = $this->mp->menu();
        }elseif ($this->uri->segment(3) == "edit_menu") {
            $data['title'] = 'Edit menu | '.$data['key']->nama_brand;
            $data['menu'] = $this->mp->get_menu($b,$k);
        }elseif ($this->uri->segment(3) == "hapus_menu") {
             $this->mp->denavigasi($b,$k);
        }elseif ($this->uri->segment(3) == "daftar_submenu") {
            $data['title'] = 'Daftar Submenu | '.$data['key']->nama_brand;
            $data['as_menu'] = $this->mp->as_menu();
            $data['menu'] = $this->mp->menu();
        }elseif ($this->uri->segment(3) == "edit_submenu") {
            $data['title'] = 'Edit submenu | '.$data['key']->nama_brand;
            $data['menu'] = $this->mp->get_menu($b,$k);
            $data['as_menu'] = $this->mp->as_menu();
        }elseif ($this->uri->segment(3) == "hapus_submenu") {
             $this->mp->denavigasi($b,$k);
        }
        $this->load->view('admin',$data);
    }

    // Gadget

    public function gadget($a="",$b="")
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Gadget';
        if ($this->uri->segment(3) == "edit_gadget") {
            $data['title'] = 'Edit Gadget | '.$data['key']->nama_brand;
            $data['gadget'] = $this->mp->get_gadget($b);
        }elseif ($this->uri->segment(3) == "hapus_gadget") {
            $this->mp->degadget($b);
        }else{
            $data['title'] = 'Gadget| '.$data['key']->nama_brand;
            $data['gadget'] = $this->mb->gadget();
        }
        $this->load->view('admin',$data);
    }

    //

     public function promo($a="",$b="",$k="")
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Promo';
        if ($this->uri->segment(3) == "edit_promo") {
            $data['title'] = 'Edit promo | '.$data['key']->nama_brand;
            $data['promo'] = $this->mp->get_promo($b,$k);
        }elseif ($this->uri->segment(3) == "hapus_promo") {
            $this->mp->depromo($b,$k);
        }else{
            $data['title'] = 'Promo| '.$data['key']->nama_brand;
            $data['promo'] = $this->mb->promo();
        }
        $this->load->view('admin',$data);
    }

    public function depromimg($id,$img)
    {
        $this->mp->depromimg($id,$img);
    }

    // Laman

    public function laman($a="",$b="")
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Laman';
        if ($this->uri->segment(3) == "edit_laman") {
          $data['title'] = 'Edit laman | '.$data['key']->nama_brand;
          $data['laman'] = $this->mp->get_laman($b);
        }elseif ($this->uri->segment(3) == "hapus_laman") {
            $this->mp->delaman($b);
        }else{
            $data['title'] = 'Laman| '.$data['key']->nama_brand;
            $data['laman'] = $this->mb->laman();
        }
        $this->load->view('admin',$data);
    }

    // Profile

    public function Profile()
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Profile';
        $data['title'] = 'Edit laman | '.$data['key']->nama_brand;
        $this->load->view('admin',$data);
    }

    // Faq

    public function faq()
    {
        $data['key'] = $this->mb->utama_user()->row();
        $data['judul'] = 'Bantuan';
        $data['title'] = 'Bantuan | '.$data['key']->nama_brand;
        $this->load->view('admin',$data);
    }

}
