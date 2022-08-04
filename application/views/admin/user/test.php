<?php
foreach ($detail_user->result_array() as $data_user) :
    echo $data_user['id_pegawai'], "<br>";
endforeach;
foreach ($instansi->result_array() as $data_instansi) :
    echo $data_instansi['id_instansi'], "<br>";
endforeach;
foreach ($akses->result_array() as $data_akses) :
    echo $data_akses['id_akses'], "<br>";
endforeach;
