<!DOCTYPE html>

<html lang="en">

<head>
	<title>Paydos | Inventory System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
    <link rel="shortcut icon" href="../asset/media/logos/favicon.ico" type="image/x-icon" >
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
	<link href="{{ asset('asset/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('asset/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('asset/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<style>
    label.error {
         color: #dc3545;
         font-size: 14px;
    }
</style>
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="
      --kt-toolbar-height: 55px;
      --kt-toolbar-height-tablet-and-mobile: 55px;
    ">
	<div class="d-flex flex-column flex-root">
		<div class="page d-flex flex-row flex-column-fluid">
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('include.header')
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<div class="post d-flex flex-column-fluid" id="kt_post">
						<div id="kt_content_container" class="container-xxl">
							<div class="card mb-5 mb-xl-10">
								<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
									data-bs-target="#kt_account_profile_details" aria-expanded="true"
									aria-controls="kt_account_profile_details">
									<div class="card-title m-0">
										<h3 class="fw-bolder m-0">User Details</h3>
									</div>
								</div>
								<div id="kt_account_settings_profile_details" class="collapse show">
									<form id="user_form" action="{{ url('user') }}" method="POST" enctype="multipart/form-data" class="form">
                                        @csrf
										<div class="card-body border-top p-9">
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Profile Photo</label>
												<div class="col-lg-8">
													<div class="image-input image-input-outline" data-kt-image-input="true">
														<div class="image-input-wrapper w-125px h-125px"></div>
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
															data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Photo">
															<i class="bi bi-pencil-fill fs-7"></i>
															<input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" />
														</label>
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
															data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Photo">
															<i class="bi bi-x fs-2"></i>
														</span>
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
															data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Photo">
															<i class="bi bi-x fs-2"></i>
														</span>
													</div>
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
												</div>
											</div>
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Full Name</label>
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-6 fv-row">
															<input autocomplete="off" type="text" id="name" name="name"
																class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
																placeholder="First Name" value="" />
														</div>
														<div class="col-lg-6 fv-row">
															<input autocomplete="off" type="text" id="surname" name="surname" class="form-control form-control-lg form-control-solid"
																placeholder="Last Name" value="" />
														</div>
													</div>
												</div>
											</div>
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Position</label>
												<div class="col-lg-8 fv-row">
													<input autocomplete="off" type="text" id="position" name="position" class="form-control form-control-lg form-control-solid"
														placeholder="Position" value="" />
												</div>
											</div>
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Department</label>
												<div class="col-lg-8 fv-row">
													<select class="form-select mb-2 col-lg-6" name="department" data-control="select2" data-placeholder="Select Department">
														<option></option>
														@foreach ($teams as $item1)
															<option value="{{ $item1->team_name }}">{{ $item1->team_name }}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Work Email</label>
												<div class="col-lg-8 fv-row">
													<input autocomplete="off" type="text" id="job_mail" name="job_mail" class="form-control form-control-lg form-control-solid"
														placeholder="Work Email" value="" />
												</div>
											</div>
                                            <div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Work Email Password</label>
												<div class="col-lg-8 fv-row">
													<input autocomplete="off" type="text" id="job_mail_pass" name="job_mail_pass" class="form-control form-control-lg form-control-solid"
														placeholder="Work Email Password" value="" />
												</div>
											</div>
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Work Phone</label>
												<div class="col-lg-8 fv-row">
													<input autocomplete="off" type="text" id="job_phone" name="job_phone" class="form-control form-control-lg form-control-solid"
														placeholder="Work Phone" value="" />
												</div>
											</div>
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">AnyDesk ID</label>
												<div class="col-lg-8 fv-row">
													<input autocomplete="off" type="text" id="anydesk_id" name="anydesk_id" class="form-control form-control-lg form-control-solid"
														   placeholder="AnyDesk ID" value="" />
												</div>
											</div>
											<div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">AnyDesk Password</label>
												<div class="col-lg-8 fv-row">
													<input autocomplete="off" type="text" id="anydesk_pass" name="anydesk_pass" class="form-control form-control-lg form-control-solid"
														   placeholder="AnyDesk Password" value="" />
												</div>
											</div>
                      <div class="row mb-6">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Start Date</label>
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-6 fv-row">
																<input autocomplete="off" type="date" id="job_date" name="job_date" class="form-control form-control-lg form-control-solid"
																placeholder="Start Date" value="" />
														</div>
													</div>
												</div>
											</div>
											{{-- <div class="row mb-0">
												<label class="col-lg-4 col-form-label fw-bold fs-6">Active / Inactive Status</label>
												<div class="col-lg-8 d-flex align-items-center">
													<div class="form-check form-check-solid form-switch fv-row">
														<input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"
															checked="checked" />
														<label class="form-check-label" for="allowmarketing"></label>
													</div>
												</div>
											</div> --}}

										</div>
										<div class="card-footer d-flex justify-content-end py-6 px-9">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
                @include('include.footer')
			</div>
		</div>
	</div>
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
				<path
					d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
					fill="currentColor" />
			</svg>
		</span>
	</div>
	<script src="{{ asset('asset/js/plugins.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/datatables.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        $('.selectpicker').selectpicker();
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>	<script>
		$(document).ready(function() {
				$("#user_form").validate({
						rules: {
							name: "required",
							surname: "required",
							position: "required",
							department: "required",
							language: "required",
						},
						messages: {              
              name: "First name field is required",
              surname: "Last name field is required",
              position: "Position field is required",
              department: "Department field is required",
              job_date: "Start date is required",
            }
				});
		});
</script>

</body>

</html>
