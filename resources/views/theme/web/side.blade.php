<div id="kt_aside" class="aside hijau aside-dark aside-hoverable" data-kt-drawer="true"
	data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
	data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
	data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<div class="aside-logo hijau flex-column-auto" id="kt_aside_logo">
		<a href="#">
			<img alt="Logo" src="#" class="h-50px logo" />
		</a>
	</div>
	<div class="aside-menu flex-column-fluid">
		<div class="my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
			data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
			data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
			data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			@if(Auth::user()->role == 'admin')
			
				<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
					id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<span class="menu-link">
							<span class="menu-icon">
								<span class="svg-icon svg-icon-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
										viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
											fill="currentColor" />
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
											fill="currentColor" />
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
											fill="currentColor" />
									</svg>
								</span>
							</span>
							<span class="menu-title ">Dashboards</span>
							<span class="menu-arrow"></span>
						</span>
						<div class="menu-sub menu-sub-accordion menu-active-bg">
							<div class="menu-item">
								<a class="menu-link" href="{{ route('admin.index')}}">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Dashboard</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item">
						<div class="menu-content pt-8 pb-2">
							<span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
						</div>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<a href="{{ route('admin.see') }}"><span class="menu-link">
							<span class="menu-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"></path>
									<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"></rect>
								</svg>
							</span>
							<span class="menu-title">Users</span>
						</span></a>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<a href="{{ route('cars.index') }}"><span class="menu-link">
							<span class="menu-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"></path>
									<path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"></path>
								</svg>
							</span>
							<span class="menu-title">Cars</span>
						</span></a>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<a href="{{ route('orders.index') }}"><span class="menu-link">
							<span class="menu-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor"></path>
									<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor"></path>
									<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor"></path>
								</svg>
							</span>
							<span class="menu-title">Orders</span>
						</span></a>
					</div>
				</div>	

			@elseif(Auth::user()->role == 'rental')

				<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
					id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
					
					<div class="menu-item">
						<div class="menu-content pt-8 pb-2">
							<span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
						</div>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<a href="{{ route('rental.index') }}"><span class="menu-link">
							<span class="menu-icon">
								<span class="svg-icon svg-icon-2">
									<i class="bi bi-calendar-check fs-2"></i>
								</span>
							</span>
							<span class="menu-title">Cars</span>
						</span></a>
					</div>
					<div class="menu-item">
						<div class="menu-content pt-8 pb-2">
							<span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
						</div>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<a href="{{ route('pesanrental.index') }}"><span class="menu-link">
							<span class="menu-icon">
								<span class="svg-icon svg-icon-2">
									<i class="bi bi-calendar-check fs-2"></i>
								</span>
							</span>
							<span class="menu-title">Pesan</span>
						</span></a>
					</div>
				</div>
			@else
				<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
					id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<span class="menu-link">
							<span class="menu-icon">
								<span class="svg-icon svg-icon-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
										viewBox="0 0 24 24" fill="none">
										<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
										<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
											fill="currentColor" />
										<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
											fill="currentColor" />
										<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
											fill="currentColor" />
									</svg>
								</span>
							</span>
							<span class="menu-title ">Dashboards</span>
							<span class="menu-arrow"></span>
						</span>
						<div class="menu-sub menu-sub-accordion menu-active-bg">
							<div class="menu-item">
								<a class="menu-link" href="{{ route('user.index')}}">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Dashboard</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-item">
						<div class="menu-content pt-8 pb-2">
							<span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
						</div>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<a href="{{ route('pesan.index') }}"><span class="menu-link">
							<span class="menu-icon">
								<span class="svg-icon svg-icon-2">
									<i class="bi bi-calendar-check fs-2"></i>
								</span>
							</span>
							<span class="menu-title">Pesan</span>
						</span></a>
					</div>
				</div>	
			@endif
			<!--end::Menu-->
		</div>
		<!--end::Aside Menu-->
	</div>
	<!--end::Aside menu-->
	
</div>