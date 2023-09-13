@extends('admin.layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>ToDo list</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">ToDo</li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">ToDo list</h5>
                                </div>
                            </div>
                            @foreach ($todos as $todo)
                                @php 
                                    $todo = json_decode($todo->details);
                                @endphp 
                                <div class="card p-2" style="border: 2px solid;">
                                    <div class="row">
                                        @foreach($todo as $k => $t)
                                            @if($k == "data")
                                                @foreach ($t as $dk => $d)
                                                    <div class="col-4">
                                                        <label for=""><b>{{ $dk }}</b></label>
                                                        <input class="form-control" value="{{ $d }}" disabled>
                                                    </div>
                                                @endforeach
                                            @else 
                                                <div class="col-4">
                                                    <label for=""><b>{{ $k }}</b></label>
                                                    <input class="form-control" value="{{ $t }}" disabled>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

