<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Paydos | Inventory System
	</title>
	<meta charset="utf-8" />
	<meta name="description"
		content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title"
		content="" />
	<link rel="shortcut icon" href="asset/media/logos/favicon.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{ asset('asset/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('asset/css/plugins.bundle.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/css/style.bundle.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
							<div class="row g-5 g-xl-8">
                  <div id="kt_app_toolbar" class="app-toolbar py-3">
                      <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                          <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                              <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                  <li class="breadcrumb-item text-muted">
                                      <a class="text-muted text-hover-primary">Statistics</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
									<div class="row">
										<div class="col-xl-3">
											<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #003153;background-image:url('/metronic8/demo1/assets/media/svg/shapes/wave-bg-red.svg')">
												<div class="card-header pt-5 mb-3">
													<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #003153">
														<i class="bi bi-person-badge-fill fs-2qx lh-0" style="color: white;"></i>
													</div>
												</div>
												<div class="card-body d-flex align-items-end mb-3">
													<div class="d-flex align-items-center">
														<span class="fs-4hx text-white fw-bold me-6">{{ $countUser }}</span>
														<div class="fw-bold fs-6 text-white">
															<span class="d-block">Active User</span>
															<span class="">Count</span>
														</div>
													</div>
												</div>
												<a href="/isten-cikan">
													<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
														<div class="fw-bold text-white py-2">
															<span class="fs-1 d-block">{{ $countUserDeactive }}</span>
															<span class="opacity-50">Inactive Users</span>
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xl-3">
											<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #72253d;background-image:url('/metronic8/demo1/assets/media/svg/shapes/wave-bg-purple.svg')">
												<div class="card-header pt-5 mb-3">
													<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #72253d">
														<i class="bi bi-pc-display fs-2qx lh-0" style="color: white;"></i>
													</div>
												</div>
												<div class="card-body d-flex align-items-end mb-3">
													<div class="d-flex align-items-center">
														<span class="fs-4hx text-white fw-bold me-6">{{ $countProduct }}</span>
														<div class="fw-bold fs-6 text-white">
															<span class="d-block">Inventory</span>
															<span class="">Count</span>
														</div>
													</div>
												</div>
												<a href="/inventory-define">
												<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
													<div class="fw-bold text-white py-2">
														<span class="fs-1 d-block">{{ $countInventory }}</span>
														<span class="opacity-50">Assigned Inventory Count</span>
													</div>
												</div>
												</a>
											</div>
										</div>
										<div class="col-xl-3">
											<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #5bc0de;">
												<div class="card-header pt-5 mb-3">
													<div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #5bc0de">
														<i class="bi bi-phone fs-2qx lh-0" style="color: white;"></i>
													</div>
												</div>
												<div class="card-body d-flex align-items-end mb-3">
													<div class="d-flex align-items-center">
														<span class="fs-4hx text-white fw-bold me-6">{{ $countNumber }}</span>
														<div class="fw-bold fs-6 text-white">
															<span class="d-block">Assigned Phone</span>
															<span class="">Number</span>
														</div>
													</div>
												</div>
												<div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
													<div class="fw-bold text-white py-2">
														<span class="fs-1 d-block">{{ $countDepartment }}</span>
														<span class="opacity-50">Department count</span>
													</div>
												</div>

											</div>
										</div>
									</div>
							</div>
							<div class="page-title mt-5 d-flex flex-column justify-content-center flex-wrap me-3">
								<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Departments</h1>
							</div>
							<br>
                <div class="row g-5 g-xl-8">
                    @foreach ($team as $item)
										<?php
											$array = ['text-warning bg-light-warning','text-success bg-light-success','text-primary bg-light-primary','text-danger bg-light-danger' ];
											$random = Arr::random($array);
										?>
										<div class="col-md-2">
											<div class="card">
												<div class="card-body d-flex flex-center flex-column py-9 px-5">
													<div class="symbol symbol-65px symbol-circle mb-5">
														<span class="symbol-label fs-2x fw-semibold {{ $random }}">{{ Str::substr($item->team_name, 0, 1) }}</span>
													</div>
													<a href="{{ url('/team' . '/' . $item->team_id) }}" class="fs-4 text-center text-gray-800 text-hover-primary fw-bold mb-0">{{ $item->team_name }}</a>
													<div class="fw-semibold text-center text-gray-400 mb-6">Team Leader</div>
													<div class="d-flex flex-center flex-wrap mb-5">
														<div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
															<div class="fs-6 text-center fw-bold text-gray-700">{{$item->count_member}}</div>
															<div class="fw-semibold text-gray-400">Member Count</div>
														</div>
													</div>
												</div>
											</div>
										</div>
                    @endforeach
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
</body>
</html>
