@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.user.store')}}" method="POST" class="col-2">
                            @csrf
                            <div class="form-group">
                                <label >Имя</label>
                                <input type="text"  class="form-control " name="name"  placeholder="Имя пользователя">
                                @error('name')
                                <div class="text-danger">{{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label >Email</label>
                                <input type="text"  class="form-control " name="email"  placeholder="Email">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Выберите пользователя</label>
                                <select name="role"class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}" {{$id == old('role_id ') ? 'selected' : ''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
