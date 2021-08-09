@extends('layouts.app')

@section('title', 'Show')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Block Preview</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('poll.show', $block->poll->id) }}"> To Poll list</a>
                <a class="btn btn-primary" href="{{ route('blocks.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($block->question))

        <h4>{{ $block->question->content }}</h4>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    @if(isset($block->pollitems))


                        @if($block->type_id === 1)

                            @foreach($block->pollitems as $item)

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="pollitem_{{ $item->id }}">
                                    <label class="form-check-label" for="pollitem_{{ $item->id }}">
                                        {{ $item->content }}
                                    </label>
                                </div>

                            @endforeach

                        @elseif($block->type_id === 2)

                            @foreach($block->pollitems as $key => $item)

                                @if($key === 0)

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                               id="pollitem_{{ $item->id }}"
                                               checked>
                                        <label class="form-check-label" for="pollitem_{{ $item->id }}">
                                            {{ $item->content }}
                                        </label>
                                    </div>

                                @else

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                               id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ $item->content }}
                                        </label>
                                    </div>

                                @endif

                            @endforeach

                        @else
                            {{-- type_id = 3 --}}
                        @endif


                    @else
                        <br>
                        <p>No data</p>
                    @endif

                </div>
            </div>
        </div>

    @else

        <br>
        <p>No data</p>

    @endif

@endsection

@section('footerScripts')
    @parent
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
