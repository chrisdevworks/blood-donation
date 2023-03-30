<?php
// include_once('db_connect.php');
// connectdb();/
include_once 'private/config.php';
include_once 'private/database.php';

$database = new Database();
$db = $database->getConnection();

?>
<style>
    table.dataTable td {
        font-size: 0.8vw;
    }

    td,
    tr {
        white-space: normal;
        word-wrap: break-word;
    }

    table {
        table-layout: fixed;
    }
</style>
<div class="col-lg-12">
    <button type="button" class="btn bg-gradient-indigo text-white mr-3 my-3 shadow-sm" data-toggle="modal" data-target="#DonorModal"><i class="fa-regular fa-square-plus"></i> Add New</button>
    <div class="card card-outline card-indigo" style="overflow:auto; white-space: nowrap">
        <div class="card-body">
            <div class="table-responsive col-sm-12">
                <table class="table table-hover table-bordered table-hover w-auto small" id="list">
                    <thead>
                        <tr class="table-indigo bg-gradient-indigo text-white">
                            <th class="text-center" style="width: 1%">#</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Middle Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Blood Type</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center" style="width: 20%">Address</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Body Weight</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Date Updated</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $db->query("SELECT * FROM donor");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><b><?php echo $row['firstname'] ?></b></td>
                                <td><b><?php echo $row['middlename'] ?></b></td>
                                <td><b><?php echo $row['lastname'] ?></b></td>
                                <td><b><?php echo $row['gender'] ?></b></td>
                                <td><b><?php echo $row['blood_type'] ?></b></td>
                                <td><b><?php echo $row['quantity'] ?></b></td>
                                <td><b><?php echo $row['address'] ?></b></td>
                                <td><b><?php echo $row['email'] ?></b></td>
                                <td><b><?php echo $row['phone'] ?></b></td>
                                <td><b><?php echo $row['body_weight'] ?></b></td>
                                <td><a href="<?php echo $row['photo'] ?>" target="_blank"><i class="fa-solid fa-magnifying-glass"></i> View </a></td>
                                <td><b><?php echo $row['date_updated'] ?></b></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary update_donor" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['donor_id'] ?>">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="delete_donor(<?php echo $row['donor_id'] ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            include 'update_donor.php';
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="DonorModal" tabindex="-1" role="dialog" aria-labelledby="newDonor" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-4">
            <form action="" id="manage_donor" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" id="exampleModalLabel"><b>New Donor</b></h4>
                </div>
                <div class="modal-body">
                    <!-- ------------------------------------------------------------- -->
                    <input type="hidden" name="id" id="donorId" value="<?php echo isset($donor_id) ? $donor_id : '' ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <b class="text-muted border-bottom border-gray ">Donor Info</b>
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a First Name.</div>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a Last Name.</div>
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a Middle Name.</div>
                            </div>
                            <div class="form-group">
                                <label for="middlename">Gender</label>
                                <select id="gender" name="gender" class="custom-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                            <div class="form-group">
                                <label for="blood_type">Blood Type</label>
                                <select id="blood_type" name="blood_type" class="custom-select" required>
                                    <option value="">Select Blood Type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a Blood Type.</div>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity (Kg)</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="1Kg" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a Middle Name.</div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="textarea" class="form-control" name="address" id="address" placeholder="Street, Purok and Barangay, CIty, Province, Country" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter an Address.</div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter an Email.</div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Mobile Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="09951827381" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a Phone Number.</div>
                            </div>
                            <div class="form-group">
                                <label for="body_weight">Body Weight (Kg)</label>
                                <input type="text" class="form-control" name="body_weight" id="body_weight" placeholder="50Kg" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your Body Weight.</div>
                            </div>
                            <label class="control-label">Upload a Photo</label>
                            <div class="form-group">
                                <div class="input-group pb-3 py-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary"><i class="fas fa-solid fa-upload fa-fw"></i></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="photo" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" class="custom-file-input" value="" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                                    </div>
                                </div>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your Body Weight.</div>
                                <p class="text-muted m-0">- Allowed Formats: JPG, PNGT</p>
                                <p class="text-muted m-0">- Maximum Size: 50 MB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-12 text-right d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary mr-2">Save</button>
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).on("click", ".update_user", function() {
        var donorId = $(this).data('id');
        $('#donorId').val(donorId);
    });


    $('.delete_donor').click(function() {
        _conf("<h5 class='text-danger'>Are you sure you want to delete this data?</h5> ", "delete_donor", [$(this).attr('data-id')])
        alert()
    })


    function delete_donor($donor_id) {
        start_load()

        const confirmed = confirm("Are you sure you want to send this data?");

        if (confirmed) {
            $.ajax({
                url: 'ajax.php?action=delete_donor',
                method: 'POST',
                data: {
                    donor_id: $donor_id
                },
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Data successfully deleted", 'success');
                        setTimeout(function() {
                            location.reload()
                            // location.replace('index.php?page=office_list')
                        }, 800)
                    }
                }
            })
        }
    }


    $('#manage_donor').submit(function(e) {
        e.preventDefault();

        $('input').removeClass("border-danger")
        start_load()
        $('#msg').html('')


        $.ajax({
            url: 'ajax.php?action=save_donor',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function(resp) {
                alert_toast('Data successfully saved.', "success");
                // setTimeout(function() {
                //     location.reload()
                // }, 750)

            },
            error: function(resp) {
                alert_toast('Data failed to save.', "warning");
                // setTimeout(function() {
                //     location.reload()
                // }, 750)
            }
        })
    })
</script>