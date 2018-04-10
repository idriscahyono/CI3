<html>
  <head>
    <title>Idris Cahyono</title>
  </head>
  <body>
    <h1>Form Tambah Data Blog</h1>
    <hr>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("tambah"); ?>
      <table cellpadding="8">
        <tr>
          <td>ID</td>
          <td><input type="text" name="input_id" value="<?php echo set_value('input_id'); ?>"></td>
        </tr>
        <tr>
          <td>Author</td>
          <td><input type="text" name="input_author" value="<?php echo set_value('input_author'); ?>"></td>
        </tr>
        <tr>
          <td>Date</td>
          <td><input type="text" name="input_date" value="<?php echo set_value('input_date'); ?>"></td>
        </tr>
        <tr>
          <td>Title</td>
          <td><input type="text" name="input_title" value="<?php echo set_value('input_title'); ?>"></td>
        </tr>
        <tr>
          <td>Content</td>
          <td><textarea name="input_content"><?php echo set_value('input_content'); ?></textarea></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="text" name="input_image" value="<?php echo set_value('input_image'); ?>"></td>
        </tr>
      </table>
        
      <hr>
      <input type="submit" name="submit" value="Simpan">
      <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
    <?php echo form_close(); ?>
  </body>
</html>