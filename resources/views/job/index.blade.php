<div>
    <h1>job board made by {{ $name}}</h1>
    @foreach ($jobs as $job)
        <div>{{ $job['title'] }}: {{ $job['salary'] }}</div>
    @endforeach
</div>
`
