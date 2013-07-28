<?php

class CronController extends Controller {

  /**
   * Setup the layout used by the controller.
   *
   * @return void
   */
  protected function nightly()
  {
    $temp = storage_path().'/temp/';
    if( ! is_dir($temp) ) mkdir($temp);

    $tpd_temp = storage_path().'/temp/tpd';
    if( ! is_dir($tpd_temp) ) mkdir($tpd_temp);

    $tpd_file = $temp . 'tpd.zip';

    copy('http://cms3.tucsonaz.gov/files/transportation/files/TPD_Incidents_45Day.zip', $tpd_file);

    $zip = new ZipArchive;
    $res = $zip->open($tpd_file);
    if ($res === TRUE) {
      $zip->extractTo($tpd_temp);
      $zip->close();
      // $contents = file_get_contents() ;
      if (($handle = fopen($tpd_temp . '/tpd_100blk_incid.txt', "r")) !== FALSE)
      {
        $i = 0;
        $keys = array();
        $pri_key_key = false;

        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
        {
          if($i == 0)
          {

            $keys = $data;
            foreach($keys as $key_id => $key)
            {
              if($key == 'INCI_ID')
              {
                $pri_key_key = $key_id;
              }
            }
          }
          else
          {
            $existing_document =  MDB::collection('tpd_incidents')->where('INCI_ID', $data[$pri_key_key])->first();
            if( $existing_document == null)
              continue;
            $insert = array();
            foreach($keys as $i => $key)
            {
              $insert[$key] = $data[$i];
            }
            $document = MDB::collection('tpd_incidents')->insert($insert);
          }
          $i++;
        }
        fclose($handle);
      }
    } else {
      echo 'doh!';
    }
    die();
  }

}