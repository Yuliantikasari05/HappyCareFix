@extends('layouts.admin')

@section('title', 'Articles Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Articles Management</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create New Article
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">All Articles</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-8">
                    <form action="{{ route('admin.articles.index') }}" method="GET" class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" 
                                   placeholder="Search articles..." value="{{ request('search') }}">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end">
                        <select class="form-select me-2" name="status" onchange="this.form.submit()" style="width: auto;">
                            <option value="">All Status</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                        <select class="form-select" name="category" onchange="this.form.submit()" style="width: auto;">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            @if($articles->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Views</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($article->image)
                                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" 
                                                 class="me-2 rounded" width="50" height="50" style="object-fit: cover;">
                                        @else
                                            <div class="bg-secondary rounded me-2 d-flex align-items-center justify-content-center" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-newspaper text-white"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('admin.articles.edit', $article) }}" class="text-decoration-none">
                                                {{ Str::limit($article->title, 50) }}
                                            </a>
                                            @if($article->published)
                                                <a href="{{ route('articles.show', $article->slug) }}" class="text-muted d-block small" target="_blank">
                                                    {{ route('articles.show', $article->slug) }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $article->category ? $article->category->name : 'Uncategorized' }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>
                                    <form action="{{ route('admin.articles.toggle-published', $article) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $article->published ? 'btn-success' : 'btn-secondary' }}">
                                            {{ $article->published ? 'Published' : 'Draft' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.articles.toggle-featured', $article) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $article->featured ? 'btn-warning' : 'btn-outline-warning' }}">
                                            {{ $article->featured ? 'Featured' : 'Regular' }}
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $article->views_count }}</td>
                                <td>{{ $article->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-primary me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">No Articles Found</h4>
                    <p class="text-muted">Get started by creating your first article.</p>
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus"></i> Create First Article
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection