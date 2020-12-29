<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="{{ URL::asset('css/styles.css') }} " rel="stylesheet" id="app" />

    </head>
    <body>
        <div class="container-fluid">
            <div class="row"><h1>Income Tax Returns Status</h1></div>
            <div class="left_bar">
                <ul class="nav-tabs--vertical nav" role="navigation">
                    @foreach ($company as $cmp)
                        <li class="nav-item">
                            <a href="#{{ 'comp_'.$cmp->cid }}" class="nav-link {{ ($cmp->cid==1) ? 'active' : '' }}" data-toggle="tab" role="tab" aria-controls="{{ 'comp_'.$cmp->cid }}">{{ $cmp->cname }} <br />
                                <span class="small">Company Status => {{ ($cmp->completed_tot==count($company)) ? 'Completed' : 'Pending' }} <br />
                                Employee Status => Completed <span class="badge badge-primary ml-2">{{ $cmp->completed_tot }}</span> || Pending <span class="badge badge-warning ml-2">{{ $cmp->pending_tot }}</span></span>
                            </a>
                        </li>
                    @endforeach
            </ul>
            </div>
            <div class="right_bar">
                <div class="tab-content">
                    @foreach ($company as $cmp)
                        <div class="tab-pane {{ ($cmp->cid==1) ? 'fade show active' : 'fade' }} " id="{{  'comp_'.$cmp->cid }}" role="tabpanel">
                            <table class="table table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date Of Birth</th>
                                    <th>Pan Card</th>
                                    <th>Annual Income</th>
                                    <th>Company Name</th>
                                    <th>ITR Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        @if($cmp->cid == $d->cid)
                                            <tr>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->email }}</td>
                                                <td>{{ date("d-M-Y", strtotime($d->dob)) }}</td>
                                                <td>{{ $d->pan_number }}</td>
                                                <td>{{ number_format($d->annual_income,2) }}</td>
                                                <td>{{ $d->cname }}</td>
                                                <td class="{{ ($d->status=='completed') ? 'alert-success' : 'alert-warning' }}">{{ $d->status }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </body>
</html>
