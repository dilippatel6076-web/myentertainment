<div>
    <div class="d-flex mb-3">
        <input type="text"
            wire:model="searchInput"
            placeholder="Search..."
            class="form-control me-2">
        <button class="btn btn-primary"
            wire:click="searchMovies">
            Search
        </button>
    </div>
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Youtube URL</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>
                    @php
                    $firstWord = explode('/', $movie->thumbnail)[0] ?? '';
                    @endphp
                    @if ($firstWord === 'thumbnails')
                    <img src="{{ asset('storage/' . $movie->thumbnail) }}" width="100" alt="Thumbnail">
                    @else
                    <img src="{{ $movie->thumbnail }}" width="100" alt="Thumbnail">
                    @endif
                </td>
                <td>{{ $movie->youtube_url }}</td>
                <td>
                    @php
                    $categories = json_decode($movie->category, true);
                    @endphp

                    @if($categories)
                    {{ collect($categories)
                        ->map(fn($cat) => ucwords(str_replace('_',' ', $cat)))
                        ->implode(', ') }}
                    @endif
                </td>
                <td>
                    <span class="badge bg-{{ $movie->status == 'active' ? 'success' : 'danger' }}">
                        {{ $movie->status }}
                    </span>
                </td>
                <td>{{ $movie->created_at->format('d-m-Y') }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('view',$movie->id) }}"
                            class="btn btn-info btn-sm">
                            View
                        </a>
                        <a href="{{ route('edit',$movie->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('delete',$movie->id) }}"
                            class="btn btn-info btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No movies found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $movies->links() }}
    </div>
</div>