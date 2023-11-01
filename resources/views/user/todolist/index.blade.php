@extends('layouts.main')

@section('container')
    <body class="g-sidenav-show  bg-gray-100">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="container-fluid">
                <div class="row my-4">
                    <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        {{-- <h6>To-do Lists</h6> --}}
                                        <p class="text-sm mb-0">
                                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                                            <span class="font-weight-bold ms-1">30 done</span> this month
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-5 my-auto text-end">
                                        <div class="dropdown float-lg-end pe-4">
                                            <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v text-secondary"></i>
                                            </a>
                                            <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                                aria-labelledby="dropdownTable">
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                                </li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                        action</a></li>
                                                <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                        else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    {{-- To-do list input --}}
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 col-md-offset-2">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">

                                                        @if (session('message'))
                                                            <div class="alert alert-success">{{ session('message') }}</div>
                                                        @endif

                                                        @if (session('delete'))
                                                            <div class="alert alert-success">{{ session('delete') }}</div>
                                                        @endif

                                                        <a href="{{ route('user.todolist.create') }}"
                                                            class="btn btn-primary">
                                                            Add To-do List
                                                        </a>

                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Description</th>
                                                                    <th>Is Done</th>
                                                                    <th>Action</th>
                                                                    </th>

                                                                    @if (!count($todos))
                                                                <tr>
                                                                    <td colspan="3">No todo</td>
                                                                </tr>
                                                                @endif
                                                                @foreach ($todos as $todo)
                                                                    <tr>
                                                                        <td>{{ $todo->name }}</td>
                                                                        <td>{{ $todo->description }}</td>
                                                                        <td>{{ $todo->is_done ? 'Done' : 'Not Done' }}</td>
                                                                        <td>    
                                                                            {{-- <form action="{{ url('todolist/' . $todo->id . '/edit') }}">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-warning">Edit</a>
                                                                            </form> --}}
                                                                            <form action="{{ url('todolist/' . $todo->id . '/update') }}">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-warning">Update</a>
                                                                            </form>
                                                                            <form action="{{ url('todolist/' . $todo->id . '/delete')}}">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end: To-do list input --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="card h-100">
                            <div class="card-header pb-0">
                                <h6>Orders overview</h6>
                                <p class="text-sm">
                                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                    <span class="font-weight-bold">24%</span> this month
                                </p>
                            </div>
                            <div class="card-body p-3">
                                <div class="timeline timeline-one-side">
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-bell-55 text-success text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-html5 text-danger text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-cart text-info text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April
                                            </h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-credit-card text-warning text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                                #4395133</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="ni ni-key-25 text-primary text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                                development</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                        </div>
                                    </div>
                                    <div class="timeline-block">
                                        <span class="timeline-step">
                                            <i class="ni ni-money-coins text-dark text-gradient"></i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @include('partials.footer')
            </div>
        </main>
    </body>

    @include('partials.toggle')
@endsection
