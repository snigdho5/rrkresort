<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//
		$this->data['page_title'] = 'Best Resorts near Kolkata, Kolaghat | Rupasi Rupnarayn Kuthi';

		//availability

		// $chkdata = array(
		// 	'tbl_availability.room_id'  => $room_id
		// );
		$getAvldata = $this->am->getRoomAvailabilityByDate(null, TRUE);
		if (!empty($getAvldata)) {
			foreach ($getAvldata as $key => $value) {
				$this->data['avl_data'][] = array(
					'dtime'  => $value['dtime'],
					'rowid'  => encode_url($value['avl_id']),
					// 'roomid'  => encode_url($value['room_id']),
					'name'  => $value['room_name'],
					'from_date'  => $value['from_date'],
					'to_date'  => $value['to_date'],
					'actual_rate'  => $value['actual_rate'],
					'discount_percentage'  => $value['discount_percentage'],
					'discounted_rate'  => $value['discounted_rate'],
					'added_by'  => $value['added_by']
				);
			}

			// print_obj($this->data['avl_data']);die;

		} else {
			$this->data['avl_data'] = [];
			// redirect(base_admin_url('rooms'));
		}

		//rooms 
		$chkparam = array(
			'mt_room.status' => 1,
			// 'tbl_availability.from_date >='  => DT,
			// 'tbl_availability.to_date >='  => DT,
		);
		$getRoomdata = $this->am->getRoomData($chkparam, TRUE);
		// print_obj($getRoomdata);die;

		if (!empty($getRoomdata)) {

			foreach ($getRoomdata as $key => $value) {

				//check availability
				$chkdata = array(
					'tbl_availability.room_id'  => $value->room_id,
					'tbl_availability.from_date <='  => DT,
					'tbl_availability.to_date >='  => DT,
				);
				$getAvldata = $this->am->getRoomAvailability2($chkdata);
				if (!empty($getAvldata)) {

					//check booking
					$chkdata = array(
						'tbl_room_bookings.room_id'  => $value->room_id,
						'tbl_room_bookings.booking_date'  => DT,
						// 'tbl_room_bookings.booking_end_date >='  => DT,
					);
					$getBooking = $this->am->getBookings($chkdata);

					if (empty($getBooking)) {
						$avl_status = '1'; //available
					} else {
						$avl_status = '0';
					}
				} else {
					$avl_status = '0';
					$getAvldata = [];
				}

				//get images
				$chkdata = array(
					'mt_image_uploads.room_id'  => $value->room_id
				);
				$getdata = $this->am->getImgUploads($chkdata, TRUE);

				if (!empty($getdata)) {
					foreach ($getdata as $key => $val) {
						$images[] = array(
							'dtime'  => $val['dtime'],
							'rowid'  => encode_url($val['img_upload_id']),
							// 'roomid'  => encode_url($val['room_id']),
							'name'  => $val['room_name'],
							'file_name'  => $val['file_name'],
							'file_path'  => $val['file_path'],
							'added_by'  => $val['added_by']
						);
					}
				} else {
					$images = [];
				}


				$this->data['room_data'][] = array(
					'dtime'  => $value->added_dtime,
					'rowid'  => encode_url($value->room_id),
					'name'  => $value->room_name,
					'bedtype'  => $value->bed_type,
					'roomdesc'  => $value->room_desc,
					'roomcap'  => $value->max_room_capacity,
					'viewtype'  => $value->room_view_type,
					'amenities'  => $value->amenities,
					'totaladults'  => $value->total_adults,
					'totalkids'  => $value->total_kids,
					'withbfast'  => $value->with_breakfast,
					'status'  => $value->status,
					'added_by'  => $value->added_by,
					'images'  => $images,
					'avl_data' => $getAvldata,
					'avl_status'  => $avl_status,
					'edited_dtime'  => ($value->edited_dtime != '') ? $value->edited_dtime : 'NA'
				);
			}

			// print_obj($this->data['room_data']);die;
		} else {
			$this->data['room_data'] = '';
		}

		$this->load->view('main/vw_welcome', $this->data, false);
	}

	//cont us
	public function onGetContactUs()
	{
		if (!empty($this->session->userdata('userid')) && $this->session->userdata('usr_logged_in') == 1) {

			$contdata = $this->mm->getContData($p = null, $many = TRUE);
			if ($contdata) {
				foreach ($contdata as $key => $value) {
					$this->data['cont_data'][] = array(
						'cont_id'  => $value->cont_id,
						'fullname'  => $value->name,
						'phone'  => $value->phone,
						'message'  => $value->message,
						'email'  => $value->email,
						'added_source'  => $value->added_source,
						'iplocation'  => $value->created_ip,
						'dtime'  => $value->dtime
					);
				}
			} else {
				$this->data['cont_data'] = '';
			}
			$this->load->view('main/vw_contacts', $this->data, false);
		} else {
			redirect(base_admin_url());
		}
	}


	public function onDeleteContUs()
	{
		if (!empty($this->session->userdata('userid')) && $this->session->userdata('usr_logged_in') == 1 && $this->session->userdata('usergroup') == 1) {
			if ($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD') == 'POST') {

				$cont_id = xss_clean($this->input->post('contid'));
				$contdata = $this->mm->getContData(array('cont_id'  => $cont_id), $many = FALSE);

				if ($contdata) {
					//del
					$delcont = $this->mm->delCont(array('cont_id' => $cont_id));

					if ($delcont) {
						$return['deleted'] = 'success';
					} else {
						$return['deleted'] = 'failure';
					}
				} else {
					$return['deleted'] = 'not_exists';
				}

				header('Content-Type: application/json');
				echo json_encode($return);
			} else {
				redirect(base_admin_url());
			}
		}
	}
}
