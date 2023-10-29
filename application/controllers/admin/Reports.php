<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once __DIR__ . '/Base.php';

class Reports extends Base
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('TransactionModel');
    $this->load->helper('tgl_indo');
    $this->load->helper('dd');

    $this->data['module'] = 'Laporan';
  }

  public function index()
  {
    $this->load->view('back/report/index', $this->data);
  }

  public function generateReport()
  {
    $startDate = $this->input->get('start_date');
    $endDate = $this->input->get('end_date');
    $option = $this->input->get('report_type');

    $this->data['startDate'] = $startDate;
    $this->data['endDate'] = $endDate;
    $items = $this->TransactionModel->get_all_by_period($startDate, $endDate);

    if ($option === 'sales_detail') {
      return $this->salesDetail($items);
    }
    else if ($option === 'sales_by_customers') {
      return $this->salesByCustomer($items);
    }
    else if ($option === 'monthly_sales_recap') {
      return $this->monthlySalesRecap($items);
    }
  }

  public function monthlySalesRecap($items)
  {
    $days = [];
    foreach ($items as $item) {
      if (!isset($days[$item->tanggal])) {
        $day = $days[$item->tanggal] = new stdClass;
        $day->date = $item->tanggal;
        $day->transactionCount = 0;
        $day->total = 0;
        $day->duration = 0;
      }

      $day = $days[$item->tanggal];
      $day->transactionCount++;
      $day->duration += $item->durasi;
      $day->total += $item->grand_total;
    }
    $this->data['items'] = $days;
    return $this->load->view('back/report/monthly-sales-recap', $this->data);
  }

  public function salesByCustomer($items)
  {
    $customers = [];

    foreach ($items as $item) {
      if (!isset($customers[$item->username])) {
        $customer = $customers[$item->username] = new stdClass;
        $customer->transactionCount = 0;
        $customer->total = 0;
        $customer->duration = 0;
      }

      $customer = $customers[$item->username];
      $customer->username = $item->username;
      $customer->transactionCount++;
      $customer->duration += $item->durasi;
      $customer->total += $item->grand_total;
    }
    usort($customers, function ($a, $b) {
      return $a->total < $b->total;
    });

    $this->data['items'] = $customers;

    return $this->load->view('back/report/sales-by-customer', $this->data);
  }

  public function salesDetail($items)
  {
    $this->data['items'] = $items;
    return $this->load->view('back/report/sales-detail', $this->data);
  }
}
