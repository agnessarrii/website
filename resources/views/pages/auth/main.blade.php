<x-auth-layout title="Masuk">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a href="#" class="mb-12">
            <img alt="Logo" src="#" class="h-200px" />
        </a>
        <div id="page_login">
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" novalidate="novalidate" id="form_login">
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Masuk <br> {{config('app.name')}}</h1>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" id="username" name="username" autocomplete="off" data-login="1" />
                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Kata Sandi</label>
                            <a href="javascript:;" onclick="auth_content('page_forgot');" class="link-primary fs-6 fw-bolder">Tidak Punya Akun ?</a>
                        </div>
                        <input class="form-control form-control-lg form-control-solid" type="password" id="password" name="password" autocomplete="off" data-login="2" />
                    </div>
                    <div class="text-center">
                        <button id="tombol_login" onclick="handle_post('#tombol_login','#form_login','{{route('auth.login')}}');" data-login="3" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div id="page_forgot">
            <a href="#" class="mb-12">
                <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
            </a>
            <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" novalidate="novalidate" id="register-form">
                    <div class="mb-10 text-center">
                        <h1 class="text-dark mb-3">Create an Account</h1>
                        <div class="text-gray-400 fw-bold fs-4">Already have an account?
                        <a href="javascript:;" onclick="auth_content('page_login');" class="link-primary fw-bolder">Sign in here</a></div>
                    </div>
                    <div class="row fv-row mb-7">
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="firstname" autocomplete="off" />
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="lastname" autocomplete="off" />
                        </div>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Username</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="username" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
                    </div>
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label class="form-label fw-bolder text-dark fs-6">Password</label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                    </div>
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="repassword" autocomplete="off" />
                    </div>
                    <div class="text-center">
                        <button type="button" id="register-button" class="btn btn-lg btn-primary" onclick="handle_post('#register-button','#register-form','{{route('auth.register')}}');">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    @section('custom_js')
        <script>
            auth_content('page_login');
        </script>
    @endsection
</x-auth-layout>