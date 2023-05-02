<div class="modal fade" id="modal-supplier" tabindex="-1" aria-labelledby="modal-supplier" aria-hidden="true">
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-5">
                <!--begin::Form-->
                <form action="" method="post" class="form-horizontal">
                    @csrf
                    @method('post')

                    <!--begin::Input group-->
                    <div class="row pb-3">
                        <div class="col">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span>Nama Supplier</span>
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="Masukkan Nama Supplier" required autofocus>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column mb-7 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span>No Telepon</span>
                                </label>
                                <div class="col-sm-12">
                                    <input type="number" name="no_hp" id="no_hp" class="form-control"
                                        placeholder="Masukkan No Hp Supplier" required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-7 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span>Alamat</span>
                        </label>
                        <div class="col-sm-12">
                            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Supplier" rows="3" required></textarea>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-5">
                        <button type="button" id="kt_modal_new_card_cancel" class="btn btn-light me-3"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
