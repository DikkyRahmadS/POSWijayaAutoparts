<section class="produk">
    <div class="container">
        <div class="row align-item-center">
            <div class="col-5">
                <h3 class="fw-bold">Produk</h3>
            </div>
        </div>

        <div class="row">
            @foreach ($produks as $produk)
                <div class="col-lg-3">
                    <div class="card card-body p-4">
                        <img src="{{ Storage::url($produk->image) }}" class="img-fluid" alt="">
                        <h3 class="merk">{{ $produk->nama_produk }}</h3>

                        <div class=" d-flex flex-column mt-3">
                            <p class="harga fs-4">{{ $produk->berat }} kg</p>
                            <p class="harga fs-4">@currency($produk->harga_jual)</p>
                        </div>
                        <a href="#" class="btn btn-primary">Tambah ke Cart</a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</section>
