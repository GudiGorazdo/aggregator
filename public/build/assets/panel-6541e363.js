document.addEventListener("DOMContentLoaded",n=>{({input:document.getElementById("search"),button:document.getElementById("search_button"),list:document.getElementById("search_list"),loader:document.getElementById("search_loader"),items:[],init(){this.input.addEventListener("input",this.debounce(this.search.bind(this))),this.input.addEventListener("active",()=>{this.items.length>0&&this.show()}),this.input.addEventListener("focus",()=>{this.items.length>0&&this.show()}),document.addEventListener("click",this.checkMiss.bind(this))},debounce(t,e=500){let i;return function(...s){clearTimeout(i),i=setTimeout(()=>{t.apply(this,s)},e)}},async search(){if(this.input.value.length>2){this.showLoader();const t=await fetch(`/admin/shops?title=${this.input.value}`),e=await t.json();e.ok&&(this.items=e.shops.length>0?e.shops:[{error:!0,message:"Ничего не найдено"}],this.addItems(),this.show()),this.hideLoader()}else this.items=[],this.list.innerHTML="",this.hide(),this.hideLoader()},addItems(){this.list.innerHTML="",this.items.length==1&&this.items[0].error?this.list.innerHTML+=`
          <li class="admin-panel-search_item px-2 py-2">
            ${this.items[0].message}
          </li>
        `:this.items.forEach(t=>{this.list.innerHTML+=`
          <li class="admin-panel-search_item">
            <a class="admin-panel-search_link" href="/shop/${t.id}">${t.name}</a>
          </li>
        `})},checkMiss(t){this.list.contains(t.target)||t.target!=this.input&&this.hide()},show(){this.list.removeAttribute("hidden")},hide(){this.list.setAttribute("hidden",!0)},showLoader(){this.loader.removeAttribute("hidden")},hideLoader(){this.loader.setAttribute("hidden",!0)}}).init()});
