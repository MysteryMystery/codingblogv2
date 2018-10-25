@extends("layouts.app")

@section("content")
    @cannot("users.manage")
        {{ abort(403, "You do not have permission to view this page!") }}
    @endcannot
<div class="row">
    <!-- Side bar for tags and selectors -->
    <div class="col-2 admin-side-bar">
        @foreach($roles as $role)
            <div class="row">
                {{ $role->name }}
            </div>
        @endforeach
    </div>

    <!-- Users List -->
    <div id="users-list" class="col-6">

        <!-- Search Bar -->
        <div class="container">
            <form class="form-inline" style="margin-bottom: 0.2rem;" action="{{ route("admin.users.search") }}" method="get">
                @crsf
                <input class="form-control" type="text" name="search" value="" placeholder="Search a user...">
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>

        @foreach($users as $user)
            <div class="card admin-card" style="margin-bottom: 0.2rem;">
                <div class="card-title">{{ $user->email }}</div>
                <div class="card-subtitle mb-2 text-muted">{{ $user->name }}</div>
                <div class="card-body">
                    <div class="row">
                        <!-- Displayed Tags -->
                        <div class="col-8 admin-tag-box">
                            @foreach($user->roles() as $role)
                                <span class="admin-tag"> {{ $role->name }}</span>
                            @endforeach
                        </div>
                        <!-- Controls -->
                        <!-- Maybe do jquery to onHover -> display the controls? in foreach give each card new id then use that? -->
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-auto">
                                    <button class="btn btn-primary">Add Permission</button>
                                    <!--<button class="btn btn-primary">Remove</button> -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-auto">
                                    <button class="btn btn-primary">Add Group</button>
                                    <!-- <button class="btn btn-primary">Remove</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function () {
            $(".admin-tag").hover(
                function () {
                    $(this).append(" x");
                },
                function () {
                    $(this).html($(this).html().slice(0, -1));
                }
            );

            $(".admin-tag").click(function(){
                /*
                let y;
                var classFlag = ".admin-card";
                var selected = $(this);
                while (classFlag !== classFlag){
                    console.log(selected.html());
                    selected = selected.parent();
                }
                y = selected.children(".card-title").val();
                */
                var email = $(this).parent().parent().parent().parent().children(".card-title").html();
                console.log(email);

                $.ajax({
                    method: "POST",
                    url: "{{ route('api.role.remove') }}",
                    data: {
                      user:   email,
                        tag: $(this).html().slice(0, -2),
                    },
                    success: function (result) {
                        $(this).hide();
                    },
                    error: function( jqXHR, textStatus, errorThrown ){
                        alert(errorThrown);
                    }
                });
            });
        });
    </script>
</div>
@endsection
