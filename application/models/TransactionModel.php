<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransactionModel extends CI_Model{

	public $table = 'transaksi';
	public $id    = 'id_trans';
	public $order = 'ASC';
  
	public function get_all_by_period($startDate, $endDate)
	{
		$sql = '
			SELECT t.*, d.tanggal, d.durasi, u.username FROM transaksi t
			INNER JOIN transaksi_detail d ON t.id_trans=d.trans_id
			INNER JOIN users u ON t.user_id=u.id
			WHERE t.status=2
			AND d.tanggal BETWEEN ? and ?
			ORDER BY t.id_trans ASC';
		$result = $this->db->query($sql, [$startDate, $endDate])->result();
		return $result;
	}
}
