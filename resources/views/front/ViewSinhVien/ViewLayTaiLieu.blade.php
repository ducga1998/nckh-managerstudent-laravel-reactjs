@extends('front.layout')
@section('content-sinhvien')
<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                    <i class="fa fa-calendar-o"></i>  Lấy Tài liệu
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
                              ID Môn
                            </th>
                            <th>Tên Môn</th>
                            <th>
                               Số Tín Chỉ
                            </th>
                            <th>
                               Bộ Mộn
                            </th>
                              <th>
                              Lấy Tài liệu
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- +idmon: 2 +IdLopMonHoc: "N0-1-2-NKCA" +TenMonBoMon: "TRIET-HamLoz" +CoutSinhvien: 1 +Listsinhvien: array:1 +checkDkMonHoc:
                        false --}} @foreach ($AllMon as $item )
                      <tr>

                            <td>
                                {{$item['IdMon']}}
                            </td>
                            <td>
                                {{$item['TenMon']}}
                                
                            </td>
                            <td>
                                {{$item['SoTinChi']}}
                               
                            </td>
                            <td>
                                {{$item['BoMon']}}
                               
                            </td>
                            
                            <td>
                                <button link="{{url('ApiTaiLieu')."/".$item['IdMon']}}" data-toggle="modal" data-target="#xemtailieu" idmon="{{$item['IdMon']}}" type="button" class=" btn-viewtailieumodal btn m-btn--pill    btn-primary">
															 Lấy tài liệu
														</button>
                               
                        </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade show" id="xemtailieu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
										Tài Liệu 
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body LayTaiLieu">
										Loading.....
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">
											Close
										</button>
										
									</div>
								</div>
							</div>
						</div>
@endsection