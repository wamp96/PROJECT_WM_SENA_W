<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Codeigniter 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container{
            max-width:500px;
        }
        .error{
            display: block;
            padding-top: 5px;
            font-size:14px;
            color:red;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form method="post" action="<?= site_url('/update')?>" class="update_profile" name="update_profile">
            <input type="hidden" name="id" id="id" value="<?php echo $profile_obj['id']; ?>">          
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $profile_obj['name']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $profile_obj['email']; ?>">
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="text" name="photo" class="form-control" value="<?php echo $profile_obj['photo']; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block">Save Data</button>    
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.min.js" integrity="sha512-sNylduh9fqpYUK5OYXWcBleGzbZInWj8yCJAU57r1dpSK9tP2ghf/SRYCMj+KsslFkCOt3TvJrX2AV/Gc3wOqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <Script>
        if($("#update_profile").length > 0) {
            $("#update_profile").validate({
                rules:{
                    name:{
                        required:true,
                    },
                    email: {
                        required:true,
                        maxlength:60,
                        email:true,
                    },
                    photo:{
                        required:true,
                        maxlength:100,
                        required:true,
                    },
                },
                messages: {
                    name: {
                        required: "Name is required",
                    }
                    email:{
                        required: "Email is required",
                        email: "It does not seem to be a valid email.",
                        maxlength: "The email should be or equal to 60 chars.",
                    }
                    photo: {
                        required: "Photo is required",
                        maxlength: "The photo should be or equal to 100 chars.",
                    }
                },
            })
        }
    </Script>
</body>
</html>