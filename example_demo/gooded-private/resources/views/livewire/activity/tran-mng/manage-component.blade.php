<div>
    {!! Form::open(['wire:submit.prevent' => 'submit()', 'autocomplete' => 'off', 'class' => 'form-horizontal fv-form fv-form-bootstrap4']) !!}
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">ปีงบประมาณ</label>
        {!! Form::select('fiscalyear_code', $fiscalyear_list, null, ['id' => 'fiscalyear_code', 'onchange' => 'setSearch', 'class' => 'form-control col-md-2', 'placeholder' => '--เลือกปีงบประมาณ--']) !!}
        @error('fiscalyear_code')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">กิจกรรมครั้งที่</label>
        {!! Form::select('act_count', [1, 2, 3, 4, 5, 6, 7, 8, 9], 0, ['onchange' => 'setValue("dept_id",event.target.value)', 'class' => 'form-control col-md-1']) !!}
        @error('act_count')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">หน่วยงาน</label>
        {!! Form::select('dept', $dept_list, null, ['onchange' => 'setValue("dept_id",event.target.value)', 'class' => 'form-control col-md-2 select2']) !!}
        @error('dept')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">ยอดยืนยันโครงการ</label>
        {!! Form::number('project_cost', null, ['onchange' => 'setValue("dept_id",event.target.value)', 'class' => 'form-control col-md-2', 'placeholder' => 'ยอดยืนยันโครงการ']) !!}
        @error('project_cost')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <hr>
    <div class="form-group row">
        <label class="form-control-label col-md-2 text-right pr-4"><b><h4>จัดสรร</h4></b></label>
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">ค่ากิจกรรม</label>
        {!! Form::number('project_cost', null, ['onchange' => 'setValue("dept_id",event.target.value)', 'class' => 'form-control col-md-2', 'placeholder' => 'ค่ากิจกรรม']) !!}
        @error('project_cost')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">ค่าบริหารโครงการ</label>
        {!! Form::number('project_cost', null, ['onchange' => 'setValue("dept_id",event.target.value)', 'class' => 'form-control col-md-2', 'placeholder' => 'ค่าบริหารโครงการ']) !!}
        @error('project_cost')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row">
        <label class="form-control-label col-md-3 text-right pr-4">รวม</label>
        {!! Form::number('project_cost', null, ['onchange' => 'setValue("dept_id",event.target.value)', 'class' => 'form-control col-md-2']) !!}
        @error('project_cost')
            <label class="text-danger">{{ $message }}</label>
        @enderror
    </div>
    <div class="form-group row d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
    {!! Form::close() !!}
</div>

@push('js')
    <script>
        $('.select2').select2();

        function setDatePicker(name, val) {
            @this.set(name, val);
            @this.setArray();
            // if(name == 'stdate' || name = "endate"){
            //     @this.setArray();
            // }
        }

        function setValue(name, val) {
            @this.set(name, val);
        }

        $(".datepicker").datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });

        Livewire.on('emits', () => {
            $('.select2').select2();
            $(".ads_Checkbox").change(function() {
                var searchIDs = $(".ads_Checkbox").map(function(_, el) {
                    if ($(this).is(':checked')) {
                        return 'on';
                    } else {
                        return 'off';
                    }
                }).get();
                // console.log(searchIDs);
            });

        });

        Livewire.on('popup', () => {
            swal({
                title: "บันทึกข้อมูลเรียบร้อย",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                },
                function(isConfirm){
                    if (isConfirm) {
                        window.livewire.emit('redirect-to');
                }
            });
        });

        function button_function() {
            swal({
                title: 'ยืนยันการ ยกเลิกโครงการ ?',
                icon: 'close',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#00BCD4',
                cancelButtonColor: '#DD6B55'
            }, function(isConfirm) {
                if (isConfirm) {
                    @this.redirect_to();
                }
            });
        }
    </script>
@endpush
