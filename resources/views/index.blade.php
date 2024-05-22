
@include ('header')
<div id="main-content">
    <h2>All Records</h2>

    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>User Id</th>
        <th>Title</th>
        <th style="width: 80%">Body</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->userId}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>

            </tr>
            @endforeach


        </tbody>
    </table>
</div>
</div>
<script src="{{ asset('toaster/toastr.min.js') }}"></script>
    <script>
        toastr.options.progressBar = true;
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
</body>
</html>
