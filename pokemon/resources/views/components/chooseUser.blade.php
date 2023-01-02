@if($users->count() > 0)
    <div class="box-table table-responsive" id="userSelect">
        <table class="table table-bordered border-warning upcoming-projects table-striped table-hover">
            <thead>
            <tr>
                <th>
                    <span>Name</span>
                </th>
                <th>
                    <span>Niveau</span>
                </th>
                <th>
                    <span>Combats Joués</span>
                </th>
                <th>
                    <span>Combats Gagnés</span>
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $index=>$user)
                @if($index % 2 == 0)
                    <script>
                        var energies
                    </script>
                    <tr class="color-light"
                        onclick="chooseUser({{$user->id}},'{{$user->name}}', {{ json_encode($user->energies) }}, '{{$user->level}}')">
                        <td><span>{{$user->name}}</span></td>
                        <td><span class="color-green">{{$user->level}}</span></td>
                        <td><span class="color-danger">{{count($user->combats)}}</span></td>
                        <td><span class="color-info">{{count($user->combatsWon)}}</span></td>
                    </tr>
                @else
                    <tr onclick="chooseUser({{$user->id}},'{{$user->name}}', {{ json_encode($user->energies) }}, '{{$user->level}}')">
                        <td><span>{{$user->name}}</span></td>
                        <td><span class="color-green">{{$user->level}}</span></td>
                        <!--
                            I need to fix bug here
                        -->
                        <td><span class="color-danger">{{count($user->combats)}}</span></td>
                        <td><span class="color-info">{{count($user->combatsWon)}}</span></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                <div class="section-title mb--30 text-center">
                    <h2 id="headlineResult" class="title">Y a pas de joueurs !</h2>
                </div>
            </div>
        </div>
    </div>
@endif

