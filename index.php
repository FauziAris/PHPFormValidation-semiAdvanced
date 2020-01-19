<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'formHelper.php';
    require_once 'FormValidation.php';
    $validation = new FormValidation();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $validation->setData(array_merge($_POST, $_FILES));
        $validation->setRule('nama', 'Nama lengkap', [
          'not_empty' => true
        ]);

        $validation->setRule('jk', 'Jenis kelmain', [
          'not_empty' => true
        ]);

        $validation->setRule('foto', 'File foto', [
          'file_name' =>[
            'not_empty' =>true
          ],
          'file_size'=>[
            'min_size' => 30000,
            'max_size' => 40000
          ]
        ]);

        $validation->setMessage('nama', [
          'not_empty' => 'ini pesan kostum'
        ]);

        if ($validation->run()) {
            echo "tidak ada yg error";
        } else {
            echo "ada yg error";
        }
    }
     ?>

     <?=form_file()?>
     <label for="nama">Nama:</label><br>
     <?=input_text('nama', set_value('nama'))?><br>
     <label for="jk">Jenis kelamin:</label><br>
     <?=input_radio('jk', 'L', set_checked('L', set_value('jk')))?>Laki-laki
     <?=input_radio('jk', 'P', set_checked('P', set_value('jk')))?>Perempuan
     <br>
     <label for="foto">File foto:</label>
     <?=input_file('foto') ?>
     <?=input_submit('Kirim')?>
     <?=form_close()?>
  </body>
</html>
