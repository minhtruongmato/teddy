<?php 

/**
* 
*/
require 'class.phpmailer.php';
require 'class.smtp.php';
require 'PHPExcel.php';
class Client_gmail extends Admin_Controller{
    private $author_data = array();
	function __construct(){
		parent::__construct();
		$this->load->model('client_gmail_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->load->helper('email');

        $this->data['controller'] = $this->client_gmail_model->table;
		$this->author_data = handle_author_common_data();
	}
    public function index(){
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->client_gmail_model->count_total_rows($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 5);
        $this->data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->client_gmail_model->get_all_search('desc', $per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/client_gmail/list_client_gmail_view');
    }
    function export_excel(){
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'STT')
        ->setCellValue('B1', 'Email');
        $result = $this->client_gmail_model->get_all_search();
        //set gia tri cho cac cot du lieu
        $i = 2;
        foreach ($result as $key => $row)
        {
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $key+1)
            ->setCellValue('B'.$i, $row['email']);
            $i++;
        }
        //ghi du lieu vao file,định dạng file excel 2007
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $full_path = 'excel.xlsx';//duong dan file
        $objWriter->save($full_path);
        return redirect('excel.xlsx');
    }
    function remove($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->client_gmail_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/'.$this->data['controller'].'', 'refresh');
            }
            $data = array('is_deleted' => 1);
            $update = $this->client_gmail_model->common_update($id, $data);
            if($update){
                $this->session->set_flashdata('message_success',MESSAGE_REMOVE_SUCCESS);
                return redirect('admin/'.$this->data['controller'],'refresh');
            }
            $this->session->set_flashdata('message_error',MESSAGE_REMOVE_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
            
        }
        $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
        return redirect('admin/'.$this->data['controller'],'refresh');
    }
}