<div class="modal fade" id="modal-pengguna" tabindex="-1" aria-labelledby="modal-pengguna" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="modal-title"></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form action="" method="POST" enctype="multipart/form-data" data-method="">
                    @csrf
                    @method('post')
                    <!--begin::Input group-->
                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Nama Karyawan</span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Masukkan Nama" required autofocus>
                        </div>
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Email Karyawan</span>
                            </label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Masukkan Email" required>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Password</span>
                            </label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan Password" minlength="6">
                            <div class="text-muted passtxt fs-7 mt-2"></div>
                        </div>

                        <div class="col pb-3">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Nama Posisi</span>
                            </label>
                            <select name="role" class="form-control">
                                <option value="" disabled selected>-- Pilih Posisi -- </option>
                                <option value="1">Admin</option>
                                <option value="0">Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Foto</span>
                            </label>
                            <input type="file" class="form-control" id="image" name="image">
                            <div class="text-muted fs-7 mt-2">* Hanya file gambar *.png, *.jpg dan *.jpeg yang diterima
                            </div>
                            <br>
                            <div class="tampil-foto">
                            </div>
                        </div>
                    </div>

                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="button" id="kt_modal_new_card_cancel" class="btn btn-light me-3"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
