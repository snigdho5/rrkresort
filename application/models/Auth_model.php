<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Auth_model extends MY_Model
{


	function __construct()
	{
		$this->table = 'users';
		$this->primary_key = 'user_id';
	}

	//users
	public function addUser($data)
	{
		$this->table = 'users';
		return $this->store($data);
	}
	public function getUserData($param = null, $many = FALSE)
	{
		$this->table = 'users';
		if ($param != null && $many == FALSE) {
			return $this->get_one($param);
		} elseif ($param != null && $many == TRUE) {
			return $this->get_many($param, $order_by = 'user_id', $order = 'DESC', FALSE);
		} else {
			return $this->get_many();
		}
	}


	public function updateUser($data, $param)
	{
		$this->table = 'users';
		return $this->modify($data, $param);
	}
	public function delUser($param)
	{
		$this->table = 'users';
		return $this->remove($param);
	}


	//rooms
	public function addRoom($data)
	{
		$this->table = 'mt_room';
		return $this->store($data);
	}

	public function getRoomData($param = null, $many = FALSE, $order_by = 'room_id', $order = 'DESC')
	{
		$this->table = 'mt_room';
		if ($param != null && $many == FALSE) {
			return $this->get_one($param);
		} else if ($param != null && $many == TRUE) {
			return $this->get_many($param, $order_by, $order, FALSE);
		} else {
			return $this->get_many(null, $order_by, $order, FALSE);
		}
	}

	public function getRoomAvlData($param = null, $many = FALSE, $order = 'DESC', $order_by = 'mt_room.room_id')
	{

		$this->db->select('
			mt_room.*,
			tbl_availability.from_date,
			tbl_availability.to_date
		');
		$this->db->join('tbl_availability', 'tbl_availability.room_id = mt_room.room_id', 'left');

		if ($param != null) {
			$this->db->where($param);
		}

		$this->db->order_by($order_by, $order);

		$query = $this->db->get('mt_room');
		// echo $this->db->last_query();die;

		if ($many != TRUE) {
			return $query->row();
		} else {
			return $query->result();
		}
	}

	public function updateRoom($data, $param)
	{
		$this->table = 'mt_room';
		return $this->modify($data, $param);
	}

	public function delRoom($param)
	{
		$this->table = 'mt_room';
		return $this->remove($param);
	}


	//image upload
	public function addImageUpload($data)
	{
		$this->table = 'mt_image_uploads';
		return $this->store($data);
	}
	public function getImageUploads($param = null, $many = FALSE)
	{
		$this->table = 'mt_image_uploads';
		if ($param != null && $many == FALSE) {
			return $this->get_one($param);
		} elseif ($param != null && $many == TRUE) {
			return $this->get_many($param, $order_by = 'img_upload_id', $order = 'DESC', FALSE);
		} else {
			return $this->get_many();
		}
	}

	public function getImgUploads($param = null, $many = FALSE, $order = 'DESC', $order_by = 'mt_image_uploads.img_upload_id')
	{

		$this->db->select('
			mt_image_uploads.*,
			mt_room.room_name
		');
		$this->db->join('mt_room', 'mt_room.room_id = mt_image_uploads.room_id', 'left');

		if ($param != null) {
			$this->db->where($param);
		}

		$this->db->order_by($order_by, $order);

		$query = $this->db->get('mt_image_uploads');
		// echo $this->db->last_query();die;

		if ($many != TRUE) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}


	public function updateImageUpload($data, $param)
	{
		$this->table = 'mt_image_uploads';
		return $this->modify($data, $param);
	}
	public function delImageUpload($param)
	{
		$this->table = 'mt_image_uploads';
		return $this->remove($param);
	}

	//check availability
	public function addAvailability($data)
	{
		$this->table = 'tbl_availability';
		return $this->store($data);
	}
	public function getAvailability($param = null, $many = FALSE)
	{
		$this->table = 'tbl_availability';
		if ($param != null && $many == FALSE) {
			return $this->get_one($param);
		} elseif ($param != null && $many == TRUE) {
			return $this->get_many($param, $order_by = 'avl_id', $order = 'DESC', FALSE);
		} else {
			return $this->get_many();
		}
	}

	public function getRoomAvailability2($param = null, $many = FALSE, $order = 'DESC', $order_by = 'tbl_availability.avl_id')
	{

		$this->db->select('
			tbl_availability.*
		');

		if ($param != null) {
			$this->db->where($param);
		}

		$this->db->order_by($order_by, $order);

		$query = $this->db->get('tbl_availability');
		// echo $this->db->last_query();die;

		if ($many != TRUE) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}

	public function getRoomAvailabilityByDate($param = null, $many = FALSE, $order = 'DESC', $order_by = 'tbl_availability.avl_id')
	{

		$this->db->select('
			tbl_availability.avl_id,
			tbl_availability.dtime,
			tbl_availability.from_date,
			tbl_availability.to_date,
			tbl_availability.actual_rate,
			tbl_availability.discount_percentage,
			MIN(tbl_availability.discounted_rate) AS discounted_rate,
			tbl_availability.added_by,
			mt_room.room_name
		');
		$this->db->join('mt_room', 'mt_room.room_id = tbl_availability.room_id', 'left');

		if ($param != null) {
			$this->db->where($param);
		}

		$this->db->group_by('tbl_availability.from_date');

		$this->db->order_by($order_by, $order);

		$query = $this->db->get('tbl_availability');
		// echo $this->db->last_query();die;

		if ($many != TRUE) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}

	public function getRoomAvailability($param = null, $many = FALSE, $order = 'DESC', $order_by = 'tbl_availability.avl_id')
	{

		$this->db->select('
		tbl_availability.*,
			mt_room.room_name
		');
		$this->db->join('mt_room', 'mt_room.room_id = tbl_availability.room_id', 'left');

		if ($param != null) {
			$this->db->where($param);
		}

		$this->db->order_by($order_by, $order);

		$query = $this->db->get('tbl_availability');
		// echo $this->db->last_query();die;

		if ($many != TRUE) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}


	public function updateAvailability($data, $param)
	{
		$this->table = 'tbl_availability';
		return $this->modify($data, $param);
	}
	public function delAvailability($param)
	{
		$this->table = 'tbl_availability';
		return $this->remove($param);
	}

	//room bookings
	public function addBooking($data)
	{
		$this->table = 'tbl_room_bookings';
		return $this->store($data);
	}
	public function getBookings($param = null, $many = FALSE)
	{
		$this->table = 'tbl_room_bookings';
		if ($param != null && $many == FALSE) {
			return $this->get_one($param);
		} elseif ($param != null && $many == TRUE) {
			return $this->get_many($param, $order_by = 'booking_id', $order = 'DESC', FALSE);
		} else {
			return $this->get_many();
		}
	}

	public function getRoomBookings($param = null, $many = FALSE, $order = 'DESC', $order_by = 'tbl_room_bookings.booking_id')
	{
		$this->db->select('
			tbl_room_bookings.*,
			mt_room.room_name
		');
		$this->db->join('mt_room', 'mt_room.room_id = tbl_room_bookings.room_id', 'left');

		if ($param != null) {
			$this->db->where($param);
		}

		$this->db->order_by($order_by, $order);

		$query = $this->db->get('tbl_room_bookings');
		// echo $this->db->last_query();die;

		if ($many != TRUE) {
			return $query->row_array();
		} else {
			return $query->result_array();
		}
	}

	public function updateBooking($data, $param)
	{
		$this->table = 'tbl_room_bookings';
		return $this->modify($data, $param);
	}
	public function delBooking($param)
	{
		$this->table = 'tbl_room_bookings';
		return $this->remove($param);
	}
}
