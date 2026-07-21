  <div class="form-group">

      <x-form.input
          label="'اسم التصنيف'"
          name="'name'"
          :value="$category->name"
          placeholder="'أدخل اسم التصنيف'"/>
  </div>


  <div class="form-group">
      <label for="description">وصف التصنيف</label>
      <textarea class="form-control
      @error('description') 
      is-invalid 
      @enderror
      " id="description" name="description" rows="3"
          placeholder="أدخل وصف التصنيف"> {{ $category->description }} </textarea>
      @error('description')
      <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>


  <div class="form-group mb-3">
     
    
      <x-form.select 
      name="'status'"
      lable="'حالة التصنيف'"
      :selected="$category->status ?? 'active'"
      :options="['active' => 'نشط', 'inactive' => 'غير نشط']" />
      
  </div>