<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">DataTables Blog</h1>
			
		</div>
    </section>
    
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->post_id ?></td>
                            <td><?php echo $value->post_date ?></td>
                            <td><?php echo $value->post_title ?></td>
                            <td><?php echo $value->cat_name ?></td>
                            <td><?php echo $value->post_status ?></td>
                            <td>
                                <a href="<?php echo base_url('/blog/edit/') . $value->post_id ?>" class="btn btn-sm btn-outline-primary">Edit</a> 
                                <a href="<?php echo base_url('/blog/delete/') . $value->post_id ?>" class="btn btn-sm btn-outline-danger">Delete</a> 
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
	
</main>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    } );
} );
</script>
