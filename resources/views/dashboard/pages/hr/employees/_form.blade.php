  <div class="form-group">

      <x-form.input
          label="اسم الموظف"
          name="name"
          :value="$employee->name"
          placeholder="أدخل اسم الموظف" />
  </div>


  <div class="form-group">
      <label for="description">الوصف </label>
      <textarea class="form-control
      @error('description') 
      is-invalid 
      @enderror
      " id="description" name="description" rows="3"
          placeholder="أدخل الوصف"> {{ $employee->description }} </textarea>
      @error('description')
      <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>


  <div class="form-group mb-3">
      <label for="status" >حالة الموظف</label>
      <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
          <option value="active" {{ $employee->status === 'active' ? 'selected' : '' }}>نشط</option>
          <option value="inactive" {{ $employee->status === 'inactive' ? 'selected' : '' }}>غير نشط</option>
          <option value="on_leave" {{ $employee->status === 'on_leave' ? 'selected' : '' }}>في اجازة</option>
      </select>
      @error('status')
      <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>




  <!-- <div class="form-group mb-3">

      <x-form.select
          label="حالة القسم"
          name="status"
          :options="
      'active' => 'نشط', 
      'inactive' => 'غير نشط'
      ]"
          :selected= "$department->status ?? 'active' " />

  </div> -->