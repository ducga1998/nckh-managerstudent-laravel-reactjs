@extends('front.layout') @section('content-sinhvien')

<div class="m-portlet">
<div class="m-portlet__body">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
				Danh Sách Sinh Viên Lớp {{$TenLop}}
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin::Section-->
		<div class="m-section">
			<div class="m-section__content">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>
								ID Sinh Viên
							</th>
							<th>
								Tên Sinh Viên
							</th>
							<th>
								Giới Tính
							</th>

						</tr>
					</thead>
					<tbody>

						@foreach ($ListSinhVien as $ItemSinhVien )
						<tr>
							<th>
								{{$ItemSinhVien["IdSinhVien"]}}
							</th>
							<td>
								{{$ItemSinhVien["TenSv"]}}
							</td>
							<td>
								{{$ItemSinhVien["GioiTinh"]?"Nam":"Nữ"}}
							</td>

						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
		<!--end::Section-->
	</div>
</div>
</div>

@endsection