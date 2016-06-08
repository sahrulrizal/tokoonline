<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mp extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function uputama()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'svg|gif|jpg|png';
		$config['encrypt_name']        = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->load->library('upload', $config);

		// Logo
		if (!$this->upload->do_upload('logo'))
		{
			$data = array('error' => $this->upload->display_errors());
		}else{
			$logo = $this->upload->data();
			$this->db->update('utama', array('logo' => $logo['file_name']),array('id' => '1'));
		}

		// Banner
		if (!$this->upload->do_upload('banner'))
		{
			$data = array('error' => $this->upload->display_errors());
		}else{
			$banner = $this->upload->data();
			$this->db->update('utama', array('banner' => $banner['file_name']),array('id' => '1'));
		}

		$val = $this->db->update('utama', array('nama_brand' => $this->input->post('nama_brand'),'email' => $this->input->post('email'),'deskripsi' => $this->input->post('deskripsi'),'pk' => $this->input->post('pk'),'menu' => $this->input->post('menu'),'tgl_ubah' => date('Y-m-d') 
			),array('id' => '1'));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Berhasil di ubah.');
		}else{
			$this->session->set_flashdata('error', 'Gagal di ubah.');
		}
		redirect('vp');
	}

	public function delogo($id)
	{
		$val = $this->db->update('utama', array('logo' => ''),array('id' => '1'));
		if ($val == true) {
			unlink('./uploads/'.$id);
			echo "<input type='file' class='form-control' name='logo' placeholder='Masukan logo website anda disini.' required>";
		}else{
			echo "Logo gagal di hapus";
		}
	}

	public function debanner($id)
	{
		$val = $this->db->update('utama', array('banner' => ''),array('id' => '1'));
		if ($val == true) {
			unlink('./uploads/'.$id);
			echo "<input type='file' class='form-control' name='banner' placeholder='Masukan banner website anda disini.' required>";
		}else{
			echo "Banner gagal di hapus";
		}
	}

	// Produk
	public function inproduk()
	{
		$config['upload_path']          = './uploads/produk/';
		$config['allowed_types']        = 'svg|gif|jpg|png';
		$config['encrypt_name']        = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->load->library('upload', $config);

		// Logo
		if (!$this->upload->do_upload('img'))
		{
			$data = array('error' => $this->upload->display_errors());
		}else{
			$img = $this->upload->data();
			$np = $this->db->get_where('produk',array('nama_produk' => $this->input->post('nama_produk')))->num_rows();
			if ($np > 0) {
				$this->session->set_flashdata('error', 'Maaf nama produk yang anda masukan sudah ada, silahkan masukan nama produk yang lain.');
			}else{

				$a = strtolower($this->input->post('nama_produk'));
				$filter = str_replace('-',' ', $a);
				$link = str_replace(' ','-',$filter);

				$val = $this->db->insert('produk', array(
					'kode_link' => $link,
					'nama_produk' => ucfirst($this->input->post('nama_produk')),
					'img' => $img['file_name'],
					'harga_satuan' => $this->input->post('harga_satuan'),
					'kategori' => $this->input->post('kategori'),
					'id_promo' => $this->input->post('promo'),
					// 'bonus' => $this->input->post('bonus'),
					// 'bonus_harga' => $this->input->post('bonus_harga'),
					'keterangan' => $this->input->post('keterangan'),
					'date_buat' => date('Y-m-d')
					));

					if ($val == TRUE) {
						$this->session->set_flashdata('sukses', 'Produk berhasil di tambahkan.');
					}else{
						$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
					}
			}
		}
		redirect('vp/produk');
	}

	public function upproduk(){
		
		$config['upload_path']          = './uploads/produk/';
		$config['allowed_types']        = 'svg|gif|jpg|png';
		$config['encrypt_name']        = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('img'))
		{
			$data = array('error' => $this->upload->display_errors());

			$a = strtolower($this->input->post('nama_produk'));
				$filter = str_replace('-',' ', $a);
				$link = str_replace(' ','-',$filter);

			$val = $this->db->update('produk', array(
				'kode_link' => $link,
				'nama_produk' => ucfirst($this->input->post('nama_produk')),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'kategori' => $this->input->post('kategori'),
				'id_promo' => $this->input->post('promo'),
				// 'bonus' => $this->input->post('bonus'),
				// 'bonus_harga' => $this->input->post('bonus_harga'),
				'keterangan' => $this->input->post('keterangan'),
				'date_buat' => date('Y-m-d')
				),array('id_produk' => $this->input->post('id')));

			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Produk berhasil di edit.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}

		}else{
			
			$img = $this->upload->data();

			$a = strtolower($this->input->post('nama_produk'));
				$filter = str_replace('-',' ', $a);
				$link = str_replace(' ','-',$filter);

			$val = $this->db->update('produk', array(
				'kode_link' => $link,
				'nama_produk' => ucfirst($this->input->post('nama_produk')),
				'img' => $img['file_name'],
				'harga_satuan' => $this->input->post('harga_satuan'),
				'kategori' => $this->input->post('kategori'),
				'id_promo' => $this->input->post('promo'),
				// 'bonus' => $this->input->post('bonus'),
				// 'bonus_harga' => $this->input->post('bonus_harga'),
				'keterangan' => $this->input->post('keterangan'),
				'date_buat' => date('Y-m-d')
				),array('id_produk' => $this->input->post('id')));

			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Produk berhasil di edit.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}
		}

		redirect('vp/produk');
	}

	public function get_produk($b)
	{
		return $this->db->get_where('produk',array('id_produk' => $b))->row();
	}

	public function depimg($id,$img)
	{
		$val = $this->db->update('produk', array('img' => ''),array('id_produk' => $id));
		if ($val == true) {
			unlink('./uploads/produk/'.$img);
			echo "<input type='file' class='form-control' name='img' required>";
		}else{
			echo "Maaf system kami sedang mengalami gangguan.";
		}
	}

	public function deproduk($b)
	{
		$val = $this->db->delete('produk',array('id_produk' => $b));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Produk berhasil di hapus.');
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
		}
		redirect('vp/produk');
	}

	// Invoices

	public function invoices()
	{
		if ($this->uri->segment(3) == 'invoices_pandding') {
           $query = $this->db->get_where('invoices',array('status' => 'tunggu'));
        }elseif ($this->uri->segment(3) == 'invoices_sukses') {
        	$query = $this->db->get_where('invoices',array('status' => 'sukses'));
        }elseif ($this->uri->segment(3) == 'invoices_batal') {
        	$query = $this->db->get_where('invoices',array('status' => 'batal'));
        }
        $this->db->order_by('id_invoice', 'desc');
        return $query->result();
	}

	public function feedback()
	{
		return $this->db->query("SELECT * FROM `invoices` WHERE `feedback` != '' and status = 'sukses' ")->result();
	}

	public function feedback_to()
	{
		$val = $this->db->update('invoices',array('status_feed' => '3'),array('status' => 'sukses','status_feed' => '1'));
		if ($val == true) {
			redirect('vp/invoices/invoices_sukses');
		}
	}

	public function deinvoiceba()
	{
		$this->db->query("DELETE FROM `invoices` WHERE `status` = 'batal'");
	}

	public function invoice_tunggu()
	{
		return $this->db->query("SELECT pelanggan.nama,invoices.status,invoices.date FROM `pelanggan`,`invoices` WHERE pelanggan.id_invoice = invoices.id_invoice  and invoices.status = 'tunggu' ");
	}

	public function feedback_tunggu()
	{
		return $this->db->query("SELECT pelanggan.nama,invoices.status,invoices.kode_invoice,invoices.date FROM `pelanggan`,`invoices` WHERE pelanggan.id_invoice = invoices.id_invoice  and invoices.status = 'sukses' and invoices.status_feed = '1'");
	}

	public function detail_invoice($b,$c)
	{
		$query =  $this->db->query("SELECT pelanggan.*,invoices.kode_invoice,invoices.feedback,invoices.status FROM `pelanggan`,`invoices` WHERE pelanggan.id_invoice = '$b' and invoices.kode_invoice = '$c' ");
		if ($query->num_rows() > 0 ) {
			return $query->row();
		}else{
			redirect('vp/invoices/invoices_pandding');
		}
	}

	public function detail_invoices_produk($b)
	{
		$query =  $this->db->query("SELECT detail_invoices.jumlah,detail_invoices.harga,produk.nama_produk FROM `detail_invoices`,`produk` WHERE detail_invoices.id_invoice = '$b' and detail_invoices.id_produk = produk.id_produk");
		if ($query->num_rows() > 0 ) {
			return $query->result();
		}else{
			redirect('vp/invoices/invoices_pandding');
		}
	}

	public function terima_invoice($b,$c)
	{
		$val = $this->db->update('invoices', array('status' => 'sukses'), array('id_invoice' => $b,'kode_invoice' => $c));
		if ($val == TRUE) {
			$this->load->library('My_PHPMailer');
			$mail = new PHPMailer();  
			$mail->IsSMTP(); // we are going to use SMTP
			$mail->isMail();
			$mail->SMTPAuth   = true; // enabled SMTP authentication
			$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
			$mail->Host       = "mergangsan.idwebhost.com";      // setting GMail as our SMTP server
			$mail->Port       = 465;                   // SMTP port to connect to GMail
			$mail->Username   = "support@pelangibaby.com";  // user email address
			$mail->Password   = "budakbager134625";            // password in GMail
			$mail->SetFrom('support@pelangibaby.com', 'Pelangibaby - Support');  //Who is sending the email
			$mail->Subject    = 'Invoices : '.$this->input->post('nama');
			$mail->Body      = $this->input->post('pesan_email');
			$mail->isHTML(true);
			$mail->AddAddress($this->input->post('email'));
			if(!$mail->Send()) {
				echo  "Error: " . $mail->ErrorInfo;
			}else{
			$this->session->set_flashdata('sukses', 'Invoices berhasil di konfirmasi.'.anchor('vp/invoices/invoices_sukses', ' Lihat invoices yang sudah di konfirmasi'));
			redirect('vp/invoices/invoices_pandding');
			}
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			redirect('vp/invoices/invoices_pandding');
		}
		
	}

	public function tolak_invoice($b,$c)
	{
		$val = $this->db->update('invoices', array('status' => 'batal'), array('id_invoice' => $b,'kode_invoice' => $c));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Invoices berhasil dibatalkan,'.anchor('vp/invoices/invoices_batal', ' Lihat invoices yang dibatalkan'));
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
		}
		redirect('vp/invoices/invoices_pandding');
	}

	// Slider
	public function get_slider($b)
	{
		return $this->db->get_where('slider',array('id_slider' => $b))->row();
	}

	public function inslider()
	{
		$config['upload_path']          = './uploads/slider/';
		$config['allowed_types']        = 'svg|gif|jpg|png';

		$this->load->library('upload', $config);

			// Logo
		if (!$this->upload->do_upload('img'))
		{
			$data = array('error' => $this->upload->display_errors());
		}else{
			$img = $this->upload->data();
			$val = $this->db->insert('slider', array(
				'judul' => $this->input->post('judul'),
				'img' => $img['file_name'],
				'link' => $this->input->post('link'),
				'date_buat' => date('Y-m-d')
				));

			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Slider berhasil di tambahkan.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}
		}

		redirect('vp/slider');
	}

	public function desliimg($id,$img)
	{
		$val = $this->db->update('slider', array('img' => ''),array('id_slider' => $id));
		if ($val == true) {
			unlink('./uploads/slider/'.$img);
			echo "<input type='file' class='form-control' name='img' required>";
		}else{
			echo "Maaf system kami sedang mengalami gangguan.";
		}
	}

	public function upslider()
	{
		$config['upload_path']          = './uploads/slider/';
		$config['allowed_types']        = 'svg|gif|jpg|png';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('img'))
		{
			$data = array('error' => $this->upload->display_errors());

			$val = $this->db->update('slider', array(
				'judul' => $this->input->post('judul'),
				'link' => $this->input->post('link'),
				'date_buat' => date('Y-m-d')
				),array('id_slider' => $this->input->post('id')));

			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Slider berhasil di edit.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}

		}else{
			
			$img = $this->upload->data();
			$val = $this->db->update('slider', array(
				'judul' => $this->input->post('judul'),
				'img' => $img['file_name'],
				'link' => $this->input->post('link'),
				'date_buat' => date('Y-m-d')
				),array('id_slider' => $this->input->post('id')));

			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Slider berhasil di edit.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}
		}
		redirect('vp/slider');
	}

	public function deslider($b)
	{
		$val = $this->db->delete('slider',array('id_slider' => $b));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Slider berhasil di hapus.');
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
		}
		redirect('vp/slider');
	}

	// Menu
	public function menu()
	{
		$this->db->order_by('id_menu', 'desc');
		if ($this->uri->segment(3) == 'daftar_menu') {
           $query = $this->db->get_where('menu',array('level' => '1'));
        }elseif ($this->uri->segment(3) == 'daftar_submenu') {
           $query = $this->db->get_where('menu',array('level' => '2'));
        }
        return $query->result();
	}

	public function as_menu()
	{
		return $this->db->get_where('menu',array('level' => '1'))->result();
	}

	public function as_submenu()
	{
		return $this->db->get_where('menu',array('level' => '2'))->result();
	}

	public function get_menu($i,$k)
	{
		return $this->db->get_where('menu',array('id_menu' => $i,'token' => $k))->row();
	}

	public function innavigasi($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->insert('menu', $data);
		}else{
			redirect('error');
		}
	}

	public function upnavigasi($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->update('menu',$data,array('id_menu' => $this->uri->segment(4)));
		}else{
			redirect('error');
		}
	}

	public function denavigasi($i,$k)
	{
		if ($this->uri->segment(3) == "hapus_menu") {
			$val = $this->db->delete('menu',array('id_menu' => $i,'token' => $k));
			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Menu berhasil di hapus.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}
			redirect('vp/navigasi/daftar_menu');
		}elseif ($this->uri->segment(3) == "hapus_submenu") {
			$val = $this->db->delete('menu',array('id_menu' => $i,'token' => $k));
			if ($val == TRUE) {
				$this->session->set_flashdata('sukses', 'Submenu berhasil di hapus.');
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}
			redirect('vp/navigasi/daftar_submenu');
		}
	}

	// Gadget
	public function get_gadget($i)
	{
		return $this->db->get_where('gadget',array('id_gadget' => $i))->row();
	}

	public function ingadget($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->insert('gadget', $data);
		}else{
			redirect('error');
		}
	}

	public function upgadget($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->update('gadget',$data,array('id_gadget' => $this->uri->segment(3)));
		}else{
			redirect('error');
		}
	}

	public function degadget($b)
	{
		$val = $this->db->delete('gadget',array('id_gadget' => $b));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Menu berhasil di hapus.');
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
		}
		redirect('vp/gadget');
	}

	// Promo
	public function get_promo($i,$k)
	{
		return $this->db->get_where('promo',array('id_promo' => $i,'token' => $k))->row();
	}

	public function inpromo($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->insert('promo', $data);
		}else{
			redirect('error');
		}
	}

	public function uppromo($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->update('promo',$data,array('id_promo' => $this->uri->segment(3)));
		}else{
			redirect('error');
		}
	}

	public function depromo($b)
	{
		$val = $this->db->delete('promo',array('id_promo' => $b));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Menu berhasil di hapus.');
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
		}
		redirect('vp/promo');
	}

	public function depromimg($id,$img)
	{
		$val = $this->db->update('promo', array('img' => ''),array('id_promo' => $id));
		if ($val == true) {
			unlink('./uploads/promo/'.$img);
			echo "<input type='file' class='form-control' name='img' required>";
		}else{
			echo "Maaf system kami sedang mengalami gangguan.";
		}
	}

	// Laman

	public function get_laman($i)
	{
		return $this->db->get_where('laman',array('id_laman' => $i))->row();
	}	

	public function inlaman($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->insert('laman', $data);
		}else{
			redirect('error');
		}
	}

	public function uplaman($data)
	{
		if (isset($_POST['simpan'])) {
		$this->db->update('laman',$data,array('id_laman' => $this->uri->segment(3)));
		}else{
			redirect('error');
		}
	}

	public function delaman($b)
	{
		$val = $this->db->delete('laman',array('id_laman' => $b));
		if ($val == TRUE) {
			$this->session->set_flashdata('sukses', 'Menu berhasil di hapus.');
		}else{
			$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
		}
		redirect('vp/laman');
	}

	// Profile

	public function upprofile()
	{
		if (isset($_POST['simpan'])) {
		$this->db->update('user',array('nama_lengkap' => $this->input->post('nama'),'email' => $this->input->post('email')),array('id' => '1', 'token' => 'token_5741d900ddfe11e59a561d1f44'));
		}else{
			redirect('error');
		}
	}

}
