@extends('admin')
@section('content')
   <!-- Sale & Revenue Start -->
   <div class="container-fluid pt-4 px-4">
       <div class="row g-4">
           <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                   <i class="fa fa-chart-line fa-3x text-primary"></i>
                   <div class="ms-3">
                       <p class="mb-2">Today Sale</p>
                       <h6 class="mb-0">$1234</h6>
                   </div>
               </div>
           </div>
           <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                   <i class="fa fa-chart-bar fa-3x text-primary"></i>
                   <div class="ms-3">
                       <p class="mb-2">Total Sale</p>
                       <h6 class="mb-0">$1234</h6>
                   </div>
               </div>
           </div>
           <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                   <i class="fa fa-chart-area fa-3x text-primary"></i>
                   <div class="ms-3">
                       <p class="mb-2">Today Revenue</p>
                       <h6 class="mb-0">$1234</h6>
                   </div>
               </div>
           </div>
           <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                   <i class="fa fa-chart-pie fa-3x text-primary"></i>
                   <div class="ms-3">
                       <p class="mb-2">Total Revenue</p>
                       <h6 class="mb-0">$1234</h6>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Sale & Revenue End -->

   <!-- Table Cate Start -->
   <div class="container-fluid pt-4 px-4">
       <div class="bg-light text-center rounded p-4">
           <div class="d-flex align-items-center justify-content-between mb-4">
               <h5 class="mb-0">Tất cả tin tức</h5>
               <a href="{{ route('news.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Thêm tin tức</a>
           </div>
            <div class="container-fluid">
            @include('layouts.admin.News.component.filter',['categories'=>$categories])
            </div>
           <div class="table-responsive mb-3" style="height: 80vh">
               <table class="table text-start align-middle table-bordered table-hover mb-0" >
                   <thead>
                       <tr class="text-dark">
                           <th scope="col">Action</th>
                           <th scope="col">Tên tin tức</th>
                           <th scope="col">Danh mục</th>
                           <th scope="col">Tác giả</th>
                           <th scope="col">Số lượng tag</th>
                           <th scope="col">Trạng thái</th>
                       </tr>
                   </thead>
                   <tbody>
                        @forelse ($news as $n)
                            <tr title="{{$n->title}}">
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <a class="btn btn-sm btn-primary me-2" href="{{ route('news.edit', ['id' => $n->id]) }}">Detail</a>
                                        <form action="{{ route('news.delete', ['id' => $n->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-wrap">{{$n->title}}</td>
                                <td>{{$n->category->name}}</td>
                                <td>{{$n->author}}</td>
                                <td><button class='btn btn-primary'>{{count($n->tags)}}</button></td>
                                <td>{{$n->show_hide ? 'Hiện' : 'Ẩn'}}</td>
                            </tr>
                        @empty
                            <tr><th colspan="10" class="text-center m-3">Không tìm thấy kết quả</th></tr>
                        @endforelse                      
                   </tbody>
               </table>
           </div>
            @isset($paginate)
                {{ $paginate->links('pagination::bootstrap-5') }}
                
            @endisset
       </div>
   </div>
   <!-- Table Cate End -->
@endsection 