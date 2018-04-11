@extends("front.layout")
@section('content-giangvien')
<div class="m-portlet">
	<div class="m-portlet__body">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Đăng ký Dạy
					</h3>
				</div>
			</div>
		</div>
		<div class="m-section">
			<div class="m-section__content">
				<table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
					<thead>
						<tr>

							<th>
								Id lớp môn học
							</th>
							<th>
								Tên Bộ Môn
							</th>
							<th>
								Số lượng Sinh viên đã đk
							</th>
							<th>Settting</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dataMergen as $item )
						<tr>

							<td>
								{{$item->IdLopMonHoc}}
							</td>
							<td>
								{{$item->TenMonBoMon}}
							</td>
							<td>
								{{$item->CoutSinhvien}}
							</td>
							<td>
								<a  href="#" class=" btn m-btn--pill m-btn--air btn-outline-brand btn-ViewListSinhVien"
								    data-toggle="modal" data-target="#viewlistsinhvien"> Danh Sách Bài Sinh Viên Đã Nộp</a>
								
							</td>
						</tr>
						@endforeach


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection