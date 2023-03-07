<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
	public function index() 
    {
        $args = [
            'auction' => $this->Lelang_model->all(),
            'history' => $this->Masyarakat_model->history()
        ];

        // var_dump($args['history']);die;

        $this->load->view('templates_user/header', $args);
        $this->load->view('history/history', $args);
        $this->load->view('templates_user/footer');
    }
    
    public function detail_history($id)
	{
		$product = $this->Lelang_model->first($id);
              if ($this->input->post('bid') ) {
                  $erros = $this->_history_detail_process($product);
                  $product = $this->Lelang_model->first($id);
              }

              $args = [
                  'product' => $product,
                  'history' => $this->Lelang_model->history($id),
                  'max_bid' => $this->Lelang_model->max_bid($id),
              ];

        $this->load->view('templates_user/header', $args);
        $this->load->view('history/history_detail', $args);
        $this->load->view('templates_user/footer');   
	}

    private function _history_detail_process($product) {
    $this->load->library('form_valifation');
    $this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than_equal_to['. $product->harga_awal. ']'); 
    if ($this->form->validation->run()) {
        $this->Lelang_model->price = set_value('price');
        $this->Lelang_model->id_lelang = $product->id_lelang;
        $this->Lelang_model->id_user = uid();
        
        $this->Lelang_model->save_bid();
        $this->session->set_flashdata(
            'message', 
            '<div class="alert alerty-success alert-dismissible fade-show" role="alert">
            Bid telah di tambahkan
            </div>'
        );
        redirect('history/detail_barang/'.$product->id_lelang); 
        }  
    
    return $this->form_validation->errors_array();
 }

	public function cetak_pemenang($id) {
        //load library
        $this->load->model('masyarakat_model');
        $this->load->library('pdf');

        // load model dasboard
        $data['laporan'] = $this->masyarakat_model->filter_pemenang($id);

        $this->pdf->setPager('A4', 'potrait');
        $this->pdf->filename = "laporan-pemenang.pdf";

        //run dompdf
        $this->pdf->load->view('history/cetak_pemenang', $data);
    }


}

		
	
