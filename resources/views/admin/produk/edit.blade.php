@extends('layouts.admin')

@section('content')
<div class="py-4">
    <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <strong>Produk</strong> Edit
          </div>
          <div class="card-body card-block">
            <form action="{{ route('admin.produk.edit') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <input type="hidden" name="id" value="{{ $produk->id }}">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Produk</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama" value="{{ $produk->nama }}" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Harga Produk</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="harga" value="{{ $produk->harga }}" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Deskripsi</label></div>
                    <div class="col-12 col-md-9"><textarea name="deskripsi" id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{ $produk->deskripsi }}</textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                    <div class="col-12 col-md-9">
                    <select name="kategori" id="select" class="form-control">
                        <option value="0" disabled selected>Please select</option>
                        <option value="makanan" {{ ($produk->kategori == 'makanan') ? 'selected' : '' }}>Makanan</option>
                        <option value="minuman" {{ ($produk->kategori == 'minuman') ? 'selected' : '' }}>Minuman</option>
                    </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                  </button>
                  <a href="{{ route('admin.produk') }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Cancel
                  </a>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection