<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Manage User</h1>
			
		</div>
    </section>
    
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value): ?>
                        <tr>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->alamat ?></td>
                            <td><?php echo $value->kodepos ?></td>
                            <td><?php echo $value->email ?></td>
                            <td>
                                <a href="<?php echo base_url('ManageUser/delete/') . $value->user_id ?>" class="btn btn-sm btn-outline-primary">Delete</a> 
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