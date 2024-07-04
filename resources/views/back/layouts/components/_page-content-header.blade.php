<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">{{ $page_title }}</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb as $item)
                        @if ($loop->last)
                            <li class="breadcrumb-item active">{{ $item['name'] }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{route($item['route'])}}">{{ $item['name'] }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
