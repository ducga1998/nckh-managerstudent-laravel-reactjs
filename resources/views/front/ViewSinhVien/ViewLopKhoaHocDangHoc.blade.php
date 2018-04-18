@extends('front.layout') @section('content-sinhvien')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Các Lớp Sinh Viên Đang Học
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
								Tên Giảng Viên
							</th>
							<th>
								Tên Môn
							</th>
							<th>
								Thời gian Bắt đầu
								<th>
									Thời Gian Kết thúc
								</th>
								<th>
									Học
								</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($ArrayInfoKhoaHocDaDk as $itemInfoKhoaHocDaDk )
						<tr>
							<th scope="row">
								{{$itemInfoKhoaHocDaDk->TenGiangVien}}
							</th>
							<td>
								{{$itemInfoKhoaHocDaDk->tenmon}}
							</td>
							<td>
								{{$itemInfoKhoaHocDaDk->infoKhoaHoc['time_start']}}
							</td>
							<td>
								{{$itemInfoKhoaHocDaDk->infoKhoaHoc['time_end']}}
							</td>
							<td>
								<button link="{{url('APICourse')}}" idcourse="{{$itemInfoKhoaHocDaDk->infoKhoaHoc['Id']}}" data-toggle="modal" data-target="#m_modal_4" type="button" class="viewDataCourse   btn btn-focus">
									Bắt Đầu Học
								</button>
							</td>


						</tr>
						@endforeach


					</tbody>
				</table>
			</div>
		</div>
		<!--end::Section-->
	</div>
	<!--end::Form-->
</div>


<div class="m-portlet m-viewdiglog">
	<div class="m-portlet__body">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Lớp Học
					</h3>
				</div>
			</div>
			<div class="m-portlet__head-tools">
				<a href="#" class="btn displayNone btn-outline-danger m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
					<i class="fa fa-close"></i>
				</a>

			</div>
		</div>

	</div>
	<div class="m-section">
		<div class="m-section__content">
				<ul id="menu-main-menu">
  <li class="menu-item-has-children"><a>parent link</a>
    <ul class="sub-menu">
      <li><a href="#">child link</a>
      </li>
      <li><a href="#">child link</a>
      </li>
    </ul>
  </li>

  <li class="menu-item-has-children"><a>parent link</a>
    <ul class="sub-menu">
      <li><a href="#">child link</a>
      </li>
      <li><a href="#">child link</a>
      </li>
    </ul>
  </li>
</ul>
		</div>
	</div>
</div>

@endsection