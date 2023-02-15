<div>
    <div class="row align-items-start">
        {!! Form::open([
            'wire:submit.prevent' => 'submit()',
            'autocomplete' => 'off',
            'class' => 'form-horizontal fv-form fv-form-bootstrap4',
        ]) !!}
        <div class="align-self-center col-lg-12 offset-lg-0 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 offset-0">
            <div class="form-group text-center text-sm-center">
                <div class="row">
                    <div class="col-10 offset-1 col-sm-6 offset-sm-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="อีเมล์" type="email"
                                data-error-validation-msg="Not a valid email address" wire:model='email'>
                            @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="offset-1 col-10 offset-sm-3 col-sm-6 col-lg-6 offset-lg-3 col-md-6 offset-md-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="รหัสผ่าน" wire:model='password1'
                                type="password">
                            @error('password1')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-10 offset-1 offset-sm-3 col-sm-6 col-lg-6 offset-lg-3 col-md-6 offset-md-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="ยืนยันรหัสผ่าน" wire:model='password2'
                                type="password">
                            @error('password2')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                            @error('checkpassword')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="align-self-center col-lg-12 offset-lg-0 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 offset-0">
            <div class="form-group text-center text-sm-center">
                <div class="row">
                    <div class="col-md-2 cardfit col-sm-2 col-4">
                        <div class="form-group">
                            {!! Form::select('title_th', ['นาย' => 'นาย', 'นางสาว' => 'นางสาว', 'นาง' => 'นาง'], $title_th, [
                                'wire:model' => 'title_th',
                                'class' => 'form-control field-style',
                                'placeholder' => 'คำหน้า',
                            ]) !!}
                            @error('title_th')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="ชื่อ" wire:model="fname_th">
                            @error('fname_th')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 col-8 offset-lg-0 offset-md-0 offset-sm-2 offset-4">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="นามสกุล" wire:model="lname_th">
                            @error('lname_th')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 cardfit col-sm-3 offset-sm-0 col-3">
                        <div class="form-group">
                            {!! Form::select('sex', ['ชาย' => 'ชาย', 'หญิง' => 'หญิง'], $sex, [
                                'wire:model' => 'sex',
                                'class' => 'form-control field-style',
                                'placeholder' => 'เพศ',
                            ]) !!}
                            @error('sex')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 offset-lg-0 offset-md-0 col-lg-4 offset-sm-0 col-sm-5 offset-0 cardfti2 col-7">
                        <div>
                            <input class="form-control field-style" placeholder="วัน เดือน ปีเกิด" type="date"
                                wire:change='setAge($event.target.value)' wire:model='birthday'>
                        </div>
                        @error('birthday')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div
                        class="offset-lg-0 offset-md-0 col-md-3 col-lg-3 offset-sm-0 col-sm-3 offset--1 cardfti2 col-4">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="อายุ" type="number" wire:model='age'>
                        </div>
                        @error('age')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-6 offset-0 col-md-7 col-sm-8 col-12">
                        <div class="form-group">
                            {!! Form::select('std_school_id', [1 => 'โรงเรียนมีชัยพัฒนา'], $std_school_id, [
                                'wire:model' => 'std_school_id',
                                'class' => 'form-control field-style',
                                'placeholder' => 'โรงเรียนของนักเรียน',
                            ]) !!}
                            @error('std_school_id')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-9">
                        <div class="form-group">
                            {!! Form::select(
                                'teacher_position',
                                [1 => 'ครูผู้ช่วย', 2 => 'ครู ค.ศ. 1', 3 => 'ครู ค.ศ. 2', 4 => 'ครู ค.ศ. 3', 5 => 'ครู ค.ศ. 4', 6 => 'ครู ค.ศ. 5'],
                                $teacher_position,
                                [
                                    'wire:model' => 'teacher_position',
                                    'class' => 'form-control field-style',
                                    'placeholder' => 'ตำแน่งครู',
                                ],
                            ) !!}
                            @error('teacher_position')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div
                        class="offset-lg-0 offset-md-0 offset-sm-0 offset-0 cardfti2 col-lg-5 col-md-5 col-sm-6 col-11">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="เบอร์โทร" wire:model='phone'>
                        </div>
                        @error('phone')
                            <small class="text-danger">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="offset-lg-0 offset-md-0 offset-sm-0 col-10 offset-1 col-lg-10 col-md-8 col-sm-8">
                        <div class="text-center text-lg-left container-div-bloc-29-style">
                            <div class="form-check checkbox-style form-check-inline">
                                <input class="form-check-input" type="checkbox" wire:model='check_readed'
                                    data-validation-minchecked-minchecked="1"
                                    data-validation-minchecked-message="ฉันอ่านและยอมรับ ข้อตกลงการใช้บริการ"
                                    id="input_1228" name="input_1228">
                                <label class="form-check-label @error('check_readed') text-danger @enderror">
                                    ฉันอ่านและยอมรับ นโยบายของเรา
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-d btn-lg btn-ตกลง-style">ตกลง</button>
                    {{-- <a href="html/teacher/login-teacher.php" class="btn btn-d btn-lg btn-ตกลง-style">ตกลง<br></a> --}}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
