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
	<link href="{{ asset('asset/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('asset/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('asset/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
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
								<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
									<div class="card card-flush py-4">
										<div class="card-header">
											<div class="card-title">
												<h2>Photo</h2>
											</div>
										</div>
										<div class="card-body text-center pt-0">
											<div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
												style="background-image: url({{ asset('asset/image/1.gif') }})">
												<div class="image-input-wrapper w-150px h-150px"></div>
												<label class="btn btn-icon btn-circle btn-active-color-primary w-50px h-50px bg-body shadow"
													data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Photo">
													<i class="fs-25">Change</i>
													<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
												</label>
											</div>
											<div class="text-muted fs-7">Set the product thumbnail. Only *.png, *.jpg, and *.jpeg image files are accepted</div>
										</div>
									</div>
								</div>
							<form action="{{ url('inventory/' .$inventory->id) }}" method="POST" class="form d-flex flex-column flex-lg-row">
                                @csrf
                                @method("PATCH")
								<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
									<div class="tab-content">
										<div class="tab-pane fade show active">
											<div class="d-flex flex-column gap-7 gap-lg-10">
												<div class="card card-flush py-4">
													<div class="card-header">
														<div class="card-title">
															<h2>Features</h2>
														</div>
													</div>
													<div class="card-body pt-0">
														<div class="mb-10 fv-row">
															<label class="required form-label">Inventory Name</label>
															<input autocomplete="off" type="text" name="name" class="form-control mb-2"
																placeholder="Inventory" value="{{ $inventory->name }}" />
															<div class="text-muted fs-7">An inventory name is required and recommended to be unique.</div>
														</div>
														<div class="mb-10 col-lg-12">
															<div class="row">
																<div class="col-lg-6 fv-row">
																	<label class="required form-label">Inventory Category</label>
																	<select class="form-select mb-2" name="category" data-control="select2"
																		data-hide-search="true" data-placeholder="Inventory Category">
                                                                        <option></option>
                                                                        @foreach ($category as $item1)
																		<option value="{{ $item1->category_id }}">{{ $item1->category_name }}</option>
                                                                        @endforeach
																	</select>
																</div>
																<div class="col-lg-6 fv-row">
																	<label class="required form-label">Total Quantity</label>
																	<input autocomplete="off" type="text" name="piece" class="form-control mb-2"
																		placeholder="Quantity" value="{{ $inventory->piece }}" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="d-flex justify-content-end">
										<button type="submit" class="btn btn-primary">
											<span>Save</span>
										</button>
									</div>
								</div>
							</form>
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
	<script>var hostUrl = "assets/";</script>
	<script src="{{ asset('asset/js/plugins.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/datatables.bundle.js') }}"></script>
	<script src="../assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
	<script src="../assets/js/custom/apps/ecommerce/catalog/save-product.js"></script>
	<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.js') }}"></script>
</body>

</html>
