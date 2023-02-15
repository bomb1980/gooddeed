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
                    <div class="col-md-5 col-10 offset-1 offset-md-3 col-sm-6 offset-sm-3 col-lg-6 offset-lg-3">
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
                    <div class="col-md-5 col-10 offset-1 offset-md-3 col-sm-6 offset-sm-3 col-lg-6 offset-lg-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="รหัส ID นักเรียนของท่าน" id="std_code" wire:model="std_code">
                            @error('std_code')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 offset-1 col-10 offset-md-3 offset-sm-3 col-sm-6 col-lg-6 offset-lg-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="อีเมล์" type="email" data-error-validation-msg="Not a valid email address" wire:model="email">
                            @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 offset-1 col-10 offset-md-3 offset-sm-3 col-sm-6 col-lg-6 offset-lg-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="รหัสผ่าน" type="password" wire:model="password1">
                            @error('password1')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-5 offset-1 col-10 offset-md-3 offset-sm-3 col-sm-6 col-lg-6 offset-lg-3">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="ยืนยันรหัสผ่าน" type="password" wire:model="password2">
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
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="ความสัมพันธ์" wire:model="relationship">
                            @error('relationship')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div
                        class="offset-md-0 offset-sm-0 offset--1 cardfti2 offset-lg-0 col-lg-5 col-md-4 col-sm-4 col-7">
                        <div class="form-group">
                            <input class="form-control field-style" placeholder="เบอร์โทร" wire:model="phone">
                            @error('phone')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="offset-lg-0 offset-md-0 offset-sm-0 col-10 offset-1 col-lg-10 col-md-8 col-sm-10">
                        <div class="text-center text-lg-left container-div-bloc-29-style">
                            <div class="form-check checkbox-style form-check-inline">
                                <input class="form-check-input" type="checkbox" wire:model="check_readed"
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
                    <button type="submit" class="btn btn-d btn-lg btn-ยืนยัน-style">ตกลง</button>
                    {{-- <a href="html/parent/login-parent.php" class="btn btn-d btn-lg btn-ยืนยัน-style">ตกลง<br></a> --}}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
