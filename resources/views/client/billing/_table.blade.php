<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Request By</th>
            <th>Amount</th>
            <th>Remarks</th>
            <th>Attachments</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reqs as $req)
            <tr>
            <td>{{$req->client->name}}</td>
            <td>{{$req->amount}}</td>
            <td>{{$req->remarks}}</td>
            <td>
                <ul class="attachment-section">
                    @foreach ($req->requestAttachments as $atchment)
                            @php
                                $data = json_decode($atchment->data,true);
                            @endphp
                            @if (!empty($data))
                                <div class="d-flex">
                                    @foreach ($data as $d)
                                        @php
                                            $extension = pathinfo(public_path('attachments/'.$d), PATHINFO_EXTENSION);
                                        @endphp
                                        <li>
                                            @if ($extension == 'jpeg' || $extension == 'png')
                                                 <a href="{{asset('attachments/'.$d)}}" target="_blank"><img src="{{asset('attachments/'.$d)}}" alt="" class="rounded-circle" width="80" height="80"></a>
                                            @elseif($extension == 'pdf' || $extension == 'pdf')
                                                <a href="{{asset('attachments/'.$d)}}" target="_blank"> <i class="fas fa-file-pdf" style="font-size:50px"></i> </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </div>
                            @endif
                    @endforeach
                </ul>
            </td>
            <td>{{$req->status_alias}}</td>
            <td>
                @if (auth()->user()->role != 'super')
                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> </a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i> </a>
                @else
                     @if ($req->status == 0)
                        <div class="d-flex">
                            <form action="{{route('admin.fundRequestAction')}}" class="mr-2" method="post">
                                @csrf
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" name="client_id" value="{{$req->client_id}}">
                                <input type="hidden" name="amount" value="{{$req->amount}}">
                                <input type="hidden" name="id" value="{{$req->id}}">
                                <button type="submit" class="btn btn-sm btn-primary">Accept</button>
                            </form>
                            <form action="{{route('admin.fundRequestAction')}}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="2">
                            <input type="hidden" name="id" value="{{$req->id}}">
                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                            </form>
                        </div>

                     @endif
                @endif
            </td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
   ul.attachment-section li{
        list-style-type: none;
   }
</style>
