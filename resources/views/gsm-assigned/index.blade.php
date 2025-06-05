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
	
	
	<link href="{{ asset(\'asset/css/datatables.bundle.css\') }}" rel="stylesheet" type="text/css" />
	
	
	<link href="{{ asset(\'asset/css/plugins.bundle.css\') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset(\'asset/css/style.bundle.css\') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="	https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

	
</head>


<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="
      --kt-toolbar-height: 55px;
      --kt-toolbar-height-tablet-and-mobile: 55px;
    ">
	
	
	<div class="d-flex flex-column flex-root">
		
		<div class="page d-flex flex-row flex-column-fluid">
			
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				
                @include(\'include.header\')
				
				
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    
					<div class="post d-flex flex-column-fluid" id="kt_post">
						
						<div id="kt_content_container" class="container-xxl">
							
							<div class="card">
								
								<div class="card-header border-0 pt-6">
									
									
									<div class="card-toolbar">
										
										@if ( Auth::user()->yetki == 1)
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											
											<a href="{{ url(\'gsm-assigned/create\') }}" type="button" class="btn btn-primary">
												
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
														fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
															transform="rotate(-90 11.364 20.364)" fill="currentColor" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
													</svg>
												</span>
												Add Number Assignment
											</a>
											
										</div>
                                @else

                                @endif

										
									</div>
									
								</div>
								
								
								<div class="card-body py-4">
									
									<table class="table table-bordered align-middle table-row-dashed fs-6 gy-5" id="datatable">
										
										<thead>
											
											<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
												<th class="min-w-125px">Full Name</th>
												<th class="min-w-100px">Number</th>
												<th class="min-w-150px">Package Name</th>
                        <th class="min-w-150px">Package Content</th>
												@if ( Auth::user()->yetki == 1)
												<th class="text-end min-w-100px">Edit</th>
                        <th class="text-end min-w-100px">Remove</th>
                                @else

                                @endif

											</tr>
											
										</thead>
										
										
										<tbody class="text-gray-600 fw-bold">
                                            @foreach ($gsm_assigned as $item)
                                                
                                                <tr class="remove" id="rem_{{$item->id}}">
                                                    
                                                    <td class="d-flex align-items-center">
                                                        
                                                        <div class="symbol symbol-rounded symbol-50px overflow-hidden me-3">
                                                            <a>
                                                                <div class="symbol-label">
                                                                    <img src="@if ($item->image == NULL )
																							asset/image/person.png
																			@endif {{ $item->image }}" alt="" class="w-100" />
                                                                </div>
                                                            </a>
                                                        </div>
                                                        
                                                        
                                                        <div class="d-flex flex-column">
                                                            <a data-kt-ecommerce-product-filter="product_name" href="{{ url(\'/gsm-assigned/\' . $item->id) }}"
                                                                class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}&nbsp;{{ $item->surname }}</a>
                                                        </div>
                                                        
                                                    </td>
                                                    

                                                    
                                                            <td>{{ $item->gsm_number }}</td>
                                                    
                                                    
                                                    <td>{{ $item->gsm_package_name }}</td>
                                                    
                                                    
                                                    <td>{{ $item->gsm_package_content_name }}</td>
                                                    
														@if ( Auth::user()->yetki == 1)
														<td>
															<div class="d-flex justify-content-end flex-shrink-0">
																	<a href="{{ url(\'/gsm-assigned/\' . $item->gsm_assigned_id . \'/edit\') }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
																		
																		<span class="svg-icon svg-icon-3">
																							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																								fill="none">
																							<path opacity="0.3"
																									d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
																									fill="currentColor" />
																							<path
																									d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
																									fill="currentColor" />
																						</svg>
																			</span>
																		
																	</a>
															</div>
														</td>
														<td class="text-end">
																@csrf
																<a href="javascript:();" onclick="RemoveGSM({{$item->gsm_assigned_id}})" data-id="{{ $item->gsm_assigned_id }}"  class="btn btn-danger px-3 btremove">Remove</a>
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
				
				
                @include(\'include.footer\')
				
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
	
	
	
	<script src="{{ asset(\'asset/js/plugins.bundle.js\') }}"></script>
	<script src="{{ asset(\'asset/js/scripts.bundle.js\') }}"></script>
	
	
	<script src="{{ asset(\'asset/js/product/product.js\') }}"></script>
	<script src="{{ asset(\'asset/js/widgets.bundle.js\') }}"></script>
	<script src="{{ asset(\'asset/js/widgets.js\') }}"></script>
	
	<script>
		function RemoveGSM(id) {
			if (confirm(\'Are you sure you want to remove this GSM assignment?\')) {
				$.ajax({
					url: \'/remove-gsm\',
					type: \'post\',
					data: {
						"_token": "{{ csrf_token() }}",
						gsm_assigned_id: id
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


	<script>
			$(document).ready(function() {
					$(\'table.table-bordered\').DataTable(
						{
								dom: \'Bfrtip\',
								buttons: [
									\'excel\', \'pdf\'
								]
						}
					);
			} );
	</script>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

	
	
</body>


</html>
