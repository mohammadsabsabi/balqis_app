  <div class="form-group">

      <x-form.input
          label="اسم القسم"
          name="name"
          :value="$department->name"
          placeholder="أدخل اسم القسم" />
  </div>


  <div class="form-group">
      <label for="description">وصف القسم</label>
      <textarea class="form-control
      @error('description') 
      is-invalid 
      @enderror
      " id="description" name="description" rows="3"
          placeholder="أدخل وصف القسم"> {{ $department->description }} </textarea>
      @error('description')
      <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>


  <div class="form-group mb-3">
      <label for="status">حالة القسم</label>
      <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
          <option value="active" {{ $department->status === 'active' ? 'selected' : '' }}>نشط</option>
          <option value="inactive" {{ $department->status === 'inactive' ? 'selected' : '' }}>غير نشط</option>
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