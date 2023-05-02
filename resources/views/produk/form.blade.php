<div class="modal fade" id="modal-produk" tabindex="-1" aria-labelledby="modal-produk" aria-hidden="true">
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
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <!--begin::Input group-->
                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Kode Produk</span>
                            </label>
                            <input type="text" name="kode_produk" id="kode_produk" class="form-control"
                                placeholder="Masukkan Kode Produk" required autofocus>
                        </div>
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Merk Produk</span>
                            </label>
                            <input type="text" name="merk" id="merk" class="form-control"
                                placeholder="Masukkan Merk" required>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Nama Produk</span>
                            </label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control"
                                placeholder="Masukkan Nama Produk" required>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Berat Produk</span>
                            </label>
                            <input type="text" name="berat" id="berat" class="form-control"
                                placeholder="Masukkan Berat" required>
                            <div class="text-muted fs-7 mt-2">* Gunakan titik setelah bilangan bulat
                            </div>
                        </div>
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Harga Jual</span>
                            </label>
                            <input type="number" name="harga_jual" id="harga_jual" class="form-control"
                                placeholder="Masukkan Harga" required>
                        </div>
                        <div class="col">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Kategori</span>
                            </label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="" selected disabled>-- Pilih --</option>
                                @foreach ($kategori as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Foto</span>
                            </label>
                            <input type="file" class="form-control" id="image" name="image">
                            <div class="text-muted fs-7 mt-2">* Hanya file gambar *.png, *.jpg dan *.jpeg yang diterima
                            </div>
                            <div class="tampil-foto">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span>Stok</span>
                            </label>
                            <input type="number" name="stok" id="stok" class="form-control"
                                placeholder="Masukkan stok">
                            <div class="text-muted stoktxt fs-7 mt-2"></div>
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
