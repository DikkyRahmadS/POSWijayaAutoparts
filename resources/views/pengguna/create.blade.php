<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Tambah Pengguna</h2>
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
                <form action="{{ url('pengguna') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Input group-->
                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Nama Karyawan</span>
                            </label>
                            {!! Form::text('nama', '', [
                                'class' => 'form-control',
                                'placeholder' => 'Masukkan Nama ',
                                'required',
                            ]) !!}
                        </div>

                    </div>

                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>PIN</span>
                            </label>
                            {!! Form::text('pin', '', [
                                'class' => 'form-control',
                                'placeholder' => 'Masukkan PIN',
                                'required',
                            ]) !!}
                            <div class="text-muted fs-7 mt-2">* Di isi dengan 6 angka</div>
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
                        </div>
                    </div>

                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="button" id="kt_modal_new_card_cancel" class="btn btn-light me-3"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
