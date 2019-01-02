@extends("admin_view/layout")
@section("judul","List Buku")
@section("content")
	<form action="{{url('/admin')}}" method="get">
		Cari Buku: <input type="text" name="cari">
		<button type="submit">Cari</button>
	</form>
	@if(count($list) == 0)
		<div class="alert alert-danger">Buku tidak ditemukan</div>
	@else
		<table class="table table-bordered">
			<tr>
				<th>No.</th>
				<th>Nama Buku</th>
				<th>Kategori</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Harga Satuan</th>
				<th>Stok Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Harus Kembali</th>
				<th>Foto Buku</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<?php $no =$list->firstItem();?>
			@foreach($list as $li)
				<tr>
					<td>{{$no}}</td>
					<td>{{$li->nama_buku}}</td>
					<td>{{$li->nama_kategori}}</td>
					<td>{{$li->pengarang}}</td>
					<td>{{$li->penerbit}}</td>
					<td>{{$li->harga_satuan}}</td>
					<td>{{$li->stok_buku}}</td>
					<td>{{Carbon::parse($li->tanggal_pinjam)->format("l, d-m-Y")}}</td>
					<td>{{Carbon::parse($li->tanggal_pinjam)->addDays(7)->format("l, d-m-Y")}}</td>
					<td>
						<img src="{{asset('img/buku/'.$li->foto_buku)}}" width="100" height="100">
					</td>
					<td>
						<a href="{{url('admin/buku/ubah/'.$li->id_buku)}}" class="btn btn-info">Ubah</a>
					</td>
					<td>
						<a href="{{url('admin/buku/hapus/'.$li->id_buku)}}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin mau menghapus {{$li->nama_buku}} ?');">Hapus
					</td>
				</tr>
				<?php $no++;?>
			@endforeach
		</table>
		{{$list->links()}}
	@endif
@endsection

