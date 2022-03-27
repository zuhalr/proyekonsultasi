<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    

	// function calPMT($apr, $term, $loan)
	// {
	//   $term = $term * 12;
	//   $apr = $apr / 1200;
	//   $amount = $apr * -$loan * pow((1 + $apr), $term) / (1 - pow((1 + $apr), $term));
	//   return round($amount);
	// }

	function calPMT($interest, $months, $loan) {
       $months = $months;
       $interest = $interest / 1200;
       $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       // return number_format($amount, 2);
       return ceilingNumber($amount,50);
    }

    function ceilingNumber($number, $significance = 1)
    {
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
    }


    function thousandsCurrencyFormat($num) {
      if($num>1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;

      }

      return $num;
    }




    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'mon',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'min',
            's' => 'sec',
            // 'y' => 'year',
            // 'm' => 'month',
            // 'w' => 'week',
            // 'd' => 'day',
            // 'h' => 'hour',
            // 'i' => 'minute',
            // 's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                // $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                $v = $diff->$k . ' ' . $v;
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        // return $string ? implode(', ', $string) . ' ago' : 'just now';
        return $string ? implode(', ', $string) . '' : '';
    }





    function get_next_key_array($array,$key){
          // $keys = array_keys($array);
          // $position = array_search($key, $keys);
          // if (isset($keys[$position + 1])) {
          //     $nextKey = $keys[$position + 1];
          //     return $nextKey;
          // }
          // else
          // {
          //   return false;
          // }
          

            $keys = array_keys($array); // ubah jadi key
            $position = array_search($key, array_column($array, 'posts_id')); // cari array berdasarkan value
            if (isset($keys[$position + 1])) {
                $nextKey = $keys[$position + 1];

                // return $nextKey;
                $response = array(
                    "status" => "success",
                    "val" => $nextKey
                );
                return $response;
            }
            else
            {
                //return false;
                $response = array(
                    "status" => "failed",
                    "val" => ""
                );
                return $response;
            }
            // return $position;
           
    }

    function get_previous_key_array($array,$key){
          
            $keys = array_keys($array); // ubah jadi key
            $position = array_search($key, array_column($array, 'posts_id')); // cari array berdasarkan value
            if (isset($keys[$position - 1])) {
                $previousKey = $keys[$position - 1];

                $response = array(
                    "status" => "success",
                    "val" => $previousKey
                );
                return $response;
            }
            else
            {
                $response = array(
                    "status" => "failed",
                    "val" => ""
                );
                return $response;
            }
           
    }


    function tgl_indoYF ($tgl) { //Year Front
            $tanggal = substr($tgl,8,2);
            $bulan = getBulan2(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;
        }
        function getBulan2($bln){
            switch ($bln){
                case 1:return "Januari";break;
                case 2:return "Februari";break;
                case 3:return "Maret";break;
                case 4:return "April";break;
                case 5:return "Mei";break;
                case 6:return "Juni";break;
                case 7:return "Juli";break;
                case 8:return "Agustus";break;
                case 9:return "September";break;
                case 10:return "Oktober";break;
                case 11:return "November";break;
                case 12:return "Desember";break;
            }
        }

        function getTeksBulan($bln){
            switch ($bln){
                case 1:return "Jan";break;
                case 2:return "Feb";break;
                case 3:return "Mar";break;
                case 4:return "Apr";break;
                case 5:return "Mei";break;
                case 6:return "Jun";break;
                case 7:return "Jul";break;
                case 8:return "Agu";break;
                case 9:return "Sep";break;
                case 10:return "Okt";break;
                case 11:return "Nov";break;
                case 12:return "Des";break;
            }
        }


        function tgl_indoYF2 ($tgl) { //Year Front
            $tanggal = substr($tgl,8,2);
            $bulan = bulan_indoYF2(substr($tgl,5,2));
            $tahun = substr($tgl,0,4);
            return $tanggal.' '.$bulan.' '.$tahun;
        }
        function bulan_indoYF2($bln){
            switch ($bln){
                case 1:return "Jan";break;
                case 2:return "Feb";break;
                case 3:return "Mar";break;
                case 4:return "Apr";break;
                case 5:return "Mei";break;
                case 6:return "Jun";break;
                case 7:return "Jul";break;
                case 8:return "Agu";break;
                case 9:return "Sep";break;
                case 10:return "Okt";break;
                case 11:return "Nov";break;
                case 12:return "Des";break;
            }
        }
	


?>