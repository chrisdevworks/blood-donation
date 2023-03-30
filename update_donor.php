<div class="modal fade" id="update_modal<?php echo $row['donor_id'] ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="" action="" id="update_donor" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title text-primary" id="exampleModalLabel"><b>Update User Info</b></h4>
				</div>
				<div class="modal-body">
					<!-- ------------------------------------------------------------- -->
					<input type="hidden" name="donor_id" id="donorId" value="<?php echo $row['donor_id'] ?>">
					<div class="row">
						<div class="col-md-12">
							<b class="text-muted border-bottom border-gray ">Donor Info</b>
							<div class="form-group">
								<label for="firstname">First Name</label>
								<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $row['firstname'] ?>" required>
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter a First Name.</div>
							</div>
							<div class="form-group">
								<label for="lastname">Last Name</label>
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $row['lastname'] ?>" required>
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter a Last Name.</div>
							</div>
							<div class="form-group">
								<label for="middlename">Middle Name</label>
								<input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $row['middlename'] ?>" required>
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter a Middle Name.</div>
							</div>
							<div class="form-group">
								<label for="gender">Gender</label>
								<select id="gender" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="gender" name="gender" required>
									<option value="M" <?php echo $row['gender'] === 'M' ? 'selected' : '' ?>>Male</option>
									<option value="F" <?php echo $row['gender'] === 'F' ? 'selected' : '' ?>>Female</option>
								</select>
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please select a gender.</div>
							</div>

							<div class="form-group">
								<label for="blood_type">Blood Type</label>
								<select id="blood_type" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="blood_type" name="blood_type" required>
                                    <option value="A+" <?php echo $row['blood_type'] === 'A+' ? 'selected' : '' ?>>A+</option>
                                    <option value="A-" <?php echo $row['blood_type'] === 'A-' ? 'selected' : '' ?>>A-</option>
                                    <option value="B+" <?php echo $row['blood_type'] === 'B+' ? 'selected' : '' ?>>B+</option>
                                    <option value="B-" <?php echo $row['blood_type'] === 'B-' ? 'selected' : '' ?>>B-</option>
                                    <option value="O+" <?php echo $row['blood_type'] === 'O+' ? 'selected' : '' ?>>O+</option>
                                    <option value="O-" <?php echo $row['blood_type'] === 'O-' ? 'selected' : '' ?>>O-</option>
                                    <option value="AB+" <?php echo $row['blood_type'] === 'AB+' ? 'selected' : '' ?>>AB+</option>
                                    <option value="AB-" <?php echo $row['blood_type'] === 'AB-' ? 'selected' : '' ?>>AB-</option>
                                </select>
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter a Blood Type.</div>
							</div>
							<div class="form-group">
                                <label for="quantity">Quantity (Kg)</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="1Kg" value="<?php echo $row['quantity'] ?>" required>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a Middle Name.</div>
                            </div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="textarea" class="form-control" name="address" id="address" value="<?php echo $row['address'] ?>" placeholder="Street, Purok and Barangay, CIty, Province, Country" required />
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter an Address.</div>
							</div>
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?php echo $row['email'] ?>" placeholder="Enter email">
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter an Email.</div>
							</div>
							<div class="form-group">
								<label for="phone">Mobile Number</label>
								<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row['phone'] ?>" placeholder="09951827381" required>
								<div class="valid-feedback">Looks good!</div>
								<div class="invalid-feedback">Please enter a Phone Number.</div>
							</div>
							<div class="form-group">
								<label for="body_weight">Body Weight (Kg)</label>
								<input type="text" class="form-control" name="body_weight" id="body_weight" value="<?php echo $row['body_weight'] ?>" placeholder="50Kg" required>
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
			</form>
		</div>
	</div>
</div>
<script>
	$('#update_modal<?php echo $row['donor_id'] ?> .modal-content form').submit(function(e) {
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')

		$.ajax({
			url: 'ajax.php?action=update_donor',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Data successfully saved.', "success");
					setTimeout(function() {
						location.reload();
					}, 800)
				}
			}
		})
	})
</script>