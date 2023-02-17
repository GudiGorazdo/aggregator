<button class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></button>
<aside class="aside">
  <button class="aside_close">Закрыть</button>
  <div class="aside_logo"><img src="https://picsum.photos/id/{{ rand(1, 250) }}/100/100" alt="LOGO"></div>
  <button class="aside_add-shop">добавить организацию</button>
  <div class="aside_region">Регион</div>
  <div class="aside-filters">
    <form class="aside-filters_form" action="#">
      <x-accordion className="aside-filters_categories" id="categories_filter">
        @foreach (\App\Models\Category::with('subCategories')->get() as $cat)
          <x-accordion-item id="{{ $cat->id }}" collapse="coolapse_{{ $cat->id }}" parentId='categories_filter' :subcategories="$cat->subCategories">{{ $cat->name }}</x-accordion-item>
        @endforeach
      </x-accordion>
      <div class="aside-filters_rating">
        <div class="d-flex flex-row">
          <div class="ratings mr-2">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <span></span>
      </div>
      </div>
    </form>
  </div>
</aside>
