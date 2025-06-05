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
							<div class="post d-flex flex-column-fluid" id="kt_post">
								<div id="kt_content_container" class="container-xxl">
									<div class="d-flex flex-column flex-lg-row">
										<div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
											<div class="card mb-5 mb-xl-8">
												<div class="card-body">
												<button onclick="history.back()" class="btn btn-primary">Go Back</button>
													<div class="d-flex flex-center flex-column py-5">
														<div class="symbol symbol-100px symbol-circle mb-7">
															<img src="{{ $user[0]->image == NULL ? asset('asset/image/person.png') : $user[0]->image }}" alt="image" />
														</div>
														<a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $user[0]->name }}&nbsp;{{ $user[0]->surname }}</a>
														<div class="mb-9">
															<div class="badge badge-lg badge-light-primary d-inline">{{ $user[0]->department }}</div>
														</div>
													</div>
													<div class="d-flex flex-stack fs-4 py-3">														<div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
															role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
															<span class="ms-2 rotate-180">
																<span class="svg-icon svg-icon-3">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																		fill="none">
																		<path
																			d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																			fill="currentColor" />
																	</svg>
																</span>
															</span>
														</div>
													</div>
													<div class="separator"></div>
													<div id="kt_user_view_details" class="collapse show">
														<div class="pb-5 fs-6">
															<div class="fw-bolder mt-5">Email</div>
															<div class="text-gray-600">
																@if ($user[0]->job_mail != NULL)
																<div class="col-lg-8 d-flex align-items-center">
																		<span class="fs-6 text-gray-800 me-2">{{ $user[0]->job_mail }}</span>
																</div>
																@else
																<div class="col-lg-8 d-flex align-items-center">
																		<span class="badge py-3 px-4 fs-7 badge-light-danger">No work email</span>
																</div>
																@endif
															</div>
															<div class="fw-bolder mt-5">Start Date</div>

															@if ($user[0]->job_date != NULL)
															<div class="col-lg-8 d-flex align-items-center">
																	<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->job_date }}</span>
															</div>
															@else
															<div class="col-lg-8 d-flex align-items-center">
																	<span class="badge py-3 px-4 fs-7 badge-light-danger">No start date</span>
															</div>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="flex-md-row-auto ms-7" style="min-width: 800px;">
											<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
														href="#kt_user_view_overview_tab">User Information</a>
												</li>
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
														href="#kt_user_view_overview_security">User Inventory</a>
												</li>
											</ul>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
													<div class="card pt-4 mb-6 mb-xl-9">
														<div class="card-header border-0">
															<div class="card-title">
																<h2>Person Details</h2>
															</div>
														</div>
														<div class="card-body pt-0 pb-5">
															<div class="table-responsive">
																<table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
																	<tbody class="fs-6 fw-bold text-gray-600">																		<tr>
																			<td>Department</td>
																			<td>@if ($user[0]->department != NULL)
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->department }}</span>
																				</div>
																				@else
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No department</span>
																				</div>
																				@endif</td>
																		</tr>																		<tr>
																			<td>Team</td>
																			<td>@if ($user[0]->team_name != NULL)
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->team_name }}</span>
																				</div>
																				@else
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No team</span>
																				</div>
																				@endif</td>
																		</tr>																		<tr>
																			<td>Position</td>
																			<td>@if ($user[0]->position != NULL)
																					<div class="col-lg-8 d-flex align-items-center">
																					<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->position }}</span>
																				</div>
																			@else
																					<div class="col-lg-8 d-flex align-items-center">
																					<span class="badge py-3 px-4 fs-7 badge-light-danger">No position</span>
																				</div>
																			@endif</td>
																		</tr>																		<tr>
																			<td>Work Phone</td>
																			<td>@if ($user[0]->job_phone != NULL)
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->job_phone }}</span>
																				</div>
																				@else
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No work phone</span>
																				</div>
																				@endif</td>
																		</tr>
																				<tr>
																			<td>Work Email</td>
																			<td>@if ($user[0]->job_mail != NULL)
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->job_mail }}</span>
																				</div>
																				@else
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No work email</span>
																				</div>
																				@endif</td>
																		</tr>																		<tr>
																			<td>Work Email Password
																				<div>
																					<a class="fw-bold fs-6 text-primary-800" onclick="gizleGoster('sonuc');">Show / Hide Password</a>
																			</div>
																			</td>
																			<td>																				@if ($user[0]->job_mail_pass != NULL)
																				<div class="col-lg-4 d-flex align-items-center">
																						<span id="sonuc" style="display: none;" class="fw-bolder fs-6 text-gray-800 me-2">{{
																							$user[0]->job_mail_pass }}</span>
																				</div>

																				@else
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No password</span>
																				</div>
																				@endif</td>
																		</tr>
																		<tr>
																			<td>AnyDesk ID</td>
																			<td>@if ($user[0]->anydesk_id != NULL)
																					<div class="col-lg-8 d-flex align-items-center">
																					<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->anydesk_id }}</span>
																				</div>
																				@else																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No AnyDesk ID</span>
																				</div>
																				@endif</td>
																		</tr>
																		<tr>
																			<td>AnyDesk Password</td>
																			<td>@if ($user[0]->anydesk_pass != NULL)
																					<div class="col-lg-8 d-flex align-items-center">
																					<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->anydesk_pass }}</span>
																				</div>
																				@else																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No AnyDesk password</span>
																				</div>
																				@endif</td>
																		</tr>																		<tr>
																			<td>Start Date</td>
																			<td>@if ($user[0]->job_date != NULL)
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ $user[0]->job_date }}</span>
																				</div>
																				@else
																				<div class="col-lg-8 d-flex align-items-center">
																						<span class="badge py-3 px-4 fs-7 badge-light-danger">No start date</span>
																				</div>
																				@endif</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
													<div class="card pt-4 mb-6 mb-xl-9">
															<div class="card card-flush h-xl-100">
																<div class="card-header pt-7">
																		<div class="card-toolbar">
																			<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">																				<a href="{{ url('user/inventory-history/' . $user[0]->id) }}" type="button"
																						class="btn btn-primary">
																						<span class="svg-icon svg-icon-2">
																								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																										fill="none">
																									<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
																											transform="rotate(-90 11.364 20.364)" fill="currentColor" />
																									<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
																								</svg>
																						</span>
																						View All Inventory History (Active & Inactive)
																					</a>
																			</div>
																		</div>
																</div>
																<div class="card-body">
																		<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
																			<thead>
																				<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
																						<th class="min-w-100px">Product Name</th>
																						<th class="text pe-3 min-w-100px">Serial Number</th>
																						<th class="text pe-3 min-w-100px">IMEI Number</th>
																						<th class="text pe-3 min-w-100px">MAC (Wifi)</th>
																						<th class="text pe-3 min-w-150px">MAC (Ethernet)</th>
																						<th class="text pe-0 min-w-50px">NOTE</th>
																						<th class="text pe-0 min-w-50px">Date</th>
																						@if ( Auth::user()->yetki == 1)
																						<th class="text pe-0 min-w-50px text-end">Action</th>
																						@else

																						@endif
																				</tr>
																			</thead>
																			<tbody class="fw-bolder text-gray-600">
																				@foreach ($inventory as $item)
																				<tr class="remove" id="rem_{{$item->feature_id}}">
																					<td>
																							<a class="text-dark text-hover-primary">{{ $item->name }}&nbsp;{{ $item->model_name
																								}}</a>
																					</td>
																					@if ($item->seri_no != '')
																					<td class="text">{{ $item->seri_no }}</td>
																					@else
																					<td class="text text-danger">No serial number defined</td>
																					@endif
																					@if ($item->imei_no != '')
																					<td class="text">{{ $item->imei_no }}</td>
																					@else
																					<td class="text text-danger">No IMEI number defined</td>
																					@endif
																					@if ($item->mac_address_wifi != '')
																					<td class="text">{{ $item->mac_address_wifi }}</td>
																					@else
																					<td class="text text-danger">No MAC WiFi defined</td>
																					@endif
																					@if ($item->mac_address_ethernet != '')
																					<td class="text">{{ $item->mac_address_ethernet }}</td>
																					@else
																					<td class="text text-danger">No MAC Ethernet defined</td>
																					@endif
																					@if ($item->notes != '')
																					<td class="text">{{ $item->notes }}</td>
																					@else
																					<td class="text text-danger">No notes defined</td>
																					@endif
																					@if ($item->new_date != NULL)
																					<td class="text">{{ $item->new_date }}</td>
																					@else
																					<td class="text text-danger">No add date</td>
																					@endif
																					@if ( Auth::user()->yetki == 1)
																					<td class="text-end">
																						@csrf
																						<a href="javascript:();" onclick="RemoveInventory({{$item->feature_id}})" data-id="{{ $item->feature_id }}"  class="btn btn-danger px-3 btremove">Remove</a>
																				</td>
																					@else

																					@endif

																				</tr>
																				@endforeach

																			</tbody>
																		</table>
																</div>
															</div>
													</div>
												</div>
											</div>
										</div>
									</div>
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
    <script>
        function gizleGoster(ID) {
            var secilenID = document.getElementById(ID);
            if (secilenID.style.display == "none") {
                secilenID.style.display = "";
            } else {
                secilenID.style.display = "none";
            }
        }
    </script>	<script>
		function RemoveInventory(id) {
			if (confirm('Do you want to remove this inventory assignment?')) {
				$.ajax({
					url: '/remove_inventory',
					type: 'post',
					data: {
						"_token": "{{ csrf_token() }}",
						feature_id: id
					},
					success: function (data) {
						$("#rem_" + id).remove();
						location.reload();
					},
					error: function (request, status, error) {
						console.error(error);
					}
				});
			}
		}
	</script>
	<script src="{{ asset('asset/js/ajax.js') }}"></script>
	<script src="{{ asset('asset/js/plugins.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/datatables.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.js') }}"></script>
</body>
</html>
