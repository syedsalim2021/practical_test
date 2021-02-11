<div id="slide-out" class="side-nav fixed sn-bg-4">
    <ul class="custom-scrollbar list-unstyled" style="overflow-y: scroll;">
        <li>
            @php
                    $id = Auth::id();

                    $route_name = Request::route()->getName();
                    $route_path = Request::path();


            @endphp
            <ul class="collapsible collapsible-accordion">

                <li>
                    <a href="{{url('admin/home')}}" class="waves-effect {{ ($route_path =='admin/home' ? 'active' : '') }}"><i class="fa fa-home"></i> Home</a>
                </li>

                 <li>
                    <a href="{{route('terminology')}}" class="waves-effect {{ ($route_path =='admin/terminology' ? 'active' : '') }}"><i class="fa fa-product-hunt"></i> Terminology</a>
                </li>

                <li>
                    <a href="{{route('specification')}}" class="waves-effect {{ ($route_path =='admin/specification' ? 'active' : '') }}"><i class="fa fa-car"></i> Specification</a>
                </li>


            </ul>
        </li>
        <!--/. Side navigation links -->
    </ul>

</div>
