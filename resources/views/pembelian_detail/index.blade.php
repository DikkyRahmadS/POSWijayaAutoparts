@extends('layouts.master')
@section('menu', 'Menu')
@section('title', 'Detail Pembelian Produk')

@push('css')
    <style>
        .tampil-bayar {
            color: white;
            font-size: 5em;
            text-align: center;
            height: 100px;
        }

        .tampil-terbilang {
            padding: 10px;
            background: #f0f0f0;
        }

        .table-pembelian tbody tr:last-child {
            display: none;
        }

        @media(max-width: 768px) {
            .tampil-bayar {
                font-size: 3em;
                height: 70px;
                padding-top: 5px;
            }
        }
    </style>
@endpush
@section('content')

    <div class="card card-flush">
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header with-border mt-5 mb-5">
                            <table>
                                <tr>
                                    <td>Supplier</td>
                                    <td>: {{ $supplier->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>: {{ $supplier->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $supplier->alamat }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="box-body mt-5 mb-5">
                            <form class="form-produk">
                                @csrf
                                <div class="form-group row">
                                    <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                            <input type="hidden" name="pembelian_id" id="pembelian_id"
                                                value="{{ $id_pembelian }}">
                                            <input type="hidden" name="produk_id" id="produk_id">
                                            <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                                            <span class="input-group-btn">
                                                <a href="#" onclick="tampilProduk()" class="btn btn-info btn-flat"
                                                    type="button"><i class="fa fa-arrow-right"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <table class="table align-middle table-row-dashed table-pembelian fs-6 gy-5"
                                id="detail_pembelian">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th width="5%">No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th width="15%">Harga</th>
                                        <th width="10%">Jumlah</th>
                                        <th>Subtotal</th>
                                        <th><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                            </table>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="tampil-bayar bg-primary"></div>
                                    <div class="tampil-terbilang"></div>
                                </div>
                                <div class="col-lg-4">
                                    <form action="{{ route('pembelian.store') }}" class="form-pembelian" method="post">
                                        @csrf
                                        <input type="hidden" name="id_pembelian" value="{{ $id_pembelian }}">
                                        <input type="hidden" name="total" id="total">
                                        <input type="hidden" name="total_item" id="total_item">
                                        <input type="hidden" name="bayar" id="bayar">

                                        <div class="form-group row">
                                            <label for="totalrp" class="col-lg-2 control-label">Total</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="totalrp" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label for="diskon" class="col-lg-2 control-label">Diskon</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="diskon" id="diskon" class="form-control"
                                                    value="0">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label for="bayar" class="col-lg-2 control-label">Bayar</label>
                                            <div class="col-lg-8">
                                                <input type="text" id="bayarrp" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat btn-simpan"
                                style="float: right;"><i class="fa fa-floppy-o"></i> Simpan Transaksi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('pembelian_detail.produk')
    </div>
@endsection

@push('scripts')
    <script>
        let table, table2;

        $(function() {
            table = $('#detail_pembelian').DataTable({
                    responsive: true,
                    processing: true,
                    autoWidth: false,
                    ajax: {
                        url: '{{ route('pembeliandetail.data', $id_pembelian) }}',
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'kode_produk'
                        },
                        {
                            data: 'nama_produk'
                        },
                        {
                            data: 'harga_beli'
                        },
                        {
                            data: 'jumlah'
                        },
                        {
                            data: 'subtotal'
                        },
                        {
                            data: 'aksi',
                            searchable: false,
                            sortable: false
                        },
                    ],
                    dom: 'Brt',
                    bSort: false,
                    paginate: false
                })
                .on('draw.dt', function() {
                    loadForm($('#diskon').val());
                });
            table2 = $('#table-produk').DataTable();

            $(document).on('input', '.quantity, .harga_beli', function() {
                let id = $(this).data('id');
                let jumlah = parseInt($('.quantity[data-id=' + id + ']').val());
                let harga_beli = parseInt($('.harga_beli[data-id=' + id + ']').val());

                if ($(this).hasClass('quantity')) {
                    if (jumlah < 1) {
                        $(this).val(1);
                        alert('Jumlah tidak boleh kurang dari 1');
                        return;
                    }
                    if (jumlah > 10000) {
                        $(this).val(10000);
                        alert('Jumlah tidak boleh lebih dari 10000');
                        return;
                    }
                } else if ($(this).hasClass('harga_beli')) {
                    if (harga_beli < 1) {
                        $(this).val(1);
                        alert('Harga tidak boleh kurang dari 1');
                        return;
                    }
                    if (harga_beli > 1000000) {
                        $(this).val(1000000);
                        alert('Harga tidak boleh lebih dari 1.000.000');
                        return;
                    }
                }

                $.post(`{{ url('/pembeliandetail') }}/${id}`, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'put',
                        'jumlah': jumlah,
                        'harga_beli': harga_beli
                    })
                    .done(response => {
                        $(this).on('mouseout', function() {
                            table.ajax.reload(() => loadForm($('#diskon').val()));
                        });
                    })
                    .fail(errors => {
                        toastr.error('Data Gagal Disimpan!', {
                            fadeAway: 1000
                        });
                    });
            });

            $(document).on('input', '#diskon', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($(this).val());
            });

            $('.btn-simpan').on('click', function() {
                $('.form-pembelian').submit();
            });
        });

        function tampilProduk() {
            $('#produkModal').modal('show');
        }

        function hideProduk() {
            $('#produkModal').modal('hide');
        }

        function pilihProduk(id, kode) {
            $('#produk_id').val(id);
            $('#kode_produk').val(kode);
            hideProduk();
            tambahProduk();
        }

        function tambahProduk() {
            $.post('{{ route('pembeliandetail.store') }}', $('.form-produk').serialize())
                .done(response => {
                    $('#kode_produk').focus();
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                })
                .fail(errors => {
                    toastr.error('Data Gagal Disimpan!', {
                        fadeAway: 1000
                    });
                });
        }

        function deleteData(url) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(url, {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete'
                        })
                        .done((response) => {
                            toastr.success('Data Berhasil Dihapus!', {
                                fadeAway: 1000
                            });
                            table.ajax.reload(() => loadForm($('#diskon').val()));
                        })
                        .fail((errors) => {
                            toastr.error('Tidak Dapat Menghapus Data!', {
                                fadeAway: 1000
                            });
                        });
                }
            })
        }

        function loadForm(diskon = 0) {
            $('#total').val($('.total').text());
            $('#total_item').val($('.total_item').text());

            $.get(`{{ url('/pembeliandetail/loadform') }}/${diskon}/${$('.total').text()}`)
                .done(response => {
                    $('#totalrp').val('Rp. ' + response.totalrp);
                    $('#bayarrp').val('Rp. ' + response.bayarrp);
                    $('#bayar').val(response.bayar);
                    $('.tampil-bayar').text('Rp. ' + response.bayarrp);
                    $('.tampil-terbilang').text(response.terbilang);
                })
                .fail(errors => {
                    toastr.error('Tidak Dapat Menampilkan Data!', {
                        fadeAway: 1000
                    });
                })
        }
    </script>
@endpush
