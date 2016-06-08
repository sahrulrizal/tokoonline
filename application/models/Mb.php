<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mb extends CI_Model {

	public function utama_user()
	{
		return $this->db->query("SELECT user.nama_lengkap,user.email as uemail,utama.* FROM utama,user WHERE utama.id = user.utama");
	}

	public function utama()
	{
		return $this->db->get('utama');
	}

	public function verif_login()
	{
		$query = $this->db->get_where('user',array('email' => $this->input->post('email'),
			'password' => sha1(md5($this->input->post('password')))
			));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$dataSession = array(
					'id' => $row->id,
					'status' => $row->status
					);
				$this->session->set_userdata($dataSession);
			}
			redirect('Vp');
		}else{
			$this->session->set_flashdata('error', 'Maaf email dan password anda tidak dapat kami temukan di website kami, silahkan cek kembali email atau password anda!');
			redirect('vb/login');
		}
	}

	// slider
	public function slider()
	{
		$this->db->order_by('id_slider', 'desc');
		return $this->db->get('slider')->result();
	}

	// Produk
	public function produk()
	{
		return $this->db->get('produk')->result();
	}

	public function p_all_kate()
	{
		$this->db->order_by('id_produk', 'desc');
		return $this->db->query("SELECT * FROM `produk` GROUP BY kategori")->result();
	}

	public function produk_hal_depan()
	{
		$this->db->order_by('id_produk', 'desc');
		return $this->db->get('produk',12)->result();
	}

	public function single_produk($l)
	{	
		$query = $this->db->query("SELECT produk.*,promo.judul,promo.kode_promo,promo.potongan FROM `produk`,`promo` WHERE produk.kode_link = '$l' and produk.id_promo = promo.id_promo");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return $this->db->get_where('produk',array('kode_link' => $l))->row();
		}	
	}

	public function kate_produk($l,$num, $offset)
	{
		 $this->db->order_by('id_produk', 'DESC');
		return $this->db->get_where('produk',array('kategori' => $l),$num, $offset)->result();
	}

	public function produk_id($id)
	{
		return $this->db->get_where('produk',array('id_produk' => $id))->row();
	}

	public function prodprom($id)
	{
		return $this->db->query("SELECT produk.*,promo.id_promo,promo.kode_promo,promo.potongan FROM `produk`,`promo` WHERE produk.id_produk = '$id' and produk.id_promo = promo.id_promo");
	}

	// Pemesanan
	public function inpemesanan()
	{
		// Invoices
		$due_date = date('Y-m-d', strtotime('+3 days'));
		$invoices = $this->db->insert('invoices',array('date' => date('Y-m-d'),'due_date' => $due_date,'status' => 'tunggu'));
		$id = $this->db->insert_id();
		if ($invoices == true) {
			$r = $this->db->get('utama')->row();  
			foreach ($this->cart->contents() as $i) {
				$detail = $this->db->insert('detail_invoices', array('id_invoice' => $id,'harga' => $i['price'],'id_produk' => $i['id'],'jumlah' => $i['qty']));
			}
				if ($detail == true) {
					$pelanggan = $this->db->insert('pelanggan', array(
						'id_invoice' => $id,'nama'=>$this->input->post('nama'),
						'email'=>$this->input->post('email'),
						'alamat'=>$this->input->post('alamat'),
						'telepon'=>$this->input->post('telepon'),
						'hp'=>$this->input->post('hp'),
						'fax'=>$this->input->post('fax'),
						'pesan'=>$this->input->post('pesan'),
						'date_buat'=>date('Y-m-d')));
				} //tutup item detail
					if ($pelanggan == true) {
					// Pelanggan
					$pel = '<b>Pelangibaby & fashion kids : Orderan baru dari '.$this->input->post('nama').'</b><div>Nama:'.$this->input->post('nama').'</div><div>Email:'.$this->input->post('email').'</div><div>Alamat: '.$this->input->post('alamat').'</div><div>Telepon:'.$this->input->post('telepon').'</div><div>No.HP: '.$this->input->post('hp').'</div><div>fax: '.$this->input->post('fax').'</div><div>Pesan: '.$this->input->post('pesan').'</div><div>Tanggal: '.date('Y-m-d').'</div>'.'<br>';
					// table
					$t1 = "
					<table border='2' width='100%'>
					<tr>
					<td align='center'>No</td>
					<td align='center'>Item Produk</td>
					<td align='center'>Qty</td>
					<td align='center'>Harga</td>
					<td align='center'>Sub Total</td>
					</tr>";
					$n=1;
					foreach ($this->cart->contents() as $i) {
					$t2 = '<tr>
					<td>'.$n++.'</td>
					<td>'.anchor('produk'.$i['name'],$i['name']).'</td>
					<td>'.$i['qty'].'</td>
					<td>Rp.'.$this->cart->format_number($i['price']).'</td>
					<td>.Rp.'.$this->cart->format_number($i['subtotal']).'</td>
					</tr>';
					}
					$t3 = "<tr>
					<td colspan='4' align='center'><strong>Total Order</strong></td>
					<td align='right'><strong >Rp.".$this->cart->format_number($this->cart->total())."</strong></td>
					</tr>
					</table>";
					$bdy = $pel.$t1.$t2.$t3;
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
			        $mail->SetFrom('support@pelangibaby.com', 'Support');  //Who is sending the email
			        $mail->Subject    = 'Pelangibaby & fashion kids : orderan baru dari '.$this->input->post('nama');
			        $mail->Body      = $bdy;
			        $mail->isHTML(true);
			        $mail->AddAddress($r->email);

			        if(!$mail->Send()) {
			        	echo  "Error: " . $mail->ErrorInfo;
			        }
				}	
		}
	}

	// Gadget
	public function gadget()
	{
		return $this->db->get('gadget')->result();
	}

	public function gad_l()
	{
		return $this->db->get_where('gadget',array('letak' => 'l'))->result();
	}

	public function gad_tp()
	{
		return $this->db->get_where('gadget',array('letak' => 'tp'))->result();
	}

		public function gad_bp()
	{
		return $this->db->get_where('gadget',array('letak' => 'bp'))->result();
	}

	//Promo
	public function promo()
	{
		return $this->db->get('promo')->result();
	}

	public function single_promo($l,$t)
	{
		return $this->db->get_where('promo',array('link' => $l,'token' => $t))->row();	
	}

	// Laman

	public function laman()
	{
		return $this->db->get('laman')->result();
	}

	public function single_laman($b='')
	{
		return $this->db->get_where('laman',array('link' => $b))->result();
	}

	// Feedback

	public function infeedback()
	{
		if (isset($_POST['simpan'])) {
			if ($this->db->get_where('invoices',array('feedback' => '','kode_invoice' => $this->input->post('kode'),'status' => 'sukses'))->num_rows() > 0) {
				$val = $this->db->update('invoices',array('feedback' => $this->input->post('pesan'),'status_feed' => '1'),array('kode_invoice' => $this->input->post('kode')));
				if ($val == TRUE) {
					$this->session->set_flashdata('sukses', 'Terimakasih, feedback anda berhasil dikirimkan.');
				}else{
					$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
				}
			}else{
				$this->session->set_flashdata('error', 'Maaf anda tidak dapat melakukan feedback karena id atau kode invoice sudah mulakukan feedback terlebih dahulu.');
			}
		}
		redirect(site_url());
	}
}
