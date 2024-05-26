<!DOCTYPE html>
<html lang="en">
<head>
    <title>Codeigniter 4 CRUD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-end">


        </div>
        
        <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            }
        ?>

        <div class="mt-3">
            <table class="table table-bordered" id="profiles-list">
                <thead>
                    <tr>
                        <th>Profile ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($profiles): ?>
                    <?php foreach($profiles as $profile): ?>
                    <tr>
                        <td><?php echo $profile['id']; ?></td>
                        <td><?php echo $profile['name']; ?></td>
                        <td><?php echo $profile['email']; ?></td>
                        <td><?php echo $profile['photo']; ?></td>
                        <td>
                            <a href="<?php echo base_url('edit-view/'.$profile['id']);?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo base_url('delete/'.$profile['id']);?>" class="btn btn-primary btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>    
                    <?php endif; ?>        
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.min.js" integrity="sha512-sNylduh9fqpYUK5OYXWcBleGzbZInWj8yCJAU57r1dpSK9tP2ghf/SRYCMj+KsslFkCOt3TvJrX2AV/Gc3wOqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="text/css" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#profiles.list').dataTable();
        });
    </script>
</body>
</html>