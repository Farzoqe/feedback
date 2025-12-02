<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<div class="container pt-5">

    <div class="feedback-panel">
        <h2>Feedbacks</h2>
        <table class="table">
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>From</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            @foreach($feedbacks as $feedback)

                <tr>
                    <td>{{$feedback->subject}}</td>
                    <td>{!! nl2br($feedback->description) !!}</td>
                    <td>{{$feedback->user->name ?? ''}}</td>
                    <td>{{$feedback->created_at->format("d-M-Y")}}</td>
                    <td>
                        @if($feedback->status == 'Closed')
                            <button disabled class="btn btn-success">Closed!</button>
                        @else
                            <form class="d-inline-block" action="/feedback/{{$feedback->id}}" method="post">
                                @csrf
                                @method('put')
                                <button class="btn btn-secondary">
                                    Close
                                </button>
                            </form>
                        @endif
                        <form class="d-inline-block" action="/feedback/{{$feedback->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
