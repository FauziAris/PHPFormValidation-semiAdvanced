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
          'required' => true
        ]);

        $validation->setRule('jk', 'Jenis kelamin', [
          'required' => true
        ]);

        $validation->setRule('foto', 'File foto', [
          'file_name' =>[
            'required' =>true
          ]
        ]);

        // $validation->setMessage('nama', [
        //   'required' => 'ini pesan kostum'
        // ]);

        if ($validation->run()) {
            $data = array_merge($_POST, $_FILES);
            echo "<pre>";
            echo var_dump($data);
            echo "</pre>";
        }
    }
     ?>

     <?=form_file()?>
     <label for="nama">Nama:</label><br>
     <?=input_text('nama', set_value('nama'))?>
     <?=($validation->error('nama'))?
     "<p style='color:red'>".$validation->error('nama')."</p>"
     : '<br>' ?>
     <label for="jk">Jenis kelamin:</label><br>
     <?=input_radio('jk', 'L', set_checked('L', set_value('jk')))?>Laki-laki
     <?=input_radio('jk', 'P', set_checked('P', set_value('jk')))?>Perempuan
     <?=($validation->error('jk'))?
     "<p style='color:red'>".$validation->error('jk')."</p>"
     : '<br>' ?>
     <label for="foto">File foto:</label>
     <?=input_file('foto') ?>
     <?=($validation->error('foto'))?
     "<p style='color:red'>".$validation->error('foto')."</p>"
     : '<br>' ?>
     <?=input_submit('Kirim')?>
     <?=form_close()?>
  </body>
</html>
