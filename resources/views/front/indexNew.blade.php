@extends('front.layout')

@section('artical')
<div class="row">
  
        
              @foreach ($posts as $post )
            <div class="col-lg-12">
       <div class="m-portlet m-portlet--success  m-portlet--head-solid-bg m-portlet--bordered">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
                                              
												<h3 class="m-portlet__head-text">
												 <b>Tiêu Đề:</b> {{$post["title"]}}
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
                                           Thời gian post: {{$post["updated_at"]}}
										</div>
									</div>
									<div class="m-portlet__body">
									{!!$post["content"]!!}
									</div>
                                </div>
                            </div>    
                        @endforeach
    
    
 
</div>

@endsection