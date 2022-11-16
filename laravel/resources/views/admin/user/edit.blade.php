@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировать пользователя</h1>
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
                        <form action="{{route('admin.user.update',$user->id)}}" method="POST" class="col-2">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text"  class="form-control " name="name"  placeholder="Название пользователя" value="{{$user->name}}">
                                @error('name')
                                <div class="text-danger">Пустое поле </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >Название</label>
                                <input type="text"  class="form-control " name="email"  placeholder="Email"  value="{{$user->email}}">
                                @error('email')
                                <div class="text-danger">Пустое поле </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <div class="form-group">
                                <label>Выберите пользователя</label>
                                <select name="role"class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}" {{$id == old('role_id ') ? 'selected' : ''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Обновить">
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
