  <div class="form-group">

      <x-form.input
          label="اسم المنتج"
          name="name"
          :value="$product->name"
          placeholder="أدخل اسم المنتج" />
  </div>

  <div class="form-group">
      <label for="description">وصف المنتج</label>
      <textarea class="form-control
      @error('description') 
      is-invalid 
      @enderror
      " id="description" name="description" rows="3"
          placeholder="أدخل وصف المنتج"> {{ $product->description }} </textarea>
      @error('description')
      <div class="text-danger">{{ $message }}</div>
      @enderror
  </div>

  <div class="form-group">

      <x-form.input
          label="السعر"
          type="number"
          name="price"
          :value="$product->price"
          placeholder="أدخل السعر" />
  </div>

  <div class="form-group mb-3">

      <x-form.select
          label="حالة المنتج"
          name="status"
          :options="[
      'active' => 'نشط', 
      'inactive' => 'غير نشط'
      ]"
          :selected="$product->status??'active'" />
  </div>

  <div class="form-group mb-3">

      <x-form.select
          label="فئة المنتج"
          name="category_id"
          :options=$categories
          :selected="$product->category_id??''" />

  </div>


  <div class="form-group mb-3">

      <x-form.select
          label="المتجر"
          name="store_id"
          :options=$stores
          :selected="$product->store_id??''" />

  </div>