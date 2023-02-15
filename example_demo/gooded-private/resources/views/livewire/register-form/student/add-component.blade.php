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
                    <div class="col-lg-6 col-md-5 col-sm-6 offset-0 col-10 offset-lg-3">
                        <div class="form-group">
                            {!! Form::select('std_school_id', [1 => 'มีชัยพัฒนา'], $std_school_id, [
                                'wire:model' => 'std_school_id',
                                'class' => 'form-control field-style',
                                'placeholder' => 'เลือกโรงเรียน',
                            ]) !!}
                            @error('std_school_id')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-7 col-lg-4 offset-lg-3">
                        <div class="form-group">
                            {!! Form::select(
                                'std_school_type_id',
                                [1 => 'ประถมต้น', 2 => 'ประถมปลาย', 3 => 'มัธยมต้น', 4 => 'มัธยมปลาย'],
                                $std_school_type_id,
                                ['wire:model' => 'std_school_type_id', 'class' => 'form-control field-style', 'placeholder' => 'ระดับชั้นเรียน'],
                            ) !!}
                            @error('std_school_type_id')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3 col-lg-2 col-md-3 col-sm-2">
                        <div class="form-group">
                            {!! Form::select(
                                'std_grade',
                                [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6'],
                                $std_grade,
                                ['wire:model' => 'std_grade', 'class' => 'form-control field-style', 'placeholder' => 'ปี'],
                            ) !!}
                            @error('std_grade')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="offset-1 col-10 col-lg-6 col-md-6 offset-md-3 col-sm-6 offset-sm-3 offset-lg-3">
                        <div class="form-group">
                            {{ Form::text('std_code', $std_code, [
                                'wire:model' => 'std_code',
                                'id' => 'std_code',
                                'class' => 'form-control field-style',
                                'autocomplete' => 'off',
                                // 'maxlength' => 100,
                                'placeholder' => 'รหัสประจำตัวนักเรียน',
                            ]) }}
                            @error('std_code')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                            {{-- <input class="form-control field-style" placeholder="รหัสประจำตัวนักเรียน" required=""> --}}
                        </div>
                    </div>
                    <div class="col-10 offset-1 col-lg-6 col-md-6 offset-md-3 col-sm-6 offset-sm-3 offset-lg-3">
                        <div class="form-group">
                            {{ Form::email('std_email', $std_email, [
                                'wire:model' => 'std_email',
                                'id' => 'std_email',
                                'class' => 'form-control field-style',
                                'data-error-validation-msg' => 'Not a valid email address',
                                'autocomplete' => 'off',
                                // 'maxlength' => 100,
                                // 'required',
                                'placeholder' => 'อีเมล์',
                            ]) }}
                            @error('std_email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                            {{-- <input class="form-control field-style" placeholder="อีเมล์" required="" type="email"
                                data-error-validation-msg="Not a valid email address"> --}}
                        </div>
                    </div>
                    <div class="offset-1 col-10 col-lg-6 col-md-6 offset-md-3 col-sm-6 offset-sm-3 offset-lg-3">
                        <div class="form-group">
                            <input type="password" class="form-control field-style" wire:model="password1" id="password1" placeholder="รหัสผ่าน" >
                            @error('password1')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="offset-1 col-10 col-lg-6 col-md-6 offset-md-3 col-sm-6 offset-sm-3 offset-lg-3">
                        <div class="form-group">
                            <input type="password" class="form-control field-style" wire:model="password2" id="password2" placeholder="ยืนยันรหัสผ่าน" >
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
                    <div class="offset-lg-0 offset-md-0 offset-sm-0 col-sm-5 col-10 offset-1 col-lg-10 col-md-8">
                        <div class="text-center text-lg-left container-div-bloc-29-style">
                            <div class="form-check checkbox-style form-check-inline">
                                <input class="form-check-input" type="checkbox"
                                    data-validation-minchecked-minchecked="1"
                                    data-validation-minchecked-message="ฉันอ่านและยอมรับ ข้อตกลงการใช้บริการ"
                                    id="input_1228" name="input_1228" wire:model="check_readed">
                                <label class="form-check-label @error('check_readed') text-danger @enderror">
                                    ฉันอ่านและยอมรับ นโยบายของเรา
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-d btn-lg btn-11-style" >ตกลง</button>
                    {{-- <a href="#"  >ตกลง<br></a> --}}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script>

    function submit_click() {
        // alert();
        // swal({
        //     title: 'ยืนยันการ บันทึก ข้อมูล ?',
        //     icon: 'close',
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonText: 'ยืนยัน',
        //     cancelButtonText: 'ยกเลิก',
        //     confirmButtonColor: '#00BCD4',
        //     cancelButtonColor: '#DD6B55'
        // }, function(isConfirm) {
        //     if (isConfirm) {
        @this.submit();
        //     }
        // });
    }

</script>
