<div class="container-fluid" style="width: 75rem;">
    <div class="row">
        {{-- <div class="col-md-3 mt-4 me-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div> --}}

        @foreach ($produks as $produk)
            <div class="card mt-4 me-4 mb-4 pb-4 shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 18rem;"ss>
                <img src="{{ Storage::url($produk->image) }}" class="card-img-top" alt="..." width="20px"
                    height="170px">
                <p class="card-title fs-4 fw-bold">{{ $produk->kode_produk }}</p>
                <p class="card-title fs-4 fw-bold">{{ $produk->nama_produk }}</p>
                <p class="card-text">{{ $produk->kategori->nama_kategori }}</p>
                <p class="card-text">{{ $produk->berat }} gram</p>
                <p class="card-text">Rp {{ $produk->harga_jual }}</p>
                <a href="#" class="btn btn-primary">Tambah ke Cart</a>
            </div>
        @endforeach

    </div>
</div>
