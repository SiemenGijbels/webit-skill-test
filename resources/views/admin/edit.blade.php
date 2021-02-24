@extends('layouts.app')

@section('page_title', 'Edit post')


@section('content')
    <h1>Edit post</h1>

    <div class="containerCreate">
        <form method="POST" action="/items/{{ $post->slug }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="fieldGroup">
                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input" type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="slug">Slug</label>

                    <div class="control">
                        <input class="input" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="price">Price</label>

                    <div class="control">
                        <input class="input" type="text" name="price" id="price" value="{{ old('price', $post->price) }}" required>
                    </div>
                </div>
            </div>

            <div class="fieldGroup">
                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body" required> {{ old('body', $post->body) }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="media">Media</label>

                    <div class="input-group control-group increment">
                        <input type="file" name="media[]">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add
                            </button>
                        </div>
                    </div>

                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="media[]">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $(".btn-success").click(function () {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function () {
                $(this).parents(".control-group").remove();
            });

        });
    </script>
@endsection
