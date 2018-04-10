@extends('front.layout',['NameAdmin' =>"csacsacsa",'GmailAdmin'=>"csacascsacsa"])
@section('m-content')
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
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        Id Lớp Môn Hoc
                    </th>
                    <th>Tên Môn- Bộ môn</th>
                    <th>
                       Số Lượng Sinh Viên Đã đăng ký vào
                    </th>
                    <th>
                      View Danh Sách
                    </th>
                    <th>
                        Đăng ký Dạy 
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($array as $item )
                     <tr>
                    <th scope="row">
                       {{$item->IdLopMonHoc}}
                    </th>
                    <td>
                        {{$item->TenMonBoMon  }}
                    </td>
                    <td>
                       {{$item->CoutSinhvien}}
                    </td>
                    <td>
                       <a  data-toggle="modal" data-target="#viewlistsinhvien" IdLopMonHoc="{{$item->IdLopMonHoc}}" href="#"  class="btn btn-deauft btn-ViewListSinhVien">Hiện thị danh sách</a>
                    </td>
                    <td>
                        @if($item->Checkgiangvien==0)
						  <button idget={{$item->IdLopMonHoc}} data-toggle="modal" data-target="#viewlistgiangvien"  idlopmonhoc="{{$item->IdLopMonHoc}}"  
							type="button" class="btn btn-danger btn-dkLopGiangVien">
												Chưa có người dạy
											</button>
                      @else
                        <button idlopmonhoc="{{$item->IdLopMonHoc}}"  type="button" class="btn btn-success btn-huydk">
											{{$item->TenGiangVienDK}} Đã dạy
											</button>
                            @endif
                    </td> 
                </tr>
                @endforeach
               </tbody>
        </table>
    </div>
</div>
	</div>
</div>
{{-- modal view list sinh vien --}}
<button style="width:0px;height:0px;padding:0px" type="button" class="btn btn-warning btn-modal"></button>
<div class="modal fade show" id="viewlistsinhvien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
										List Sinh Viên
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="m-section__content">
										<table class="table table-sm m-table m-table--head-bg-brand">
											<thead class="thead-inverse">
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
													<th>
														Khóa học
													</th>
												</tr>
											</thead>
											<tbody class="viewlistsinhvien">
												
											</tbody>
										</table>
									</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
								</div>
							</div>
						</div>



						<div class="modal fade show" id="viewlistgiangvien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">
										Chọn Giảng Viên Dạy Lớp Đang chọn ...
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="m-section__content">
										<table class="table table-sm m-table m-table--head-bg-brand">
											<thead class="thead-inverse">
												<tr>
													<th>
														ID Giảng Viên
													</th>
													<th>
													Tên Giảng Viên
													</th>
													<th>
														Bộ Môn
													</th>
													<th>
														Gmail
													</th>
													<th>
														Setting
													</th>
												</tr>
											</thead>
											<tbody>
													@foreach ($arrayGiangVien as $item)
												<tr>
													<th>
													{{$item['IdGiangVien']}}
													</th>
													<td>
													{{$item['TenGiangVien']}}
													</td>
													<td>
													{{$item['BoMon']}}
													</td>
													<td>
														{{$item['Gmail']}}
													</td>
													<td>
														<button idlopmonhoc="" idgiangvien="{{$item['IdGiangVien']}}" type="button" class="daylophocnay btn m-btn--pill  btn-outline-brand m-btn m-btn--outline-2x ">
															Dạy 
															</button>
													</td>

												</tr>
												@endforeach
											
														
												
											</tbody>
										</table>
									</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										
									</div>
								</div>
							</div>
						</div>
@endsection